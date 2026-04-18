<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Order;
use App\Models\Remedy;
use App\Models\FirstLetterAttribute;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class NumerologyController extends Controller
{
    /**
     * Show the name numerology form.
     *
     * @return \Illuminate\View\View
     */
    public function nameNumerology()
    {

        $user = Auth::user();
        // Check if user has purchased the name numerology package
        $hasPurchased = Order::where('user_id', $user->id)
            ->whereHas('package', function ($query) {
                $query->where('type', 'name')->where('active', true);
            })
            ->where('status', 'completed')
            ->exists();

        if (!$hasPurchased) {
            return redirect()->route('home')
                ->with('error', 'You need to purchase the Name Numerology package to access this feature.');
        }

        return view('user.numerology.name');
    }

    /**
     * Process the name numerology calculation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function calculateNameNumerology(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:100',
        ]);

        $firstName = $validated['first_name'];
        $middleName = $validated['middle_name'] ?? '';
        $lastName = $validated['last_name'] ?? '';
        $birthDate = $validated['birth_date'];
        $gender = $validated['gender'];

        $birdDate = date_create($birthDate);
        $birthDay = intval(date_format($birdDate, 'd'));
        $birthMonth = intval(date_format($birdDate, 'm'));

        // Create full name
        $fullName = trim($firstName . ' ' . $middleName . ' ' . $lastName);

        // Calculate Chaldean numerology values
        $fn = $this->calculateChaldeanValue($firstName); // First Name value
        $nn = $this->calculateChaldeanValue($fullName); // Full Name value
        $in = $this->calculateChaldeanVowelValue($fullName); // Vowel value
        $en = $this->calculateChaldeanConsonantValue($fullName); // Consonant value
        $pn = $this->chaldeanPyramidNumber($fullName);
        $hn = $this->reduceToSingleDigitVC(strlen(str_replace(' ', '', $fullName))); // Total letters in name

        // Calculate birth date values
        $birthDateObj = date_create($birthDate);
        $birthDay = intval(date_format($birthDateObj, 'd')); // Birth day (DOB-BN)

        // Calculate sum of all digits in birth date (DOB-DN)
        $birthDateDigits = str_replace(['-', '/'], '', date_format($birthDateObj, 'd-m-Y'));
        $birthDateSum = 0;
        for ($i = 0; $i < strlen($birthDateDigits); $i++) {
            $birthDateSum += intval($birthDateDigits[$i]);
        }

        $placeholder = [
            [3, 1, 9],
            [6, 7, 5],
            [2, 8, 4]
        ];
        $vedic_chart_array = $this->getDobMatrixResult(date('d-m-Y', strtotime($birthDate)), $placeholder);



        $birthdate_energiser = $this->birthdateEnergiser($birthDay, $birthMonth, intval(date_format($birdDate, 'Y')));
        $name_energiser = $this->nameEnergiser($nn);

        $pyramid_numbers = $this->getPyramidNumbers($fullName);

        $pronology_sounds = $this->checkPronologySounds($fullName);

        $attrs = Attribute::select('compound_number', 'description')->get();
        $attr_array = array_column($attrs->toArray(), 'description', 'compound_number');

        // Get remedies for the calculated numbers
        $remedies = Remedy::where('status', true)->get()->keyBy('number');

        // Get specific remedies based on calculated numbers
        $bn_remedy = $remedies->get($this->reduceToSingleDigitVC($birthDay));
        $dn_remedy = $remedies->get($this->reduceToSingleDigitVC($birthDateSum));
        $nn_remedy = $remedies->get($this->reduceToSingleDigit($nn));

        // Get first letter attribute
        $firstLetter = strtoupper(substr($firstName, 0, 1));
        $firstLetterAttribute = FirstLetterAttribute::where('letter', $firstLetter)->first();
        // echo "<pre>";
        // print_r(array_column($attrs->toArray(), 'description', 'compound_number'));
        // die();
        $bs = $this->getBS($birthDate);
             $runningAge = $this->getRunningAge($birthDate);

        $rashi = [
            "Aries" => 9,
            "Taurus" => 6,
            "Gemini" => 5,
            "Cancer" => 2,
            "Leo" => 1,
            "Virgo" => 5,
            "Libra" => 6,
            "Scorpio" => 9,
            "Sagittarius" => 3,
            "Capricorn" => 8,
            "Aquarius" => 4,
            "Pisces" => 7
        ];
        $ZodiacSign = $this->getZodiacSign($birthDay, $birthMonth);
        $zedioacnum = $rashi[$ZodiacSign] ?? null;


        $vedic_chart_array = $this->appendNumbersInMatrix($vedic_chart_array, [$bs, $zedioacnum]);

        $bn = $this->reduceToSingleDigitVC($birthDay);
        $dn = $this->reduceToSingleDigitVC($birthDateSum);
        if($bs==6){
        $vedic_chart_array = $this->removeNumberFromChart($vedic_chart_array, $bs);
        }
        $wn = $this->weekNumbers($vedic_chart_array, $bn, $dn);
        $op = $this->overpowerfullNumber($vedic_chart_array, $bn, $dn);
        $fyNumber = $this->calculateFyNumber($birthDate);
        $fyPreduction = $this->getFyPrediction($fyNumber);

        $result = [
            'running_age'=>$runningAge,
            'fynum' =>$fyNumber,
            'fyPre' => $fyPreduction,
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
            'full_name' => $fullName,
            'gender' => $gender,
            'birth_date' => $birthDate,
            'fn' => $fn,
            'nn' => $nn,
            'in' => $in,
            'en' => $en,
            'pn' => $pn,
            'hn' => $hn,
            'bs' => $bs,
            'wn' => $wn,
            'op' => $op,
            'bn' => $birthDay, // Birth day (DOB-BN)
            'dn' => $birthDateSum, // Sum of all digits in birth date (DOB-DN)
            'bn_single' => $this->reduceToSingleDigitVC($birthDay),
            'dn_single' => $this->reduceToSingleDigitVC($birthDateSum),
            'nn_single' => $this->reduceToSingleDigit($nn),
            'fn_meaning' => $this->getNumerologyMeaning($this->reduceToSingleDigit($fn)),
            'nn_meaning' => $this->getNumerologyMeaning($this->reduceToSingleDigit($nn)),
            'in_meaning' => $this->getNumerologyMeaning($this->reduceToSingleDigit($in)),
            'en_meaning' => $this->getNumerologyMeaning($this->reduceToSingleDigit($en)),
            'pn_meaning' => $this->getNumerologyMeaning($this->reduceToSingleDigit($pn)),
            'vedic_chart_array' => $vedic_chart_array,
            'zodiac_sign' => $this->getZodiacSign($birthDay, $birthMonth),
            'zodiac_letters' => $this->getZodiacLetters($this->getZodiacSign($birthDay, $birthMonth)),
            'birthdate_energiser' => $birthdate_energiser,
            'name_energiser' => $name_energiser,
            'pyramid_numbers' => $pyramid_numbers,
            'good_sounds' => $pronology_sounds['good_sounds'],
            'bad_sounds' => $pronology_sounds['bad_sounds'],
            'attrs' => $attr_array,
            'bn_remedy' => $bn_remedy,
            'dn_remedy' => $dn_remedy,
            'nn_remedy' => $nn_remedy,
            'first_letter' => $firstLetter,
            'first_letter_attribute' => $firstLetterAttribute,
            'profession' => $this->getProfession($this->reduceToSingleDigitVC($birthDateSum)),
            'enemy_number_first_name' => $this->getEnemy_number($firstName),
            'enemy_number_last_name' => $this->getEnemy_number($lastName),
            'zodiacNum' => $zedioacnum
        ];
        // dd($result);
        // Row-level yog info
        $yog_labels = [
            'fn' => [],
            'nn' => [],
            'in' => [],
            'en' => [],
            'pn' => [],
        ];

        // Golden Raj Yog: Show in rows where the value matches BN or DN
        foreach (['fn', 'nn', 'in', 'en', 'pn'] as $key) {
            if ($result[$key] == $birthDay || $result[$key] == $birthDateSum) {
                $yog_labels[$key][] = 'Golden Raj Yog';
            }
        }

        // Silver Raj Yog: Show in rows where the value appears at least twice in (FN, NN, IN, EN, PN)
        $values = [$fn, $nn, $in, $en, $pn];
        $value_counts = array_count_values($values);

        foreach (['fn', 'nn', 'in', 'en', 'pn'] as $key) {
            $currentValue = $result[$key];
            if (isset($value_counts[$currentValue]) && $value_counts[$currentValue] >= 2) {
                $yog_labels[$key][] = 'Silver Raj Yog';
            }
        }

        // Additional info logic
        $mainVals = array_filter([$fn, $nn, $in, $en, $pn]);
        $golden = false;
        $silver = false;
        // Golden Raj Yog: if BN or DN value is equal to any of FN, NN, IN, EN, PN
        if ((in_array($birthDay, $mainVals)) || (in_array($birthDateSum, $mainVals))) {
            $golden = true;
        }
        // Silver Raj Yog: if at least 2 values in (FN, NN, IN, EN, PN) are the same
        $counts = array_count_values($mainVals);
        foreach ($counts as $v) {
            if ($v >= 2) {
                $silver = true;
                break;
            }
        }
        $additional_info = '';
        if ($golden && $silver) {
            $additional_info = 'Golden Raj Yog, Silver Raj Yog';
        } elseif ($golden) {
            $additional_info = 'Golden Raj Yog';
        } elseif ($silver) {
            $additional_info = 'Silver Raj Yog';
        }

        // Store results in session for PDF generation
        $resultData = [
            'result' => $result,
            'additional_info' => $additional_info,
            'yog_labels' => $yog_labels
        ];

        // Get existing results or initialize new array
        $nameResults = Session::get('name_numerology_results', []);

        // Add new result to the array
        $nameResults[] = $resultData;

        // Store in session
        Session::put('name_numerology_results', $nameResults);

        return view('user.numerology.name', compact('result', 'additional_info', 'yog_labels'));
    }

        public function calculateFyNumber($dob)
        {
            $day   = date('d', strtotime($dob));
            $month = date('m', strtotime($dob));
            $year  = date('Y'); // current year

            // Add all digits
            $sum = array_sum(str_split($day))
                + array_sum(str_split($month))
                + array_sum(str_split($year));

            // Convert to single digit
            while ($sum > 9) {
                $sum = array_sum(str_split($sum));
            }

            return $sum;
        }

        public function getFyPrediction($number = null)
{
    $predictions = [

        1 => [
            'name'=>'Sun',
            'title' => 'NEW BEGINNING',
            'description' => 'Focuses on career, reputation, father, authority, and health. Favorable results occur when strong, leading to promotions or recognition, while weak positions bring ego issues or heart health problems or defame in reputation.'
        ],

        2 => [
            'name'=>'Moon',
            'title' => 'TIME FOR PARTNERSHIP / NEW RELATIONSHIP',
            'description' => 'Impacts emotions, mental peace, mother, and domestic life. High mental clarity and prosperity occur if auspiciously placed; otherwise, it brings anxiety, indecisiveness and fluctuations.'
        ],

        3 => [
            'name'=>'Jupiter',
            'title' => 'TIME FOR GROWTH & EXPANSION',
            'description' => 'Relates to wisdom, children, wealth, and spirituality. A highly auspicious period, providing knowledge, growth, and optimism.'
        ],

        4 => [
            'name'=>'Rahu',
            'title' => 'TIME TO LEARN NEW SKILLS BUT TAKE CARE OF HEALTH',
            'description' => 'Governs ambition, foreign travels, illusions, and sudden changes. Often causes intense worldly desire or unexpected life shifts.'
        ],

        5 => [
            'name'=>'Mercury',
            'title' => 'TIME FOR FINANCIAL GAIN & INVESTMENT',
            'description' => 'Governs communication, intellect, commerce, and education. Favorable for education and career growth.'
        ],

        6 => [
            'name'=> 'Venus',
            'title' => 'TIME FOR RENOVATION & ASSET PURCHASE',
            'description' => 'Governs luxury, relationships, marriage, and arts. Typically brings happiness and financial gain.'
        ],

        7 => [
            'name'=> 'Ketu',
            'title' => 'TIME FOR FOREIGN TRAVEL & LUCK ENHANCEMENT',
            'description' => 'Relates to detachment, spirituality, and inner transformation.'
        ],

        8 => [
            'name'=>'Saturn',
            'title' => 'TIME FOR ACTION & DELAYS',
            'description' => 'Governs discipline, hard work, delay, and justice. Known for forcing lessons through struggle and eventual long-lasting success.'
        ],

        9 => [
            'name'=>'Mars',
            'title' => 'TIME FOR NEW OPPORTUNITY & ACTIVITY',
            'description' => 'Rules energy, courage, siblings, and properties. Strong placement brings victory, property acquisition, and courage; weak placement brings accidents, conflicts, or surgical issues.'
        ],

    ];

    if ($number) {
        return $predictions[$number] ?? null;
    }

    return $predictions;
}

    function removeNumberFromChart($chart, $bs)
{
    foreach ($chart as $rowKey => $row) {
        foreach ($row as $colKey => $value) {

            if (!empty($value)) {
                // Remove digit from string
                $chart[$rowKey][$colKey] = str_replace($bs, '', $value);
            }

        }
    }

    return $chart;
}


    function weekNumbers($matrix, $bn, $dn)
{
    foreach ($matrix as $row) {
        foreach ($row as $value) {

            if (!empty($value) && strlen($value) > 1) {

                // check if all digits are same (33, 11, 22)
                if (count(array_unique(str_split($value))) === 1) {

                    $digit = (int)$value[0];

                    if ($digit == $bn || $digit == $dn) {
                        return $digit;
                    }
                }
            }
        }
    }

    return null;
}

function overpowerfullNumber($matrix, $bn, $dn)
{
    foreach ($matrix as $row) {
        foreach ($row as $value) {

            if (!empty($value) && strlen($value) > 1) {

                $digits = str_split($value);

                // Check if all digits are same (22, 333, 4444)
                if (count(array_unique($digits)) === 1) {

                    $digit = (int)$digits[0];

                    // Return only if NOT matching bn or dn
                    if ($digit != $bn && $digit != $dn) {
                        return $digit;
                    }
                }
            }
        }
    }

    return null;
}




    /**
     * Show the mobile numerology form.
     *
     * @return \Illuminate\View\View
     */

    function appendNumbersInMatrix(array $matrix, array $numbers)
    {
        foreach ($matrix as $i => $row) {
            foreach ($row as $j => $value) {

                if ($value !== "") {
                    foreach ($numbers as $num) {
                        if (strpos($value, (string)$num) !== false) {
                            $matrix[$i][$j] .= $num;
                        }
                    }
                }
            }
        }

        return $matrix;
    }

    public function mobileNumerology()
    {
        $user = Auth::user();

        // Check if user has purchased the name numerology package
        $hasPurchased = Order::with('package')->where('user_id', $user->id)
            ->whereHas('package', function ($query) {
                $query->where('type', 'mobileApp')->where('active', true);
            })
            ->where('status', 'completed')
            ->exists();
        if (!$hasPurchased) {

            return redirect()->route('home')
                ->with('error', 'You need to purchase the Name Numerology package to access this feature.');
        }

        return view('user.numerology.mobile');
    }

    /**
     * Generate PDF for name numerology results.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */



    public function generateNamePdf($id)
    {
        // Check if user is authenticated
        $user = Auth::user();

        // Get result from session
        if (!Session::has('name_numerology_results')) {
            return redirect()->route('user.numerology.name')
                ->with('error', 'No numerology results found. Please calculate your name numerology first.');
        }

        $results = Session::get('name_numerology_results');

        // Find the result with matching ID
        $result = null;
        $additional_info = '';
        $yog_labels = [];

        foreach ($results as $item) {
            if (isset($item['result']) && md5($item['result']['full_name'] . $item['result']['birth_date']) === $id) {
                $result = $item['result'];
                $additional_info = $item['additional_info'] ?? '';
                $yog_labels = $item['yog_labels'] ?? [];
                break;
            }
        }

        if (!$result) {
            return redirect()->route('user.numerology.name')
                ->with('error', 'Requested numerology report not found.');
        }

        // Generate PDF
        $pdf = PDF::loadView('user.numerology.name_pdf', [
            'result' => $result,
            'additional_info' => $additional_info,
            'yog_labels' => $yog_labels
        ]);

        // Set PDF options
        $pdf->setPaper('a4');
        $pdf->setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        // Return PDF for download
        return $pdf->download('name_numerology_' . str_replace(' ', '_', strtolower($result['full_name'])) . '.pdf');
    }

public function calculateMobileNumerology(Request $request)
{
    $validated = $request->validate([
        'mobile_number' => 'required|string|max:15',
        'birth_date'    => 'required|date',
    ]);

    $mobileNumber = preg_replace('/\D/', '', $validated['mobile_number']); // digits only
    $birthDate    = $validated['birth_date'];

    $birthDateObj = date_create($birthDate);
    $birthDay     = intval(date_format($birthDateObj, 'd'));
    $birthMonth   = intval(date_format($birthDateObj, 'm'));

    // ── BN / DN from birth date ──────────────────────────────────────────────
    $bn_raw = $birthDay;
    $bn     = $this->reduceToSingleDigitVC($birthDay);

    $birthDateDigits = str_replace(['-', '/'], '', date_format($birthDateObj, 'd-m-Y'));
    $birthDateSum    = 0;
    for ($i = 0; $i < strlen($birthDateDigits); $i++) {
        $birthDateSum += intval($birthDateDigits[$i]);
    }
    $dn_raw = $birthDateSum;
    $dn     = $this->reduceToSingleDigitVC($birthDateSum);

    // ── Mobile number single digit (MN) ─────────────────────────────────────
    $mobileSum = 0;
    for ($i = 0; $i < strlen($mobileNumber); $i++) {
        $mobileSum += intval($mobileNumber[$i]);
    }
    $mn = $this->reduceToSingleDigitVC($mobileSum); // final single digit of mobile

    // ── Natal Grid 1 : Birth Date (BN + DN) ─────────────────────────────────
    $placeholder = [
        [3, 1, 9],
        [6, 7, 5],
        [2, 8, 4]
    ];
    $dob_vedic_chart = $this->getDobMatrixResult(
        date('d-m-Y', strtotime($birthDate)),
        $placeholder
    );

    $bs          = $this->getBS($birthDate);
    $rashi       = [
        "Aries" => 9, "Taurus" => 6, "Gemini" => 5, "Cancer" => 2,
        "Leo"   => 1, "Virgo"  => 5, "Libra"  => 6, "Scorpio" => 9,
        "Sagittarius" => 3, "Capricorn" => 8, "Aquarius" => 4, "Pisces" => 7
    ];
    $zodiacSign  = $this->getZodiacSign($birthDay, $birthMonth);
    $zodiacNum   = $rashi[$zodiacSign] ?? null;

    $dob_vedic_chart = $this->appendNumbersInMatrix($dob_vedic_chart, [$bs, $zodiacNum]);
    if ($bs == 6) {
        $dob_vedic_chart = $this->removeNumberFromChart($dob_vedic_chart, $bs);
    }

    // ── Natal Grid 2 : Mobile Number ─────────────────────────────────────────
    // Build a matrix using the individual digits of the mobile number
    $mobile_vedic_chart = $this->getMobileMatrixResult($mobileNumber, $placeholder);

    // ── Number Pairing (BN-DN vs MN) ────────────────────────────────────────
    // Friendly / Neutral / Enemy relationship between birth numbers and mobile number
    $numberRelations = [
        1 => ['friendly' => [1, 2, 3, 9], 'neutral' => [5, 6], 'enemy' => [4, 7, 8]],
        2 => ['friendly' => [1, 2, 3, 6], 'neutral' => [4, 5], 'enemy' => [7, 8, 9]],
        3 => ['friendly' => [1, 2, 3, 6, 9], 'neutral' => [5], 'enemy' => [4, 7, 8]],
        4 => ['friendly' => [4, 5, 6, 8], 'neutral' => [2, 3], 'enemy' => [1, 7, 9]],
        5 => ['friendly' => [1, 4, 5, 6], 'neutral' => [2, 3, 7], 'enemy' => [8, 9]],
        6 => ['friendly' => [2, 3, 4, 5, 6, 9], 'neutral' => [1, 7], 'enemy' => [8]],
        7 => ['friendly' => [1, 2, 7], 'neutral' => [3, 6], 'enemy' => [4, 5, 8, 9]],
        8 => ['friendly' => [4, 5, 6, 8], 'neutral' => [3], 'enemy' => [1, 2, 7, 9]],
        9 => ['friendly' => [1, 3, 6, 9], 'neutral' => [5], 'enemy' => [2, 4, 7, 8]],
    ];

    $bn_mn_relation = $this->getNumberRelation($bn, $mn, $numberRelations);
    $dn_mn_relation = $this->getNumberRelation($dn, $mn, $numberRelations);

    // ── Mobile digit-level pairing ───────────────────────────────────────────
    $mobileDigits        = str_split($mobileNumber);
    $mobileDigitPairings = [];
    foreach ($mobileDigits as $digit) {
        $d = intval($digit);
        $mobileDigitPairings[] = [
            'digit'      => $d,
            'bn_relation' => $this->getNumberRelation($bn, $d, $numberRelations),
            'dn_relation' => $this->getNumberRelation($dn, $d, $numberRelations),
        ];
    }

    $result = [
        'mobile_number'          => $validated['mobile_number'],
        'mobile_digits_only'     => $mobileNumber,
        'birth_date'             => $birthDate,
        'bn_raw'                 => $bn_raw,
        'dn_raw'                 => $dn_raw,
        'bn'                     => $bn,
        'dn'                     => $dn,
        'mn_raw'                 => $mobileSum,
        'mn'                     => $mn,
        'bs'                     => $bs,
        'zodiac_sign'            => $zodiacSign,
        'zodiac_num'             => $zodiacNum,
        'dob_vedic_chart'        => $dob_vedic_chart,
        'mobile_vedic_chart'     => $mobile_vedic_chart,
        'bn_mn_relation'         => $bn_mn_relation,
        'dn_mn_relation'         => $dn_mn_relation,
        'mobile_digit_pairings'  => $mobileDigitPairings,
    ];

    return view('user.numerology.mobileresult', compact('result'));
}

/**
 * Build a 3x3 Vedic-style matrix from mobile number digits.
 * Digits present in the number are placed in the grid; absent ones are blank.
 */
private function getMobileMatrixResult(string $mobileDigits, array $placeholder): array
{
    $digitCounts = array_fill(1, 9, 0);
    for ($i = 0; $i < strlen($mobileDigits); $i++) {
        $d = intval($mobileDigits[$i]);
        if ($d >= 1 && $d <= 9) {
            $digitCounts[$d]++;
        }
    }

    $result = [];
    foreach ($placeholder as $row) {
        $newRow = [];
        foreach ($row as $num) {
            if ($digitCounts[$num] > 0) {
                $newRow[] = str_repeat((string)$num, $digitCounts[$num]);
            } else {
                $newRow[] = '';
            }
        }
        $result[] = $newRow;
    }
    return $result;
}

/**
 * Return 'friendly', 'neutral', or 'enemy' for two numbers.
 */
private function getNumberRelation(int $base, int $target, array $relations): string
{
    if ($base < 1 || $base > 9 || $target < 1 || $target > 9) {
        return 'neutral';
    }
    if (in_array($target, $relations[$base]['friendly'])) return 'friendly';
    if (in_array($target, $relations[$base]['enemy']))    return 'enemy';
    return 'neutral';
}

    /**
     * Show the birth numerology form.
     *
     * @return \Illuminate\View\View
     */
    public function birthNumerology()
    {
        $user = Auth::user();
        // Check if user has purchased the birth numerology package
        $hasPurchased = Order::where('user_id', $user->id)
            ->whereHas('package', function ($query) {
                $query->where('type', 'birth')->where('active', true);
            })
            ->where('status', 'completed')
            ->exists();

        if (!$hasPurchased) {
            return redirect()->route('home')
                ->with('error', 'You need to purchase the Birth Numerology package to access this feature.');
        }

        return view('user.numerology.birth');
    }

    /**
     * Process the birth numerology calculation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function calculateBirthNumerology(Request $request)
    {
        $validated = $request->validate([
            'birth_date' => 'required|date',
        ]);

        $birthDate = $validated['birth_date'];
        $result = $this->calculateBirthNumber($birthDate);

        return view('user.numerology.birth-result', compact('birthDate', 'result'));
    }


    function getBS($dob)
    {
        // Expected format: YYYY-MM-DD
        if (empty($dob)) return null;

        // Extract year safely
        $year = date('Y', strtotime($dob));

        // Get last 2 digits
        $lastTwoDigits = substr($year, -2);

        // Sum digits
        $sum = array_sum(str_split($lastTwoDigits));

        // Reduce to single digit (0–9)
        while ($sum > 9) {
            $sum = array_sum(str_split($sum));
        }

        return $sum;
    }



    /**
     * Calculate numerology number from name using Pythagorean method.
     *
     * @param  string  $name
     * @return array
     */
    private function calculateNameNumber($name)
    {
        // Basic numerology calculation for name
        // A=1, B=2, C=3, etc.
        $name = strtoupper(str_replace(' ', '', $name));
        $total = 0;

        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (ctype_alpha($char)) {
                $total += (ord($char) - 64); // A is ASCII 65, so subtract 64 to get 1
            }
        }

        // Reduce to a single digit (except master numbers 11, 22, 33)
        $finalNumber = $this->reduceToSingleDigit($total);

        return [
            'total' => $total,
            'number' => $finalNumber,
            'meaning' => $this->getNumerologyMeaning($finalNumber)
        ];
    }

    /**
     * Calculate Chaldean numerology value from name.
     *
     * @param  string  $name
     * @return int
     */
    private function calculateChaldeanValue($name)
    {
        // Chaldean Numerology Letter Chart
        $chaldeanValues = [
            'A' => 1,
            'B' => 2,
            'C' => 3,
            'D' => 4,
            'E' => 5,
            'F' => 8,
            'G' => 3,
            'H' => 5,
            'I' => 1,
            'J' => 1,
            'K' => 2,
            'L' => 3,
            'M' => 4,
            'N' => 5,
            'O' => 7,
            'P' => 8,
            'Q' => 1,
            'R' => 2,
            'S' => 3,
            'T' => 4,
            'U' => 6,
            'V' => 6,
            'W' => 6,
            'X' => 5,
            'Y' => 1,
            'Z' => 7
        ];

        $name = strtoupper(str_replace(' ', '', $name));
        $total = 0;

        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (isset($chaldeanValues[$char])) {
                $total += $chaldeanValues[$char];
            }
        }

        // Return the initial sum without reducing
        return $total;
    }

    /**
     * Calculate Chaldean numerology value for vowels in name.
     *
     * @param  string  $name
     * @return int
     */
    private function calculateChaldeanVowelValue($name)
    {
        // Chaldean Numerology Letter Chart for vowels only
        $chaldeanValues = [
            'A' => 1,
            'E' => 5,
            'I' => 1,
            'O' => 7,
            'U' => 3
        ];

        $name = strtoupper(str_replace(' ', '', $name));
        $total = 0;

        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (isset($chaldeanValues[$char])) {
                $total += $chaldeanValues[$char];
            }
        }

        // Return the initial sum without reducing
        return $total;
    }

    /**
     * Calculate Chaldean numerology value for consonants in name.
     *
     * @param  string  $name
     * @return int
     */
    private function calculateChaldeanConsonantValue($name)
    {
        // Chaldean Numerology Letter Chart for consonants only
        $chaldeanValues = [
            'B' => 2,
            'C' => 3,
            'D' => 4,
            'F' => 8,
            'G' => 3,
            'H' => 5,
            'J' => 1,
            'K' => 2,
            'L' => 3,
            'M' => 4,
            'N' => 5,
            'P' => 8,
            'Q' => 1,
            'R' => 2,
            'S' => 3,
            'T' => 4,
            'V' => 6,
            'W' => 6,
            'X' => 6,
            'Z' => 7,
            'Y' => 1,
        ];

        $name = strtoupper(str_replace(' ', '', $name));
        $total = 0;

        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (isset($chaldeanValues[$char])) {
                $total += $chaldeanValues[$char];
            }
        }

        // Return the initial sum without reducing
        return $total;
    }

    /**
     * Calculate numerology number from mobile number.
     *
     * @param  string  $mobileNumber
     * @return array
     */
    private function calculateMobileNumber($mobileNumber)
    {
        // Remove non-numeric characters
        $mobileNumber = preg_replace('/[^0-9]/', '', $mobileNumber);
        $total = 0;

        for ($i = 0; $i < strlen($mobileNumber); $i++) {
            $total += intval($mobileNumber[$i]);
        }

        // Reduce to a single digit (except master numbers 11, 22, 33)
        $finalNumber = $this->reduceToSingleDigit($total);

        return [
            'total' => $total,
            'number' => $finalNumber,
            'meaning' => $this->getNumerologyMeaning($finalNumber)
        ];
    }

    /**
     * Calculate numerology number from birth date.
     *
     * @param  string  $birthDate
     * @return array
     */
    private function calculateBirthNumber($birthDate)
    {
        // Format: YYYY-MM-DD
        $date = date_create($birthDate);
        $day = intval(date_format($date, 'd'));
        $month = intval(date_format($date, 'm'));
        $year = intval(date_format($date, 'Y'));

        $total = $day + $month + $this->reduceToSingleDigit($year);

        // Reduce to a single digit (except master numbers 11, 22, 33)
        $finalNumber = $this->reduceToSingleDigit($total);

        return [
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'total' => $total,
            'number' => $finalNumber,
            'meaning' => $this->getNumerologyMeaning($finalNumber)
        ];
    }

    /**
     * Reduce a number to a single digit, preserving master numbers.
     *
     * @param  int  $number
     * @return int
     */
    private function reduceToSingleDigit($number)
    {
        // Preserve master numbers
        if ($number == 11 || $number == 22 || $number == 33) {
            return $number;
        }

        // Reduce to a single digit
        while ($number > 9) {
            $number = array_sum(str_split($number));

            // Check for master numbers again after reduction
            if ($number == 11 || $number == 22 || $number == 33) {
                return $number;
            }
        }

        return $number;
    }

    /**
     * Static method to reduce a number to a single digit for use in Blade templates.
     *
     * @param  int  $number
     * @return int
     */
    public static function reduceNumber($number)
    {
        // Preserve master numbers
        if ($number == 11 || $number == 22 || $number == 33) {
            return $number;
        }

        // Reduce to a single digit
        while ($number > 9) {
            $number = array_sum(str_split($number));

            // Check for master numbers again after reduction
            if ($number == 11 || $number == 22 || $number == 33) {
                return $number;
            }
        }

        return $number;
    }

    /**
     * Get the meaning of a numerology number.
     *
     * @param  int  $number
     * @return string
     */
    private function getNumerologyMeaning($number)
    {
        $meanings = [
            1 => 'Number 1 represents leadership, independence, and individuality. You are a pioneer and trailblazer, with strong ambition and determination.',
            2 => 'Number 2 represents cooperation, diplomacy, and sensitivity. You are a peacemaker with intuition and patience, valuing harmony in relationships.',
            3 => 'Number 3 represents creativity, self-expression, and joy. You are optimistic, inspiring, and have a natural ability to uplift others.',
            4 => 'Number 4 represents stability, practicality, and hard work. You are dependable, disciplined, and value creating solid foundations.',
            5 => 'Number 5 represents freedom, change, and adventure. You are versatile, adaptable, and crave variety and new experiences.',
            6 => 'Number 6 represents responsibility, nurturing, and harmony. You are compassionate, caring, and often take on the role of caretaker.',
            7 => 'Number 7 represents analysis, wisdom, and spirituality. You are introspective, thoughtful, and seek deeper understanding.',
            8 => 'Number 8 represents ambition, authority, and achievement. You are goal-oriented, practical, and have strong leadership abilities.',
            9 => 'Number 9 represents compassion, humanitarianism, and completion. You are selfless, giving, and focused on making a difference.',
            11 => 'Master Number 11 represents intuition, inspiration, and spiritual insight. You are idealistic, visionary, and have heightened spiritual awareness.',
            22 => 'Master Number 22 represents practical idealism and mastery. You are a master builder with the potential to manifest grand visions into reality.',
            33 => 'Master Number 33 represents selfless service and higher consciousness. You are compassionate, nurturing, and dedicated to uplifting humanity.',
        ];

        return $meanings[$number] ?? 'No meaning available for this number.';
    }

    private function getDobMatrixResult($dob, $placeholder)
    {
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

    private function getProfession($date_number)
    {
        $professions = [
            1 => 'Leadership roles, business owner, politics, management, administration, Independent, ambitious, confident',
            2 => 'Diplomacy, counselling, public relations, art, teaching, Cooperative, emotional, persuasive',
            3 => 'Writing, communication, education, media, marketing, Creative, expressive, optimistic',
            4 => 'Engineering, technology, architecture, real estate, finance, Logical, disciplined, hardworking',
            5 => 'Sales, travel, marketing, IT, entertainment, Versatile, adventurous, freedom-loving',
            6 => 'Hospitality, fashion, interior design, healing, HR, Caring, balanced, service-oriented',
            7 => 'Research, analytics, spirituality, psychology, technology, Analytical, introspective, deep thinker',
            8 => 'Business, finance, management, law, real estate, Powerful, ambitious, results-driven',
            9 => 'Social work, medicine, charity, art, leadership, Humanitarian, compassionate, strong will',
        ];

        return $professions[$date_number] ?? null;
    }
    private function __getEnemy_number($name)
    {
        // Chaldean Numerology Chart
        $chaldeanChart = [
            'A' => 1,
            'I' => 1,
            'J' => 1,
            'Q' => 1,
            'Y' => 1,
            'B' => 2,
            'K' => 2,
            'R' => 2,
            'C' => 3,
            'G' => 3,
            'L' => 3,
            'S' => 3,
            'D' => 4,
            'M' => 4,
            'T' => 4,
            'E' => 5,
            'H' => 5,
            'N' => 5,
            'X' => 5,
            'U' => 6,
            'V' => 6,
            'W' => 6,
            'O' => 7,
            'Z' => 7,
            'F' => 8,
            'P' => 8
        ];

        // Clean and convert name
        $name = strtoupper(str_replace(' ', '', $name));

        // Calculate total value
        $total = 0;
        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (isset($chaldeanChart[$char])) {
                $total += $chaldeanChart[$char];
            }
        }

        // Reduce to single digit
        while ($total > 9) {
            $digits = str_split($total);
            $total = array_sum($digits);
        }

        $nameNumber = $total;

        // Enemy number mapping
        $enemyMap = [
            1 => [4, 6, 7, 8],
            2 => [4, 5, 8],
            3 => [4, 5, 7],
            4 => [4, 5, 9],
            5 => [4, 5, 7, 9],
            6 => [1, 6, 7, 8],
            7 => [3, 5, 7, 9],
            8 => [1, 3, 8, 9],
            9 => [4, 7, 8, 9],
        ];

        return $enemyMap[$nameNumber] ?? [];
    }

    private function getEnemy_number($name)
    {
        // Chaldean Numerology Chart
        $chaldeanChart = [
            'A' => 1, 'I' => 1, 'J' => 1, 'Q' => 1, 'Y' => 1,
            'B' => 2, 'K' => 2, 'R' => 2,
            'C' => 3, 'G' => 3, 'L' => 3, 'S' => 3,
            'D' => 4, 'M' => 4, 'T' => 4,
            'E' => 5, 'H' => 5, 'N' => 5, 'X' => 5,
            'U' => 6, 'V' => 6, 'W' => 6,
            'O' => 7, 'Z' => 7,
            'F' => 8, 'P' => 8
        ];

        // Enemy number mapping (Chaldean standard reference)
        $enemyMap = [
            1 => [4, 6, 7, 8],
            2 => [4, 5, 8],
            3 => [4, 5, 7],
            4 => [1, 5, 9],      // Fixed: removed self (4), added 1
            5 => [4, 5, 7, 9],
            6 => [1, 6, 7, 8],
            7 => [3, 5, 7, 9],
            8 => [1, 3, 8, 9],
            9 => [4, 7, 8, 9],
        ];

        // Clean input: remove spaces, keep only alpha chars, uppercase
        $cleanName = strtoupper(preg_replace('/[^a-zA-Z]/', '', $name));

        if (empty($cleanName)) {
            return [
                'name_number' => null,
                'enemy_numbers' => [],
                'error' => 'No valid characters found in name.'
            ];
        }

        // Calculate total value
        $total = 0;
        for ($i = 0; $i < strlen($cleanName); $i++) {
            $char = $cleanName[$i];
            if (isset($chaldeanChart[$char])) {
                $total += $chaldeanChart[$char];
            }
        }

        // Reduce to single digit (1–9)
        while ($total > 9) {
            $total = array_sum(str_split((string)$total));
        }

        $nameNumber = $total;

        return [
            'name_number'    => $nameNumber,
            'enemy_numbers'  => $enemyMap[$nameNumber] ?? [],
        ];
    }


    private function reduceToSingleDigitVC($number)
    {
        while ($number > 9) {
            $digits = str_split($number);
            $number = array_sum($digits);
        }
        return (string)$number;
    }

    private function reduceToSingleDigitArray($dateString)
    {
        $digits = str_split($dateString);
        $sum = array_sum($digits);
        return $this->reduceToSingleDigitVC($sum);
    }

    private function chaldeanPyramidNumber($name)
    {
        // Chaldean letter to number mapping
        $chaldeanMap = [
            'A' => 1,
            'I' => 1,
            'J' => 1,
            'Q' => 1,
            'Y' => 1,
            'B' => 2,
            'K' => 2,
            'R' => 2,
            'C' => 3,
            'G' => 3,
            'L' => 3,
            'S' => 3,
            'D' => 4,
            'M' => 4,
            'T' => 4,
            'E' => 5,
            'H' => 5,
            'N' => 5,
            'X' => 5,
            'U' => 6,
            'V' => 6,
            'W' => 6,
            'O' => 7,
            'Z' => 7,
            'F' => 8,
            'P' => 8
        ];

        // Step 1: Normalize and convert to numbers
        $name = strtoupper($name);
        $baseNumbers = [];

        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (isset($chaldeanMap[$char])) {
                $baseNumbers[] = $chaldeanMap[$char];
            }
        }

        if (count($baseNumbers) < 2) {
            throw new Exception("Name must contain at least two valid alphabet characters.");
        }

        // Step 2: Build pyramid until only 2 numbers remain
        while (count($baseNumbers) > 2) {
            $nextLayer = [];
            for ($i = 0; $i < count($baseNumbers) - 1; $i++) {
                $sum = $baseNumbers[$i] + $baseNumbers[$i + 1];

                // Reduce using Chaldean-style modulo 9 reduction (if sum >= 10)
                $reduced = $sum % 9;
                $nextLayer[] = $reduced === 0 ? 9 : $reduced;
            }
            $baseNumbers = $nextLayer;
        }

        return implode('', $baseNumbers); // Return last two numbers
    }

    function getZodiacSign($day, $month)
    {
        $zodiac = [
            ['sign' => 'Capricorn', 'start' => [12, 22], 'end' => [1, 19]],
            ['sign' => 'Aquarius', 'start' => [1, 20], 'end' => [2, 18]],
            ['sign' => 'Pisces', 'start' => [2, 19], 'end' => [3, 20]],
            ['sign' => 'Aries', 'start' => [3, 21], 'end' => [4, 19]],
            ['sign' => 'Taurus', 'start' => [4, 20], 'end' => [5, 20]],
            ['sign' => 'Gemini', 'start' => [5, 21], 'end' => [6, 20]],
            ['sign' => 'Cancer', 'start' => [6, 21], 'end' => [7, 22]],
            ['sign' => 'Leo', 'start' => [7, 23], 'end' => [8, 22]],
            ['sign' => 'Virgo', 'start' => [8, 23], 'end' => [9, 22]],
            ['sign' => 'Libra', 'start' => [9, 23], 'end' => [10, 22]],
            ['sign' => 'Scorpio', 'start' => [10, 23], 'end' => [11, 21]],
            ['sign' => 'Sagittarius', 'start' => [11, 22], 'end' => [12, 21]]
        ];

        foreach ($zodiac as $z) {
            [$startMonth, $startDay] = $z['start'];
            [$endMonth, $endDay] = $z['end'];

            if (
                ($month == $startMonth && $day >= $startDay) ||
                ($month == $endMonth && $day <= $endDay) ||
                ($startMonth > $endMonth && (
                    ($month == $startMonth && $day >= $startDay) ||
                    ($month == $endMonth && $day <= $endDay)
                ))
            ) {
                return $z['sign'];
            }
        }
        return 'Unknown';
    }

    function getZodiacLetters($zodiacSign)
    {
        // $zodiacLetters = [
        //     'Aries' => ['A', 'R', 'S'],
        //     'Taurus' => ['T', 'U', 'S'],
        //     'Gemini' => ['G', 'E', 'M'],
        //     'Cancer' => ['C', 'A', 'N'],
        //     'Leo' => ['L', 'E', 'O'],
        //     'Virgo' => ['V', 'I', 'R'],
        //     'Libra' => ['L', 'I', 'B'],
        //     'Scorpio' => ['S', 'C', 'P'],
        //     'Sagittarius' => ['S', 'G', 'T'],
        //     'Capricorn' => ['C', 'R', 'N'],
        //     'Aquarius' => ['A', 'Q', 'U'],
        //     'Pisces' => ['P', 'I', 'S']
        // ];

        $zodiacNameLetters = [
            'Aries' => ['Chu', 'Che', 'Cho', 'La', 'Li', 'Lu', 'Le', 'Lo', 'A'],
            'Taurus' => ['E', 'V', 'Ai', 'O', 'Vaa', 'Vi', 'Vu', 'Ve', 'Vo'],
            'Gemini' => ['Ka', 'Ki', 'Ku', 'Gh', 'Chh', 'Ke', 'Ko', 'Ha'],
            'Cancer' => ['Hi', 'Hu', 'He', 'Ho', 'Da', 'Di', 'Du', 'De', 'Do'],
            'Leo' => ['M', 'Mi', 'Mu', 'Me', 'Mo', 'Ta', 'Ti', 'Tu', 'Te'],
            'Virgo' => ['To', 'Pa', 'Pi', 'Pe', 'Sha', 'Thha', 'Pe', 'Po'],
            'Libra' => ['Ra', 'Ri', 'Ru', 'Re', 'Ro', 'Taa', 'Ti', 'Tu', 'Te'],
            'Scorpio' => ['To', 'N', 'Ni', 'Nu', 'Ne', 'No', 'Ya', 'Yi', 'Yu'],
            'Sagittarius' => ['Ye', 'Yo', 'Bha', 'Bhi', 'Bhu', 'Dha', 'Pha(F)', 'Dhha', 'Bhe'],
            'Capricorn' => ['Bho', 'Ja', 'Ji', 'Khi', 'Khu(Khoo)', 'Khe', 'Kho', 'Ga', 'Gi'],
            'Aquarius' => ['Gu(Goo)', 'Ge', 'Go', 'Sa', 'Si', 'Soo(Su)', 'Se', 'So', 'Da(The)'],
            'Pisces' => ['Di', 'Du', 'Thha', 'Jha', 'Jya', 'De', 'Do', 'Ch', 'Chi']
        ];

        return $zodiacNameLetters[$zodiacSign] ?? [];
    }

    public function getPyramidNumbers($name)
    {
        $chaldeanMap = [
            'A' => 1,
            'I' => 1,
            'J' => 1,
            'Q' => 1,
            'Y' => 1,
            'B' => 2,
            'K' => 2,
            'R' => 2,
            'C' => 3,
            'G' => 3,
            'L' => 3,
            'S' => 3,
            'D' => 4,
            'M' => 4,
            'T' => 4,
            'E' => 5,
            'H' => 5,
            'N' => 5,
            'X' => 5,
            'U' => 6,
            'V' => 6,
            'W' => 6,
            'O' => 7,
            'Z' => 7,
            'F' => 8,
            'P' => 8
        ];

        $cleanName = strtoupper(str_replace(' ', '', $name));
        $length = strlen($cleanName);

        if ($length < 1) return "Name too short.";

        $firstLetter = $cleanName[0];
        $seventhLetter = $length >= 7 ? $cleanName[6] : null;
        $lastLetter = $cleanName[$length - 1];

        $result = [
            $chaldeanMap[$firstLetter] ?? null,
            $seventhLetter ? ($chaldeanMap[$seventhLetter] ?? null) : null,
            $chaldeanMap[$lastLetter] ?? null
        ];

        return $result;
    }

    public function birthdateEnergiser($day, $month, $year)
    {

        $res = [];

        $a = $day;
        $b = $month;
        $c = intval(substr($year, 0, 2)); //only first 2 digits
        $d = intval(substr($year, -2)); //only last 2 digits
        $e = $a + $b + $c + $d;

        $res[0][0] = $a;
        $res[0][1] = $b;
        $res[0][2] = $c;
        $res[0][3] = $d;
        $res[0][4] = $e;

        $res[1][0] = $d + 1;
        $res[1][1] = $c - 1;
        $res[1][2] = $b - 3;
        $res[1][3] = $a + 3;
        $res[1][4] = $e;

        $res[2][0] = $b - 2;
        $res[2][1] = $a + 2;
        $res[2][2] = $d + 2;
        $res[2][3] = $c - 2;
        $res[2][4] = $e;

        $res[3][0] = $c + 1;
        $res[3][1] = $d - 1;
        $res[3][2] = $a + 1;
        $res[3][3] = $b - 1;
        $res[3][4] = $e;

        $res[4][0] = $e;
        $res[4][1] = $e;
        $res[4][2] = $e;
        $res[4][3] = $e;
        $res[4][4] = $e;

        return $res;
    }

    public function nameEnergiser($nn = 0)
    {

        $res = [];

        $a = 11;
        $b = 8;
        $c = $nn - 21;
        $d = 2;
        $e = $a + $b + $c + $d;

        $res[0][0] = $a;
        $res[0][1] = $b;
        $res[0][2] = $c;
        $res[0][3] = $d;
        $res[0][4] = $e;

        $res[1][0] = $c + 1;
        $res[1][1] = 1;
        $res[1][2] = 12;
        $res[1][3] = 7;
        $res[1][4] = $e;

        $res[2][0] = 4;
        $res[2][1] = $c + 2;
        $res[2][2] = 6;
        $res[2][3] = 9;
        $res[2][4] = $e;

        $res[3][0] = 5;
        $res[3][1] = 10;
        $res[3][2] = 3;
        $res[3][3] = $c + 3;
        $res[3][4] = $e;

        $res[4][0] = $e;
        $res[4][1] = $e;
        $res[4][2] = $e;
        $res[4][3] = $e;
        $res[4][4] = $e;

        return $res;
    }

    public function checkPronologySounds($name)
    {
        // $goodSounds = [
        //     "BA", "VIN", "UP", "ON", "DAY", "JAYA", "RS", "KAN", "KHAN", "HAN", "CAN", "AR", "RA", "KAR", "GAR", "CAT",
        //     "KAT", "CHEE", "CHIN", "CEL", "DAR", "DRA", "FATH", "FETH", "HIN", "HIM", "HA", "IN", "JA", "JH", "JAI",
        //     "JOY", "JAKI", "OK", "KA", "KI", "LAC", "LAK", "LAM", "LION", "LV", "LK", "MAS", "MANI", "ME", "MET",
        //     "MY", "MV", "MIT", "NJ", "NC", "OO", "PM", "QE", "RAY", "RNAI", "RAT", "RATH", "SAL", "TAL", "TOL",
        //     "VN", "VEIL", "WAY"
        // ];

        // $goodSounds = [
        //     'Air', 'ab', 'ac', 'ad', 'al', 'am', 'an', 'ar', 'at', 'az',
        //     'Ba', 'bh', 'by', 'bc', 'be', 'bi', 'bn', 'bo', 'br',
        //     'ca', 'cb', 'cr', 'cd', 'ch', 'ck', 'ci', 'cm', 'cn', 'cp',
        //     'Da', 'Dc', 'Dd', 'dg', 'dh', 'dj', 'dm', 'do', 'dp', 'dr', 'de',
        //     'Ea', 'Eb', 'Ek', 'Ed', 'eg', 'em', 'ez',
        //     'Fa', 'Fb', 'fh', 'fm', 'fr', 'ft', 'fy',
        //     'Ga', 'gd', 'ge', 'gh', 'gk', 'gl', 'gm', 'gn', 'go', 'gr', 'gu', 'gv', 'gy',
        //     'ha', 'he', 'hp', 'hm', 'hr', 'hu',
        //     'id', 'ie', 'if', 'ig', 'im', 'in', 'ip', 'is', 'it', 'iz',
        //     'jb', 'jo', 'jh', 'jp', 'jr', 'jz',
        //     'ka', 'kc', 'kg', 'kh', 'ki', 'km', 'kp', 'ky',
        //     'la', 'ld', 'lg', 'lh', 'lm', 'lt',
        //     'ma', 'mb', 'mc', 'md', 'me', 'mh', 'mk', 'ml', 'mp', 'Mr', 'my',
        //     'Nb', 'Ng', 'Np', 'Nu', 'NV', 'NY',
        //     'od', 'ok', 'ol', 'om', 'on', 'op', 'or', 'ot', 'ox',
        //     'pa', 'pc', 'pg', 'ph', 'pk', 'pm', 'pn', 'pr', 'pv', 'py',
        //     'Ra', 'Rc', 'Rd', 'Rh', 'Rk', 'Ro', 'Rp', 'Rs', 'Rt', 'Ru', 'Ry',
        //     'Sa', 'se', 'sg', 'sm', 'sr', 'st', 'sy', 'si',
        //     'Ta', 'Tc', 'Th', 'Tj', 'Tk', 'Tm', 'Tn', 'TO', 'Tr', 'TX',
        //     'Ua', 'uc', 'uk', 'un', 'up', 'ur', 'us',
        //     'Va', 've', 'vh', 'vi', 'vn', 'vr', 'vz',
        //     'we', 'wa', 'wc', 'wh', 'wl', 'wn', 'wt',
        //     'ya', 'yh', 'yn', 'yo', 'yr', 'ys', 'yt', 'yz'
        // ];
        $goodSounds = [
            "Air",
            "ab",
            "ac",
            "ad",
            "al",
            "am",
            "an",
            "ad",
            "ar",
            "at",
            "az",

            "Ba",
            "bh",
            "by",
            "bc",
            "be",
            "bi",
            "bn",
            "bo",
            "br",

            "ca",
            "cb",
            "cr",
            "cd",
            "ch",
            "ck",
            "ci",
            "cm",
            "cn",
            "cp",
            "cr",

            "Da",
            "Dc",
            "Dd",
            "dg",
            "dh",
            "dj",
            "dm",
            "do",
            "dp",
            "dr",
            "de",

            "Ea",
            "Eb",
            "Ek",
            "Ed",
            "eg",
            "em",
            "ez",

            "Fa",
            "Fb",
            "fh",
            "fm",
            "fr",
            "ft",
            "fy",

            "Ga",
            "gd",
            "ge",
            "gh",
            "gk",
            "gl",
            "gm",
            "gn",
            "go",
            "gr",
            "gu",
            "gv",
            "gy",

            "ha",
            "he",
            "hp",
            "hm",
            "hr",
            "hu",

            "id",
            "ie",
            "if",
            "ig",
            "im",
            "in",
            "ip",
            "is",
            "it",
            "iz",

            "jb",
            "jo",
            "jh",
            "jp",
            "jr",
            "jz",

            "ka",
            "kc",
            "kg",
            "kh",
            "ki",
            "km",
            "kp",
            "ky",

            "la",
            "ld",
            "lg",
            "lh",
            "lm",
            "lt",

            "ma",
            "mb",
            "mc",
            "md",
            "me",
            "mh",
            "mi",
            "mk",
            "ml",
            "mp",
            "Mr",
            "my",

            "Nb",
            "Ng",
            "Np",
            "Nu",
            "NV",
            "NY",

            "od",
            "ok",
            "ol",
            "om",
            "on",
            "op",
            "or",
            "ot",
            "ox",

            "pa",
            "pc",
            "pg",
            "ph",
            "pk",
            "pm",
            "pn",
            "pr",
            "pv",
            "py",

            "Ra",
            "Rc",
            "Rd",
            "Rh",
            "Rk",
            "Ro",
            "Rp",
            "Rs",
            "Rt",
            "Ru",
            "Ry",

            "Sa",
            "se",
            "sg",
            "sm",
            "sr",
            "st",
            "sy",
            "si",

            "Ta",
            "Tc",
            "Th",
            "Tj",
            "Tk",
            "Tm",
            "Tn",
            "TO",
            "Tr",
            "TX",

            "Ua",
            "uc",
            "uk",
            "un",
            "up",
            "ur",
            "us",

            "Va",
            "ve",
            "vh",
            "vi",
            "vn",
            "vr",
            "vz",

            "we",
            "wa",
            "wc",
            "wh",
            "wl",
            "wn",
            "wt",

            "ya",
            "yh",
            "yn",
            "yo",
            "yr",
            "ys",
            "yt",
            "yz"
        ];



        $badSounds = [
            "NO",
            "BAD",
            "WAR",
            "END",
            "LO",
            "SU",
            "DI",
            "NIL",
            "IL",
            "POOR",
            "ER",
            "MALA",
            "SAD",
            "MAD",
            "AIR",
            "RAM",
            "SUE",
            "AIAH",
            "DASS",
            "ALL",
            "AH",
            "APE",
            "BACH",
            "BY",
            "DIE",
            "DOWN",
            "DU",
            "DY",
            "EET",
            "IFR",
            "GO",
            "HAND",
            "HAT",
            "HET",
            "HES",
            "HER",
            "HOT",
            "ILL",
            "KL",
            "KILL",
            "KS",
            "HIP",
            "MAR",
            "KITE",
            "CITE",
            "KICK",
            "KK",
            "VK",
            "LOS",
            "LEE",
            "LEEK",
            "LEAK",
            "LIIK",
            "LASS",
            "MAT",
            "MELT",
            "SIK",
            "MOOD",
            "NA",
            "NE",
            "NLR",
            "PAY",
            "PUT",
            "PIT",
            "PT",
            "PC",
            "RAN",
            "RAP",
            "RP",
            "ROP",
            "RAO",
            "ROD",
            "SK",
            "SO",
            "SAT",
            "SES",
            "CHES",
            "SWAM",
            "SLO",
            "VC",
            "THA",
            "TI",
            "TIE",
            "UI",
            "VEN",
            "WARI",
            "WHY",
            "WIO"
        ];

        $name = strtoupper($name); // Normalize case
        $foundGood = [];
        $foundBad = [];

        // Check good sounds
        foreach ($goodSounds as $sound) {
            if (strpos($name, strtoupper($sound)) !== false) {
                $foundGood[] = $sound;
            }
        }

        // Check bad sounds
        foreach ($badSounds as $sound) {
            if (strpos($name, $sound) !== false) {
                $foundBad[] = $sound;
            }
        }

        return [
            'name' => $name,
            'good_sounds' => $foundGood,
            'bad_sounds' => $foundBad
        ];
    }

    // Change controller method to GET
    public function downloadPdf(Request $request)
    {

        $jsonData = $request->input('numerology_data');

        if (!$jsonData) {
            return back()->with('error', 'No numerology data found to generate PDF.');
        }

        $result = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->with('error', 'Invalid data format. Please try again.');
        }

        try {
            $pdf = Pdf::loadView('user.numerology.pdf.numerology-report', [
                'result' => $result,
                'title' => 'Numerology Analysis Report',
                'date' => date('F j, Y'),
                'name' => $result['full_name'] ?? 'User',
                'birth_date' => $result['birth_date'] ?? 'N/A'
            ]);

            $pdf->setPaper('A4', 'portrait');
            $pdf->setOption('enable_html5_parser', true);
            $pdf->setOption('isRemoteEnabled', true);
            $pdf->setOption('defaultFont', 'DejaVu Sans');

            $filename = 'Numerology-Report-' .
                str_replace(' ', '-', $result['full_name'] ?? 'user') . '-' .
                date('Y-m-d') . '.pdf';

            return $pdf->download($filename);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to generate PDF: ' . $e->getMessage());
        }
    }

function getRunningAge($dob)
{
    $birthDate = Carbon::parse($dob);
    $today = Carbon::today();

    // Total days difference
    $days = $birthDate->diffInDays($today);

    // Convert into years (decimal)
    $yearsDecimal = $days / 365;

    // Apply your rule
    return (int) ceil($yearsDecimal);
}
}
