<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Remedy;
use App\Models\yogaPredictiona;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\MdYogaPrediction;
use App\Models\AdYogaPrediction;
use App\Models\PdYogaPrediction;

class NumappController extends Controller
{
    protected $chaldean_array = [
        'A' => 1, 'I' => 1, 'J' => 1, 'Q' => 1, 'Y' => 1,
        'B' => 2, 'K' => 2, 'R' => 2,
        'C' => 3, 'G' => 3, 'L' => 3, 'S' => 3,
        'D' => 4, 'M' => 4, 'T' => 4,
        'E' => 5, 'H' => 5, 'N' => 5, 'X' => 5,
        'U' => 6, 'V' => 6, 'W' => 6,
        'O' => 7, 'Z' => 7,
        'F' => 8, 'P' => 8
    ];

    protected $days = [1 => 'Sunday', 2 => 'Monday', 9 => 'Tuesday', 5 => 'Wednesday', 3 => 'Thursday', 6 => 'Friday', 8 => 'Saturday'];

    protected $spell_jars = [
        'health' => [
            'title' => 'Health Jar Remedy',
            'jar_type' => 'Small glass jar with lid',
            'ingredients' => [
                'Dried rosemary (protection & vitality)',
                'Chamomile (healing & calm)',
                'Cloves (ward off illness)',
                'Clear quartz or green aventurine (healing crystal)',
                'Paper with affirmation: "I am healthy, strong, and full of energy."'
            ],
            'method' => [
                'Cleanse the jar with incense or sage.',
                'Add herbs one by one with healing intentions.',
                'Place the crystal inside.',
                'Roll up the affirmation and put it in the jar.',
                'Seal the jar with white or green candle wax.'
            ],
            'placement' => 'Keep near your bedside or under pillow.'
        ],

        'money' => [
            'title' => 'Money Jar Remedy',
            'jar_type' => 'Small green or clear jar',
            'ingredients' => [
                'Bay leaves (wealth attraction)',
                'Cinnamon sticks or powder (prosperity booster)',
                'Coins (real money energy)',
                'Basil or mint (abundance & good luck)',
                'Citrine crystal (wealth stone)',
                'Paper with affirmation: "Money flows to me easily and consistently."'
            ],
            'method' => [
                'Place coins first (foundation of money).',
                'Add herbs and cinnamon for prosperity.',
                'Insert the written intention paper.',
                'Add the citrine crystal.',
                'Seal with green or gold candle wax.'
            ],
            'placement' => 'Keep near cash register, wallet area, or work desk.'
        ],

        'relationship' => [
            'title' => 'Relationship Jar Remedy',
            'jar_type' => 'Small pink or clear jar',
            'ingredients' => [
                'Rose petals (love & harmony)',
                'Lavender (peace & trust)',
                'Sugar or honey (sweetness in relationships)',
                'Rose quartz crystal (love & bonding)',
                'Two cloves (representing you + partner)',
                'Paper with affirmation: "Our relationship is filled with love, respect, and trust."'
            ],
            'method' => [
                'Add rose petals and lavender first.',
                'Sprinkle sugar or honey for sweetness.',
                'Place two cloves together inside the jar.',
                'Add rose quartz.',
                'Fold and place affirmation paper.',
                'Seal with pink or red candle wax.'
            ],
            'placement' => 'Keep in bedroom, relationship altar, or under pillow.'
        ],
    ];

    public function numapp()
    {
        $user = Auth::user();
        // Check if user has purchased the name numerology package
        $hasPurchased = Order::with('package')->where('user_id', $user->id)
            ->whereHas('package', function ($query) {
                $query->where('type', 'numeroApp')->where('active', true);
            })
            ->where('status', 'completed')
             ->exists();
        //    mobileApp
        if (!$hasPurchased) {

            return redirect()->route('home')
                ->with('error', 'You need to purchase the Name Numerology package to access this feature.');
        }

        return view('user.numerology.numapp');
    }

    public function calculateNumapp(Request $request)
    {

        // die('dfd');
       $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'birth_date' => 'required|date',
        ]);



        $full_name = $data['first_name'] . ' ' . $data['middle_name'] . ' ' . $data['last_name'];

        // Calculate birth date values
        $birthDateObj = date_create($data['birth_date']);
        $birthDay = intval(date_format($birthDateObj, 'd')); // Birth day (DOB-BN)

        // Calculate sum of all digits in birth date (DOB-DN)
        $birthDateDigits = str_replace(['-', '/'], '', date_format($birthDateObj, 'd-m-Y'));
        $birthDateSum = 0;
        for ($i = 0; $i < strlen($birthDateDigits); $i++) {
            $birthDateSum += intval($birthDateDigits[$i]);
        }

        $placeholder = [[3, 1, 9], [6, 7, 5], [2, 8, 4]];

        $attrs = Attribute::select('compound_number', 'description')->get();
        $attr_array = array_column($attrs->toArray(), 'description', 'compound_number');

        $dob_chart = $this->getDobMatrixResult(date('d-m-Y', strtotime($data['birth_date'])), $placeholder);
        $chars = $this->getCharacterstics($data['birth_date'], $full_name);
        // dd($this->getPredictions($dob_chart));
        // $this->getPredictions($dob_chart);
         // Get remedies for the calculated numbers
         $remedies = Remedy::where('status', true)->get()->keyBy('number');

          // Get specific remedies based on calculated numbers
          $bn_remedy = $remedies->get($this->reduceToSingleDigitVC($birthDay));
          $dn_remedy = $remedies->get($this->reduceToSingleDigitVC($birthDateSum));

          $bn_single = $this->reduceToSingleDigitVC($birthDay);
          $dn_single = $this->reduceToSingleDigitVC($birthDateSum);

          $md_chart = $this->mdChart($data['birth_date']);




          $ad_chart = $this->adChart($data['birth_date'], date('Y-m-d'));
          $pd_chart = $this->pdChart($data['birth_date'], date('Y-m-d'));

          $dasha = $pd_chart['dasha'];
          $antardasha = $pd_chart['antardasha'];
          $pratyantardasha = $pd_chart['pratyantardasha'];

          // dr -> dasha remedy

          $dr_md = $this->getDashaRemedy($dasha);
          $dr_ad = $this->getDashaRemedy($antardasha);
          $dr_pd = $this->getDashaRemedy($pratyantardasha);
          $dasa_pd_chart = $this->updateChartValue($pd_chart['data'],$dasha);
          $backSeterNumber = $this->getBackSeaterNumber($data['birth_date']);

          $new_pd_chart = $this->updateChartValue($dasa_pd_chart,$backSeterNumber);

        $newpd_chartArray = $this->convertToChunkArray($new_pd_chart);
        $ad_chartArray =  $this->convertToChunkArray($ad_chart['data']);
        $new_ad_chart = $this->updateChartValue($ad_chart['data'],$antardasha);

          $dasa_md_chart = $this->updateChartValue($md_chart['data'],$dasha);
         $newmd_chartArray = $this->convertToChunkArray($dasa_md_chart);
          $result = [
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'full_name' => $full_name,
            'birth_date' => $data['birth_date'],

            'bn' => $birthDay, // Birth day (DOB-BN)
            'dn' => $birthDateSum, // Sum of all digits in birth date (DOB-DN)
            'attrs' => $attr_array,

            'chars' => $chars,

            'bn_single' => $bn_single,
            'dn_single' => $dn_single,

            'dob_chart' => $dob_chart,

            'bn_remedy' => $bn_remedy,
            'dn_remedy' => $dn_remedy,

            'md_chart' => $dasa_md_chart,
            'ad_chart' => $ad_chart,
            'ad_chart_data' => $new_ad_chart,
            'pd_chart' => $pd_chart,

            'dr_md' => $dr_md,
            'dr_ad' => $dr_ad,
            'dr_pd' => $dr_pd,

            'dob_yogas_prediction' => $this->getDobYogasPrediction($bn_single),

            'yantra_bn' => $this->getYantras($bn_single),
            'yantra_dn' => $this->getYantras($dn_single),

            'spell_jars' => $this->spell_jars,
            'yoga_com_preduction'=> $this->getPredictions($dob_chart),
            'md_yoga_com_preduction'=> $this->mdGetPredictions($newmd_chartArray,$dasha),
            'ad_preduction'=> $this->adGetPredictions($antardasha,'ad',null),
            'ad_yoga_com_preduction'=> $this->adGetPredictions($ad_chartArray,'cobination',$antardasha),
            'pd'=>$this->getPdPredictionRamidy($pratyantardasha,'ad')
        ];

        // dd($this->getPdPredictionRamidy($pratyantardasha,'ad'),$pratyantardasha);
        return view('user.numerology.numapp', compact('result'));
    }


public function getBackSeaterNumber($dob)
{
    $date = \Carbon\Carbon::parse($dob)->format('d');
    $month = \Carbon\Carbon::parse($dob)->format('m');
    $year = \Carbon\Carbon::parse($dob)->format('Y');

    // Combine all digits
    $digits = str_split($date . $month . $year);

    $sum = array_sum($digits);

    // Reduce to single digit
    while ($sum > 9) {
        $sum = array_sum(str_split($sum));
    }

    return $sum;
}

    public function getCharacterstics($date_of_birth, $name)
    {
        $dob = Carbon::parse($date_of_birth);
        $date = (int) $dob->format('d');
        $month = (int) $dob->format('m');
        $year = (int) $dob->format('Y');

        $name_number = $this->calculateNameNumber($name);
        $basic_number = $this->reduceToSingleDigit($date);
        $supportive_number = $this->reduceToSingleDigit($month);
        $destiny_number = $this->reduceToSingleDigit($date + $month + $year);

        // $char = Characterstic::where('number', $basic_number)->first();
        $char = DB::table('characterstics')->where('number', $basic_number)->first();


        return [
            // 'name' => $request->name,
            // 'dob' => $request->dob,
            // 'gender' => $request->gender,
            'destiny_number' => $destiny_number,
            'basic_number' => $basic_number,
            'supportive_number' => $supportive_number,
            'name_number' => $name_number,
            'colors' => $char->colors ?? null,
            'direction' => $char->direction,
            'lucky_number' => $char->lucky_number,
            'characterstics' => json_decode($char->characterstics),
            'missing_number' => $char->missing_number
        ];
    }

    private function reduceToSingleDigit($number)
    {
        $number = array_sum(array_map('intval', str_split($number)));

        // Optional: Handle master numbers
        // $masterNumbers = [11, 22, 33];
        // if (in_array($number, $masterNumbers)) {
        //     return $number;
        // }

        return strlen((string)$number) > 1 ? $this->reduceToSingleDigit($number) : $number;
    }

    private function reduceToSingleDigitArray($dateString) {
        $digits = str_split($dateString);
        $sum = array_sum($digits);
        return $this->reduceToSingleDigitVC($sum);
    }

    public function calculateNameNumber($name)
    {
        $name = str_replace(' ', '', $name);
        $name_array = str_split($name);
        $number = 0;

        foreach ($name_array as $char) {
            $number += $this->chaldean_array[strtoupper($char)] ?? 0;
        }

        return $this->reduceToSingleDigit($number);
    }

    private function reduceToSingleDigitVC($number) {
        while ($number > 9) {
            $digits = str_split($number);
            $number = array_sum($digits);
        }
        return (string)$number;
    }

    private function sumOfDigit($number) {

        $number  = array_map('intval', str_split($number));
        $number = array_sum($number);

        if(strlen($number) > 1) {
            $number = $this->sumOfDigit($number);
        }
            return $number;
    }

//  md chart
    public function mdChart($dob)
    {
        // Parse the DOB using Carbon
        $dob = Carbon::parse($dob);
        $day = (int) $dob->format('d');
        $month = (int) $dob->format('m');
        $year = (int) $dob->format('Y');


        $destiny_number = $this->sumOfDigit($day + $month + $year);


        $basic_number = $this->sumOfDigit($day);


        $dob_array = array_map('intval', str_split($dob->format('dmy')));
        array_push($dob_array, $destiny_number, $basic_number);


        $table_array = [3, 1, 9, 6, 7, 5, 2, 8, 4];

        $data = [];
        foreach ($table_array as $number) {
            $count = count(array_keys($dob_array, $number));
            $list = $count > 0 ? str_repeat((string)$number, $count) : '0';
            $data[] = $list;
        }

         return [
            'status' => 200,
            'data' => implode(",", $data),
            'dob_array' => $dob_array
        ];
    }



    public function adChart($dob, $toDate)
    {
        // Parse the DOB
        $dob = Carbon::parse($dob);
        $dob_day = (int) $dob->format('d');
        $dob_month = (int) $dob->format('m');
        $dob_year = (int) $dob->format('Y');

        // Calculate Destiny Number
        $destiny_number = $this->sumOfDigit($dob_day + $dob_month + $dob_year);

        // Table array used for generating the final chart
        $table_array = [3, 1, 9, 6, 7, 5, 2, 8, 4];

        // Create dob_array containing digits of DOB and calculated numbers
        $dob_formatted = $dob->format('dmy');
        $dob_array = array_map('intval', str_split($dob_formatted));
        array_push($dob_array, $destiny_number);

        // Basic number (sum of the digits of the day)
        $basic_number = $this->sumOfDigit($dob_day);
        array_push($dob_array, $basic_number);

        // Start processing the dasha loop
        $dasha_array = [];
        $start_date = $dob->copy();
        $end_date = $dob->copy();
        $number = $this->sumOfDigit($dob_day);

        while ($start_date <= Carbon::parse($toDate)) {
            // Limit number to single digit (1-9)
            if ($number > 9) {
                $number = 1;
            }

            // Update end date by adding a year
            $end_date = $start_date->copy()->addYear();

            // Dasha data (you will need to implement these methods)
            $mahadasha = (string) $this->calculateMahadasha($dob->format('Y-m-d'), $start_date)['number'];
            $antardasha = (string) $this->calculateAntardasha($dob->format('Y-m-d'), $start_date->format('y'));

            // Push dasha info into the array
            $data = [
                'start_date' => $start_date->format('d-m-Y'),
                'end_date' => $end_date->copy()->subDay()->format('d-m-Y'),
                'antartasha_number' => $antardasha,
                'dasha' => $mahadasha
            ];
            array_push($dasha_array, $data);

            // Move start date to the next year
            $start_date = $end_date->copy();
            $number++;
        }

        // Get the final Mahadasha and Antardasha
        $final_dasha = end($dasha_array)['dasha'];
        $final_antardasha = end($dasha_array)['antartasha_number'];

        // Add the final Mahadasha and Antardasha to dob_array
        array_push($dob_array, $final_antardasha);
        array_push($dob_array, $final_dasha);

        // Create basic chart based on table_array and dob_array
        $basic_chart = [];
        $count = 1;
        $data = [];

        foreach ($table_array as $ta) {
            $check_values = array_keys($dob_array, $ta);
            $count++;
            $list = "";

            if (count($check_values) > 0) {
                for ($i = 0; $i < count($check_values); $i++) {
                    $list .= $ta;
                }
            } else {
                $list = 0;
            }

            $check_values = (count($check_values) == 0) ? "" : count($check_values);
            array_push($data, $list);

            // Reset count after 4 iterations (or adjust logic if needed)
            if ($count == 4) {
                $count = 1;
            }
        }

        // Date Range (from dob to requested date)
        $from_date = $dob->format('d-m') . "-" . Carbon::parse($toDate)->format('Y');
        $to_date = Carbon::parse($from_date)->addYear()->subDay()->format('d-m-Y');

        // Return the final response with all required data
        return [
            'status' => 200,
            'data' => implode(",", $data),
            'dasha' => $final_dasha,
            'antardasha' => $final_antardasha,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'final' => $data
        ];
    }




    // public function pdChart($dob, $toDate)
    // {
    //     $dobCarbon = Carbon::parse($dob);

    //     $month = (int)$dobCarbon->format('m');
    //     $date = (int)$dobCarbon->format('d');
    //     $year = (int)$dobCarbon->format('Y');

    //     // calculate destiny number
    //     $destiny_number = $this->sumOfDigit(($month + $date + $year));

    //     $table_array = [3, 1, 9, 6, 7, 5, 2, 8, 4];
    //     $dob_formatted = $dobCarbon->format('dmy');
    //     $dob_array = array_map('intval', str_split($dob_formatted));

    //     // basic number
    //     $basic_number = $this->sumOfDigit($date);
    //     array_push($dob_array, $basic_number, $destiny_number);

    //     // setup for dasha calculation
    //     $year_short = (int)$dobCarbon->format('y');
    //     $year_full = (int)$dobCarbon->format('Y');
    //     $start_date = Carbon::parse($year_full . "-" . $month . "-" . $date);
    //     $end_date = $start_date->copy();

    //     $number = $this->calculateAntardasha($dob, $year_short);
    //     $previous_antar = 0;
    //     $dasha_array = [];

    //     while ($start_date < Carbon::parse($toDate)) {
    //         if ($number > 9) {
    //             $number = 1;
    //         }

    //         // avoid DOB -1 case
    //         if ($dobCarbon->copy()->subDay()->format('d-m') == $start_date->format('d-m')) {
    //             $start_date = $start_date->copy()->addDay();
    //         }

    //         $year_short = (int)$start_date->format('y');
    //         $dasha = $this->checkDashaAntarDasha($dob, $start_date);

    //         $end_date = $start_date->copy();

    //         if ($dasha['antartasha_number'] != $previous_antar) {
    //             $number = $dasha['antartasha_number'];
    //             $previous_antar = $dasha['antartasha_number'];
    //         }

    //         $pratyantar_dasha_days = $this->pratyantarDashaDays($end_date->format('Y'));
    //         $end_date = $end_date->addDays($pratyantar_dasha_days[$number]);

    //         $data = [
    //             'start_date' => $start_date->format('d-m-Y'),
    //             'end_date' => $end_date->format('d-m-Y'),
    //             'pratyantar_number' => (string)$number,
    //             'antartasha_number' => (string)$dasha['antartasha_number'],
    //             'dasha' => (string)$dasha['dasha'],
    //         ];
    //         array_push($dasha_array, $data);

    //         $start_date = $end_date->copy();
    //         $number++;
    //     }

    //     // last cycle values
    //     $mahadasha = $data['dasha'];
    //     $antardasha = $data['antartasha_number'];
    //     $pratyantardasha = $data['pratyantar_number'];

    //     // push into dob_array
    //     array_push($dob_array, $antardasha, $mahadasha, (string)$pratyantardasha);

    //     $mdata = $data;

    //     // build chart
    //     $basic_chart = [];
    //     $count = 1;
    //     $chart_data = [];

    //     foreach ($table_array as $ta) {
    //         $check_values = array_keys($dob_array, $ta);
    //         $count++;
    //         $list = "";

    //         if (count($check_values) > 0) {
    //             for ($i = 0; $i < count($check_values); $i++) {
    //                 $list .= $ta;
    //             }
    //         } else {
    //             $list = (string)0;
    //         }

    //         $check_values = count($check_values) == 0 ? "" : count($check_values);
    //         array_push($chart_data, $list);

    //         if ($count == 4) {
    //             $count = 1;
    //         }
    //     }

    //     return [
    //         'status' => 200,
    //         'request_date' => Carbon::parse($toDate)->format('Y-m-d'),
    //         'data' => implode(",", $chart_data),
    //         'dasha' => (string)$mahadasha,
    //         'antardasha' => (string)$antardasha,
    //         'pratyantardasha' => (string)$pratyantardasha,
    //         'from_date' => Carbon::parse($mdata['start_date'])->format('d-m-Y'),
    //         'to_date' => Carbon::parse($mdata['end_date'])->format('d-m-Y'),
    //         'dob_array' => $mdata
    //     ];
    // }

    public function pdChart($dob, $toDate)
    {
        $dobCarbon = Carbon::parse($dob);

        $month = (int)$dobCarbon->format('m');
        $date = (int)$dobCarbon->format('d');
        $year = (int)$dobCarbon->format('Y');

        $destiny_number = $this->sumOfDigit(($month + $date + $year));


        $table_array = [3, 1, 9, 6, 7, 5, 2, 8, 4];


        $dob_formatted = $dobCarbon->format('dmy');
        $dob_array = array_map('intval', str_split($dob_formatted));

        $basic_number = $this->sumOfDigit($date);
        array_push($dob_array, $basic_number, $destiny_number);

        // Setup for Dasha calculation
        $year_short = (int)$dobCarbon->format('y');
        $year_full = (int)$dobCarbon->format('Y');
        $start_date = Carbon::parse($year_full . "-" . $month . "-" . $date);
        $end_date = $start_date->copy();

        $number = $this->calculateAntardasha($dob, $year_short);
        $previous_antar = 0;
        $dasha_array = [];

        $last_data = null;

        while ($start_date < Carbon::parse($toDate)) {
            if ($number > 9) {
                $number = 1;
            }

            if ($dobCarbon->copy()->subDay()->format('d-m') == $start_date->format('d-m')) {
                $start_date = $start_date->copy()->addDay();
            }

            $dasha = $this->checkDashaAntarDasha($dob, $start_date);

            $end_date = $start_date->copy();

            if ($dasha['antartasha_number'] != $previous_antar) {
                $number = $dasha['antartasha_number'];
                $previous_antar = $dasha['antartasha_number'];
            }

            $pratyantar_dasha_days = $this->pratyantarDashaDays($end_date->format('Y'));
            $days_to_add = $pratyantar_dasha_days[$number] ?? 0; // default 0 if missing
            $end_date = $end_date->addDays($days_to_add);

            $last_data = [
                'start_date' => $start_date->format('d-m-Y'),
                'end_date' => $end_date->format('d-m-Y'),
                'pratyantar_number' => (string)$number,
                'antartasha_number' => (string)$dasha['antartasha_number'],
                'dasha' => (string)$dasha['dasha'],
            ];
            $dasha_array[] = $last_data;

            $start_date = $end_date->copy();
            $number++;
        }


        if ($last_data === null) {
            $last_data = [
                'start_date' => $start_date->format('d-m-Y'),
                'end_date' => $start_date->format('d-m-Y'),
                'pratyantar_number' => "0",
                'antartasha_number' => "0",
                'dasha' => "0",
            ];
        }


        $mahadasha = $last_data['dasha'];
        $antardasha = $last_data['antartasha_number'];
        $pratyantardasha = $last_data['pratyantar_number'];


        array_push($dob_array, $antardasha, $mahadasha, (string)$pratyantardasha);


        $chart_data = [];
        foreach ($table_array as $ta) {
            $count_values = count(array_keys($dob_array, $ta));
            $list = $count_values > 0 ? str_repeat((string)$ta, $count_values) : "0";
            $chart_data[] = $list;
        }

        return [
            'status' => 200,
            'request_date' => Carbon::parse($toDate)->format('Y-m-d'),
            'data' => implode(",", $chart_data),
            'dasha' => (string)$mahadasha,
            'antardasha' => (string)$antardasha,
            'pratyantardasha' => (string)$pratyantardasha,
            'from_date' => Carbon::parse($last_data['start_date'])->format('d-m-Y'),
            'to_date' => Carbon::parse($last_data['end_date'])->format('d-m-Y'),
            'dob_array' => $last_data
        ];
    }



    public function calculateMahadasha($dob, $till_date = null)
    {
        $month = (int)Carbon::parse($dob)->format('m');
        $date = (int)Carbon::parse($dob)->format('d');
        $year = (int)Carbon::parse($dob)->format('Y');

        $number = $this->sumOfDigit($date);
        // $number  = array_map('intval', str_split($date));
        // $number = array_sum($number);
        $dasha_array = [];
        $end_date = $start_date = Carbon::parse($dob);

        while($end_date) {

            if($number > 9) {
                $number = 1;
            }

            $end_date = Carbon::parse($start_date)->addYears($number);
            $data = [ 'start_date' => $start_date,
            'end_date' => $end_date,
            "number" => $number,

            'antartasha_number' => (string)$this->calculateAntardasha($dob, Carbon::parse($start_date)->format('y')),

					];
            array_push($dasha_array, $data);

            $start_date = $end_date ;
            $number++;

            if($till_date != null && Carbon::parse($start_date)->format('Y-m-d') > Carbon::parse($till_date)->format('Y-m-d')) {
                return $data;
            }

        }


        return $dasha_array;
    }

    public function calculateAntardasha($dob, $year)
    {
        // return $year;
        $month = (int)Carbon::parse($dob)->format('m');
        $date = (int)Carbon::parse($dob)->format('d');
        $year = (int)$year;


        $number = $this->sumOfDigit($date);
        $dasha_array = [];
        $end_date = $start_date = Carbon::parse($dob);

        //current year birth day
        $day =  Carbon::parse($year."-".$month."-".$date)->format('l');

        $sub_of_current_year_birth_date = $month+$date+$year + array_search($day, $this->days);
        // return $month."+".$date."+".$year ."+". array_search($day, $this->days);

        $sub_of_current_year_birth_date = $this->sumOfDigit($sub_of_current_year_birth_date);
        return $sub_of_current_year_birth_date;
    }




    public function checkDashaAntarDasha($dob, $till_date)
    {
        $month = (int)Carbon::parse($dob)->format('m');
        $date = (int)Carbon::parse($dob)->format('d');
        $year = (int)Carbon::parse($dob)->format('Y');

        $number = $this->sumOfDigit($date);

        $dasha_array = [];
        $end_date = $start_date = Carbon::parse($dob);

       while($end_date) {

            if($number > 9) {
                $number = 1;
            }

		$year = (int)Carbon::parse($start_date)->format('y');


            $end_date = Carbon::parse($start_date)->addYear();
            $data = [ 'start_date' => Carbon::parse($start_date)->format('d-m-Y'),
            'end_date' => Carbon::parse($end_date)->subDay()->format('d-m-Y'),

            'antartasha_number' => (string)$this->calculateAntardasha($dob, Carbon::parse($start_date)->format('y')),
           'dasha' => (string)$this->calculateMahadasha($dob, $start_date)['number'],

        ];

		   if(Carbon::parse($till_date)->format('Y-m-d') < Carbon::parse($end_date)->format('Y-m-d') ) {
			   return $data;
		   }
            array_push($dasha_array, $data);

            $start_date = $end_date ;
            $number++;


        }


        return response()->json(['status' => 200, 'till_date' => carbon::parse($till_date)->format('Y-m-d'), 'data' => $dasha_array]);
    }

    public function pratyantarDashaDays($year = null)
    {

		if($year != null && $this->leapYearOrNot($year) == true) {
				$pratyantar_dasha_days = [1 => 8,
                                        2 => 16,
                                        3 => 24,
                                        4 => 32,
                                        5 => 41,
                                        6 => 49,
                                        7 => 57,
                                        8 => 65,
                                        9 => 73];
		}
		else {

		$pratyantar_dasha_days = [
            1 => 8,
            2 => 16,
            3 => 24,
            4 => 32,
            5 => 41,
            6 => 49,
            7 => 57,
            8 => 65,
            9 => 73];

		}


        return $pratyantar_dasha_days;

    }

    private function leapYearOrNot($year) {
		if ($year % 400 == 0) {
			  return true;
		   }
		   else if ($year % 4 == 0) {
			    return true;
		   }
		return false;
	}


    private function getDobMatrixResult($dob, $placeholder) {
        // Step 1: Parse DOB
        $parts = explode('-', $dob);
        $day = $parts[0];
        $month = $parts[1];
        $year = $parts[2];

        // Step 2: Extract digits
        $yearLastTwo = substr($year, -2);
        $dobDigits = str_split($day . $month . $yearLastTwo); // base digits

        // Step 3: Add BN and DN (can repeat)
        $bn = $this->reduceToSingleDigitVC($day);
        $dn = $this->reduceToSingleDigitArray($day . $month . $year);

        $dobDigits = array_merge($dobDigits, [$bn, $dn]); // keep all, allow repetition

        // Step 4: Count frequency of each digit
        $digitCounts = array_count_values($dobDigits); // e.g., ['2' => 2, '5' => 1, ...]

        // Step 5: Build result matrix
        $result = [];

        foreach ($placeholder as $row) {
            $resRow = [];
            foreach ($row as $value) {
                $strVal = (string)$value;
                if (isset($digitCounts[$strVal])) {
                    // Repeat the digit as many times as it appears
                    $resRow[] = str_repeat($strVal, $digitCounts[$strVal]);
                } else {
                    $resRow[] = ''; // blank if no match
                }
            }
            $result[] = $resRow;
        }

        return $result;
    }


    private function getDashaRemedy($number){
        $dashaRemedies = [
            1 => [
                'planet' => 'Sun',
                'gemstone' => 'Ruby',
                'color' => 'Red / Orange',
                'day' => 'Sunday',
                'donation' => 'Wheat, copper, jaggery',
                'mantra' => 'Om Hreem Suryaya Namah',
                'remedy' => 'Offer water to the Sun at sunrise using a copper vessel'
            ],
            2 => [
                'planet' => 'Moon',
                'gemstone' => 'Pearl',
                'color' => 'White',
                'day' => 'Monday',
                'donation' => 'Rice, milk, white clothes',
                'mantra' => 'Om Som Somaya Namah',
                'remedy' => 'Drink water in a silver vessel and practice calmness'
            ],
            3 => [
                'planet' => 'Jupiter',
                'gemstone' => 'Yellow Sapphire',
                'color' => 'Yellow',
                'day' => 'Thursday',
                'donation' => 'Turmeric, bananas, yellow sweets',
                'mantra' => 'Om Brim Brihaspataye Namah',
                'remedy' => 'Wear yellow on Thursdays and donate yellow food items'
            ],
            4 => [
                'planet' => 'Rahu',
                'gemstone' => 'Gomed (Hessonite)',
                'color' => 'Dark Blue / Black',
                'day' => 'Saturday',
                'donation' => 'Black sesame, blankets, radish',
                'mantra' => 'Om Rahave Namah',
                'remedy' => 'Maintain discipline, avoid shortcuts, donate black items'
            ],
            5 => [
                'planet' => 'Mercury',
                'gemstone' => 'Emerald',
                'color' => 'Green',
                'day' => 'Wednesday',
                'donation' => 'Green vegetables, moong dal',
                'mantra' => 'Om Bum Budhaya Namah',
                'remedy' => 'Wear green, feed parrots, focus on clear communication'
            ],
            6 => [
                'planet' => 'Venus',
                'gemstone' => 'Diamond',
                'color' => 'White',
                'day' => 'Friday',
                'donation' => 'Rice, curd, white sweets',
                'mantra' => 'Om Shum Shukraya Namah',
                'remedy' => 'Practice self-control, wear white, offer sweets on Fridays'
            ],
            7 => [
                'planet' => 'Ketu',
                'gemstone' => 'Cat’s Eye',
                'color' => 'Brown / Grey',
                'day' => 'Tuesday / Thursday',
                'donation' => 'Blankets, feed stray dogs',
                'mantra' => 'Om Ketave Namah',
                'remedy' => 'Meditate daily, help stray dogs, adopt spirituality'
            ],
            8 => [
                'planet' => 'Saturn',
                'gemstone' => 'Blue Sapphire',
                'color' => 'Navy Blue / Black',
                'day' => 'Saturday',
                'donation' => 'Mustard oil, black urad dal, shoes',
                'mantra' => 'Om Sham Shanicharaya Namah',
                'remedy' => 'Serve poor and old people, donate on Saturdays'
            ],
            9 => [
                'planet' => 'Mars',
                'gemstone' => 'Red Coral',
                'color' => 'Red',
                'day' => 'Tuesday',
                'donation' => 'Jaggery, red lentils, copper',
                'mantra' => 'Om Angarakaya Namah',
                'remedy' => 'Avoid anger, wear red, donate red items on Tuesdays'
            ]
        ];

        return $dashaRemedies[$number];

    }

    private function getDobYogasPrediction($number){
        $dob_yogas = [
            1 => [
                'yoga' => 'Leadership Yoga',
                'prediction' => 'You are born to lead, with strong willpower and individuality. Success comes through confidence and determination.',
                'remedy' => 'Respect your father and elders, offer water to the Sun daily.',
            ],
            2 => [
                'yoga' => 'Chandra Yoga',
                'prediction' => 'You are emotional, intuitive, and creative. Life success comes from partnerships and balance.',
                'remedy' => 'Respect mother, drink water in a silver vessel, practice meditation.',
            ],
            3 => [
                'yoga' => 'Guru Kripa Yoga',
                'prediction' => 'You are wise, optimistic, and spiritual. Teaching, guidance, and growth opportunities follow you.',
                'remedy' => 'Respect teachers, donate yellow items on Thursdays, chant Guru mantra.',
            ],
            4 => [
                'yoga' => 'Rahu Yoga',
                'prediction' => 'You are unconventional, hard-working, and face sudden ups & downs. You create your own path.',
                'remedy' => 'Avoid shortcuts, stay disciplined, help the poor and needy.',
            ],
            5 => [
                'yoga' => 'Budh Yoga',
                'prediction' => 'You are intelligent, communicative, and adaptable. Success comes through writing, business, and travel.',
                'remedy' => 'Worship Lord Ganesha, donate green vegetables, wear green clothes on Wednesday.',
            ],
            6 => [
                'yoga' => 'Shukra Yoga',
                'prediction' => 'You are charming, artistic, and attract luxury. Success comes in arts, beauty, and social life.',
                'remedy' => 'Respect women, donate white sweets on Fridays, wear clean white clothes.',
            ],
            7 => [
                'yoga' => 'Ketu Yoga',
                'prediction' => 'You are spiritual, mysterious, and intuitive. You excel in research, philosophy, and hidden knowledge.',
                'remedy' => 'Meditate daily, avoid addictions, donate blankets to the poor.',
            ],
            8 => [
                'yoga' => 'Shani Yoga',
                'prediction' => 'You are disciplined, hardworking, and justice-seeking. Life gives struggles but later brings stability.',
                'remedy' => 'Serve the poor, respect old people, donate black items on Saturday.',
            ],
            9 => [
                'yoga' => 'Mangal Yoga',
                'prediction' => 'You are energetic, courageous, and a fighter. Success comes through action and determination.',
                'remedy' => 'Offer red flowers to Hanuman, donate jaggery, practice patience.',
            ],
        ];

        return $dob_yogas[$number];
    }

    private function getYantras($number, $render = true)
    {
        $yantras = [
            1 => [
                [4, 9, 2],
                [3, 5, 7],
                [8, 1, 6],
            ],
            2 => [
                [8, 1, 6],
                [3, 5, 7],
                [4, 9, 2],
            ],
            3 => [
                [2, 7, 6],
                [9, 5, 1],
                [4, 3, 8],
            ],
            4 => [
                [4, 14, 15],
                [9, 7, 13],
                [10, 11, 5],
            ],
            5 => [
                [11, 24, 7],
                [20, 15, 7],
                [9, 13, 21],
            ],
            6 => [
                [6, 32, 7],
                [21, 14, 10],
                [19, 11, 18],
            ],
            7 => [
                [30, 39, 48],
                [38, 36, 43],
                [37, 42, 35],
            ],
            8 => [
                [64, 2, 3],
                [7, 33, 24],
                [23, 15, 29],
            ],
            9 => [
                [47, 58, 69],
                [57, 59, 48],
                [49, 52, 53],
            ],
        ];

        $yantra = $yantras[$number] ?? null;

        if ($render && $yantra) {
            $html = "<h6>Yantra for Number {$number}</h6>";
            $html .= "<table class='table table-bordered'>";
            foreach ($yantra as $row) {
                $html .= "<tr>";
                foreach ($row as $cell) {
                    $html .= "<td>{$cell}</td>";
                }
                $html .= "</tr>";
            }
            $html .= "</table>";
            return $html;
        }

        return $yantra;
    }

    function normalizeValue($value)
{
    if (empty($value) || $value == 0 || $value == '0') {
        return [];
    }

    // Split digits and remove duplicates
    $digits = str_split($value);
    return array_unique(array_filter($digits, function ($d) {
        return $d != '0';
    }));
}

function getPredictions($matrix)
{
    $results = [];

    // helper to process line (row/col/diag)
    $processLine = function ($values) use (&$results) {
        $digits = [];

        foreach ($values as $val) {
            $digits = array_merge($digits, $this->normalizeValue($val));
        }

        $digits = array_unique($digits);

        if (count($digits) >= 2) {
            sort($digits);
            $key = implode('-', $digits);

            // 🔥 Prediction logic (dynamic)
            $results[$key] = $this->getYogaPrediction($key);
        }
    };

    // ROWS
    for ($i = 0; $i < 3; $i++) {
        $processLine($matrix[$i]);
    }

    // COLUMNS
    for ($col = 0; $col < 3; $col++) {
        $column = [];
        for ($row = 0; $row < 3; $row++) {
            $column[] = $matrix[$row][$col];
        }
        $processLine($column);
    }

    // DIAGONAL 1
    $processLine([
        $matrix[0][0],
        $matrix[1][1],
        $matrix[2][2]
    ]);

    // DIAGONAL 2
    $processLine([
        $matrix[0][2],
        $matrix[1][1],
        $matrix[2][0]
    ]);

    return $results;
}

function mdGetPredictions($matrix,$number)
{
    $results = [];

    // normalize number also (important)
    $targetNumbers = $this->normalizeValue($number);

    $processLine = function ($values) use (&$results, $targetNumbers) {
        $digits = [];

        foreach ($values as $val) {
            $digits = array_merge($digits, $this->normalizeValue($val));
        }

        $digits = array_unique($digits);

        // ✅ Check if line contains the target number
        if (count(array_intersect($digits, $targetNumbers)) === 0) {
            return; // skip this line
        }

        // Only valid combinations
        if (count($digits) >= 2) {
            sort($digits);
            $key = implode('-', $digits);

            $results[$key] = $this->getYogaPredictionRamidy($key);
        }
    };

    // ROWS
    for ($i = 0; $i < 3; $i++) {
        $processLine($matrix[$i]);
    }

    // COLUMNS
    for ($col = 0; $col < 3; $col++) {
        $column = [];
        for ($row = 0; $row < 3; $row++) {
            $column[] = $matrix[$row][$col];
        }
        $processLine($column);
    }

    // DIAGONAL 1
    $processLine([
        $matrix[0][0],
        $matrix[1][1],
        $matrix[2][2]
    ]);

    // DIAGONAL 2
    $processLine([
        $matrix[0][2],
        $matrix[1][1],
        $matrix[2][0]
    ]);

    return $results;
}
// function adGetPredictions($matrix,$type)
// {
//     $results = [];
//     if($type=='ad'){
//      $results[$matrix] =  $this->getYogaPredictionRamidyAd($matrix,$type);
//        return $results;
//     }
//     // helper to process line (row/col/diag)
//     $processLine = function ($values) use (&$results,$type) {
//         $digits = [];

//         foreach ($values as $val) {
//             $digits = array_merge($digits, $this->normalizeValue($val));
//         }

//         $digits = array_unique($digits);

//         if (count($digits) >= 2) {
//             sort($digits);
//             $key = implode('-', $digits);

//             // 🔥 Prediction logic (dynamic)
//             $results[$key] = $this->getYogaPredictionRamidyAd($key,$type);
//         }

//     };

//     // ROWS
//     for ($i = 0; $i < 3; $i++) {
//         $processLine($matrix[$i]);
//     }

//     // COLUMNS
//     for ($col = 0; $col < 3; $col++) {
//         $column = [];
//         for ($row = 0; $row < 3; $row++) {
//             $column[] = $matrix[$row][$col];
//         }
//         $processLine($column);
//     }

//     // DIAGONAL 1
//     $processLine([
//         $matrix[0][0],
//         $matrix[1][1],
//         $matrix[2][2]
//     ]);

//     // DIAGONAL 2
//     $processLine([
//         $matrix[0][2],
//         $matrix[1][1],
//         $matrix[2][0]
//     ]);

//     return $results;
// }
function adGetPredictions($matrix,$type,$number)
{
    $results = [];
    if($type=='ad'){
     $results[$matrix] =  $this->getYogaPredictionRamidyAd($matrix,$type);
       return $results;
    }

    $results = [];

    // normalize number also (important)
    $targetNumbers = $this->normalizeValue($number);

    $processLine = function ($values) use (&$results, $targetNumbers,$type) {
        $digits = [];

        foreach ($values as $val) {
            $digits = array_merge($digits, $this->normalizeValue($val));
        }

        $digits = array_unique($digits);

        // ✅ Check if line contains the target number
        if (count(array_intersect($digits, $targetNumbers)) === 0) {
            return; // skip this line
        }

        // Only valid combinations
        if (count($digits) >= 2) {
            sort($digits);
            $key = implode('-', $digits);

            $results[$key] =  $this->getYogaPredictionRamidyAd($key,$type);
        }
    };

    // ROWS
    for ($i = 0; $i < 3; $i++) {
        $processLine($matrix[$i]);
    }

    // COLUMNS
    for ($col = 0; $col < 3; $col++) {
        $column = [];
        for ($row = 0; $row < 3; $row++) {
            $column[] = $matrix[$row][$col];
        }
        $processLine($column);
    }

    // DIAGONAL 1
    $processLine([
        $matrix[0][0],
        $matrix[1][1],
        $matrix[2][2]
    ]);

    // DIAGONAL 2
    $processLine([
        $matrix[0][2],
        $matrix[1][1],
        $matrix[2][0]
    ]);

    return $results;
}

function getYogaPrediction($key)
{
    $data = yogaPredictiona::select('combination','description')->get()->toArray();
    // dd($data);
    // $predictions = [
    //     '1-3-9' => 'Leadership Yoga',
    //     '3-6'   => 'Creative Growth',
    //     '1-4-7' => 'Strong Mind Power',
    //     '2-5-8' => 'Balance & Stability',
    // ];
    $formatted = collect($data)->pluck('description', 'combination')->toArray();

    return $formatted[$key] ?? 'not Yet';
    // return $predictions[$key] ?? 'Normal Combination';
}
function getYogaPredictionRamidy($key)
{
    $data = MdYogaPrediction::select('combination','description')->get()->toArray();
    $formatted = collect($data)->pluck('description', 'combination')->toArray();

    return $formatted[$key] ?? 'not Yet';
    // return $predictions[$key] ?? 'Normal Combination';
}
function getYogaPredictionRamidyAd($key,$type)
{
    $data = AdYogaPrediction::select('combination','type','description')->where('type',$type)->get()->toArray();

    $formatted = collect($data)->pluck('description', 'combination')->toArray();

    return $formatted[$key] ?? 'not Yet';
    // return $predictions[$key] ?? 'Normal Combination';
}

function getPdPredictionRamidy($key,$type)
{
    $data = PdYogaPrediction::select('combination','type','description')->where('type',$type)->get()->toArray();

    $formatted = collect($data)->pluck('description', 'combination')->toArray();

    return $formatted[$key] ?? 'not Yet';
    // return $predictions[$key] ?? 'Normal Combination';
}

function updateChartValue($string, $pd_chart)
{
    $array = explode(',', $string);

    foreach ($array as &$value) {
        if ((int)$value === (int)$pd_chart) {
            $value .= $pd_chart; // append number
        }
    }

    return implode(',', $array);
}

public function convertToChunkArray($string)
{
    $arr = explode(',', $string);
    return array_chunk($arr, 3);
}

}

//
