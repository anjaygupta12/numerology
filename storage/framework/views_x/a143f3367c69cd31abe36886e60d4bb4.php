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
    background-color: #e0e0e0; /* Light gray */
  }

  .section-header {
    background-color: #d0e9c6; /* Light green */
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
    background-color: #f8d7da; /* Light pink */
  }

  .pyramid-container {
    width: 100%;
    border-collapse: collapse;
  }

  .pyramid-header {
    background-color: #e0e0e0;
    text-align: center;
    font-weight: bold;
    color: #0000ff; /* Blue text */
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

    .form-textarea {
        width: 100%;
        min-height: 40px;
        resize: none;
        overflow: hidden; /* Hide scrollbar */
        box-sizing: border-box;
        padding: 8px;
        font-size: 16px;
    }

    @media(max-width:768px){
        .table-responsive>table{
            width:800px;
        }

        .pdf-download-btn{
            display:none;
        }
    }

</style>

<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-signature me-2"></i>Name Numerology</h4>
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
            <p><strong>Name Numerology</strong> helps you understand the vibrations associated with your name and how they influence your personality, relationships, and life path.</p>
        </div>
        
        <form action="<?php echo e(route('user.numerology.name.calculate')); ?>" method="POST">
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
unset($__errorArgs, $__bag); ?>" id="first_name" name="first_name" value="<?php echo e(old('first_name', $result['first_name'] ?? '')); ?>" required>
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
unset($__errorArgs, $__bag); ?>" id="middle_name" name="middle_name" value="<?php echo e(old('middle_name', $result['middle_name'] ?? '')); ?>">
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
unset($__errorArgs, $__bag); ?>" id="last_name" name="last_name" value="<?php echo e(old('last_name', $result['last_name'] ?? '')); ?>">
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
unset($__errorArgs, $__bag); ?>" id="birth_date" name="birth_date" value="<?php echo e(old('birth_date', $result['birth_date'] ?? '')); ?>" required>
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
        </form>
        
        <?php if(isset($result)): ?>
            <div class="mt-4" id="pdf-content">
                <div class="card result-card">
                    <div class="card-header text-dark d-flex justify-content-between align-items-center">
                        <div class="row w-100">
                            <div class="col-md-2 text-center">
                                <img src="<?php echo e(asset('images/logo/logo_from_pdf.png')); ?>" width="80px" >
                            </div>
                            <div class="col-md-8">
                                <div class="text-center">
                                    <h3>Name Numerology </h3>
                                    <p class="p-0 m-0">
                                        BY ASTROVASTU NUMEROLOGIST <b> <?php echo e(auth()->user()->name); ?> </b>
                                    </p>
                                    <p>
                                        CERTIFIED BY ASTRONUMERO QUEEN SADHNA GULATI
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="card-body table-responsive p-md-5">
                        <!-- First Table -->
                        <table class="numerology-chart" border="1">
                            <tr>
                                <td class="date-header" colspan="3"><?php echo e(date('d M, Y', time())); ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding: 0;">
                                    <table class="main-table" border="0" width="100%">
                                        <tr>
                                            <td class="label-cell">First Name :</td>
                                            <td class="input-cell">
                                                <div class="input-field"><?php echo e($result['first_name']); ?></div>
                                            </td>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="result-text"></td>
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
                                                        <div class="result-value" style="width: 100px;"><?php echo e($result['zodiac_sign']); ?></div>
                                                    </div>
                                                     
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">Middle Name:</td>
                                            <td class="input-cell">
                                                <div class="input-field"><?php echo e($result['middle_name']); ?></div>
                                            </td>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="result-text"></td>
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
                                                        <td class="result-text"></td>
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
                                                <div class="input-field"><?php echo e(date('d-m-Y', strtotime($result['birth_date']))); ?></div>
                                            </td>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="result-text"></td>
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
                                                <div class="input-field cream-bg"><?php echo e($result['first_name'][0]); ?></div>
                                            </td>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="result-text"></td>
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
                                                        <td class="result-text"></td>
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
                                            <td colspan="2">
                                                <div class="zodiac-section">
                                                    <table class="zodiac-table" width="100%">
                                                        <tr>
                                                            <td class="zodiac-label text-end">Zodiac Letters:</td>
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

                        <!-- Sounds Theory Table -->
                        <h4 class="mt-4"> Sounds Theory, Gridding and Pyramid</h4>
                        <table class="main-table">
                            <!-- Header Section -->
                            <tr>
                                <td colspan="4">Good Sounds : <?php echo e(implode(', ', $result['good_sounds'])); ?></td>
                                
                            </tr>
                            <tr>
                                <td colspan="4">Bad Sounds : <?php echo e(implode(', ', $result['bad_sounds'])); ?></td>
                                
                            </tr>
                            <tr class="section-header">
                                <td colspan="4">Gridding :</td>
                            </tr>
                            
                            <!-- Name Gridding Section -->
                            <tr>
                                <td colspan="4" style="padding: 0;">
                                    <?php

                                        $grid_map = [
                                            1 => [6, 8],
                                            2 => [4, 5],
                                            3 => [6, 4],
                                            4 => [2, 3, 9],
                                            5 => [2],
                                            6 => [3, 1],
                                            7 => [8],
                                            8 => [2, 9, 1],
                                            9 => [8, 4],
                                        ];
                                    
                                        $letterValues = [
                                            'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 3, 'H' => 5,
                                            'I' => 1, 'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'O' => 7, 'P' => 8,
                                            'Q' => 1, 'R' => 2, 'S' => 3, 'T' => 4, 'U' => 6, 'V' => 6, 'W' => 6, 'X' => 5,
                                            'Y' => 1, 'Z' => 7
                                        ];
                                    
                                        $counter = 1;
                                    
                                        // Optimized renderer with grid_map highlight
                                        function renderNameSection($title, $letters, &$counter, $letterValues, $grid_map) {
                                            $count = count($letters);
                                    
                                            // Prepare arrays for row contents
                                            $numbersRow = [];
                                            $lettersRow = [];
                                            $valuesRow  = [];
                                    
                                            foreach ($letters as $index => $letter) {
                                                                                                    
                                                $grid_nums = $grid_map[$counter] ?? [];

                                                // Numbers row
                                                if ($title === 'First Name' && $index === 0) {
                                                    $numbersRow[] = '<td class="number-box"></td>';
                                                } else {
                                                    $numbersRow[] = '<td class="number-box">'.$counter.'</td>';
                                                    $counter++;
                                                    if ($counter > 9) $counter = 1;
                                                }
                                    
                                                // Highlight if letter value is in grid numbers
                                                $highlight_box = in_array(($letterValues[$letter] ?? null), $grid_nums) ? 'style="background:#f9b6d7;"' : '';
                                    
                                                // Letters row
                                                $lettersRow[] = '<td class="letter-box"'.$highlight_box.'>'.$letter.'</td>';
                                    
                                                // Values row
                                                $valuesRow[]  = '<td class="number-box">'.($letterValues[$letter] ?? '').'</td>';
                                            }
                                    
                                            // Pad empty cells up to 12
                                            for ($i = $count; $i < 12; $i++) {
                                                $numbersRow[] = '<td class="number-box"></td>';
                                                $lettersRow[] = '<td class="letter-box"></td>';
                                                $valuesRow[]  = '<td class="number-box"></td>';
                                            }
                                    
                                            // Render section
                                            echo '<tr><td colspan="4" class="section-header" style="background-color:#d0e9c6;font-weight:bold;padding:5px;">'.$title.':</td></tr>';
                                            echo '<tr><td colspan="4" style="padding:5px;"><table width="100%" cellpadding="0" cellspacing="0" border="0">';
                                            echo '<tr>'.implode('', $numbersRow).'</tr>';
                                            echo '<tr>'.implode('', $lettersRow).'</tr>';
                                            echo '<tr>'.implode('', $valuesRow).'</tr>';
                                            echo '</table></td></tr>';
                                        }
                                    ?>
                                    
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        
                                        <?php
                                            $firstNameLetters = str_split(strtoupper($result['first_name']));
                                            renderNameSection('First Name', $firstNameLetters, $counter, $letterValues, $grid_map);
                                        ?>
                                    
                                        
                                        <?php if(!empty($result['middle_name'])): ?>
                                            <?php
                                                $middleNameLetters = str_split(strtoupper($result['middle_name']));
                                                renderNameSection('Middle Name', $middleNameLetters, $counter, $letterValues, $grid_map);
                                            ?>
                                        <?php endif; ?>
                                    
                                        
                                        <?php
                                            $lastNameLetters = str_split(strtoupper($result['last_name']));
                                            renderNameSection('Last Name', $lastNameLetters, $counter, $letterValues, $grid_map);
                                        ?>
                                    </table>                                                           
                                </td>
                            </tr>
                            
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
                                                                <div class="pyramid-top">
                                                                    <span><?php echo e($result['pyramid_numbers'][0]); ?></span>
                                                                    <div class="pyramid-top-label">P1</div>
                                                                </div>
                                                                <div class="pyramid-bottom">
                                                                    <div class="pyramid-bottom-box"><?php echo e($result['bn_single']); ?></div>
                                                                    <div class="pyramid-bottom-box"><?php echo e($result['dn_single']); ?></div>
                                                                </div>
                                                                <div class="pyramid-label">
                                                                    <span style="margin-right: 45px;">BN</span>
                                                                    <span style="margin-left: 45px;">DN</span>
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
                                                                <div class="pyramid-top">
                                                                    <span><?php echo e($result['pyramid_numbers'][1]); ?></span>
                                                                    <div class="pyramid-top-label">P2</div>
                                                                </div>
                                                                <div class="pyramid-bottom">
                                                                    <div class="pyramid-bottom-box"><?php echo e($result['bn_single']); ?></div>
                                                                    <div class="pyramid-bottom-box"><?php echo e($result['dn_single']); ?></div>
                                                                </div>
                                                                <div class="pyramid-label">
                                                                    <span style="margin-right: 45px;">BN</span>
                                                                    <span style="margin-left: 45px;">DN</span>
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
                                                                <div class="pyramid-top">
                                                                    <span><?php echo e($result['pyramid_numbers'][2]); ?></span>
                                                                    <div class="pyramid-top-label">P3</div>
                                                                </div>
                                                                <div class="pyramid-bottom">
                                                                    <div class="pyramid-bottom-box"><?php echo e($result['bn_single']); ?></div>
                                                                    <div class="pyramid-bottom-box"><?php echo e($result['dn_single']); ?></div>
                                                                </div>
                                                                <div class="pyramid-label">
                                                                    <span style="margin-right: 45px;">BN</span>
                                                                    <span style="margin-left: 45px;">DN</span>
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
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['bn']]; ?></div></td>
                            </tr>
                            <tr>
                                <td class="attribute-col">D.O.B - DN</td>
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['dn']]; ?></div></td>
                            </tr>
                            <tr>
                                <td class="attribute-col">First Letter (<?php echo e($result['first_letter']); ?>)</td>
                                <td class="description-col">
                                    <div contenteditable>
                                        <?php if($result['first_letter_attribute'] && $result['first_letter_attribute']->description): ?>
                                            <?php echo $result['first_letter_attribute']->description; ?>

                                        <?php else: ?>
                                            <em>No specific attributes available for letter "<?php echo e($result['first_letter']); ?>". Please consult with an administrator to add attributes for this letter.</em>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="attribute-col">First Name FN</td>
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['fn']]; ?></div></td>
                            </tr>
                            <tr>
                                <td class="attribute-col">Full Name NN</td>
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['nn']]; ?></div></td>
                            </tr>
                            <tr>
                                <td class="attribute-col">Inner Nature IN</td>
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['in']]; ?></div></td>
                            </tr>
                            <tr>
                                <td class="attribute-col">Outer Nature EN</td>
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['en']]; ?></div></td>
                            </tr>
                            <tr>
                                <td class="attribute-col">Core Nature PN</td>
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['pn']]; ?></div></td>
                            </tr>
                            <tr>
                                <td class="attribute-col">Habbit HN</td>
                                <td class="description-col"><div contenteditable><?php echo $result['attrs'][$result['hn']]; ?></div></td>
                            </tr>
                        </table>

                        <!-- Profession tables -->
                        <h4 class="mt-4">Profession</h4>
                        <table class="attributes_tbl">
                            <tr>
                                <td class="attribute-col">BN (<?php echo e($result['bn_single']); ?>)</td>
                                <td class="description-col"><div contenteditable><?php echo $result['profession']; ?></div></td>
                            </tr>                             
                        </table>

                        <!-- Remedies table -->
                        <h4 class="mt-4">Remedies</h4>
                        <table class="remedies-table remedies_tbl"   id="pr_box">
                            <tr class="header-row">
                                <td class="header-cell" colspan="6">REMEDIES</td>
                            </tr>
                            
                            <?php $counter = 1; ?>
                            
                            <!-- Birth Number Remedies -->
                            <?php if($result['bn_remedy'] && $result['bn_remedy']->bn): ?>
                            <tr class="content-row">
                                <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                                <td class="content-cell birth-node">BN: <?php echo e($result['bn_single']); ?></td>
                                <td class="content-cell" colspan="4"><div contenteditable><?php echo nl2br(e($result['bn_remedy']->bn)); ?></div></td>
                            </tr>
                            <?php endif; ?>
                            
                            <!-- Destiny Number Remedies -->
                            <?php if($result['dn_remedy'] && $result['dn_remedy']->dn): ?>
                            <tr class="content-row">
                                <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                                <td class="content-cell birth-node">DN: <?php echo e($result['dn_single']); ?></td>
                                <td class="content-cell" colspan="4"><div contenteditable><?php echo nl2br(e($result['dn_remedy']->dn)); ?></div></td>
                            </tr>
                            <?php endif; ?>
                            
                            <!-- Name Number Remedies -->
                            <?php if($result['nn_remedy'] && $result['nn_remedy']->nn): ?>
                            <tr class="content-row">
                                <td class="content-cell number-cell"><?php echo e($counter++); ?></td>
                                <td class="content-cell birth-node">NN: <?php echo e($result['nn_single']); ?></td>
                                <td class="content-cell" colspan="4"><div contenteditable><?php echo nl2br(e($result['nn_remedy']->nn)); ?></div></td>
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
                        
                        
                        <!-- yantra charts -->
                        <h4 class="mt-4">ENERGISING YANTRAS</h4>
                        <div class="container">
                            
                            <div class="yantras-container yantra-section">
                                <!-- Left Yantra - Birthdate -->
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
                                
                                <!-- Right Yantra - Name -->
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
                        
                        
                        <h4 class="mt-4">ADDITIONAL INFORMATION</h4>
                        <div class="container">
                            <textarea class="form-control form-textarea" oninput="autoResize(this)"></textarea>
                        </div>
 
                    </div>
                </div>
            </div>

            <div class="print-pdf-actions">
                <div class="text-center">
                    <button class="pdf-download-btn btn btn-primary my-4" onclick="downloadAsPDF()">
                        📄 Download as PDF
                    </button>
                    <div class="pdf-loading" id="pdfLoading" style="display:none">
                        Generating PDF... Please wait
                    </div>
                </div>
                
 
            </div>
        <?php endif; ?>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/user/numerology/name.blade.php ENDPATH**/ ?>