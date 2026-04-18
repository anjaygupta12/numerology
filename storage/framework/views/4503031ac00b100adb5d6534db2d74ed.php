<?php $__env->startSection('content'); ?>
    <style>
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
        }

        .result-value {
            width: 40px;
            background-color: #f5f5dc;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            height: 30px;
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
            margin-top: 20px;
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
            /* Light gray */
        }

        .section-header {
            background-color: #d0e9c6;
            /* Light green */
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
            /* Light pink */
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
            /* Blue text */
        }

        .pyramid {
            position: relative;
            height: 110px;
            width: 100%;
        }

        .pyramid-top {
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
            font-family: Arial, sans-serif;
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
            width: 45%;
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

        .nav-pills .nav-link.active{
            background-color:var(--success-color);
        }
        .nav-pills .nav-link{
            color:var(--primary-color);
        }
    </style>

    <div class="content-wrapper">
        <div class="content-header">
            <h4 class="content-title"><i class="fas fa-signature me-2"></i>Numerology Application</h4>
            <span>Discover the hidden meaning behind your name</span>
        </div>
        <div class="content-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <div class="alert alert-info">
                <p><strong>Numerology Application</strong> helps you understand the vibrations associated with your name and how
                    they influence your personality, relationships, and life path.</p>
            </div>

            <form action="<?php echo e(route('user.numerology.numapp.calculate')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="first_name"
                            name="first_name" value="<?php echo e(old('first_name', $result['first_name'] ?? '')); ?>" required>
                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">Middle Name (2nd part)</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="middle_name" name="middle_name"
                            value="<?php echo e(old('middle_name', $result['middle_name'] ?? '')); ?>">
                        <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last Name (3rd part)</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="last_name"
                            name="last_name" value="<?php echo e(old('last_name', $result['last_name'] ?? '')); ?>">
                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Select Gender</option>
                        <?php
                            $genders = ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'];
                            $selectedGender = old('gender', $result['gender'] ?? '');
                        ?>

                        <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>" <?php echo e($selectedGender === $value ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input type="date" class="form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="birth_date"
                        name="birth_date" value="<?php echo e(old('birth_date', $result['birth_date'] ?? '')); ?>" required>
                    <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="d-grid gap-2 mb-4">
                    <button type="submit" class="btn btn-primary">Calculate Name Numerology</button>
                </div>
                <?php if(!empty($result)): ?>
            </form>
               <!-- In your blade view -->
                <form action="<?php echo e(route('user.numerology.download.pdf')); ?>" method="GET" class="d-inline">
                    <input type="hidden" name="numerology_data" value="<?php echo e(json_encode($result)); ?>">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-file-pdf me-2"></i> Download PDF Report
                    </button>
                </form>
                    </div>
                </div>
            <!-- create row for name numerology -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Numerology Analysis</h5>

                            <!-- Vertical Tabs -->
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Tab Navigation -->
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link text-start active" id="v-pills-bn-dn-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bn-dn" type="button" role="tab" aria-controls="v-pills-bn-dn" aria-selected="true">
                                            <i class="fas fa-star me-2"></i>BN, DN Predictions
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-dob-yogas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dob-yogas" type="button" role="tab" aria-controls="v-pills-dob-yogas" aria-selected="false">
                                            <i class="fas fa-calendar-alt me-2"></i>DOB Yogas Predictions
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-md-yogas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-md-yogas" type="button" role="tab" aria-controls="v-pills-md-yogas" aria-selected="false">
                                            <i class="fas fa-moon me-2"></i>MD Yogas Predictions
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-ad-yogas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ad-yogas" type="button" role="tab" aria-controls="v-pills-ad-yogas" aria-selected="false">
                                            <i class="fas fa-sun me-2"></i>AD Yogas Predictions
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-pd-yogas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pd-yogas" type="button" role="tab" aria-controls="v-pills-pd-yogas" aria-selected="false">
                                            <i class="fas fa-gem me-2"></i>PD Yogas Predictions
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-lifetime-remedy-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lifetime-remedy" type="button" role="tab" aria-controls="v-pills-lifetime-remedy" aria-selected="false">
                                            <i class="fas fa-heart me-2"></i>Lifetime Remedy
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-dasha-remedy-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dasha-remedy" type="button" role="tab" aria-controls="v-pills-dasha-remedy" aria-selected="false">
                                            <i class="fas fa-clock me-2"></i>Dasha Remedy MD, AD, PD
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-yantras-tab" data-bs-toggle="pill" data-bs-target="#v-pills-yantras" type="button" role="tab" aria-controls="v-pills-yantras" aria-selected="false">
                                            <i class="fas fa-dharmachakra me-2"></i>Yantras BN, DN
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-lucky-elements-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lucky-elements" type="button" role="tab" aria-controls="v-pills-lucky-elements" aria-selected="false">
                                            <i class="fas fa-dice me-2"></i>Lucky Elements
                                        </button>
                                        <button class="nav-link text-start" id="v-pills-spell-jar-tab" data-bs-toggle="pill" data-bs-target="#v-pills-spell-jar" type="button" role="tab" aria-controls="v-pills-spell-jar" aria-selected="false">
                                            <i class="fas fa-magic me-2"></i>Spell Jar Remedy
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <!-- Tab Content -->
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <!-- BN, DN Predictions -->
                                        <div class="tab-pane fade show active" id="v-pills-bn-dn" role="tabpanel" aria-labelledby="v-pills-bn-dn-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-star me-2"></i>BN, DN Predictions</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table class="attributes_tbl">
                                                        <tr>
                                                            <td class="attribute-col">D.O.B - BN <br> (<?php echo e($result['bn']); ?>)</td>
                                                            <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['bn']]; ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="attribute-col">D.O.B - DN <br> (<?php echo e($result['dn']); ?>)</td>
                                                            <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['dn']]; ?></div></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- DOB Yogas Predictions -->
                                        <div class="tab-pane fade" id="v-pills-dob-yogas" role="tabpanel" aria-labelledby="v-pills-dob-yogas-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>DOB Yogas Predictions</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered border-dark text-center">
                                                        <?php $dob_chart =  $result['dob_chart']  ; ?>
                                                        <tr>
                                                            <td><?php echo e($dob_chart[0][0] ? $dob_chart[0][0] : '0'); ?></td>
                                                            <td><?php echo e($dob_chart[0][1] ? $dob_chart[0][1] : '0'); ?></td>
                                                            <td><?php echo e($dob_chart[0][2] ? $dob_chart[0][2] : '0'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($dob_chart[1][0] ? $dob_chart[1][0] : '0'); ?></td>
                                                            <td><?php echo e($dob_chart[1][1] ? $dob_chart[1][1] : '0'); ?></td>
                                                            <td><?php echo e($dob_chart[1][2] ? $dob_chart[1][2] : '0'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($dob_chart[2][0] ? $dob_chart[2][0] : '0'); ?></td>
                                                            <td><?php echo e($dob_chart[2][1] ? $dob_chart[2][1] : '0'); ?></td>
                                                            <td><?php echo e($dob_chart[2][2] ? $dob_chart[2][2] : '0'); ?></td>
                                                        </tr>
                                                    </table>
                                                    <h4 class="mt-5">DOB Yogas Predictions</h4>

                                                    <div class="card">
                                                        <div class="card-header bg-primary text-white">
                                                            DOB Number <?php echo $result['bn_single']; ?> - <?php echo $result['dob_yogas_prediction']['yoga']; ?>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered table-hover">
                                                                <tbody>
                                                                    <tr>
                                                                        <th style="width:25%;">Yoga</th>
                                                                        <td><?php echo $result['dob_yogas_prediction']['yoga']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Prediction</th>
                                                                        <td><?php echo $result['dob_yogas_prediction']['prediction']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Remedy</th>
                                                                        <td><?php echo $result['dob_yogas_prediction']['remedy']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="card">
                                                        <div class="card-header bg-primary text-white">
                                                            DOB Yogas Combinations Prediction
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered table-hover">
                                                                <tbody>
                                                           <?php $__currentLoopData = $result['yoga_com_preduction']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comb => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <th style="width:25%;"><?php echo e($comb); ?></th>
                                                                        <td><?php echo $val; ?></td>
                                                                    </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- MD Yogas Predictions -->
                                        <div class="tab-pane fade" id="v-pills-md-yogas" role="tabpanel" aria-labelledby="v-pills-md-yogas-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-moon me-2"></i>MD Yogas Predictions</h6>
                                                </div>
                                                <div class="card-body">

                                                     <table class="table table-bordered border-dark text-center">

                                                        <?php $md_chart = explode(',', $result['md_chart']); ?>
                                                        <tr>
                                                            <td><?php echo e($md_chart[0]); ?></td>
                                                            <td><?php echo e($md_chart[1]); ?></td>
                                                            <td><?php echo e($md_chart[2]); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($md_chart[3]); ?></td>
                                                            <td><?php echo e($md_chart[4]); ?></td>
                                                            <td><?php echo e($md_chart[5]); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($md_chart[6]); ?></td>
                                                            <td><?php echo e($md_chart[7]); ?></td>
                                                            <td><?php echo e($md_chart[8]); ?></td>
                                                        </tr>
                                                     </table>

                                                     <h4 class="mt-5">MD Yogas Predictions</h4>
                                                    <ul>
                                                        <?php $__currentLoopData = $result['md_yoga_com_preduction']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preduction=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                          <strong><?php echo e($preduction); ?> Yoga:</strong>
                                                          <ul>
                                                           <?php echo $val; ?>

                                                          </ul>
                                                        </li>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                      </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- AD Yogas Predictions -->
                                        <div class="tab-pane fade" id="v-pills-ad-yogas" role="tabpanel" aria-labelledby="v-pills-ad-yogas-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-sun me-2"></i>AD Yogas Predictions</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-primary">
                                                        
                                                        <table class="table">
                                                            <tr>
                                                                <td width="80%">From Date</td>
                                                                <td width="20%"><?php echo e($result['ad_chart']['from_date']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>To Date</td>
                                                                <td><?php echo e($result['ad_chart']['to_date']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dasha</td>
                                                                <td><?php echo e($result['ad_chart']['dasha']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antardasha</td>
                                                                <td><?php echo e($result['ad_chart']['antardasha']); ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <table class="table table-bordered border-dark text-center">
                                                        <?php $ad_chart = explode(',', $result['ad_chart_data']); ?>
                                                        <tr>
                                                            <td><?php echo e($ad_chart[0]); ?></td>
                                                            <td><?php echo e($ad_chart[1]); ?></td>
                                                            <td><?php echo e($ad_chart[2]); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($ad_chart[3]); ?></td>
                                                            <td><?php echo e($ad_chart[4]); ?></td>
                                                            <td><?php echo e($ad_chart[5]); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($ad_chart[6]); ?></td>
                                                            <td><?php echo e($ad_chart[7]); ?></td>
                                                            <td><?php echo e($ad_chart[8]); ?></td>
                                                        </tr>
                                                     </table>
                                                      <h4 class="mt-5">AD Predictions</h4>

                                                    <ul>
                                                          <?php $__currentLoopData = $result['ad_preduction']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preduction=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                          <strong><?php echo e($preduction); ?> AD :</strong>
                                                          <ul>
                                                           <?php echo $val; ?>

                                                          </ul>
                                                        </li>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </ul>

                                                    <h4 class="mt-5">AD Yogas Predictions</h4>

                                                    <ul>
                                                          <?php $__currentLoopData = $result['ad_yoga_com_preduction']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preduction=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                          <strong><?php echo e($preduction); ?> Yoga :</strong>
                                                          <ul>
                                                           <?php echo $val; ?>

                                                          </ul>
                                                        </li>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PD Yogas Predictions -->
                                        <div class="tab-pane fade" id="v-pills-pd-yogas" role="tabpanel" aria-labelledby="v-pills-pd-yogas-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-gem me-2"></i>PD Yogas Predictions</h6>
                                                </div>
                                                <div class="card-body">

                                                    <div class="alert alert-primary">
                                                        
                                                        <table class="table">
                                                            <tr>
                                                                <td width="80%">From Date</td>
                                                                <td width="20%"><?php echo e($result['pd_chart']['from_date']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">To Date</td>
                                                                <td width="20%"><?php echo e($result['pd_chart']['to_date']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">Dasha</td>
                                                                <td width="20%"><?php echo e($result['pd_chart']['dasha']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">Antardasha</td>
                                                                <td width="20%"><?php echo e($result['pd_chart']['antardasha']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">Pratyantardasha</td>
                                                                <td width="20%"><?php echo e($result['pd_chart']['pratyantardasha']); ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    <table class="table table-bordered border-dark text-center">
                                                        <?php $pd_chart = explode(',', $result['pd_chart']['data']); ?>
                                                        <tr>
                                                            <td><?php echo e($pd_chart[0]); ?></td>
                                                            <td><?php echo e($pd_chart[1]); ?></td>
                                                            <td><?php echo e($pd_chart[2]); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($pd_chart[3]); ?></td>
                                                            <td><?php echo e($pd_chart[4]); ?></td>
                                                            <td><?php echo e($pd_chart[5]); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($pd_chart[6]); ?></td>
                                                            <td><?php echo e($pd_chart[7]); ?></td>
                                                            <td><?php echo e($pd_chart[8]); ?></td>
                                                        </tr>
                                                     </table>


                                                    <h4 class="mt-5">PD Yogas Predictions</h4>

                                                    <ul>
                                                        <li>
                                                          <strong>1-9 Yoga:</strong> (e.g., Day = 1, Life Path = 9)
                                                          <ul>
                                                            <li>A strong leader with universal goals.</li>
                                                            <li>Often seen in visionaries, reformers, or spiritual leaders.</li>
                                                            <li>However, can struggle with isolation or pressure.</li>
                                                          </ul>
                                                        </li>
                                                        <li>
                                                          <strong>2-7 Yoga:</strong> (e.g., Day = 2, Life Path = 7)
                                                          <ul>
                                                            <li>A deeply intuitive and spiritual combination.</li>
                                                            <li>Can lead to psychic sensitivity or a solitary life.</li>
                                                            <li>Great for healers, artists, mystics.</li>
                                                          </ul>
                                                        </li>
                                                        <li>
                                                          <strong>3-6 Yoga:</strong> (e.g., Day = 3, Life Path = 6)
                                                          <ul>
                                                            <li>Strong creative and family-centered energy.</li>
                                                            <li>Often leads to careers in art, beauty, or teaching.</li>
                                                            <li>But must balance self-expression and responsibility.</li>
                                                          </ul>
                                                        </li>
                                                        <li>
                                                          <strong>4-8 Yoga:</strong> (Karmic or Saturnian Yoga)
                                                          <ul>
                                                            <li>A tough karma combination.</li>
                                                            <li>Hardworking but may face delays or repeated tests.</li>
                                                            <li>When balanced, these people become masters of endurance and success through effort.</li>
                                                          </ul>
                                                        </li>
                                                        <li>
                                                          <strong>7-9 Yoga:</strong> (Spiritual Destiny Yoga)
                                                          <ul>
                                                            <li>Meant for greater purpose or service to humanity.</li>
                                                            <li>Often involved in spiritual leadership, writing, or global missions.</li>
                                                            <li>Can be misunderstood or feel disconnected from society.</li>
                                                          </ul>
                                                        </li>
                                                      </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lifetime Remedy -->
                                        <div class="tab-pane fade" id="v-pills-lifetime-remedy" role="tabpanel" aria-labelledby="v-pills-lifetime-remedy-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-heart me-2"></i>Lifetime Remedy</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table class="remedies-table remedies_tbl">
                                                        <tr class="header-row">
                                                            <td class="header-cell" colspan="6">REMEDIES</td>
                                                        </tr>

                                                        <?php $counter = 1; ?>

                                                        <!-- Birth Number Remedies -->
                                                        <?php if($result['bn_remedy'] && $result['bn_remedy']->bn): ?>
                                                        <tr class="content-row">
                                                            <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                                                            <td class="content-cell birth-node">BN: <?php echo e($result['bn_single']); ?></td>
                                                            <td class="content-cell" colspan="4"><?php echo nl2br(e($result['bn_remedy']->bn)); ?></td>
                                                        </tr>
                                                        <?php endif; ?>

                                                        <!-- Destiny Number Remedies -->
                                                        <?php if($result['dn_remedy'] && $result['dn_remedy']->dn): ?>
                                                        <tr class="content-row">
                                                            <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                                                            <td class="content-cell birth-node">DN: <?php echo e($result['dn_single']); ?></td>
                                                            <td class="content-cell" colspan="4"><?php echo nl2br(e($result['dn_remedy']->dn)); ?></td>
                                                        </tr>
                                                        <?php endif; ?>



                                                        <!-- No Remedies Available Message -->
                                                        <?php if((!$result['bn_remedy'] || !$result['bn_remedy']->bn) && (!$result['dn_remedy'] || !$result['dn_remedy']->dn) && (!$result['nn_remedy'] || !$result['nn_remedy']->nn)): ?>
                                                        <tr class="content-row">
                                                            <td class="content-cell" colspan="6" style="text-align: center; padding: 30px; color: #666;">
                                                                <em>No specific remedies available for your calculated numbers. Please consult with an administrator to add remedies for Birth Number <?php echo e($result['bn_single']); ?>, Destiny Number <?php echo e($result['dn_single']); ?>, and Name Number <?php echo e($result['nn_single']); ?>.</em>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Dasha Remedy MD, AD, PD -->
                                        <div class="tab-pane fade" id="v-pills-dasha-remedy" role="tabpanel" aria-labelledby="v-pills-dasha-remedy-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-clock me-2"></i>Dasha Remedy MD, AD, PD</h6>
                                                </div>
                                                <div class="card-body">
                                                    <h4>Mahadasha (MD) - Dasha Remedy</h4>
                                                    <table class="table table-bordered table-striped table-hover align-middle">
                                                        <tbody>
                                                            <tr><th style="width: 20%;">Planet</th><td><?php echo $result['dr_md']['planet']; ?></td></tr>
                                                            <tr><th>Gemstone</th><td><?php echo $result['dr_md']['gemstone']; ?></td></tr>
                                                            <tr><th>Color</th><td><?php echo $result['dr_md']['color']; ?></td></tr>
                                                            <tr><th>Day</th><td><?php echo $result['dr_md']['day']; ?></td></tr>
                                                            <tr><th>Donation</th><td><?php echo $result['dr_md']['donation']; ?></td></tr>
                                                            <tr><th>Mantra</th><td><em><?php echo $result['dr_md']['mantra']; ?></em></td></tr>
                                                            <tr><th>Remedy</th><td><?php echo $result['dr_md']['remedy']; ?></td></tr>
                                                        </tbody>
                                                    </table>

                                                    <h4 class="mt-5">Antardasha (AD) - Dasha Remedy</h4>
                                                    <table class="table table-bordered table-striped table-hover align-middle">
                                                        <tbody>
                                                            <tr><th style="width: 20%;">Planet</th><td><?php echo $result['dr_ad']['planet']; ?></td></tr>
                                                            <tr><th>Gemstone</th><td><?php echo $result['dr_ad']['gemstone']; ?></td></tr>
                                                            <tr><th>Color</th><td><?php echo $result['dr_ad']['color']; ?></td></tr>
                                                            <tr><th>Day</th><td><?php echo $result['dr_ad']['day']; ?></td></tr>
                                                            <tr><th>Donation</th><td><?php echo $result['dr_ad']['donation']; ?></td></tr>
                                                            <tr><th>Mantra</th><td><em><?php echo $result['dr_ad']['mantra']; ?></em></td></tr>
                                                            <tr><th>Remedy</th><td><?php echo $result['dr_ad']['remedy']; ?></td></tr>
                                                        </tbody>
                                                    </table>

                                                    <h4 class="mt-5">Pratyantardasha (PD) - Dasha Remedy</h4>
                                                    <table class="table table-bordered table-striped table-hover align-middle">
                                                        <tbody>
                                                            <tr><th style="width: 20%;">Planet</th><td><?php echo $result['dr_pd']['planet']; ?></td></tr>
                                                            <tr><th>Gemstone</th><td><?php echo $result['dr_pd']['gemstone']; ?></td></tr>
                                                            <tr><th>Color</th><td><?php echo $result['dr_pd']['color']; ?></td></tr>
                                                            <tr><th>Day</th><td><?php echo $result['dr_pd']['day']; ?></td></tr>
                                                            <tr><th>Donation</th><td><?php echo $result['dr_pd']['donation']; ?></td></tr>
                                                            <tr><th>Mantra</th><td><em><?php echo $result['dr_pd']['mantra']; ?></em></td></tr>
                                                            <tr><th>Remedy</th><td><?php echo $result['dr_pd']['remedy']; ?></td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Yantras BN, DN -->
                                        <div class="tab-pane fade" id="v-pills-yantras" role="tabpanel" aria-labelledby="v-pills-yantras-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-dharmachakra me-2"></i>Yantras BN, DN</h6>
                                                </div>
                                                <div class="card-body">

                                                    <!-- Add your Yantras content here -->
                                                    <h4 class="mt-2">BN Yantra</h4>

                                                    <div>
                                                        <?php echo $result['yantra_bn']; ?>

                                                    </div>

                                                     <!-- Add your Yantras content here -->
                                                     <h4 class="mt-5">DN Yantra</h4>

                                                     <div>
                                                         <?php echo $result['yantra_dn']; ?>

                                                     </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lucky Elements -->
                                        <div class="tab-pane fade" id="v-pills-lucky-elements" role="tabpanel" aria-labelledby="v-pills-lucky-elements-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-dice me-2"></i>Lucky Elements</h6>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-muted">Lucky elements will be displayed here.</p>
                                                    <!-- Add your Lucky Elements content here -->
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th width="50%"><strong>Lucky Number</strong></th>
                                                            <th><?php echo e($result['chars']['lucky_number']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th><strong>Lucky Color</strong></th>
                                                            <th><?php echo e($result['chars']['colors']??null); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th><strong>Lucky Direction</strong></th>
                                                            <th><?php echo e($result['chars']['direction']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th><strong>Supportive Number</strong></th>
                                                            <th><?php echo e($result['chars']['supportive_number']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th><strong>Missing Number</strong></th>
                                                            <th><?php echo e($result['chars']['missing_number']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th><strong>Avoidable Color</strong></th>
                                                            <th>Blue, Black</th>
                                                        </tr>
                                                        
                                                    </table>

                                                    <hr>

                                                    <h4>Characterstics</h4>

                                                    <ul>
                                                        <?php $__currentLoopData = $result['chars']['characterstics']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="p-2"><?php echo e($chr); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Spell Jar Remedy -->
                                        <div class="tab-pane fade" id="v-pills-spell-jar" role="tabpanel" aria-labelledby="v-pills-spell-jar-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0"><i class="fas fa-magic me-2"></i>Spell Jar Remedy</h6>
                                                </div>
                                                <div class="card-body">
                                                    <?php foreach ($result['spell_jars'] as $jar): ?>
                                                    <h4 class="mt-4"><?php echo $jar['title']; ?></h4>
                                                    <table class="table table-bordered table-striped table-hover align-middle">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%;">Jar Type</th>
                                                                <td><?php echo $jar['jar_type']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Ingredients</th>
                                                                <td>
                                                                    <ul class="mb-0">
                                                                        <?php foreach ($jar['ingredients'] as $item): ?>
                                                                            <li><?php echo $item; ?></li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Method</th>
                                                                <td>
                                                                    <ol class="mb-0">
                                                                        <?php foreach ($jar['method'] as $step): ?>
                                                                            <li><?php echo $step; ?></li>
                                                                        <?php endforeach; ?>
                                                                    </ol>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Placement</th>
                                                                <td><?php echo $jar['placement']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php endforeach; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/user/numerology/numapp.blade.php ENDPATH**/ ?>