<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Name Numerology Report</title>
    <style>
        body {
            font-family: sans-serif;
            color: #333;
            line-height: 1.4;
        }
        .numerology-chart {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        .date-header {
            background-color: #e0e0e0;
            border: 1px solid #000;
            padding: 8px;
            font-weight: bold;
            text-align: center;
        }
        .main-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #d6e9f8;
        }
        .main-table td {
            padding: 5px;
            vertical-align: middle;
        }
        .label-cell {
            width: 150px;
            font-weight: bold;
            text-align: right;
        }
        .input-cell {
            width: 200px;
            vertical-align: middle;
        }
        .input-field {
            width: 100%;
            height: 25px;
            border: 1px solid #000;
            background-color: #fff;
            text-align: center;
            font-weight: bold;
            box-sizing: border-box;
        }
        .cream-bg {
            background-color: #f5f5dc;
        }
        .result-text {
            width: 220px;
            padding-left: 20px !important;
        }
        .result-box-container {
            display: flex;
            margin-right: 10px;
            border: 0;
            width: auto;
            height: auto;
        }
        .result-label {
            width: 40px;
            background-color: #d6e9f8;
            border: 1px solid #000;
            text-align: center;
            padding: 5px 0;
            font-weight: bold;
            height: 30px;
            display: inline-block;
        }
        .result-value {
            width: 40px;
            background-color: #f5f5dc;
            border: 1px solid #000;
            text-align: center;
            padding: 5px 0;
            font-weight: bold;
            height: 30px;
            display: inline-block;
        }
        .natal-grid-container {
            margin: 20px auto;
        }
        .natal-grid {
            border-collapse: collapse;
            width: 150px;
        }
        .natal-header {
            background-color: #fff;
            text-align: center;
            border: 1px solid #000;
            padding: 5px;
            font-weight: bold;
        }
        .natal-cell {
            width: 50px;
            height: 50px;
            border: 1px solid #000;
            text-align: center;
            vertical-align: middle;
            background-color: #f5f5dc;
            font-weight: bold;
            position: relative;
        }
        .superscript {
            position: absolute;
            top: 2px;
            right: 4px;
            font-size: 10px;
        }
        .additional-info {
            font-style: italic;
            color: #555;
            padding-left: 10px;
        }
        .moon-sign {
            display: flex;
            margin-top: 10px;
        }
        .moon-label {
            width: 120px;
            background-color: #333;
            color: white;
            padding: 5px;
            font-weight: bold;
            border: 1px solid #000;
            text-align: center;
            margin-right: 10px;
        }
        .zodiac-section {
            margin-top: 20px;
        }
        .zodiac-table {
            border-collapse: collapse;
            width: 100%;
        }
        .zodiac-label {
            font-weight: bold;
            padding-right: 10px;
        }
        .zodiac-letter {
            width: 30px;
            height: 30px;
            border: 1px solid #000;
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }
        /* second table styles */
        .header-row {
            background-color: #e0e0e0;
        }
        .section-header {
            background-color: #d0e9c6;
            font-weight: bold;
            text-align: left;
            padding-left: 10px;
        }
        .letter-box {
            width: 30px;
            height: 30px;
            border: 1px solid #000;
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }
        .number-box {
            text-align: center;
            vertical-align: middle;
            width: 30px;
        }
        .highlight {
            background-color: #f8d7da;
        }
        .pyramid-container {
            width: 100%;
            border-collapse: collapse;
        }
        .pyramid-header {
            background-color: #e0e0e0;
            text-align: center;
            font-weight: bold;
            color: #0000ff;
        }
        .pyramid {
            position: relative;
            height: 110px;
            width: 100%;
        }
        .pyramid-row {
            text-align: center;
        }
        .pyramid-cell {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
        /* attributes table */
        .attributes_tbl {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .attributes_tbl caption {
            background-color: #ffe699;
            font-weight: bold;
            padding: 10px;
            font-size: 18px;
            border: 2px solid #000;
        }
        .attributes_tbl th,
        .attributes_tbl td {
            border: 2px solid #000;
            padding: 10px;
            vertical-align: top;
        }
        .attributes_tbl .attribute-col {
            width: 15%;
            background-color: #d6eaf8;
            font-weight: bold;
            text-align: center;
        }
        .attributes_tbl .description-col {
            width: 70%;
        }
        .attributes_tbl .note-col {
            width: 15%;
            background-color: #d6eaf8;
            text-align: center;
        }
        .attributes_tbl .golden-raj {
            color: #b22222;
            font-weight: bold;
        }
        /* remedies table */
        .remedies_tbl {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid black;
        }
        .remedies_tbl th {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .remedies_tbl td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .remedies_tbl .header-row {
            background-color: #ffdd88;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            border-bottom: 2px solid black;
        }
        .remedies_tbl .header-cell {
            padding: 10px;
        }
        .remedies_tbl .content-row {
            border-bottom: 1px solid #ddd;
        }
        .remedies_tbl .content-cell {
            padding: 15px;
            vertical-align: top;
        }
        .page-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .page-header h1 {
            color: #333;
            margin-bottom: 5px;
        }
        .page-header p {
            color: #666;
            margin-top: 0;
        }
        h4 {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #333;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Name Numerology Report</h1>
        <p>Generated on: {{ date('d-M-Y', time()) }}</p>
    </div>
    
    <div class="card result-card">
        <div class="card-header">
            <h2>Chaldean Numerology Results for: {{ $result['full_name'] }}</h2>
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
                                        
                                        <div class="zodiac-section">
                                            <table class="zodiac-table" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="zodiac-label">Zodiac Letters:</td>
                                                    @foreach ($result['zodiac_letters'] as $letter)
                                                        <td class="zodiac-letter">{{ $letter }}</td>
                                                    @endforeach
                                                </tr>
                                            </table>
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
                                            <td class="result-text">NN - Need Remedy 1</td>
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
                                            <td class="result-text">RajYog Remedies For : 4</td>
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
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Attributes tables -->
            <h4>Attributes of your BN, DN and Name Compounds</h4>
            <table class="attributes_tbl" border="2">
                <tr>
                    <td class="attribute-col">D.O.B - BN</td>
                    <td class="description-col">{!! $result['attrs'][$result['bn']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col"></td>
                </tr>
                <tr>
                    <td class="attribute-col">D.O.B - DN</td>
                    <td class="description-col">{!! $result['attrs'][$result['dn']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col"></td>
                </tr>
                <tr>
                    <td class="attribute-col">First Letter ({{ $result['first_letter'] }})</td>
                    <td class="description-col">
                        @if($result['first_letter_attribute'] && $result['first_letter_attribute']->description)
                            {!! $result['first_letter_attribute']->description !!}
                        @else
                            No specific attributes available for letter "{{ $result['first_letter'] }}".
                        @endif
                    </td>
                    <td class="note-col"></td>
                </tr>
                <tr>
                    <td class="attribute-col">First Name FN</td>
                    <td class="description-col">{!! $result['attrs'][$result['fn']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col"></td>
                </tr>
                <tr>
                    <td class="attribute-col">Full Name NN</td>
                    <td class="description-col">{!! $result['attrs'][$result['nn']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col"></td>
                </tr>
                <tr>
                    <td class="attribute-col">Inner Nature IN</td>
                    <td class="description-col">{!! $result['attrs'][$result['in']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col"></td>
                </tr>
                <tr>
                    <td class="attribute-col">Outer Nature EN</td>
                    <td class="description-col">{!! $result['attrs'][$result['en']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col"></td>
                </tr>
                <tr>
                    <td class="attribute-col">Core Nature PN</td>
                    <td class="description-col">{!! $result['attrs'][$result['pn']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col">
                        @if(isset($yog_labels) && isset($yog_labels['pn']) && count($yog_labels['pn']))
                            <span class="golden-raj">{{ implode(', ', $yog_labels['pn']) }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">Habit HN</td>
                    <td class="description-col">{!! $result['attrs'][$result['hn']] ?? 'No attributes available for this number.' !!}</td>
                    <td class="note-col"></td>
                </tr>
            </table>

            <!-- Remedies table -->
            <h4>Remedies</h4>
            <table class="remedies_tbl">
                <tr class="header-row">
                    <th>Remedy Type</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>Gemstone</td>
                    <td>Yellow Sapphire (Pukhraj) - Wear on Thursday morning during Jupiter hora</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>Yellow, Gold, Orange - Wear these colors on Thursdays</td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>Use numbers 3, 12, 21, 30 for important dates and decisions</td>
                </tr>
                <tr>
                    <td>Mantra</td>
                    <td>Om Gram Greem Graum Sah Guruve Namah - Chant 108 times daily</td>
                </tr>
                <tr>
                    <td>Donation</td>
                    <td>Donate yellow items, books, or sweets on Thursdays</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div style="text-align: center; margin-top: 30px; font-size: 12px;">
        <p>This report was generated on {{ date('d-m-Y', time()) }} at {{ date('H:i:s', time()) }}</p>
        <p>© {{ date('Y') }} SRK Numerology - All Rights Reserved</p>
    </div>
</body>
</html>
