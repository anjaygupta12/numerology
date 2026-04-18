<!DOCTYPE html>
<html>
<head>
    <title>Numerology Report - {{ $result['full_name'] }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* PDF Specific Styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 15px;
            /* background-color: #f5f5f5; */
            /* Add top padding to prevent header overlap */
            padding-top: 80px;
        }

        /* Header and Footer Styles */
        @page {
            margin: 100px 25px;
        }

        .header {
            position: fixed;
            top: -60px;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            background-color: #fff;
            z-index: 1000;
            /* Removed header border only */
        }

        .footer {
            position: fixed;
            bottom: -60px;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            border-top: 1px solid #000; /* Keep footer border */
            background-color: #fff;
            z-index: 1000;
        }

        .header-content, .footer-content {
            padding: 10px;
        }

        .logo {
            height: 30px;
            width: auto;
            display: inline-block;
            vertical-align: middle;
        }

        .header-title {
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
            font-weight: bold;
            font-size: 14px;
        }

        .page-number:before {
            content: "Page " counter(page);
        }

        /* Rest of your existing styles remain unchanged */
        .card {
            border: 2px solid #000;
            margin-bottom: 15px;
            page-break-inside: avoid;
            background-color: #fff;
        }

        .card-header {
            background-color: #d3d3d3;
            padding: 10px;
            border-bottom: 2px solid #000;
        }

        .card-body {
            padding: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            page-break-inside: avoid;
        }

        td, th {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        .date-header {
            background-color: #e0e0e0;
            font-weight: bold;
            text-align: center;
            padding: 8px;
            border: 1px solid #000;
        }

        .label-cell {
            background-color: #ffffff;
            font-weight: bold;
            width: 120px;
            border: 1px solid #000;
        }

        .input-field {
            padding: 4px 8px;
            border: 1px solid #000;
            background-color: #fff;
        }

        .cream-bg {
            background-color: #fffacd !important;
        }

        .result-box-container {
            display: inline-block;
            border: 2px solid #000;
            padding: 4px 8px;
            text-align: center;
            min-width: 40px;
            background-color: #fff;
        }

        .result-label {
            font-size: 10px;
            font-weight: bold;
            border-bottom: 1px solid #000;
            margin-bottom: 2px;
        }

        .result-value {
            font-size: 14px;
            font-weight: bold;
        }

        .natal-grid {
            border: 2px solid #000;
        }

        .natal-header {
            background-color: #000;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 5px;
        }

        .natal-cell {
            width: 30px;
            height: 30px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
            font-weight: bold;
            background-color: #fff;
        }

        .section-header {
            background-color: #d0e9c6;
            font-weight: bold;
            padding: 8px;
            border: 1px solid #000;
        }

        .number-box, .letter-box {
            width: 30px;
            height: 25px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
        }

        .letter-box {
            font-weight: bold;
            background-color: #fff;
        }

        .pyramid {
            text-align: center;
            margin: 10px 0;
        }

        .pyramid-top {
            margin-bottom: 5px;
        }

        .pyramid-top span {
            font-weight: bold;
            font-size: 16px;
        }

        .pyramid-bottom {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .pyramid-bottom-box {
            border: 2px solid #000;
            padding: 5px 10px;
            min-width: 40px;
            text-align: center;
            background-color: #fff;
        }

        .attributes_tbl .attribute-col {
            background-color: #e8f4f8;
            font-weight: bold;
            width: 200px;
            border: 1px solid #000;
        }

        .attributes_tbl .description-col {
            border: 1px solid #000;
            background-color: #fff;
        }

        .remedies-table {
            border: 2px solid #000;
        }

        .remedies-table .header-cell {
            background-color: #ffd966;
            color: #000;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border: 2px solid #000;
        }

        .content-cell {
            padding: 8px;
            border: 1px solid #000;
        }

        .number-cell {
            background-color: #fff;
            font-weight: bold;
            text-align: center;
            width: 30px;
            border: 1px solid #000;
        }

        .birth-node {
            background-color: #ffd966;
            font-weight: bold;
            width: 100px;
            border: 1px solid #000;
        }

        .yantras-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .yantra {
            width: 48%;
            text-align: center;
            border: 2px dashed #000;
            padding: 10px;
        }

        .yantra-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .grid-table {
            width: 100%;
            border: 2px solid #000;
        }

        .grid-table td {
            width: 20%;
            height: 30px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
        }

        .energiser-title {
            margin-top: 10px;
            font-weight: bold;
            font-size: 12px;
        }

        /* Page break avoidance for important sections */
        .result-card {
            page-break-inside: avoid;
        }

        h4 {
            page-break-before: auto;
            page-break-after: avoid;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        /* Ensure tables don't break across pages */
        table {
            page-break-inside: avoid;
        }

        /* Textarea styling for PDF */
        textarea {
            width: 100%;
            border: 1px solid #000;
            padding: 8px;
            font-family: Arial, sans-serif;
            resize: none;
            background-color: #fff;
        }

        .additional-info {
            font-size: 10px;
            color: #666;
            padding-left: 10px;
        }

        .pyramid-top-label {
            font-size: 10px;
            margin-top: 2px;
        }

        .pyramid-label {
            font-size: 10px;
            margin-top: 5px;
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
        }

        .zodiac-section {
            padding: 5px;
        }

        .zodiac-table {
            border: none;
        }

        .zodiac-label {
            font-weight: bold;
            padding-right: 10px;
        }

        .zodiac-letter {
            text-align: center;
            font-weight: bold;
            padding: 2px 5px;
            border: 1px solid #000;
            background-color: #fff;
        }

        .moon-label {
            font-weight: bold;
            margin-right: 10px;
        }

        .pyramid-container {
            width: 100%;
        }

        .pyramid-header {
            font-weight: bold;
            text-align: center;
            padding-bottom: 5px;
            background-color: #d0e9c6;
            border: 1px solid #000;
        }

        .description-col div {
            min-height: 60px;
        }

        .main-table {
            border: 2px solid #000;
        }

        .main-table td {
            border: 1px solid #000;
        }

        .numerology-chart {
            border: 2px solid #000;
        }

        .input-cell {
            border: 1px solid #000;
        }

        /* New styles for better header spacing */
        .header-spacer {
            height: 70px;
            width: 100%;
        }

        .header-info {
            font-size: 10px;
            margin-top: 2px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <!-- Replace with your actual logo path -->
            <img src="{{ public_path('images/logo/pdflogo.jpg') }}" class="logo" alt="Company Logo">
            <div class="header-title">Name Numerology Report</div>
            <div class="header-info">BY ASTRO NUMEROLOGIST {{ Auth::user()->name }}</div>
            <div class="header-info">CREATED BY ASTRONUMERO QUEEN SADHNA GULATI</div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <div class="page-number"></div>
            <div style="font-size: 10px; margin-top: 5px;">Confidential Report - Generated on {{ date('d-M-Y H:i') }}</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card result-card">
        <div class="card-header">
            <h4 style="margin: 0; text-align: center;">Chaldean Numerology Results for: {{ $result['full_name'] }}</h4>
            <p style="text-align: center; margin: 5px 0 0 0; font-size: 11px; color: #000;">Generated on: {{ date('d-M-Y H:i') }}</p>
        </div>
        <div class="card-body">
            <!-- First Table -->
            <table class="numerology-chart" border="1">
                <tr>
                    <td class="date-header" colspan="3">{{ date('d-M-y', time()) }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 0;">
                        <table class="main-table" border="0" width="100%">
                            <tr>
                                <td class="label-cell">First Name :</td>
                                <td class="input-cell">
                                    <div class="input-field">{{ $result['first_name'] }}</div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="result-text"></td>
                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">FN</div>
                                                    <div class="result-value">{{ $result['fn'] }}</div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                @if(isset($yog_labels) && isset($yog_labels['fn']) && count($yog_labels['fn']))
                                                    {{ implode(', ', $yog_labels['fn']) }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td rowspan="7" style="vertical-align: top; padding: 10px;">
                                    <div style="display: flex; flex-direction: column;">
                                        <table class="natal-grid" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="natal-header" colspan="3">NATAL GRID</td>
                                            </tr>
                                            <?php foreach ($result['vedic_chart_array'] as $row): ?>
                                                <tr>
                                                    <?php foreach ($row as $cell): ?>
                                                        <td class="natal-cell"><?php echo htmlspecialchars($cell); ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>

                                        <div style="display: flex; margin-top: 15px;">
                                            <div class="moon-label">Zodiac Sign</div>
                                            <div class="result-value" style="width: 100px;">{{ $result['zodiac_sign'] }}</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Middle Name:</td>
                                <td class="input-cell">
                                    <div class="input-field">{{ $result['middle_name'] }}</div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="result-text"></td>
                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">NN</div>
                                                    <div class="result-value">{{ $result['nn'] }}</div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                @if(isset($yog_labels) && isset($yog_labels['nn']) && count($yog_labels['nn']))
                                                    {{ implode(', ', $yog_labels['nn']) }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Last Name:</td>
                                <td class="input-cell">
                                    <div class="input-field">{{ $result['last_name'] }}</div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="result-text"></td>
                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">IN</div>
                                                    <div class="result-value">{{ $result['in'] }}</div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                @if(isset($yog_labels) && isset($yog_labels['in']) && count($yog_labels['in']))
                                                    {{ implode(', ', $yog_labels['in']) }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Birth Date :</td>
                                <td class="input-cell">
                                    <div class="input-field">{{ date('d-m-Y', strtotime($result['birth_date'])) }}</div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="result-text"></td>
                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">EN</div>
                                                    <div class="result-value">{{ $result['en'] }}</div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                @if(isset($yog_labels) && isset($yog_labels['en']) && count($yog_labels['en']))
                                                    {{ implode(', ', $yog_labels['en']) }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">First Letter :</td>
                                <td class="input-cell">
                                    <div class="input-field cream-bg">{{ $result['first_name'][0] }}</div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="result-text"></td>
                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">PN</div>
                                                    <div class="result-value">{{ $result['pn'] }}</div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                @if(isset($yog_labels) && isset($yog_labels['pn']) && count($yog_labels['pn']))
                                                    {{ implode(', ', $yog_labels['pn']) }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">DOB - BN :</td>
                                <td class="input-cell">
                                    <div class="input-field cream-bg">{{ $result['bn'] }}</div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="result-text"></td>
                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">HN</div>
                                                    <div class="result-value">{{ $result['hn'] }}</div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">DOB - DN :</td>
                                <td class="input-cell">
                                    <div class="input-field cream-bg">{{ $result['dn'] }}</div>
                                </td>
                                <td colspan="2">
                                    <div class="zodiac-section">
                                        <table class="zodiac-table" width="100%">
                                            <tr>
                                                <td class="zodiac-label text-end">Zodiac Letters:</td>
                                                @foreach ($result['zodiac_letters'] as $letter)
                                                    <td class="zodiac-letter">{{ $letter }}</td>
                                                @endforeach
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Sounds Theory Table -->
            <h4 class="mt-4"> Sounds Theory, Gridding and Pyramid</h4>
            <table class="main-table">
                <!-- Header Section -->
                <tr>
                    <td colspan="4" style="background-color: #d0e9c6;">Good Sounds : {{ implode(', ', $result['good_sounds']) }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="background-color: #ffc0c0;">Bad Sounds : {{ implode(', ', $result['bad_sounds']) }}</td>
                </tr>
                <tr class="section-header">
                    <td colspan="4">Gridding :</td>
                </tr>

                <!-- Name Gridding Section -->
                <tr>
                    <td colspan="4" style="padding: 0;">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <!-- First Name Section -->
                            <tr>
                                <td colspan="4" class="section-header" style="background-color: #d0e9c6; font-weight: bold; padding: 5px;">First Name:</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="padding: 5px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <!-- Number row starting from 1 for second letter -->
                                        <tr>
                                            @php
                                                $firstName = strtoupper($result['first_name']);
                                                $firstNameLetters = str_split($firstName);
                                                $counter = 1;
                                            @endphp
                                            @foreach($firstNameLetters as $index => $letter)
                                                @if($index == 0)
                                                    <td class="number-box"></td>
                                                @else
                                                    <td class="number-box">{{ $counter }}</td>
                                                    @php
                                                        $counter++;
                                                        if($counter > 9) $counter = 1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @for($i = count($firstNameLetters); $i < 12; $i++)
                                                <td class="number-box"></td>
                                            @endfor
                                        </tr>
                                        <!-- Letter row -->
                                        <tr>
                                            @php
                                                $letterValues = [
                                                    'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 3, 'H' => 5,
                                                    'I' => 1, 'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'O' => 7, 'P' => 8,
                                                    'Q' => 1, 'R' => 2, 'S' => 3, 'T' => 4, 'U' => 6, 'V' => 6, 'W' => 6, 'X' => 5,
                                                    'Y' => 1, 'Z' => 7
                                                ];
                                            @endphp

                                            @foreach($firstNameLetters as $letter)
                                                <td class="letter-box" @if(in_array($letterValues[$letter], $result['enemy_number_first_name'])) style="background-color: #ffb6c1"  @endif > {{ $letter }}</td>
                                            @endforeach
                                            @for($i = count($firstNameLetters); $i < 12; $i++)
                                                <td class="letter-box"></td>
                                            @endfor
                                        </tr>
                                        <!-- Number values row -->
                                        <tr>
                                            @foreach($firstNameLetters as $letter)
                                                <td class="number-box" >{{ $letterValues[$letter] ?? '' }}</td>
                                            @endforeach
                                            @for($i = count($firstNameLetters); $i < 12; $i++)
                                                <td class="number-box"></td>
                                            @endfor
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            @if(!empty($result['middle_name']))
                            <!-- Middle Name Section -->
                            <tr>
                                <td colspan="4" class="section-header" style="background-color: #d0e9c6; font-weight: bold; padding: 5px;">Middle Name:</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="padding: 5px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <!-- Number row continuing from first name -->
                                        <tr>
                                            @php
                                                $middleName = strtoupper($result['middle_name']);
                                                $middleNameLetters = str_split($middleName);
                                                $middleCounter = $counter;
                                            @endphp
                                            @foreach($middleNameLetters as $index => $letter)
                                                <td class="number-box">{{ $middleCounter }}</td>
                                                @php
                                                    $middleCounter++;
                                                    if($middleCounter > 9) $middleCounter = 1;
                                                @endphp
                                            @endforeach
                                            @for($i = count($middleNameLetters); $i < 12; $i++)
                                                <td class="number-box"></td>
                                            @endfor
                                        </tr>
                                        <!-- Letter row -->
                                        <tr>
                                            @foreach($middleNameLetters as $letter)
                                                <td class="letter-box" @if(in_array($letterValues[$letter], $result['enemy_number_last_name'])) style="background-color: #ffb6c1"  @endif >{{ $letter }}</td>
                                            @endforeach
                                            @for($i = count($middleNameLetters); $i < 12; $i++)
                                                <td class="letter-box"></td>
                                            @endfor
                                        </tr>
                                        <!-- Number values row -->
                                        <tr>
                                            @foreach($middleNameLetters as $letter)
                                                <td class="number-box">{{ $letterValues[$letter] ?? '' }}</td>
                                            @endforeach
                                            @for($i = count($middleNameLetters); $i < 12; $i++)
                                                <td class="number-box"></td>
                                            @endfor
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endif

                            <!-- Last Name Section -->
                            <tr>
                                <td colspan="4" class="section-header" style="background-color: #d0e9c6; font-weight: bold; padding: 5px;">Last Name:</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="padding: 5px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <!-- Number row continuing from middle name or first name -->
                                        <tr>
                                            @php
                                                $lastName = strtoupper($result['last_name']);
                                                $lastNameLetters = str_split($lastName);
                                                $lastCounter = (!empty($result['middle_name'])) ? $middleCounter : $counter;
                                            @endphp
                                            @foreach($lastNameLetters as $index => $letter)
                                                <td class="number-box">{{ $lastCounter }}</td>
                                                @php
                                                    $lastCounter++;
                                                    if($lastCounter > 9) $lastCounter = 1;
                                                @endphp
                                            @endforeach
                                            @for($i = count($lastNameLetters); $i < 12; $i++)
                                                <td class="number-box"></td>
                                            @endfor
                                        </tr>
                                        <!-- Letter row -->
                                        <tr>
                                            @foreach($lastNameLetters as $letter)
                                                <td class="letter-box">{{ $letter }}</td>
                                            @endforeach
                                            @for($i = count($lastNameLetters); $i < 12; $i++)
                                                <td class="letter-box"></td>
                                            @endfor
                                        </tr>
                                        <!-- Number values row -->
                                        <tr>
                                            @foreach($lastNameLetters as $letter)
                                                <td class="number-box">{{ $letterValues[$letter] ?? '' }}</td>
                                            @endforeach
                                            @for($i = count($lastNameLetters); $i < 12; $i++)
                                                <td class="number-box"></td>
                                            @endfor
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <div style="page-break-before: always;"></div>
                <!-- Pyramids Section -->
                <tr>
                    <td colspan="4" style="padding: 0;">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="section-header" width="15%">Pyramids :</td>
                                <td width="25%">
                                    <table class="pyramid-container">
                                        <tr>
                                            <td class="pyramid-header">1st</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="pyramid">
                                                    <div class="pyramid-top" style="border: 2px solid #000000; width: 30px; margin-left: 60px;">
                                                        <span>{{ $result['pyramid_numbers'][0]}}</span>
                                                        <div class="pyramid-top-label">P1</div>
                                                    </div>
                                                    <div class="pyramid-bottom">
                                                        <div class="pyramid-bottom-box">{{ $result['bn_single']}}</div>
                                                            <span style=" margin-left: 0px;">BN</span>
                                                    </div>
                                                       <div class="pyramid-bottom">

                                                        <div class="pyramid-bottom-box">{{ $result['dn_single']}}</div>
                                                        <span style=" margin-left: 0px;">DN</span>
                                                    </div>
                                                    <div class="pyramid-label">


                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="25%">
                                    <table class="pyramid-container">
                                        <tr>
                                            <td class="pyramid-header">7th</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="pyramid">
                                                    <div class="pyramid-top" style="border: 2px solid #000000; width: 30px; margin-left: 60px;">
                                                        <span>{{ $result['pyramid_numbers'][1]}}</span>
                                                        <div class="pyramid-top-label">P2</div>
                                                    </div>
                                                    <div class="pyramid-bottom">
                                                        <div class="pyramid-bottom-box">{{ $result['bn_single'] }}</div>
                                                           <span style=" margin-left: 0px;">BN</span>
                                                    </div>
                                                        <div class="pyramid-bottom">
                                                        <div class="pyramid-bottom-box">{{ $result['dn_single'] }}</div>
                                                         <span style=" margin-right: 10px;">DN</span>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="25%">
                                    <table class="pyramid-container">
                                        <tr>
                                            <td class="pyramid-header">Last</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="pyramid">
                                                    <div class="pyramid-top" style="border: 2px solid #000000; width: 30px; margin-left: 60px;">
                                                        <span>{{ $result['pyramid_numbers'][2]}}</span>
                                                        <div class="pyramid-top-label">P3</div>
                                                    </div>
                                                     <div class="pyramid-bottom">
                                                        <div class="pyramid-bottom-box">{{ $result['bn_single'] }}</div>
                                                           <span style=" margin-left: 0px;">BN</span>
                                                    </div>
                                                        <div class="pyramid-bottom">
                                                        <div class="pyramid-bottom-box">{{ $result['dn_single'] }}</div>
                                                         <span style=" margin-right: 10px;">DN</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- attribute tables -->
            <h4 class="mt-4">Attributes of your BN, DN and Name Compounds </h4>
            <table class="attributes_tbl">
                <tr>
                    <td class="attribute-col">D.O.B - BN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['bn']] !!}</div></td>
                </tr>
                <tr>
                    <td class="attribute-col">D.O.B - DN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['dn']] !!}</div></td>
                </tr>
                <tr>
                    <td class="attribute-col">First Letter ({{ $result['first_letter'] }})</td>
                    <td class="description-col">
                        <div contenteditable>
                            @if($result['first_letter_attribute'] && $result['first_letter_attribute']['description'])
                                {!! $result['first_letter_attribute']['description'] !!}
                            @else
                                <em>No specific attributes available for letter "{{ $result['first_letter'] }}". Please consult with an administrator to add attributes for this letter.</em>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">First Name FN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['fn']] !!}</div></td>
                </tr>
                <tr>
                    <td class="attribute-col">Full Name NN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['nn']] !!}</div></td>
                </tr>
                <tr>
                    <td class="attribute-col">Inner Nature IN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['in']] !!}</div></td>
                </tr>
                <tr>
                    <td class="attribute-col">Outer Nature EN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['en']] !!}</div></td>
                </tr>
                <tr>
                    <td class="attribute-col">Core Nature PN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['pn']] !!}</div></td>
                </tr>
                <tr>
                    <td class="attribute-col">Habbit HN</td>
                    <td class="description-col"><div contenteditable>{!! $result['attrs'][$result['hn']] !!}</div></td>
                </tr>
            </table>

            <!-- professions table -->
            <h4 class="mt-4">Professions</h4>
            <table class="remedies-table remedies_tbl">
                <tr class="header-row">
                    <td class="header-cell" colspan="6">Professions</td>
                </tr>

                @php $counter = 1; @endphp

                <tr class="content-row">
                    <td class="content-cell number-cell">{{ $counter++ }}</td>
                    <td class="content-cell birth-node">Profession</td>
                    <td class="content-cell" colspan="4">{{ $result['profession'] }}</td>
                </tr>
            </table>

            <!-- Remedies table -->
            <h4 class="mt-4">Remedies</h4>
            <table class="remedies-table remedies_tbl">
                <tr class="header-row">
                    <td class="header-cell" colspan="6">REMEDIES</td>
                </tr>

                @php $counter = 1; @endphp

                <!-- Birth Number Remedies -->
                @if($result['bn_remedy'] && $result['bn_remedy']['bn'])
                <tr class="content-row">
                    <td class="content-cell number-cell">{{ $counter++ }}</td>
                    <td class="content-cell birth-node">BN: {{ $result['bn_single'] }}</td>
                    <td class="content-cell" colspan="4">{!! nl2br(e($result['bn_remedy']['bn'])) !!}</td>
                </tr>
                @endif

                <!-- Destiny Number Remedies -->
                @if($result['dn_remedy'] && $result['dn_remedy']['dn'])
                <tr class="content-row">
                    <td class="content-cell number-cell">{{ $counter++ }}</td>
                    <td class="content-cell birth-node">DN: {{ $result['dn_single'] }}</td>
                    <td class="content-cell" colspan="4">{!! nl2br(e($result['dn_remedy']['dn'])) !!}</td>
                </tr>
                @endif

                <!-- Name Number Remedies -->
                @if($result['nn_remedy'] && $result['nn_remedy']['nn'])
                <tr class="content-row">
                    <td class="content-cell number-cell">{{ $counter++ }}</td>
                    <td class="content-cell birth-node">NN: {{ $result['nn_single'] }}</td>
                    <td class="content-cell" colspan="4">{!! nl2br(e($result['nn_remedy']['nn'])) !!}</td>
                </tr>
                @endif

                <!-- No Remedies Available Message -->
                @if((!$result['bn_remedy'] || !$result['bn_remedy']['bn']) && (!$result['dn_remedy'] || !$result['dn_remedy']['dn']) && (!$result['nn_remedy'] || !$result['nn_remedy']['nn']))
                <tr class="content-row">
                    <td class="content-cell" colspan="6" style="text-align: center; padding: 30px; color: #666;">
                        <em>No specific remedies available for your calculated numbers. Please consult with an administrator to add remedies for Birth Number {{ $result['bn_single'] }}, Destiny Number {{ $result['dn_single'] }}, and Name Number {{ $result['nn_single'] }}.</em>
                    </td>
                </tr>
                @endif
            </table>
<div style="page-break-before: always;"></div>
            <!-- yantra charts -->
            <h4 class="mt-4">ENERGISING YANTRAS</h4>
            <div class="container">
                <div class="yantras-container yantra-section">
                    <!-- Left Yantra - Birthdate -->
                    <div class="yantra">
                        <div class="yantra-title">{{date('d-m-Y', strtotime($result['birth_date']))}}</div>

                        <table class="grid-table" border="1">
                            @foreach($result['birthdate_energiser'] as $row)
                                @if($loop->last)
                                <tr>
                                    <td><b>{{$row[0]}}</b></td>
                                    <td><b>{{$row[1]}}</b></td>
                                    <td><b>{{$row[2]}}</b></td>
                                    <td><b>{{$row[3]}}</b></td>
                                    <td><b>{{$row[4]}}</b></td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{$row[0]}}</td>
                                    <td>{{$row[1]}}</td>
                                    <td>{{$row[2]}}</td>
                                    <td>{{$row[3]}}</td>
                                    <td><b>{{$row[4]}}</b></td>
                                </tr>
                                @endif
                            @endforeach
                        </table>

                        <div class="energiser-title">Birthdate Energiser</div>
                    </div>

                    <!-- Right Yantra - Name -->
                    <div class="yantra">
                        <div class="yantra-title">{{ $result['full_name'] }}</div>

                        <table class="grid-table" border="1">
                            @foreach($result['name_energiser'] as $row)
                                @if($loop->last)
                                <tr>
                                    <td><b>{{$row[0]}}</b></td>
                                    <td><b>{{$row[1]}}</b></td>
                                    <td><b>{{$row[2]}}</b></td>
                                    <td><b>{{$row[3]}}</b></td>
                                    <td><b>{{$row[4]}}</b></td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{$row[0]}}</td>
                                    <td>{{$row[1]}}</td>
                                    <td>{{$row[2]}}</td>
                                    <td>{{$row[3]}}</td>
                                    <td><b>{{$row[4]}}</b></td>
                                </tr>
                                @endif
                            @endforeach
                        </table>

                        <div class="energiser-title">New Name Energiser</div>
                    </div>
                </div>
            </div>

            <div class="" style="margin-top: 20px;">
                <label for="" style="font-weight: bold; display: block; margin-bottom: 5px;">Note</label>
                <textarea class="form-control" name="note" id="" cols="5" rows="3" ></textarea>
            </div>
        </div>
    </div>
</body>
</html>
