<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NumerologyMobileController extends Controller
{
    // ════════════════════════════════════════════════════════════════════════
    //  CORE HELPER METHODS
    // ════════════════════════════════════════════════════════════════════════

    /**
     * Reduce any number to single digit (1-9)
     * e.g. 29 => 2+9=11 => 1+1=2
     */
    private function reduceToSingleDigitVC($number)
    {
        while ($number > 9) {
            $digits = str_split($number);
            $number = array_sum($digits);
        }
        return (string)$number;
    }

    /**
     * Get zodiac sign from day and month
     */
    public function getZodiacSign(int $day, int $month): string
    {
        $signs = [
            [3, 21, 4, 19, 'Aries'],
            [4, 20, 5, 20, 'Taurus'],
            [5, 21, 6, 20, 'Gemini'],
            [6, 21, 7, 22, 'Cancer'],
            [7, 23, 8, 22, 'Leo'],
            [8, 23, 9, 22, 'Virgo'],
            [9, 23, 10, 22, 'Libra'],
            [10, 23, 11, 21, 'Scorpio'],
            [11, 22, 12, 21, 'Sagittarius'],
            [12, 22, 12, 31, 'Capricorn'],
            [1, 1,  1, 19,  'Capricorn'],
            [1, 20, 2, 18,  'Aquarius'],
            [2, 19, 3, 20,  'Pisces'],
        ];

        foreach ($signs as $s) {
            $startMonth = $s[0];
            $startDay = $s[1];
            $endMonth   = $s[2];
            $endDay   = $s[3];
            $sign       = $s[4];

            if ($month == $startMonth && $day >= $startDay) return $sign;
            if ($month == $endMonth   && $day <= $endDay)   return $sign;
        }
        return 'Capricorn';
    }

    /**
     * Get BS (Birth Sum) - sum all digits of full birth date reduced to single digit
     */
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
     * Get relation between two numbers (friendly / neutral / enemy)
     */
    public function getNumberRelation(int $num1, int $num2, array $relations): string
    {
        if ($num1 === 0 || $num2 === 0) return 'neutral';
        if (!isset($relations[$num1]))  return 'neutral';

        if (in_array($num2, $relations[$num1]['friendly'])) return 'friendly';
        if (in_array($num2, $relations[$num1]['enemy']))    return 'enemy';
        return 'neutral';
    }

    /**
     * Build 3x3 Vedic grid from a DOB string (dd-mm-yyyy)
     * Digits are placed into their matching position cell
     */
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

        private function reduceToSingleDigitArray($dateString)
    {
        $digits = str_split($dateString);
        $sum = array_sum($digits);
        return $this->reduceToSingleDigitVC($sum);
    }

    /**
     * Build 3x3 Vedic grid from mobile number digits
     */
    public function getMobileMatrixResult(string $mobileNumber, array $placeholder): array
    {
        $posMap = [];
        foreach ($placeholder as $ri => $row) {
            foreach ($row as $ci => $val) {
                $posMap[$val] = [$ri, $ci];
            }
        }

        $matrix = [['', '', ''], ['', '', ''], ['', '', '']];

        foreach (str_split($mobileNumber) as $d) {
            $d = intval($d);
            if ($d === 0) continue;
            if (isset($posMap[$d])) {
                [$r, $c] = $posMap[$d];
                $matrix[$r][$c] .= ($matrix[$r][$c] === '' ? '' : ' ') . $d;
            }
        }

        return $matrix;
    }

    /**
     * Append extra numbers (BS, Zodiac) into existing matrix
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

    /**
     * Remove all occurrences of a number from the chart matrix
     */
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

    // ════════════════════════════════════════════════════════════════════════
    //  PDF DATA METHODS
    // ════════════════════════════════════════════════════════════════════════

    /**
     * Planet / Number descriptions — Pages 1-5 of PDF
     */
    public function getNumberDescription(int $num): array
    {
        $descriptions = [
            1 => [
                'planet'     => 'Sun',
                'symbol'     => '☀️',
                'traits'     => [
                    'Leadership Quality / Royal, Confident, Good in Management',
                    'Under Pressure They Can\'t Perform, Straightforward, Independent',
                    'Authoritative Personality / Innovators, Pioneers',
                    'Always Want Freedom, Farsightedness, Good in Friendship',
                    'Dominating, Ambitious, Egoistic / Stubborn',
                    'Short-Tempered',
                ],
                'represents' => 'Father / Government / MNCs / Politician / Popular in a Large Group',
                'color'      => '#FF6B35',
            ],
            2 => [
                'planet'     => 'Moon',
                'symbol'     => '🌙',
                'traits'     => [
                    'Vacillating Mind / Fluctuating, Emotional, Creative, Sentimental',
                    'Helping Nature, Need Motivation and Continuous Push, Soft Spoken',
                    'Difficult in Taking Decisions, Always Require Support from Others',
                    'Best Intuition Power / Mood Changes Frequently, Short Temper, No Patience',
                    'Attractive / Indecisive, Perfectionist, Good in Photography',
                ],
                'represents' => 'Mother / Emotion / Water',
                'color'      => '#5b8dd9',
            ],
            3 => [
                'planet'     => 'Jupiter',
                'symbol'     => '♃',
                'traits'     => [
                    'Always Hungry for Knowledge, Knowledgeable, Guru, Advisor, Hardship in Childhood',
                    'Very Good Counselor, Confident, Disciplined, Attached to Family',
                    'Best Mind Visualizations, Best Teacher / Preacher in Life, Leaders',
                    'Guru / Advisor, Give Respect to Low Class People, Can Say No to Addiction',
                    'Good in Management / Educationist, Good Speaker, Charitable',
                ],
                'represents' => 'Guru / Mentor / Finance / Right Judgement',
                'color'      => '#e6a817',
            ],
            4 => [
                'planet'     => 'Rahu',
                'symbol'     => '☊',
                'traits'     => [
                    'Always in Controversy, Suddenness, Hard Working, Stubborn',
                    'Believe in Themselves Only, Strong Built, Attitude Personality',
                    'Full of Ego, Dabangg, Rebellious / Always Want to Dictate in Life',
                    'Struggling, Impulsive, Short Tempered, Abusive, Harsh Decision Maker, Aggressive',
                    'Excellent Planners / Analytics, Very Good Friend, Travel a Lot / Explorers',
                ],
                'represents' => 'Shadow Planet. It Causes Eclipse, Cat, Cancer',
                'color'      => '#8B4513',
            ],
            5 => [
                'planet'     => 'Mercury',
                'symbol'     => '☿',
                'traits'     => [
                    'Good in Finance / Calculative, Explorers, Reserve, Logical',
                    'Most Adjustable Nature, Don\'t Keep Grudges, Mostly Satisfied in Life',
                    'Intelligent, Entertaining, Good Communication Skills / They Always Bounce Back',
                    'Born Businessman, Fruitful Journeys, Foreign Journey, Money is Priority',
                    'Lazy, Carefree, Straightforward, Very Slow in Making Decisions, Cold Nature',
                ],
                'represents' => 'Sister / Maternal Uncle / Aunty (Bua) / Daughter',
                'color'      => '#32CD32',
            ],
            6 => [
                'planet'     => 'Venus',
                'symbol'     => '♀',
                'traits'     => [
                    'Truly Family People, Always Ready to Help Family Members',
                    'Opposite Sex Attraction, Jugadu, Jealous, Education Breakage, Love to Show Off',
                    'Highly Romantic and Highly Diplomatic',
                    'Always Wanting More, Brand Conscious, Food Lovers, Fashionable',
                    'Attractive Aura, Imaginative, Trendsetters',
                ],
                'represents' => 'Luxury / Love / Sexual Life / Married Woman / Private Parts',
                'color'      => '#FF69B4',
            ],
            7 => [
                'planet'     => 'Ketu',
                'symbol'     => '☋',
                'traits'     => [
                    'Trust Easily / Self Doubt, Deep Thinkers & Researchers, Positive',
                    'Stable, Lucky, Work Easily Done, Secretive, Studious, Love to Hear Appreciation',
                    'Independent Decisions',
                    'Emotional Setbacks / Love Marriage, Foreign and Travel Suits',
                    'Low Confidence, Highly Spiritual / Religious, Highly Secretive, Confused, Searcher',
                ],
                'represents' => 'Flag / Joint / Dog / Broad Leaves / Spirituality',
                'color'      => '#9370DB',
            ],
            8 => [
                'planet'     => 'Saturn',
                'symbol'     => '♄',
                'traits'     => [
                    'Stubborn / Once Make Their Choice It\'s Hard to Change Their Mind',
                    'Egoistic, Believe in Themselves Only, Hardwork, Spiritual, God Believer',
                    'Best Money Handler, Logical, Down to Earth, Can\'t See People Crying',
                    'Cannot Sit Idle, Very Active Number, Justice Believer',
                    'Workaholic, Soft Hearted, Feel Isolated if They Don\'t Get Recognition',
                ],
                'represents' => 'Judge / Labour / Delay / Struggle / Obstacle / Sadness / Old Age / Iron / Cement',
                'color'      => '#4A4A4A',
            ],
            9 => [
                'planet'     => 'Mars',
                'symbol'     => '♂',
                'traits'     => [
                    'Personality Like Humanitarian (Danveer Karan)',
                    'Driven by Mood, Pumped Up Easily, Generous, Religious, Sensible, Mysterious, Restless',
                    'Argumentative, Energetic, Most Active Number, Fast Action and Reaction',
                    'True Warriors, Rough and Tough Personality / Get Success Through Hardwork',
                    'Self Esteem, Are Ready to Die But Not Ready to Accept Defeat',
                ],
                'represents' => 'Brother / Blood / Group Leader / Army / Police / Fire / Bravery / Energy',
                'color'      => '#DC143C',
            ],
        ];

        return $descriptions[$num] ?? [];
    }

    /**
     * All Shot Gun Number pair interpretations — Pages 7-12 of PDF
     */
    public function getShotgunNumbers(): array
    {
        return [
            '1-2' => 'Attraction on Face, Brilliance Face',
            '2-1' => 'Wastage of Money',
            '1-3' => 'Educated / Good Advisor',
            '3-1' => 'Educated / Good Advisor',
            '1-4' => 'Loan Liability and Health Issues',
            '4-1' => 'Loan Liability and Health Issues',
            '1-5' => 'Budh-Aditya Yoga / Shubha Yoga / Benefits from Father',
            '5-1' => 'Budh-Aditya Yoga / Shubha Yoga / Benefits from Father',
            '1-6' => 'No Income at the Time of Speaking / Spouse Health May Suffer',
            '6-1' => 'No Income at the Time of Speaking / Spouse Health May Suffer',
            '1-7' => 'Raj Yog, Govt Related, International Tours, Someone Famous / In Govt. / MNCs',
            '7-1' => 'Raj Yog, Govt Related, International Tours, Someone Famous / In Govt. / MNCs',
            '1-8' => 'Spouse Health Issues / Government Related Issues',
            '8-1' => 'Spouse Health Issues / Government Related Issues',
            '1-9' => 'Freedom Loving',
            '9-1' => 'Freedom Loving',
            '2-3' => 'Lack of Response from the Child / Enemies Cannot Harm',
            '3-2' => 'Lack of Response from the Child / Enemies Cannot Harm',
            '2-4' => 'Having Negative Thoughts or Fear. If Patience then Successful Otherwise Not',
            '4-2' => 'Having Negative Thoughts or Fear. If Patience then Successful Otherwise Not',
            '2-5' => 'Air Travelling is Good / Good for Astrology or Occult Science',
            '5-2' => 'Air Travelling is Good / Good for Astrology or Occult Science',
            '2-6' => 'Obstruction in Education / Affairs / May be Sperm Issues / Attraction towards Female',
            '6-2' => 'Obstruction in Education / Affairs / May be Sperm Issues / Attraction towards Female',
            '2-7' => 'Joint Pain',
            '7-2' => 'Joint Pain',
            '2-8' => 'Leakage on the Wall / Negative Thoughts / Habits if Avoided then Good Money',
            '8-2' => 'Leakage on the Wall / Negative Thoughts / Habits if Avoided then Good Money',
            '2-9' => 'Lakshmi Yoga',
            '9-2' => 'Lakshmi Yoga',
            '3-4' => 'Stubborn / Heart Problem / Paralysis',
            '4-3' => 'Stubborn / Heart Problem / Paralysis',
            '3-5' => 'Intelligent but in Spite of Having Money, They Feel the Lack of Money',
            '5-3' => 'Intelligent but in Spite of Having Money, They Feel the Lack of Money',
            '3-6' => 'Having Rules and Regulations',
            '6-3' => 'Having Rules and Regulations',
            '3-7' => 'High Education',
            '7-3' => 'High Education',
            '3-8' => 'Good Consultant / Judge',
            '8-3' => 'Good Consultant / Judge',
            '3-9' => 'Intelligence and Active',
            '9-3' => 'Intelligence and Active',
            '4-5' => 'Bandhan Yoga / Court / Hospital. Sister and Daughter May be Ill or Bad',
            '5-4' => 'Bandhan Yoga / Court / Hospital. Sister and Daughter May be Ill or Bad',
            '4-6' => 'Urine Infection / Piles / Extra Marital / Sensitive Skin / Gay / Lesbian',
            '6-4' => 'Urine Infection / Piles / Extra Marital / Sensitive Skin / Gay / Lesbian',
            '4-7' => 'One Who Can Adjust and Manage the Things Clearly',
            '7-4' => 'One Who Can Adjust and Manage the Things Clearly',
            '4-8' => 'Chronic Disease / Addiction / May Lack Sexual Life',
            '8-4' => 'Chronic Disease / Addiction / May Lack Sexual Life',
            '4-9' => 'Risk Factor Involvement / Uniform Type Work',
            '9-4' => 'Risk Factor Involvement / Uniform Type Work',
            '5-6' => 'Unable to Ask for Money That\'s Why Money Gets Stuck',
            '6-5' => 'Unable to Ask for Money That\'s Why Money Gets Stuck',
            '5-7' => 'Good Consultant / Good Astrologer / Good Writer',
            '7-5' => 'Good Consultant / Good Astrologer / Good Writer',
            '5-8' => 'Finance Sector Involvement / Big Talks on Money',
            '8-5' => 'Finance Sector Involvement / Big Talks on Money',
            '5-9' => 'Straightforward / May Result in Bad Relation Because of This',
            '9-5' => 'Straightforward / May Result in Bad Relation Because of This',
            '6-7' => 'Music Lover / Luxury Lover, Love Romance, Broad Leaves Tree',
            '7-6' => 'Music Lover / Luxury Lover, Love Romance, Broad Leaves Tree',
            '6-8' => 'Major Organ Transplant & Heart Surgery',
            '8-6' => 'Major Organ Transplant & Heart Surgery',
            '6-9' => 'Other Sex Involvement / Good Planner / Lover',
            '9-6' => 'Other Sex Involvement / Good Planner / Lover',
            '7-8' => 'Healer / Spiritual but May Get Depressed',
            '8-7' => 'Healer / Spiritual but May Get Depressed',
            '7-9' => 'Joint Pain / Family Turmoil',
            '9-7' => 'Joint Pain / Family Turmoil',
            '8-9' => 'Argumentative for What He Feels Right / Good Lawyer',
            '9-8' => 'Argumentative for What He Feels Right / Good Lawyer',
        ];
    }

    /**
     * Two-Digit Yogas — Conjunctions, Hostile, Fourth Aspect — Pages 13-22 of PDF
     */
    public function getTwoDigitYogas(): array
    {
        return [
            'conjunctions' => [
                ['numbers' => [7, 5], 'name' => 'Easy Money Yoga', 'traits' => [
                    'Money with Luck, Intelligent',
                    'Good Writer and Speaker, Astrologer',
                    'Attractive Look, Journalism',
                    'Easy Relationships (Friends and Affairs)',
                    'People Appreciate Your Work',
                ]],
                ['numbers' => [3, 6], 'name' => 'Don\'t Want to Marry', 'traits' => [
                    'Rise of Destiny After Marriage',
                    'Good Social Life (Highly Generous)',
                    'Clever, Good Education',
                    'Social and Religious Thoughts',
                    'Follow His/Her Own Rules and Regulations',
                ]],
                ['numbers' => [3, 1], 'name' => 'Sun Jupiter', 'traits' => [
                    'Wise, Learned, Wisdom, Leader, Astrologer',
                    'Respect and Reputation, Educated, Intelligence',
                    'Combination for Leader',
                    'Doctor, Judge, Yoga or Doctor',
                    'Will Achieve Success by His Own Strength',
                ]],
                ['numbers' => [1, 9], 'name' => 'Sun Mars', 'traits' => [
                    'High Education, Aggressive, Short-Tempered',
                    'Good Education, Self-Confidence',
                    'Combination for Leader, Surgeon, Engineer',
                    'Fire Related Work is Good, Good for Minister',
                ]],
                ['numbers' => [1, 7], 'name' => 'Sun Ketu', 'traits' => [
                    'Sun is Rod and Ketu is Flag, When They Meet They Fly High',
                    'Dual Marital Relation, Lack of Domestic Happiness',
                    'Combination for Government Job',
                    'Mystical Sciences, Get Respect, Name & Fame, Wealth Profit',
                    'Misunderstanding with Father',
                ]],
                ['numbers' => [6, 2], 'name' => 'Venus Moon', 'traits' => [
                    'Very Creative and Attractive',
                    'Affair Prone, Diabetes, Hindrance in Education',
                    'Chances of Diabetes, Urinary Diseases',
                    'Art and Music Lover',
                    'Can Do Anything for Luxury',
                    'May Have Two Marriages',
                ]],
            ],
            'hostile' => [
                ['numbers' => [1, 8], 'name' => 'Sun Saturn', 'traits' => [
                    'Obstacles, Disrespect',
                    'Loss of Government Job',
                    'Family Disturbances',
                    'Health Issues to Father',
                    'Differences with Father or Boss',
                ]],
                ['numbers' => [2, 4], 'name' => 'Moon Rahu', 'traits' => [
                    'Weak Eyesight and Mental Diseases',
                    'Inferiority Complex',
                    'Family Struggle, Possibilities in Eye and Heart Problem',
                    'Increase in Anxiety, Worry, Fear',
                    'Unrealistic Expectations',
                ]],
                ['numbers' => [9, 4], 'name' => 'Mars Rahu', 'traits' => [
                    'Strong Bandhan Yog',
                    'Mentally Disturbed, Money with Hard Work',
                    'Court or Hospital',
                    'Lawyer or Doctor, Police',
                    'Take Food in Kitchen',
                    'Restless, Risk Takers',
                ]],
                ['numbers' => [3, 9], 'name' => 'Jupiter Mars', 'traits' => [
                    'More Work Less Gains',
                    'Combination of Doctor and Leader',
                    'Meditation Yog, Pilgrimages',
                    'Intelligent and Learned with Wisdom',
                ]],
                ['numbers' => [6, 5], 'name' => 'Venus Mercury', 'traits' => [
                    'Higher Education, Hurdles',
                    'Family Conflict, Artistic Mind, Authors',
                    'Musicians, Actors, Writers',
                    'Very Creative, Flourmill Nearby',
                    'Love Marriage',
                ]],
                ['numbers' => [3, 2], 'name' => 'Jupiter Moon', 'traits' => [
                    'Disturbance in Education',
                    'Egoistic, Many Enemies but Could Not Harm',
                    'Lack of Happiness from Children',
                    'Creativity, Arrogant',
                    'Gaj Kesari Yog, Lemon Trees Nearby',
                ]],
                ['numbers' => [7, 8], 'name' => 'Ketu Saturn', 'traits' => [
                    'Misfortune (Life, Parents, Accident, Marriage)',
                    'Pessimistic',
                    'Family Disturbance',
                    'Lack of Good Sexual Life',
                ]],
                ['numbers' => [8, 4], 'name' => 'Saturn Rahu', 'traits' => [
                    'Only Planning No Execution',
                    'Accident Prone',
                    'Imaginary, Accident, Chronic Disease',
                    'Bad Habits, Lack Sexual Life',
                    'Thornful Trees Nearby',
                ]],
                ['numbers' => [5, 4], 'name' => 'Mercury Rahu', 'traits' => [
                    'Bandhan Yog',
                    'Loss in Government Work',
                    'Weak Eyesight, Disease, Litigation (Self or Others)',
                    'Intelligent, Wise, Clever',
                    'Need Continuous Change in Life',
                ]],
                ['numbers' => [9, 5], 'name' => 'Mars Mercury', 'traits' => [
                    'Intelligent Yoga',
                    'Straightforward, Speak in a Bitter Manner',
                    'Physically Active, Business Suits',
                    'Sometimes They Disturb Their Own Work',
                ]],
                ['numbers' => [2, 8], 'name' => 'Moon Saturn', 'traits' => [
                    'Depression Yoga',
                    'Feeling of Fear and Negative Thoughts',
                    'Two Sisters of Same Family Married in Same Family',
                    'Leakage in House, Away from Water',
                ]],
                ['numbers' => [6, 7], 'name' => 'Venus Ketu', 'traits' => [
                    'Art and Music Lover, Gets Luxury',
                    'More than 1 Affair, Second Marriage',
                    'Spiritual',
                    'Multiple 6: Continuous Fights',
                    'Multiple 7: Increase in Instability and Attraction Both',
                ]],
                ['numbers' => [8, 5], 'name' => 'Saturn Mercury', 'traits' => [
                    'Sharp Memory, Management, Good Finance',
                    'Finance, Insurance Related Work, Selfish',
                    'Bhagyodya After 35 Years',
                    'Inauspicious for Father',
                    'Skin Problem',
                ]],
            ],
            'fourth_aspect' => [
                ['numbers' => [1, 2], 'name' => 'Sun Moon (4th Aspect)', 'traits' => [
                    'Ek Baar Life Me Zero Face Karenge',
                    'Hidden Enemies',
                    'Debts, Health Issues',
                    'May Have Family Disturbance',
                    'Ups and Downs',
                ]],
                ['numbers' => [1, 4], 'name' => 'Sun Rahu (4th Aspect)', 'traits' => [
                    'Pitra Dosha, Notice of Income Tax, Health Issue, Debt Issue',
                    'Marriage Issues, Physical or Financial Problems',
                    'Child Birth Issue, Specially if Rahu in 5H or 9H in Kundli',
                    'Remedy: Strengthen Sun, Rahu Mani & Jaap, Serve Crows, Amavasya Remedy',
                ]],
                ['numbers' => [3, 8], 'name' => 'Jupiter Saturn (4th Aspect)', 'traits' => [
                    'Dharamkaramadhipati Yoga',
                    'Will Achieve Goal After Struggle',
                    'Good Advisor, Can Be Judge or Astrologer',
                    'Good Counsellor',
                ]],
                ['numbers' => [3, 5], 'name' => 'Jupiter Mercury (4th Aspect)', 'traits' => [
                    'Sharp Memory',
                    'Lack of Money Even of Good Economic Condition',
                    'Native Place Not Favorable (Away from Native Place)',
                    'Father in Law Have Breathing Problem',
                    'Good for Abroad Studies',
                ]],
                ['numbers' => [9, 8], 'name' => 'Mars Saturn (4th Aspect)', 'traits' => [
                    'Earthquake Yoga',
                    'Argumentative, Can Be a Good Advocate',
                    'Ups and Downs in Life',
                    'Engineer, Doctor',
                    'Differences with Brother',
                ]],
                ['numbers' => [2, 5], 'name' => 'Moon Mercury (4th Aspect)', 'traits' => [
                    'Sharp Memory, International Tours',
                    'Occult Science, Astrologer, Tantra',
                    'Urine and Bone Issues',
                    'May Got Involved in Financial Scam',
                ]],
                ['numbers' => [6, 4], 'name' => 'Venus Rahu (4th Aspect)', 'traits' => [
                    'Urinary Infection, Sexual Problem, Skin Disease',
                    'Casanova, Piles, Sperm Issues',
                    'May Be Criminal Mind',
                    'Problems in Love Life',
                ]],
                ['numbers' => [6, 9], 'name' => 'Venus Mars (4th Aspect)', 'traits' => [
                    'Love Marriage',
                    'Differences with Brother Due to Wife',
                    'Good Planner',
                    'Late Marriage Suggested Otherwise Face Dispute',
                    'Affair with Other Women',
                ]],
            ],
        ];
    }

    /**
     * Three-Digit Yogas — Triangular, Planes, Diagonal, L-Shape — Pages 23-30 of PDF
     */
    public function getThreeDigitYogas(): array
    {
        return [
            // TRIANGULAR
            ['type' => 'Triangular', 'numbers' => [6, 9, 4], 'name' => 'Venus Mars Rahu', 'traits' => [
                'Connected with Crimes',
                'Uncordial Relations',
                'Risk Takers',
                'Two Marriages, Relationships, Affairs',
            ]],
            ['type' => 'Triangular', 'numbers' => [1, 2, 4], 'name' => 'Sun Moon Rahu', 'traits' => [
                'Connected with Crimes',
                'Debts, Diseases, Enemies',
                'Family Disturbances, Ups & Downs',
                'Obstruction in Government Work',
                'Either No Sister or Differences',
            ]],
            ['type' => 'Triangular', 'numbers' => [3, 5, 2], 'name' => 'Jupiter Moon Mercury', 'traits' => [
                'Sharp Mind, Foreign Travel',
                'Financial Scams, Shortcut Method',
                'Lack of Happiness from One\'s Own Property',
                'Stay Away from Native Place for Progress',
            ]],
            ['type' => 'Triangular', 'numbers' => [3, 9, 8], 'name' => 'Jupiter Mars Saturn', 'traits' => [
                'Hurdles in Education, Family Issues',
                'Either No Brother or Differences',
                'Argumentative / Judge / Lawyer',
                'May Have Disturbance in Family',
            ]],
            // PLANES
            ['type' => 'Planes', 'numbers' => [3, 1, 9], 'name' => 'Jupiter Sun Mars', 'traits' => [
                'Strong Personality, Aggressive',
                'Sports-Person, Courageous, Delay in Marriage',
                'Educated and Respected Personality',
            ]],
            ['type' => 'Planes', 'numbers' => [6, 7, 5], 'name' => 'Venus Ketu Mercury (Raj Yog)', 'traits' => [
                'Ultra Luxurious',
                'Big House, Family Growth, High Level',
                'Music and Art Lover, Good Speaker and Writer',
                'Love and Romance',
                'Good Businessman',
            ]],
            ['type' => 'Planes', 'numbers' => [9, 5, 4], 'name' => 'Mars Mercury Rahu', 'traits' => [
                'Quick Decision and Actions',
                'Multitasker, Jack of All and Master of None',
                'Outspoken, Property Dispute',
            ]],
            ['type' => 'Planes', 'numbers' => [3, 6, 2], 'name' => 'Jupiter Venus Moon', 'traits' => [
                'Don\'t Want to Marry, Rise of Destiny After Marriage',
                'Attractive, Music Lover, Good Education',
                'Problem Related to Gynaecology, Lack of Sperm',
                'Suggest to Stay Away from Native Place',
            ]],
            ['type' => 'Planes', 'numbers' => [2, 8, 4], 'name' => 'Moon Saturn Rahu', 'traits' => [
                'Away from Birthplace, Major Ups and Downs in Life',
                'No Control over Speech When Aggressive',
                'Chances of Death by Accident',
                'Negative Thoughts, Addiction',
                'Chronic Disease',
            ]],
            ['type' => 'Planes', 'numbers' => [1, 7, 8], 'name' => 'Sun Ketu Saturn', 'traits' => [
                'Strong Intuition Power, Black Tongue',
                'Knowledge of Technical Work',
                'More Than Once Source of Income',
                'Helpful but Doesn\'t Get in Return',
                'Social Worker, Politician, Philanthropist',
            ]],
            // DIAGONAL
            ['type' => 'Diagonal', 'numbers' => [3, 7, 4], 'name' => 'Jupiter Ketu Rahu (Kaal Sharp Dosh)', 'traits' => [
                'Successive Kaal Sharp Dosha Yoga',
                'Hurdles in Education, Reaches in Top Position',
                'Don\'t Be Proud & Arrogant on Your Success',
                'Rahu Remedies Required',
            ]],
            ['type' => 'Diagonal', 'numbers' => [9, 7, 2], 'name' => 'Moon Ketu Mars (Kaal Sharp Dosh)', 'traits' => [
                'Struggled Life, Away from Family',
                'Family Disturbance',
                'Joint Pains & Urinary Diseases',
                'Courageous',
            ]],
            // L-SHAPE
            ['type' => 'L-Shape', 'numbers' => [1, 9, 7], 'name' => 'Sun Mars Ketu', 'traits' => [
                'Marriage Delay, Intercaste Marriage',
                'Fortunate, Foreign Travel',
                'Manglik, Late Marriage',
            ]],
            ['type' => 'L-Shape', 'numbers' => [1, 7, 5], 'name' => 'Sun Ketu Mercury', 'traits' => [
                'Sharp Mind and High Level Thoughts',
                'Teacher / Astrologer',
                'Logical Minded People',
            ]],
            ['type' => 'L-Shape', 'numbers' => [1, 6, 7], 'name' => 'Sun Ketu Venus', 'traits' => [
                'Music Lover / Luxury Life Style',
                'More than One Love Affairs and Marriage',
                'Ups and Downs',
            ]],
            ['type' => 'L-Shape', 'numbers' => [3, 1, 7], 'name' => 'Jupiter Sun Ketu', 'traits' => [
                'Govt. Job / Abroad Tours',
                'Can Be a Teacher',
                'Educated Respected',
                'Judge / Advocate / Astrologer',
            ]],
            ['type' => 'L-Shape', 'numbers' => [7, 5, 4], 'name' => 'Ketu Mercury Rahu', 'traits' => [
                'Debt Related Issues and Defamation',
                'Bondage Yoga',
                'Struggle Life',
            ]],
            ['type' => 'L-Shape', 'numbers' => [5, 8, 4], 'name' => 'Mercury Rahu Saturn', 'traits' => [
                'Addiction / Bondage Yoga',
                'May Lack of Sexual Life',
                'Fear of Loss',
            ]],
            ['type' => 'L-Shape', 'numbers' => [6, 2, 8], 'name' => 'Venus Moon Saturn', 'traits' => [
                'Family Trouble due to Opposite Sex',
                'Have Good Money',
                'Obstruction in Education',
                'Obstacles',
            ]],
        ];
    }

    /**
     * Four-Digit Yogas — Page 31 of PDF
     */
    public function getFourDigitYogas(): array
    {
        return [
            ['numbers' => [1, 6, 5, 8], 'name' => 'Sun Venus Saturn Mercury (Raj Yog)', 'traits' => [
                'Intelligent and Courageous',
                'Flexible',
                'Name and Fame in Country and Abroad',
                'E.g. Sania Mirza',
            ]],
        ];
    }

    /**
     * Profession indicators — Page 32 of PDF
     */
    public function getProfessionData(): array
    {
        return [
            ['profession' => 'Doctor',                   'combinations' => '19,3,7',     'icon' => '🏥'],
            ['profession' => 'Engineer',                  'combinations' => '19,3,75',    'icon' => '⚙️'],
            ['profession' => 'Media / Glamour Industry',  'combinations' => '6,17,67',    'icon' => '🎬'],
            ['profession' => 'Teacher',                   'combinations' => '31,75',      'icon' => '📚'],
            ['profession' => 'Accounts / Banking',        'combinations' => '85,75',      'icon' => '🏦'],
            ['profession' => 'Lawyer',                    'combinations' => '98,31,17',   'icon' => '⚖️'],
            ['profession' => 'Judge',                     'combinations' => '38,17,31',   'icon' => '🔨'],
            ['profession' => 'Leader / Politician',       'combinations' => '19,4,31',    'icon' => '🏛️'],
            ['profession' => 'Army / Police / Fire',      'combinations' => '19,94',      'icon' => '🪖'],
            ['profession' => 'Occult / Astrology',        'combinations' => '371,75,25',  'icon' => '🔮'],
            ['profession' => 'Consultant',                'combinations' => '38,37',      'icon' => '💼'],
            ['profession' => 'Hospital / Court Worker',   'combinations' => '54,13,17,9', 'icon' => '🏨'],
            ['profession' => 'Iron / Chemical / Const.',  'combinations' => '8',          'icon' => '🏗️'],
            ['profession' => 'Healer (Any Type)',          'combinations' => '17,8',       'icon' => '✨'],
        ];
    }

    /**
     * Remedies for each Birth Number — Pages 33-34 of PDF
     */
    public function getRemedies(): array
    {
        return [
            1 => [
                'screensaver' => 'Rising Sun, Beautiful Blooming Flowers With Sun\'s Rays Falling On Them',
                'bracelet'    => 'Red Jasper / Red Aventurine Bracelet',
                'mani'        => 'SURYAMANI',
                'color'       => '#FF6B35',
            ],
            2 => [
                'screensaver' => 'Moon Scattering Light All Around With Soothing Atmosphere, Beautiful Picture Showing Love, Twin Birds Or Leaves, Couple\'s Picture, Increasing Moon, Meditative State Buddha',
                'bracelet'    => 'Moon Howlite Bracelet / Sephatic',
                'mani'        => 'CHANDRAMANI',
                'color'       => '#5b8dd9',
            ],
            3 => [
                'screensaver' => 'Blooming Yellow Flowers, Guru\'s Picture, Lord Vishnu\'s and Maa Saraswati Picture',
                'bracelet'    => 'Yellow Citrine Bracelet',
                'mani'        => 'BRIHASPATI MANI',
                'color'       => '#e6a817',
            ],
            4 => [
                'screensaver' => 'Use the Screen Saver of Your Destiny Number or Your Friendly Number',
                'bracelet'    => 'Tiger Eye Bracelet',
                'mani'        => 'RAHUMANI',
                'color'       => '#8B4513',
            ],
            5 => [
                'screensaver' => 'Greenery, Rock Crystal, Snow Covered Mountains Are Also Good',
                'bracelet'    => 'Green Aventurine Bracelet',
                'mani'        => 'BUDHMANI',
                'color'       => '#32CD32',
            ],
            6 => [
                'screensaver' => 'Luxurious Atmosphere, Chimes in Metallic Shades, Golden or Pinkish Idols, Currency and Diamond, Maa Lakshmi Showering Coins',
                'bracelet'    => 'Opal Bracelet / Diamond Cut Crystal Bracelet',
                'mani'        => 'SHUKRAMANI',
                'color'       => '#FF69B4',
            ],
            7 => [
                'screensaver' => 'Something Spiritual / Saint / Sage / Aeroplane in Upward Direction, Buddha in Meditative States',
                'bracelet'    => '7 Chakra Bracelet',
                'mani'        => 'KETUMANI',
                'color'       => '#9370DB',
            ],
            8 => [
                'screensaver' => 'Follow Your Destiny Number or Beautiful Village Picture, Smooth Road With Greenery',
                'bracelet'    => 'Amethyst Bracelet',
                'mani'        => 'SHANIMANI',
                'color'       => '#4A4A4A',
            ],
            9 => [
                'screensaver' => 'In Red Frame Lord Hanuman Ji, Red Flower, Red Rose (Blooming)',
                'bracelet'    => 'Red Jasper / Red Aventurine Bracelet',
                'mani'        => 'MANGALMANI',
                'color'       => '#DC143C',
            ],
        ];
    }

    /**
     * Number relation table — Friendly / Neutral / Enemy
     */
    public function getNumberRelations(): array
    {
        return [
            1 => ['friendly' => [1, 2, 3, 9],       'neutral' => [5, 6],    'enemy' => [4, 7, 8]],
            2 => ['friendly' => [1, 2, 3, 6],       'neutral' => [4, 5],    'enemy' => [7, 8, 9]],
            3 => ['friendly' => [1, 2, 3, 6, 9],     'neutral' => [5],      'enemy' => [4, 7, 8]],
            4 => ['friendly' => [4, 5, 6, 8],       'neutral' => [2, 3],    'enemy' => [1, 7, 9]],
            5 => ['friendly' => [1, 4, 5, 6],       'neutral' => [2, 3, 7],  'enemy' => [8, 9]],
            6 => ['friendly' => [2, 3, 4, 5, 6, 9],   'neutral' => [1, 7],    'enemy' => [8]],
            7 => ['friendly' => [1, 2, 7],         'neutral' => [3, 6],    'enemy' => [4, 5, 8, 9]],
            8 => ['friendly' => [4, 5, 6, 8],       'neutral' => [3],      'enemy' => [1, 2, 7, 9]],
            9 => ['friendly' => [1, 3, 6, 9],       'neutral' => [5],      'enemy' => [2, 4, 7, 8]],
        ];
    }

    // ════════════════════════════════════════════════════════════════════════
    //  ANALYSIS / DETECTION HELPERS
    // ════════════════════════════════════════════════════════════════════════

    /**
     * Detect shotgun pairs in consecutive mobile digits + BN/DN combos
     */
    public function ____detectShotgunPairs(string $digits, int $bn, int $dn, int $mn): array
    {
        $shotguns = $this->getShotgunNumbers();
        $found    = [];
        $seen     = [];

        // Consecutive digit pairs within mobile
        for ($i = 0; $i < strlen($digits) - 1; $i++) {
            $key = $digits[$i] . '-' . $digits[$i + 1];
            if (isset($shotguns[$key]) && !in_array($key, $seen)) {
                $found[] = [
                    'pair'        => $digits[$i] . $digits[$i + 1],
                    'key'         => $key,
                    'description' => $shotguns[$key],
                    'position'    => 'Position ' . ($i + 1) . '-' . ($i + 2),
                    'type'        => 'consecutive',
                ];
                $seen[] = $key;
            }
        }

        // BN vs MN
        $key = $bn . '-' . $mn;
        if (isset($shotguns[$key]) && !in_array($key, $seen)) {
            $found[] = ['pair' => $bn . '↔' . $mn, 'key' => $key, 'description' => $shotguns[$key], 'position' => 'BN vs MN', 'type' => 'bn_mn'];
            $seen[]  = $key;
        }

        // DN vs MN
        $key = $dn . '-' . $mn;
        if (isset($shotguns[$key]) && !in_array($key, $seen)) {
            $found[] = ['pair' => $dn . '↔' . $mn, 'key' => $key, 'description' => $shotguns[$key], 'position' => 'DN vs MN', 'type' => 'dn_mn'];
            $seen[]  = $key;
        }

        // BN vs DN
        $key = $bn . '-' . $dn;
        if (isset($shotguns[$key]) && !in_array($key, $seen)) {
            $found[] = ['pair' => $bn . '↔' . $dn, 'key' => $key, 'description' => $shotguns[$key], 'position' => 'BN vs DN', 'type' => 'bn_dn'];
        }

        return $found;
    }
    public function detectShotgunPairs(string $digits, int $bn, int $dn, int $mn): array
    {
        $shotguns = $this->getShotgunNumbers();
        $found    = [];
        $seen     = [];

        // Consecutive digit pairs within mobile
        for ($i = 0; $i < strlen($digits) - 1; $i++) {

            $key = $digits[$i] . '-' . $digits[$i + 1];

            if (isset($shotguns[$key]) && !in_array($key, $seen)) {

                $found[] = [
                    'pair'        => $digits[$i] . $digits[$i + 1],
                    'key'         => $key,
                    'description' => $shotguns[$key],
                    'position'    => 'Position ' . ($i + 1) . '-' . ($i + 2),
                    'type'        => 'consecutive',
                ];

                $seen[] = $key;
            }
        }

        // BN vs DN
        $key = $bn . '-' . $dn;

        if (isset($shotguns[$key]) && !in_array($key, $seen)) {

            $found[] = [
                'pair'        => $bn . '↔' . $dn,
                'key'         => $key,
                'description' => $shotguns[$key],
                'position'    => 'BN vs DN',
                'type'        => 'bn_dn'
            ];

            $seen[] = $key;
        }

        return $found;
    }

    /**
     * Check if all required numbers exist in available list
     */
    public function allNumbersPresent(array $required, array $available): bool
    {
        foreach ($required as $n) {
            if (!in_array($n, $available)) return false;
        }
        return true;
    }

    /**
     * Collect unique non-zero numbers from a Vedic chart matrix
     */
    public function collectChartNumbers(array $chart): array
    {
        $nums = [];
        foreach ($chart as $row) {
            foreach ($row as $cell) {
                if ($cell === '' || $cell === null) continue;
                foreach (explode(' ', trim((string)$cell)) as $p) {
                    $v = intval($p);
                    if ($v > 0) $nums[] = $v;
                }
            }
        }
        return array_unique($nums);
    }

    /**
     * Detect 2-digit, 3-digit and 4-digit yogas present in a Vedic chart matrix
     */
    public function detectYogasInChart(array $chart): array
    {
        $presentNums = $this->collectChartNumbers($chart);
        $detected    = [];

        // 4-Digit Yogas first (highest priority)
        foreach ($this->getFourDigitYogas() as $yoga) {
            if ($this->allNumbersPresent($yoga['numbers'], $presentNums)) {
                $detected[] = ['category' => '4-Digit (Raj Yog)', 'yoga' => $yoga];
            }
        }

        // 3-Digit Yogas
        foreach ($this->getThreeDigitYogas() as $yoga) {
            if ($this->allNumbersPresent($yoga['numbers'], $presentNums)) {
                $detected[] = ['category' => '3-Digit (' . $yoga['type'] . ')', 'yoga' => $yoga];
            }
        }

        // 2-Digit Yogas
        foreach ($this->getTwoDigitYogas() as $type => $yogas) {
            foreach ($yogas as $yoga) {
                if ($this->allNumbersPresent($yoga['numbers'], $presentNums)) {
                    $label      = ucfirst(str_replace('_', ' ', $type));
                    $detected[] = ['category' => '2-Digit (' . $label . ')', 'yoga' => $yoga];
                }
            }
        }

        return $detected;
    }

    /**
     * Detect profession indicators from mobile digit combinations
     */
    public function detectProfessions(string $mobileDigits): array
    {
        $professions = $this->getProfessionData();
        $detected    = [];

        // Build all consecutive 1, 2, 3-digit substrings
        $subs = [];
        for ($len = 1; $len <= 3; $len++) {
            for ($i = 0; $i <= strlen($mobileDigits) - $len; $i++) {
                $subs[] = substr($mobileDigits, $i, $len);
            }
        }

        foreach ($professions as $prof) {
            $combos = explode(',', $prof['combinations']);
            foreach ($combos as $combo) {
                if (in_array(trim($combo), $subs)) {
                    $detected[] = $prof;
                    break;
                }
            }
        }

        return $detected;
    }

    /**
     * Calculate overall mobile number compatibility score (0-100)
     */
    public function getMobileScore(array $digitPairings): int
    {
        $total = count($digitPairings);
        if ($total === 0) return 0;

        $friendly = 0;
        $enemy    = 0;

        foreach ($digitPairings as $p) {
            if ($p['bn_relation'] === 'friendly') $friendly++;
            if ($p['dn_relation'] === 'friendly') $friendly++;
            if ($p['bn_relation'] === 'enemy')    $enemy++;
            if ($p['dn_relation'] === 'enemy')    $enemy++;
        }

        $maxPoints = $total * 2;
        $score     = (($friendly - $enemy) + $maxPoints) / ($maxPoints * 2) * 100;

        return (int) max(0, min(100, round($score)));
    }

    /**
     * Get label and color for a score value
     */
    public function getScoreLabel(int $score): array
    {
        if ($score >= 75) return ['label' => 'Excellent',     'color' => '#28a745', 'icon' => '⭐⭐⭐'];
        if ($score >= 55) return ['label' => 'Good',          'color' => '#5cb85c', 'icon' => '⭐⭐'];
        if ($score >= 40) return ['label' => 'Average',       'color' => '#ffc107', 'icon' => '⭐'];
        if ($score >= 25) return ['label' => 'Below Average', 'color' => '#fd7e14', 'icon' => '⚠️'];
        return              ['label' => 'Needs Change',   'color' => '#dc3545', 'icon' => '❌'];
    }

    // ════════════════════════════════════════════════════════════════════════
    //  MAIN ENTRY POINT
    // ════════════════════════════════════════════════════════════════════════

    public function calculateMobileNumerology(Request $request)
    {
        $validated = $request->validate([
            'mobile_number' => 'required|string|max:15',
            'birth_date'    => 'required|date',
            'name'          =>  'required',
        ]);

        $mobileNumber = preg_replace('/\D/', '', $validated['mobile_number']);
        $birthDate    = $validated['birth_date'];

        $birthDateObj = date_create($birthDate);
        $birthDay     = intval(date_format($birthDateObj, 'd'));
        $birthMonth   = intval(date_format($birthDateObj, 'm'));

        // ── BN / DN ──────────────────────────────────────────────────────────
        $bn_raw = $birthDay;
        $bn     = $this->reduceToSingleDigitVC($birthDay);

        $birthDateDigits = str_replace(['-', '/'], '', date_format($birthDateObj, 'd-m-Y'));
        $birthDateSum    = 0;
        for ($i = 0; $i < strlen($birthDateDigits); $i++) {
            $birthDateSum += intval($birthDateDigits[$i]);
        }
        $dn_raw = $birthDateSum;
        $dn     = $this->reduceToSingleDigitVC($birthDateSum);

        // ── MN ───────────────────────────────────────────────────────────────
        $mobileSum = 0;
        for ($i = 0; $i < strlen($mobileNumber); $i++) {
            $mobileSum += intval($mobileNumber[$i]);
        }
        $mn = $this->reduceToSingleDigitVC($mobileSum);

        // ── Vedic Grid Placeholder ────────────────────────────────────────────
           $placeholder = [
        [3, 1, 9],
        [6, 7, 5],
        [2, 8, 4]
    ];

        // ── DOB Natal Grid ────────────────────────────────────────────────────
        $dob_vedic_chart = $this->getDobMatrixResult(
            date('d-m-Y', strtotime($birthDate)),
            $placeholder
        );
    //  dd($dob_vedic_chart);

        $bs  = $this->getBS($birthDate);

        $rashi       = [
        "Aries" => 9, "Taurus" => 6, "Gemini" => 5, "Cancer" => 2,
        "Leo"   => 1, "Virgo"  => 5, "Libra"  => 6, "Scorpio" => 9,
        "Sagittarius" => 3, "Capricorn" => 8, "Aquarius" => 4, "Pisces" => 7
    ];
      $zodiacSign  = $this->getZodiacSign($birthDay, $birthMonth);
        $zodiacNum   = $rashi[$zodiacSign] ?? null;

    $dob_vedic_chart = $this->appendNumbersInMatrix($dob_vedic_chart, [$bs, $zodiacNum]);

     $bn = $this->reduceToSingleDigitVC($birthDay);
    $dn = $this->reduceToSingleDigitVC($birthDateSum);
        if ($bs == 6) {
            $dob_vedic_chart = $this->removeNumberFromChart($dob_vedic_chart, $bs);
            }
            $wn = $this->weekNumbers($dob_vedic_chart, $bn, $dn);
            $op = $this->overpowerfullNumber($dob_vedic_chart, $bn, $dn);
            // dd($dob_vedic_chart);

        $rashiMap = [
            'Aries' => 9,
            'Taurus' => 6,
            'Gemini' => 5,
            'Cancer' => 2,
            'Leo'   => 1,
            'Virgo'  => 5,
            'Libra'  => 6,
            'Scorpio' => 9,
            'Sagittarius' => 3,
            'Capricorn' => 8,
            'Aquarius' => 4,
            'Pisces' => 7,
        ];


        // ── Mobile Natal Grid ─────────────────────────────────────────────────
        $mobile_vedic_chart = $this->getMobileMatrixResult($mobileNumber, $placeholder);

        // ── Number Relations ──────────────────────────────────────────────────
        $numberRelations = $this->getNumberRelations();
        $bn_mn_relation  = $this->getNumberRelation($bn, $mn, $numberRelations);
        $dn_mn_relation  = $this->getNumberRelation($dn, $mn, $numberRelations);

        // ── Digit-level pairings ──────────────────────────────────────────────
        $mobileDigits        = str_split($mobileNumber);
        $mobileDigitPairings = [];
        foreach ($mobileDigits as $digit) {
            $d = intval($digit);
            $mobileDigitPairings[] = [
                'digit'       => $d,
                'bn_relation' => $this->getNumberRelation($bn, $d, $numberRelations),
                'dn_relation' => $this->getNumberRelation($dn, $d, $numberRelations),
            ];
        }

        // ── Mobile Score ──────────────────────────────────────────────────────
        $mobileScore      = $this->getMobileScore($mobileDigitPairings);
        $mobileScoreLabel = $this->getScoreLabel($mobileScore);

        // ── Advanced Analysis (PDF) ───────────────────────────────────────────
        $shotgunPairs      = $this->detectShotgunPairs($mobileNumber, $bn, $dn, $mn);
        $mobileYogas       = $this->detectYogasInChart($mobile_vedic_chart);
        $dobYogas          = $this->detectYogasInChart($dob_vedic_chart);
        $professionMatches = $this->detectProfessions($mobileNumber);
        $bnDescription     = $this->getNumberDescription($bn);
        $dnDescription     = $this->getNumberDescription($dn);
        $mnDescription     = $this->getNumberDescription($mn);
        $remedy            = $this->getRemedies()[$bn] ?? null;

        $result = [
            // Inputs
            'name'                  => $validated['name'],
            'mobile_number'         => $validated['mobile_number'],
            'mobile_digits_only'    => $mobileNumber,
            'birth_date'            => $birthDate,
            // Core Numbers
            'bn_raw'                => $bn_raw,
            'dn_raw'                => $dn_raw,
            'bn'                    => $bn,
            'dn'                    => $dn,
            'mn_raw'                => $mobileSum,
            'mn'                    => $mn,
            'bs'                    => $bs,
            'zodiac_sign'           => $zodiacSign,
            'zodiac_num'            => $zodiacNum,
            // Grids
            'dob_vedic_chart'       => $dob_vedic_chart,
            'mobile_vedic_chart'    => $mobile_vedic_chart,
            // Pairing
            'bn_mn_relation'        => $bn_mn_relation,
            'dn_mn_relation'        => $dn_mn_relation,
            'mobile_digit_pairings' => $mobileDigitPairings,
            // Score
            'mobile_score'          => $mobileScore,
            'mobile_score_label'    => $mobileScoreLabel,
            // PDF Advanced
            'shotgun_pairs'         => $shotgunPairs,
            'mobile_yogas'          => $mobileYogas,
            'dob_yogas'             => $dobYogas,
            'profession_matches'    => $professionMatches,
            'bn_description'        => $bnDescription,
            'dn_description'        => $dnDescription,
            'mn_description'        => $mnDescription,
            'remedy'                => $remedy,
            // Reference
            'all_professions'       => $this->getProfessionData(),
            'all_remedies'          => $this->getRemedies(),
            'number_relations'      => $numberRelations,
        ];

        return view('user.numerology.mobileresult', compact('result'));
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

}
