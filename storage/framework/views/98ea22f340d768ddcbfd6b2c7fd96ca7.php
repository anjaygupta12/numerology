<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Name Numerology Report</title>

    <style>
        @page {
            margin: 80px 25px 60px 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        /* ===== Fixed Header / Footer for all PDF pages ===== */
        .header {
            position: fixed;
            top: -65px;
            left: 0;
            right: 0;
            height: 60px;
            text-align: center;
            padding: 5px 10px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .header .logo {
            height: 40px;
        }

        .header-title {
            font-size: 16px;
            font-weight: bold;
        }

        .header-info {
            font-size: 11px;
        }

        .footer {
            position: fixed;
            bottom: -45px;
            left: 0;
            right: 0;
            height: 40px;
            border-top: 1px solid #ccc;
            text-align: center;
            font-size: 10px;
            padding-top: 5px;
        }

        .page-number:before {
            content: "Page " counter(page);
        }

        /* ===== Your original styles (cleaned for PDF) ===== */

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
            width: 50%;
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
        }

        .result-label {
            width: 40px;
            background-color: #d6e9f8;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            height: 30px;
            text-align: center;
        }

        .result-value {
           width: 40px;
            background-color: #d6e9f8;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            height: 30px;
            text-align: center;
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
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 1px solid #000;
        }

        .zodiac-section {
            margin-top: 10px;
        }

        .zodiac-table {
            border-collapse: collapse;
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

        .chart-area {
            width: 100%;
            height: 200px;
            background-color: #f0f0f0;
            border: 1px solid #000;
            margin-top: 10px;
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

        .pyramid-top {
            font-weight: bold;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            border: 1px solid #000;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .pyramid-top-label {
            font-size: 10px;
            color: #0000ff;
        }

        .pyramid-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-around;
        }

        .pyramid-bottom-box {
            width: 40px;
            height: 40px;
            border: 1px solid #000;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: bold;

        }

        .pyramid-label {
            position: absolute;
            bottom: -20px;
            text-align: center;
            width: 100%;
        }

        .total-table {
            width: 100%;
            border-collapse: collapse;
        }

        .total-header {
            background-color: #e0e0e0;
            font-weight: bold;
            text-align: center;
        }

        .planes-header {
            background-color: #e0e0e0;
            font-weight: bold;
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

        .remedies_tbl .number-cell {
            text-align: right;
            width: 30px;
        }

        .remedies_tbl .birth-node {
            color: red;
            font-weight: bold;
            width: 80px;
        }

        .remedies_tbl .colon-cell {
            text-align: center;
            width: 20px;
        }

        .remedies_tbl .planet-cell {
            font-weight: bold;
            width: 100px;
        }

        .remedies_tbl .donation-section {
            padding-top: 15px;
        }

        .remedies_tbl ul {
            margin-top: 5px;
            margin-bottom: 5px;
            padding-left: 30px;
        }

        .remedies_tbl li {
            margin-bottom: 8px;
        }

        .yantra-section {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .yantra-section .container {
            width: 100%;
            margin: 20px auto;
            border: 2px solid black;
        }

        .yantra-section .header {
            background-color: #f9e79f;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            border-bottom: 2px solid black;
        }

        .yantra-section .yantras-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 40px 20px;
        }

        .yantra-section .yantra {
            width: 60%;
            min-width: 300px;
            margin: 10px;
            border: 2px dashed black;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .yantra-section .yantra-title {
            background-color: #f9e79f;
            padding: 8px 15px;
            margin-bottom: 15px;
            text-align: center;
            width: 50%;
        }

        .yantra-section .grid-table {
            border-collapse: collapse;
            width: 80%;
            margin-bottom: 15px;
        }

        .yantra-section .grid-table td {
            border: 1px solid black;
            padding: 12px;
            text-align: center;
            width: 50px;
            height: 30px;
            color: #4a86e8;
            font-weight: bold;
        }

        .yantra-section .sum-row td,
        .yantra-section .sum-col {
            background-color: transparent;
            border: none;
            color: #4a86e8;
            font-weight: bold;
        }

        .yantra-section .energiser-title {
            background-color: #d0e0c0;
            padding: 5px 10px;
            margin-top: 20px;
            text-align: center;
            width: 60%;
        }

        .yantra-section .footer {
            text-align: center;
            padding: 15px;
            font-size: 0.9em;
            margin-top: 20px;
        }

        h4 {
            margin-top: 15px;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

    <!-- Header for all pages -->
    <div class="header">
        <div class="header-content">
            <img src="<?php echo e(public_path('images/logo/pdflogo.jpg')); ?>" class="logo" alt="Company Logo">
            <div>
                <div class="header-title">Name Numerology Report</div>
                <div class="header-info">BY ASTRO NUMEROLOGIST <?php echo e(Auth::user()->name); ?></div>
                <div class="header-info">CREATED BY ASTRONUMERO QUEEN SADHNA GULATI</div>
            </div>
        </div>
    </div>

    <!-- Footer for all pages -->
    <div class="footer">
        <div class="page-number"></div>
        <div style="font-size: 10px; margin-top: 5px;">
            Confidential Report - Generated on <?php echo e(date('d-M-Y H:i')); ?>

        </div>
    </div>

    <main>
        <?php if(isset($result)): ?>
            <!-- FIRST TABLE -->
            <table class="numerology-chart" border="1" style="margin-top:60px;">
                <tr>
                    <td class="date-header" colspan="3"><?php echo e(date('d-M-y', time())); ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 0;">
                        <table class="main-table">
                            <tr>
                                <td class="label-cell">First Name :</td>
                                <td class="input-cell">
                                    <div class="input-field"><?php echo e($result['first_name']); ?></div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>

                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">FN</div>
                                                    <div class="result-value"><?php echo e($result['fn']); ?></div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                <?php if(isset($yog_labels) && isset($yog_labels['fn']) && count($yog_labels['fn'])): ?>
                                                    <?php echo e(implode(', ', $yog_labels['fn'])); ?>

                                                <?php endif; ?>
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
                                            <?php $__currentLoopData = $result['vedic_chart_array']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="natal-cell"><?php echo e($cell); ?></td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </table>

                                    <table border="1" width="100%" style="margin-top: 15px; border-collapse: collapse;">
                                        <tr>
                                            <td class="moon-label" style="
                                                background:#333;
                                                color:white;
                                                font-weight:bold;
                                                text-align:center;
                                                width:90%;
                                                padding:6px;
                                                border:1px solid #000;
                                            ">
                                                Zodiac Sign
                                            </td>

                                            <td style="
                                                background:#f5f5dc;
                                                font-weight:bold;
                                                text-align:center;
                                                width:50%;
                                                padding:6px;
                                                border:1px solid #000;
                                            ">
                                                <?php echo e($result['zodiac_sign']); ?>

                                            </td>
                                        </tr>
                                    </table>


                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Middle Name:</td>
                                <td class="input-cell">
                                    <div class="input-field"><?php echo e($result['middle_name']); ?></div>
                                </td>
                                <td>
                                    <table border="0"
                                        <tr>

                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">NN</div>
                                                    <div class="result-value"><?php echo e($result['nn']); ?></div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                <?php if(isset($yog_labels) && isset($yog_labels['nn']) && count($yog_labels['nn'])): ?>
                                                    <?php echo e(implode(', ', $yog_labels['nn'])); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Last Name:</td>
                                <td class="input-cell">
                                    <div class="input-field"><?php echo e($result['last_name']); ?></div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>

                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">IN</div>
                                                    <div class="result-value"><?php echo e($result['in']); ?></div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                <?php if(isset($yog_labels) && isset($yog_labels['in']) && count($yog_labels['in'])): ?>
                                                    <?php echo e(implode(', ', $yog_labels['in'])); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Birth Date :</td>
                                <td class="input-cell">
                                    <div class="input-field">
                                        <?php echo e(date('d-m-Y', strtotime($result['birth_date']))); ?></div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>

                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">EN</div>
                                                    <div class="result-value"><?php echo e($result['en']); ?></div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                <?php if(isset($yog_labels) && isset($yog_labels['en']) && count($yog_labels['en'])): ?>
                                                    <?php echo e(implode(', ', $yog_labels['en'])); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">First Letter :</td>
                                <td class="input-cell">
                                    <div class="input-field cream-bg"><?php echo e($result['first_name'][0] ?? ''); ?></div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>

                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">PN</div>
                                                    <div class="result-value"><?php echo e($result['pn']); ?></div>
                                                </div>
                                            </td>
                                            <td class="additional-info">
                                                <?php if(isset($yog_labels) && isset($yog_labels['pn']) && count($yog_labels['pn'])): ?>
                                                    <?php echo e(implode(', ', $yog_labels['pn'])); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">DOB - BN :</td>
                                <td class="input-cell">
                                    <div class="input-field cream-bg"><?php echo e($result['bn']); ?></div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>

                                            <td>
                                                <div class="result-box-container">
                                                    <div class="result-label">HN</div>
                                                    <div class="result-value"><?php echo e($result['hn']); ?></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">DOB - DN :</td>
                                <td class="input-cell">
                                    <div class="input-field cream-bg"><?php echo e($result['dn']); ?></div>
                                </td>

                            </tr>
                             <tr>
                                <td colspan="4">
                                    <div class="zodiac-section">
                                        <table class="zodiac-table" width="100%">
                                            <tr>
                                                <td class="zodiac-label">Zodiac Letters:</td>
                                                <?php $__currentLoopData = $result['zodiac_letters']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td class="zodiac-letter"><?php echo e($letter); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
              <div style="page-break-before: always; margin-top: 30px;"></div>

            <!-- Sounds Theory, Gridding and Pyramid -->
            <h4>Sounds Theory, Gridding and Pyramid</h4>
            <table class="main-table">
                <tr>
                    <td colspan="4">Good Sounds : <?php echo e(implode(', ', $result['good_sounds'])); ?></td>
                </tr>
                <tr>
                    <td colspan="4">Bad Sounds : <?php echo e(implode(', ', $result['bad_sounds'])); ?></td>
                </tr>
                <tr class="section-header">
                    <td colspan="4">Gridding :</td>
                </tr>

                <tr>
                    <td colspan="4" style="padding: 0;">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <!-- First Name Section -->
                            <tr>
                                <td colspan="4" class="section-header"
                                    style="background-color: #d0e9c6; font-weight: bold; padding: 5px;">
                                    First Name:</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="padding: 5px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <?php
                                                $firstName = strtoupper($result['first_name']);
                                                $firstNameLetters = str_split($firstName);
                                                $counter = 1;
                                            ?>
                                            <?php $__currentLoopData = $firstNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($index == 0): ?>
                                                    <td class="number-box"></td>
                                                <?php else: ?>
                                                    <td class="number-box"><?php echo e($counter); ?></td>
                                                    <?php
                                                        $counter++;
                                                        if ($counter > 9) {
                                                            $counter = 1;
                                                        }
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($i = count($firstNameLetters); $i < 12; $i++): ?>
                                                <td class="number-box"></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <tr>
                                            <?php
                                                $letterValues = [
                                                    'A' => 1,
                                                    'B' => 2,
                                                    'C' => 3,
                                                    'D' => 4,
                                                    'E' => 5,
                                                    'F' => 6,
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
                                                    'Z' => 7,
                                                ];
                                            ?>

                                            <?php $__currentLoopData = $firstNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td class="letter-box"
                                                    <?php if(in_array($letterValues[$letter] ?? null, $result['enemy_number_first_name'])): ?> style="background-color: pink" <?php endif; ?>>
                                                    <?php echo e($letter); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($i = count($firstNameLetters); $i < 12; $i++): ?>
                                                <td class="letter-box"></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <tr>
                                            <?php $__currentLoopData = $firstNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td class="number-box"><?php echo e($letterValues[$letter] ?? ''); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($i = count($firstNameLetters); $i < 12; $i++): ?>
                                                <td class="number-box"></td>
                                            <?php endfor; ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <?php if(!empty($result['middle_name'])): ?>
                                <tr>
                                    <td colspan="4" class="section-header"
                                        style="background-color: #d0e9c6; font-weight: bold; padding: 5px;">
                                        Middle Name:</td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="padding: 5px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <?php
                                                    $middleName = strtoupper($result['middle_name']);
                                                    $middleNameLetters = str_split($middleName);
                                                    $middleCounter = $counter;
                                                ?>
                                                <?php $__currentLoopData = $middleNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td class="number-box"><?php echo e($middleCounter); ?></td>
                                                    <?php
                                                        $middleCounter++;
                                                        if ($middleCounter > 9) {
                                                            $middleCounter = 1;
                                                        }
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php for($i = count($middleNameLetters); $i < 12; $i++): ?>
                                                    <td class="number-box"></td>
                                                <?php endfor; ?>
                                            </tr>
                                            <tr>
                                                <?php $__currentLoopData = $middleNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td class="letter-box"
                                                        <?php if(in_array($letterValues[$letter] ?? null, $result['enemy_number_last_name'])): ?> style="background-color: pink" <?php endif; ?>>
                                                        <?php echo e($letter); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php for($i = count($middleNameLetters); $i < 12; $i++): ?>
                                                    <td class="letter-box"></td>
                                                <?php endfor; ?>
                                            </tr>
                                            <tr>
                                                <?php $__currentLoopData = $middleNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td class="number-box"><?php echo e($letterValues[$letter] ?? ''); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php for($i = count($middleNameLetters); $i < 12; $i++): ?>
                                                    <td class="number-box"></td>
                                                <?php endfor; ?>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <!-- Last Name Section -->
                            <tr>
                                <td colspan="4" class="section-header"
                                    style="background-color: #d0e9c6; font-weight: bold; padding: 5px;">
                                    Last Name:</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="padding: 5px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <?php
                                                $lastName = strtoupper($result['last_name']);
                                                $lastNameLetters = str_split($lastName);
                                                $lastCounter = !empty($result['middle_name']) ? $middleCounter : $counter;
                                            ?>
                                            <?php $__currentLoopData = $lastNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td class="number-box"><?php echo e($lastCounter); ?></td>
                                                <?php
                                                    $lastCounter++;
                                                    if ($lastCounter > 9) {
                                                        $lastCounter = 1;
                                                    }
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($i = count($lastNameLetters); $i < 12; $i++): ?>
                                                <td class="number-box"></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <tr>
                                            <?php $__currentLoopData = $lastNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td class="letter-box"><?php echo e($letter); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($i = count($lastNameLetters); $i < 12; $i++): ?>
                                                <td class="letter-box"></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <tr>
                                            <?php $__currentLoopData = $lastNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td class="number-box"><?php echo e($letterValues[$letter] ?? ''); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($i = count($lastNameLetters); $i < 12; $i++): ?>
                                                <td class="number-box"></td>
                                            <?php endfor; ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Pyramids -->
<tr>
    <td colspan="4" style="padding: 0;">
        <table width="100%" cellpadding="4" cellspacing="0" border="0" style="table-layout: fixed;">
            <tr>
                <td class="section-header" width="15%">Pyramids :</td>

                <!-- Pyramid 1 -->
                <td width="28%">
                    <table width="100%" border="1" style="border-collapse: collapse; text-align:center;">
                        <tr>
                            <td class="pyramid-header">1st</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" style="margin-top:5px;">

                                    <!-- Top Number -->
                                    <tr>
                                        <td style="
                                            border:1px solid #000;
                                            width:40px;
                                            height:40px;
                                            background:#fff;
                                            font-weight:bold;
                                            text-align:center;
                                            margin:auto;
                                        ">
                                            <?php echo e($result['pyramid_numbers'][0]); ?>

                                            <div style="font-size:10px; color:#0000ff;">P1</div>
                                        </td>
                                    </tr>

                                    <!-- Bottom numbers -->
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" style="margin-top:10px;">
                                                <tr>
                                                    <td style="
                                                        border:1px solid #000;
                                                        width:40px;
                                                        height:40px;
                                                        background:#f5f5dc;
                                                        font-weight:bold;
                                                        text-align:center;
                                                    ">
                                                        <?php echo e($result['bn_single']); ?>

                                                    </td>
                                                    <td style="
                                                        border:1px solid #000;
                                                        width:40px;
                                                        height:40px;
                                                        background:#f5f5dc;
                                                        font-weight:bold;
                                                        text-align:center;
                                                    ">
                                                        <?php echo e($result['dn_single']); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:center; font-size:12px;">BN</td>
                                                    <td style="text-align:center; font-size:12px;">DN</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- Pyramid 2 -->
                <td width="28%">
                    <table width="100%" border="1" style="border-collapse: collapse; text-align:center;">
                        <tr>
                            <td class="pyramid-header">7th</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" style="margin-top:5px;">

                                    <!-- Top Number -->
                                    <tr>
                                        <td style="
                                            border:1px solid #000;
                                            width:40px;
                                            height:40px;
                                            background:#fff;
                                            font-weight:bold;
                                            text-align:center;
                                        ">
                                            <?php echo e($result['pyramid_numbers'][1]); ?>

                                            <div style="font-size:10px; color:#0000ff;">P2</div>
                                        </td>
                                    </tr>

                                    <!-- Bottom numbers -->
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" style="margin-top:10px;">
                                                <tr>
                                                    <td style="
                                                        border:1px solid #000;
                                                        width:40px;
                                                        height:40px;
                                                        background:#f5f5dc;
                                                        font-weight:bold;
                                                        text-align:center;
                                                    ">
                                                        <?php echo e($result['bn_single']); ?>

                                                    </td>
                                                    <td style="
                                                        border:1px solid #000;
                                                        width:40px;
                                                        height:40px;
                                                        background:#f5f5dc;
                                                        font-weight:bold;
                                                        text-align:center;
                                                    ">
                                                        <?php echo e($result['dn_single']); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:center; font-size:12px;">BN</td>
                                                    <td style="text-align:center; font-size:12px;">DN</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- Pyramid 3 -->
                <td width="28%">
                    <table width="100%" border="1" style="border-collapse: collapse; text-align:center;">
                        <tr>
                            <td class="pyramid-header">Last</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" style="margin-top:5px;">

                                    <!-- Top Number -->
                                    <tr>
                                        <td style="
                                            border:1px solid #000;
                                            width:40px;
                                            height:40px;
                                            background:#fff;
                                            font-weight:bold;
                                            text-align:center;
                                        ">
                                            <?php echo e($result['pyramid_numbers'][2]); ?>

                                            <div style="font-size:10px; color:#0000ff;">P3</div>
                                        </td>
                                    </tr>

                                    <!-- Bottom numbers -->
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" style="margin-top:10px;">
                                                <tr>
                                                    <td style="
                                                        border:1px solid #000;
                                                        width:40px;
                                                        height:40px;
                                                        background:#f5f5dc;
                                                        font-weight:bold;
                                                        text-align:center;
                                                    ">
                                                        <?php echo e($result['bn_single']); ?>

                                                    </td>
                                                    <td style="
                                                        border:1px solid #000;
                                                        width:40px;
                                                        height:40px;
                                                        background:#f5f5dc;
                                                        font-weight:bold;
                                                        text-align:center;
                                                    ">
                                                        <?php echo e($result['dn_single']); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:center; font-size:12px;">BN</td>
                                                    <td style="text-align:center; font-size:12px;">DN</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>
        </table>
    </td>
</tr>

            </table>
              <div style="page-break-before: always; margin-top: 30px;"></div>
            <!-- Attributes -->
            <h4>Attributes of your BN, DN and Name Compounds</h4>
            <table class="attributes_tbl">
                <tr>
                    <td class="attribute-col">D.O.B - BN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['bn']] ?? ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">D.O.B - DN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['dn']] ?? ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">First Letter (<?php echo e($result['first_letter']); ?>)</td>
                    <td class="description-col">
                        <div>
                            <?php if($result['first_letter_attribute'] && $result['first_letter_attribute']['description']): ?>
                                <?php echo $result['first_letter_attribute']['description']; ?>

                            <?php else: ?>
                                <em>No specific attributes available for letter
                                    "<?php echo e($result['first_letter']); ?>".</em>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">First Name FN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['fn']] ?? ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">Full Name NN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['nn']] ?? ''; ?></div>
                    </td>
                </tr>
            </table>
            <div style="page-break-before: always;"></div>
             <table class="attributes_tbl" style="margin-top: 60px;">
                <tr >
                    <td class="attribute-col">Inner Nature IN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['in']] ?? ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">Outer Nature EN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['en']] ?? ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">Core Nature PN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['pn']] ?? ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="attribute-col">Habbit HN</td>
                    <td class="description-col">
                        <div><?php echo $result['attrs'][$result['hn']] ?? ''; ?></div>
                    </td>
                </tr>
            </table>
  <div style="page-break-before: always; margin-top: 20px;"></div>
            <!-- Professions -->
            <h4>Professions</h4>
            <table class="remedies_tbl">
                <tr class="header-row">
                    <td class="header-cell" colspan="6">Professions</td>
                </tr>
                <tr class="content-row">
                    <td class="content-cell number-cell">1</td>
                    <td class="content-cell birth-node">Profession</td>
                    <td class="content-cell" colspan="4"><?php echo e($result['profession']); ?></td>
                </tr>
            </table>

            <!-- Remedies -->
            <h4>Remedies</h4>
            <table class="remedies_tbl">
                <tr class="header-row">
                    <td class="header-cell" colspan="6">REMEDIES</td>
                </tr>

                <?php $counter = 1; ?>

                <?php if(!empty($result['bn_remedy']) && !empty($result['bn_remedy']['bn'] ?? $result['bn_remedy']->bn ?? null)): ?>
                    <tr class="content-row">
                        <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                        <td class="content-cell birth-node">BN: <?php echo e($result['bn_single']); ?></td>
                        <td class="content-cell" colspan="4">
                            <?php echo nl2br(e(is_array($result['bn_remedy']) ? $result['bn_remedy']['bn'] : $result['bn_remedy']->bn)); ?>

                        </td>
                    </tr>
                <?php endif; ?>

                <?php if(!empty($result['dn_remedy']) && !empty($result['dn_remedy']['dn'] ?? $result['dn_remedy']->dn ?? null)): ?>
                    <tr class="content-row">
                        <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                        <td class="content-cell birth-node">DN: <?php echo e($result['dn_single']); ?></td>
                        <td class="content-cell" colspan="4">
                            <?php echo nl2br(e(is_array($result['dn_remedy']) ? $result['dn_remedy']['dn'] : $result['dn_remedy']->dn)); ?>

                        </td>
                    </tr>
                <?php endif; ?>

                <?php if(!empty($result['nn_remedy']) && !empty($result['nn_remedy']['nn'] ?? $result['nn_remedy']->nn ?? null)): ?>
                    <tr class="content-row">
                        <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                        <td class="content-cell birth-node">NN: <?php echo e($result['nn_single']); ?></td>
                        <td class="content-cell" colspan="4">
                            <?php echo nl2br(e(is_array($result['nn_remedy']) ? $result['nn_remedy']['nn'] : $result['nn_remedy']->nn)); ?>

                        </td>
                    </tr>
                <?php endif; ?>

                <?php if(
                    (empty($result['bn_remedy']) || empty($result['bn_remedy']['bn'] ?? $result['bn_remedy']->bn ?? null)) &&
                        (empty($result['dn_remedy']) || empty($result['dn_remedy']['dn'] ?? $result['dn_remedy']->dn ?? null)) &&
                        (empty($result['nn_remedy']) || empty($result['nn_remedy']['nn'] ?? $result['nn_remedy']->nn ?? null))): ?>
                    <tr class="content-row">
                        <td class="content-cell" colspan="6" style="text-align: center; padding: 30px; color: #666;">
                            <em>No specific remedies available for your calculated numbers.</em>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
  <div style="page-break-before: always;"></div>
            <!-- Yantras -->
            <h4>ENERGISING YANTRAS</h4>
            <div class="yantra-section">
                <div class="container">
                    <div class="yantras-container">
                        <!-- Birthdate Yantra -->
                        <div class="yantra">
                            <div class="yantra-title"><?php echo e(date('d-m-Y', strtotime($result['birth_date']))); ?></div>
                            <table class="grid-table" border="1">
                                <?php $__currentLoopData = $result['birthdate_energiser']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->last): ?>
                                        <tr>
                                            <td><b><?php echo e($row[0]); ?></b></td>
                                            <td><b><?php echo e($row[1]); ?></b></td>
                                            <td><b><?php echo e($row[2]); ?></b></td>
                                            <td><b><?php echo e($row[3]); ?></b></td>
                                            <td><b><?php echo e($row[4]); ?></b></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td><?php echo e($row[0]); ?></td>
                                            <td><?php echo e($row[1]); ?></td>
                                            <td><?php echo e($row[2]); ?></td>
                                            <td><?php echo e($row[3]); ?></td>
                                            <td><b><?php echo e($row[4]); ?></b></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <div class="energiser-title">Birthdate Energiser</div>
                        </div>

                        <!-- Name Yantra -->
                        <div class="yantra">
                            <div class="yantra-title"><?php echo e($result['full_name']); ?></div>
                            <table class="grid-table" border="1">
                                <?php $__currentLoopData = $result['name_energiser']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->last): ?>
                                        <tr>
                                            <td><b><?php echo e($row[0]); ?></b></td>
                                            <td><b><?php echo e($row[1]); ?></b></td>
                                            <td><b><?php echo e($row[2]); ?></b></td>
                                            <td><b><?php echo e($row[3]); ?></b></td>
                                            <td><b><?php echo e($row[4]); ?></b></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td><?php echo e($row[0]); ?></td>
                                            <td><?php echo e($row[1]); ?></td>
                                            <td><?php echo e($row[2]); ?></td>
                                            <td><?php echo e($row[3]); ?></td>
                                            <td><b><?php echo e($row[4]); ?></b></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <div class="energiser-title">New Name Energiser</div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="page-break-before: always;"></div>
            <div style="margin-top: 40px;">
                <strong>Note:</strong>
                <div style="border:1px solid #ccc; padding:8px; min-height:40px;">
                    <?php echo e($result['note'] ?? ''); ?>

                </div>
            </div>

        <?php endif; ?>
    </main>
</body>

</html>
<?php /**PATH C:\laragon\www\numerology\resources\views/user/numerology/pdf/name_numerology_report.blade.php ENDPATH**/ ?>