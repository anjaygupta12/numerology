<?php $__env->startSection('content'); ?>
<style>
    /* ── original styles ─────────────────────────────── */
    .numerology-chart{width:100%;margin:0 auto;border-collapse:collapse}
    .date-header{background-color:#e0e0e0;border:1px solid #000;padding:8px;font-weight:bold}
    .main-table{width:100%;border-collapse:collapse;background-color:#d6e9f8}
    .main-table td{padding:5px;vertical-align:middle}
    .label-cell{width:150px;font-weight:bold;text-align:right}
    .input-cell{width:200px;vertical-align:middle}
    .input-field{width:100%;height:25px;border:1px solid #000;background-color:#fff;text-align:center;font-weight:bold;box-sizing:border-box}
    .cream-bg{background-color:#f5f5dc}
    .result-text{width:220px;padding-left:20px!important}
    .result-box-container{display:flex;margin-right:10px}
    .result-label{width:40px;background-color:#d6e9f8;border:1px solid #000;display:flex;align-items:center;justify-content:center;font-weight:bold;height:30px}
    .result-value{width:40px;background-color:#f5f5dc;border:1px solid #000;display:flex;align-items:center;justify-content:center;font-weight:bold;height:30px}
    .natal-grid-container{margin:20px auto}
    .natal-grid{border-collapse:collapse;width:150px}
    .natal-header{background-color:#fff;text-align:center;border:1px solid #000;padding:5px;font-weight:bold}
    .natal-cell{width:50px;height:50px;border:1px solid #000;text-align:center;vertical-align:middle;background-color:#f5f5dc;font-weight:bold;position:relative}
    .superscript{position:absolute;top:2px;right:4px;font-size:10px}
    .additional-info{font-style:italic;color:#555;padding-left:10px}
    .moon-sign{display:flex;margin-top:10px}
    .moon-label{width:120px;background-color:#333;color:white;display:flex;align-items:center;justify-content:center;font-weight:bold;border:1px solid #000}
    .zodiac-section{margin-top:20px}
    .zodiac-table{border-collapse:collapse}
    .zodiac-label{font-weight:bold;padding-right:10px}
    .zodiac-letter{width:30px;height:30px;border:1px solid #000;text-align:center;vertical-align:middle;font-weight:bold}
    .chart-area{width:100%;height:200px;background-color:#f0f0f0;border:1px solid #000;margin-top:10px}
    .header-row{background-color:#e0e0e0}
    .section-header{background-color:#d0e9c6;font-weight:bold;text-align:left;padding-left:10px}
    .letter-box{width:30px;height:30px;border:1px solid #000;text-align:center;vertical-align:middle;font-weight:bold}
    .number-box{text-align:center;vertical-align:middle;width:30px}
    .highlight{background-color:#f8d7da}
    .pyramid-container{width:100%;border-collapse:collapse}
    .pyramid-header{background-color:#e0e0e0;text-align:center;font-weight:bold;color:#0000ff}
    .pyramid{position:relative;height:110px;width:100%}
    .pyramid-top{position:absolute;top:0;left:50%;transform:translateX(-50%);width:40px;height:40px;border:1px solid #000;background-color:#fff;display:flex;flex-direction:column;justify-content:center;align-items:center}
    .pyramid-top-label{font-size:10px;color:#0000ff}
    .pyramid-bottom{position:absolute;bottom:0;left:0;right:0;display:flex;justify-content:space-around}
    .pyramid-bottom-box{width:40px;height:40px;border:1px solid #000;background-color:#fff;display:flex;justify-content:center;align-items:center}
    .pyramid-label{position:absolute;bottom:-20px;text-align:center;width:100%}
    .total-table{width:100%;border-collapse:collapse}
    .total-header{background-color:#e0e0e0;font-weight:bold;text-align:center}
    .planes-header{background-color:#e0e0e0;font-weight:bold;text-align:center}
    .attributes_tbl{width:100%;border-collapse:collapse;margin-bottom:20px}
    .attributes_tbl caption{background-color:#ffe699;font-weight:bold;padding:10px;font-size:18px;border:2px solid #000}
    .attributes_tbl th,.attributes_tbl td{border:2px solid #000;padding:10px;vertical-align:top}
    .attributes_tbl .attribute-col{width:15%;background-color:#d6eaf8;font-weight:bold;text-align:center}
    .attributes_tbl .description-col{width:70%}
    .attributes_tbl .note-col{width:15%;background-color:#d6eaf8;text-align:center}
    .attributes_tbl .golden-raj{color:#b22222;font-weight:bold}
    .remedies_tbl{width:100%;border-collapse:collapse;border:2px solid black}
    .remedies_tbl .header-row{background-color:#ffdd88;text-align:center;font-weight:bold;font-size:18px;border-bottom:2px solid black}
    .remedies_tbl .header-cell{padding:10px}
    .remedies_tbl .content-row{border-bottom:1px solid #ddd}
    .remedies_tbl .content-cell{padding:15px;vertical-align:top}
    .remedies_tbl .number-cell{text-align:right;width:30px}
    .remedies_tbl .birth-node{color:red;font-weight:bold;width:80px}
    .remedies_tbl .colon-cell{text-align:center;width:20px}
    .remedies_tbl .planet-cell{font-weight:bold;width:100px}
    .remedies_tbl .donation-section{padding-top:15px}
    .remedies_tbl ul{margin-top:5px;margin-bottom:5px;padding-left:30px}
    .remedies_tbl li{margin-bottom:8px}
    .yantra-section{font-family:Arial,sans-serif;margin:0;padding:0;display:flex;align-items:center}
    .yantra-section .container{width:100%;margin:20px auto;border:2px solid black}
    .yantra-section .header{background-color:#f9e79f;text-align:center;padding:10px;font-weight:bold;border-bottom:2px solid black}
    .yantra-section .yantras-container{display:flex;flex-wrap:wrap;justify-content:space-around;padding:40px 20px}
    .yantra-section .yantra{width:45%;min-width:300px;margin:10px;border:2px dashed black;display:flex;flex-direction:column;align-items:center}
    .yantra-section .yantra-title{background-color:#f9e79f;padding:8px 15px;margin-bottom:15px;text-align:center;width:50%}
    .yantra-section .grid-table{border-collapse:collapse;width:80%;margin-bottom:15px}
    .yantra-section .grid-table td{border:1px solid black;padding:12px;text-align:center;width:50px;height:30px;color:#4a86e8;font-weight:bold}
    .yantra-section .sum-row td,.yantra-section .sum-col{background-color:transparent;border:none;color:#4a86e8;font-weight:bold}
    .yantra-section .energiser-title{background-color:#d0e0c0;padding:5px 10px;margin-top:20px;text-align:center;width:60%}
    .yantra-section .footer{text-align:center;padding:15px;font-size:.9em;margin-top:20px}

    /* ── module heading row — checkbox LEFT of title ─── */
    .module-heading-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 24px;
        margin-bottom: 6px;
    }
    .module-heading-row h4 {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: #222;
    }
    /* pill toggle */
    .mod-toggle {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
        background: #e8f5e9;
        border: 1.5px solid #66bb6a;
        border-radius: 20px;
        padding: 3px 11px 3px 7px;
        font-size: 12px;
        font-weight: 600;
        color: #2e7d32;
        user-select: none;
        transition: background .15s, border-color .15s, color .15s;
        white-space: nowrap;
        flex-shrink: 0;
    }
    .mod-toggle input[type="checkbox"] {
        width: 14px; height: 14px;
        accent-color: #2e7d32;
        cursor: pointer;
        margin: 0;
    }
    .mod-toggle.unchecked {
        background: #fce4ec;
        border-color: #e57373;
        color: #c62828;
    }

    /* dimmed when excluded */
    .pdf-module-section.excluded {
        opacity: .3;
        pointer-events: none;
    }

    /* generate button */
    .btn-js-pdf {
        background: linear-gradient(135deg,#e53935,#b71c1c);
        color: #fff;
        border: none;
        padding: 9px 24px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        box-shadow: 0 2px 8px rgba(183,28,28,.35);
        transition: opacity .2s, transform .1s;
    }
    .btn-js-pdf:hover  { opacity:.88; transform:translateY(-1px); }
    .btn-js-pdf:disabled { opacity:.5; cursor:not-allowed; transform:none; }

    @media print { .no-print { display:none!important; } }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-signature me-2"></i>Name Numerology</h4>
        <span>Discover the hidden meaning behind your name</span>
    </div>
    <div class="content-body">

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <div class="alert alert-info">
            <p><strong>Name Numerology</strong> helps you understand the vibrations associated with your name and how
            they influence your personality, relationships, and life path.</p>
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
unset($__errorArgs, $__bag); ?>"
                        id="first_name" name="first_name"
                        value="<?php echo e(old('first_name', $result['first_name'] ?? '')); ?>" required>
                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
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
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
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
unset($__errorArgs, $__bag); ?>"
                        id="last_name" name="last_name"
                        value="<?php echo e(old('last_name', $result['last_name'] ?? '')); ?>">
                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender"
                    class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Select Gender</option>
                    <?php
                        $genders = ['male'=>'Male','female'=>'Female','other'=>'Other'];
                        $selectedGender = old('gender', $result['gender'] ?? '');
                    ?>
                    <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>" <?php echo e($selectedGender===$value?'selected':''); ?>>
                            <?php echo e($label); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
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
unset($__errorArgs, $__bag); ?>"
                    id="birth_date" name="birth_date"
                    value="<?php echo e(old('birth_date', $result['birth_date'] ?? '')); ?>" required>
                <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="d-grid gap-2 mb-4">
                <button type="submit" class="btn btn-primary">Calculate Name Numerology</button>
            </div>
        </form>

        <?php if(isset($result)): ?>

        
        

        
        <div class="no-print mb-3">
            <button class="btn-js-pdf" id="btnJsPdf" onclick="generatePDF()">
                <i class="fas fa-file-pdf"></i> Generate PDF (Download)
            </button>
        </div>

        <div class="mt-2">
            <div class="card result-card">
                <div class="card-header text-dark">
                    <h5 class="mb-0">Results for: <?php echo e($result['full_name']); ?></h5>
                </div>
                <div class="card-body">

                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_chart">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_chart','lbl_chart')">
                            ✓ Include in PDF
                        </label>
                        <h4>Numerology Chart</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_chart">
                        <table class="numerology-chart" border="1">
                            <tr>
                                <td class="date-header" colspan="3"><?php echo e(date('d-M-y', time())); ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding:0;">
                                    <table class="main-table" border="0" width="100%">
                                        <tr>
                                            <td class="label-cell">First Name :</td>
                                            <td class="input-cell">
                                                <div class="input-field"><?php echo e($result['first_name']); ?></div>
                                            </td>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0"><tr>
                                                    <td class="result-text"></td>
                                                    <td><div class="result-box-container">
                                                        <div class="result-label">FN</div>
                                                        <div class="result-value"><?php echo e($result['fn']); ?></div>
                                                    </div></td>
                                                    <td class="additional-info">
                                                        <?php if(isset($yog_labels['fn']) && count($yog_labels['fn'])): ?><?php echo e(implode(', ',$yog_labels['fn'])); ?><?php endif; ?>
                                                    </td>
                                                </tr></table>
                                            </td>
                                            <td rowspan="7" style="vertical-align:top;padding:10px;">
                                                <div style="display:flex;flex-direction:column;">
                                                    <table class="natal-grid" border="0" cellspacing="0" cellpadding="0">
                                                        <tr><td class="natal-header" colspan="3">NATAL GRID</td></tr>
                                                        <?php foreach($result['vedic_chart_array'] as $row): ?>
                                                        <tr>
                                                            <?php foreach($row as $cell): ?>
                                                            <td class="natal-cell"><?php echo htmlspecialchars($cell); ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                    <div style="display:flex;margin-top:15px;">
                                                        <div class="moon-label">Zodiac Sign</div>
                                                        <div class="result-value" style="width:100px;"><?php echo e($result['zodiac_sign']); ?></div>
                                                        <div class="result-value" style="width:100px;"><?php echo e($result['zodiacNum']); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">Middle Name:</td>
                                            <td class="input-cell"><div class="input-field"><?php echo e($result['middle_name']); ?></div></td>
                                            <td><table border="0" cellspacing="0" cellpadding="0"><tr>
                                                <td class="result-text"></td>
                                                <td><div class="result-box-container">
                                                    <div class="result-label">NN</div>
                                                    <div class="result-value"><?php echo e($result['nn']); ?></div>
                                                </div></td>
                                                <td class="additional-info">
                                                    <?php if(isset($yog_labels['nn']) && count($yog_labels['nn'])): ?><?php echo e(implode(', ',$yog_labels['nn'])); ?><?php endif; ?>
                                                </td>
                                            </tr></table></td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">Last Name:</td>
                                            <td class="input-cell"><div class="input-field"><?php echo e($result['last_name']); ?></div></td>
                                            <td><table border="0" cellspacing="0" cellpadding="0"><tr>
                                                <td class="result-text"></td>
                                                <td><div class="result-box-container">
                                                    <div class="result-label">IN</div>
                                                    <div class="result-value"><?php echo e($result['in']); ?></div>
                                                </div></td>
                                                <td class="additional-info">
                                                    <?php if(isset($yog_labels['in']) && count($yog_labels['in'])): ?><?php echo e(implode(', ',$yog_labels['in'])); ?><?php endif; ?>
                                                </td>
                                            </tr></table></td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">Birth Date :</td>
                                            <td class="input-cell"><div class="input-field"><?php echo e(date('d-m-Y',strtotime($result['birth_date']))); ?></div></td>
                                            <td><table border="0" cellspacing="0" cellpadding="0"><tr>
                                                <td class="result-text"></td>
                                                <td><div class="result-box-container">
                                                    <div class="result-label">EN</div>
                                                    <div class="result-value"><?php echo e($result['en']); ?></div>
                                                </div></td>
                                                <td class="additional-info">
                                                    <?php if(isset($yog_labels['en']) && count($yog_labels['en'])): ?><?php echo e(implode(', ',$yog_labels['en'])); ?><?php endif; ?>
                                                </td>
                                            </tr></table></td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">First Letter :</td>
                                            <td class="input-cell"><div class="input-field cream-bg"><?php echo e($result['first_name'][0]); ?></div></td>
                                            <td><table border="0" cellspacing="0" cellpadding="0"><tr>
                                                <td class="result-text"></td>
                                                <td><div class="result-box-container">
                                                    <div class="result-label">PN</div>
                                                    <div class="result-value"><?php echo e($result['pn']); ?></div>
                                                </div></td>
                                                <td class="additional-info">
                                                    <?php if(isset($yog_labels['pn']) && count($yog_labels['pn'])): ?><?php echo e(implode(', ',$yog_labels['pn'])); ?><?php endif; ?>
                                                </td>
                                            </tr></table></td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">DOB - BN :</td>
                                            <td class="input-cell"><div class="input-field cream-bg"><?php echo e($result['bn_single']); ?></div></td>
                                            <td><table border="0" cellspacing="0" cellpadding="0"><tr>
                                                <td class="result-text"></td>
                                                <td><div class="result-box-container">
                                                    <div class="result-label">HN</div>
                                                    <div class="result-value"><?php echo e($result['hn']); ?></div>
                                                </div></td>
                                            </tr></table></td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">DOB - DN :</td>
                                            <td class="input-cell"><div class="input-field cream-bg"><?php echo e($result['dn_single']); ?></div></td>
                                            <td colspan="2">
                                                <div class="zodiac-section">
                                                    <table class="zodiac-table" width="100%"><tr>
                                                        <td class="zodiac-label text-end">Zodiac Letters:</td>
                                                        <?php $__currentLoopData = $result['zodiac_letters']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <td class="zodiac-letter"><?php echo e($letter); ?></td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tr></table>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">DOB - BS :</td>
                                            <td class="input-cell"><div class="input-field cream-bg"><?php echo e($result['bs']); ?></div></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">DOB - WN :</td>
                                            <td class="input-cell"><div class="input-field cream-bg"><?php echo e($result['wn']); ?></div></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="label-cell">DOB - OP :</td>
                                            <td class="input-cell"><div class="input-field cream-bg"><?php echo e($result['op']); ?></div></td>
                                            <td colspan="2"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
<?php
    function checkPairExists($input)
    {
        $data = [
            "1/4","1/6","1/8","2/5","2/4","2/8",
            "3/4","3/6","4/1","4/2","4/3","4/5",
            "4/9","5/4","5/2","6/3","6/1","7/8","8/7",
            "8/1","8/2","8/9","9/8","9/4"
        ];

        $arr = explode('/', $input);
        sort($arr);
        $inputNormalized = implode('/', $arr);

        foreach ($data as $item) {
            $tmp = explode('/', $item);
            sort($tmp);

            if (implode('/', $tmp) === $inputNormalized) {
                return true;
            }
        }

        return false;
    }
?>

                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_sounds">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_sounds','lbl_sounds')">
                            ✓ Include in PDF
                        </label>
                        <h4>Sounds Theory, Gridding and Pyramid</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_sounds">
                        <table class="main-table">
                            <tr><td colspan="4">Good Sounds : <?php echo e(implode(', ',$result['good_sounds'])); ?></td></tr>
                            <tr><td colspan="4">Bad Sounds : <?php echo e(implode(', ',$result['bad_sounds'])); ?></td></tr>
                            <tr class="section-header"><td colspan="4">Gridding :</td></tr>
                            <tr>
                                <td colspan="4" style="padding:0;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        
                                        <tr><td colspan="4" class="section-header"
                                            style="background-color:#d0e9c6;font-weight:bold;padding:5px;">First Name:</td></tr>
                                        <tr><td colspan="4" style="padding:5px;">
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <?php
                                                        $firstName = strtoupper($result['first_name']);
                                                        $firstNameLetters = str_split($firstName);
                                                        $counter = 1;
                                                    ?>
                                                    <?php $__currentLoopData = $firstNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($index==0): ?><td class="number-box"></td>
                                                        <?php else: ?><td class="number-box"><?php echo e($counter); ?></td><?php $counter++; if($counter>9)$counter=1; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($firstNameLetters);$i<12;$i++): ?><td class="number-box"></td><?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <?php  $counterSec = 0;  $letterValues=['A'=>1,'B'=>2,'C'=>3,'D'=>4,'E'=>5,'F'=>6,'G'=>3,'H'=>5,'I'=>1,'J'=>1,'K'=>2,'L'=>3,'M'=>4,'N'=>5,'O'=>7,'P'=>8,'Q'=>1,'R'=>2,'S'=>3,'T'=>4,'U'=>6,'V'=>6,'W'=>6,'X'=>5,'Y'=>1,'Z'=>7]; ?>
                                                    <?php $__currentLoopData = $firstNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="letter-box"
                                                            <?php if(checkPairExists($counterSec . '/' . $letterValues[$letter])): ?> style="background-color:pink" <?php endif; ?>>
                                                            <?php echo e($letter); ?></td>
                                                            <?php $counterSec++; if($counterSec>9)$counterSec=1; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($firstNameLetters);$i<12;$i++): ?><td class="letter-box"></td><?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <?php $__currentLoopData = $firstNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="number-box"><?php echo e($letterValues[$letter]??''); ?></td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($firstNameLetters);$i<12;$i++): ?><td class="number-box"></td><?php endfor; ?>
                                                </tr>
                                            </table>
                                        </td></tr>

                                        <?php if(!empty($result['middle_name'])): ?>
                                        
                                        <tr><td colspan="4" class="section-header"
                                            style="background-color:#d0e9c6;font-weight:bold;padding:5px;">Middle Name:</td></tr>
                                        <tr><td colspan="4" style="padding:5px;">
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <?php
                                                        $middleName = strtoupper($result['middle_name']);
                                                        $middleNameLetters = str_split($middleName);
                                                        $middleCounter = $counter;
                                                         $middleCounter2 = $counterSec;
                                                    ?>
                                                    <?php $__currentLoopData = $middleNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="number-box"><?php echo e($middleCounter); ?></td>
                                                        <?php $middleCounter++; if($middleCounter>9)$middleCounter=1; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($middleNameLetters);$i<12;$i++): ?><td class="number-box"></td><?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <?php $__currentLoopData = $middleNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="letter-box"
                                                            <?php if(checkPairExists($middleCounter2 . '/' . $letterValues[$letter])): ?> style="background-color:pink" <?php endif; ?>>
                                                            <?php echo e($letter); ?></td>
                                                             <?php $middleCounter2++; if($middleCounter2>9)$middleCounter2=1; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($middleNameLetters);$i<12;$i++): ?><td class="letter-box"></td><?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <?php $__currentLoopData = $middleNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="number-box"><?php echo e($letterValues[$letter]??''); ?></td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($middleNameLetters);$i<12;$i++): ?><td class="number-box"></td><?php endfor; ?>
                                                </tr>
                                            </table>
                                        </td></tr>
                                        <?php endif; ?>

                                        
                                        <tr><td colspan="4" class="section-header"
                                            style="background-color:#d0e9c6;font-weight:bold;padding:5px;">Last Name:</td></tr>
                                        <tr><td colspan="4" style="padding:5px;">
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <?php
                                                        $lastName = strtoupper($result['last_name']);
                                                        $lastNameLetters = str_split($lastName);
                                                        $lastCounter = !empty($result['middle_name']) ? $middleCounter : $counter;
                                                        $lastCounter2 = !empty($result['middle_name']) ? $middleCounter2 : $counterSec;
                                                    ?>
                                                    <?php $__currentLoopData = $lastNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="number-box"><?php echo e($lastCounter); ?></td>
                                                        <?php $lastCounter++; if($lastCounter>9)$lastCounter=1; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($lastNameLetters);$i<12;$i++): ?><td class="number-box"></td><?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <?php $__currentLoopData = $lastNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td class="letter-box"
                                                    <?php if(checkPairExists($lastCounter2 . '/' . $letterValues[$letter])): ?> style="background-color:pink" <?php endif; ?>>
                                                    <?php echo e($letter); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($lastNameLetters);$i<12;$i++): ?><td class="letter-box"></td>
                                                     <?php $lastCounter2++; if($lastCounter2>9)$lastCounter2=1; ?>
                                                     <?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <?php $__currentLoopData = $lastNameLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="number-box"><?php echo e($letterValues[$letter]??''); ?></td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php for($i=count($lastNameLetters);$i<12;$i++): ?><td class="number-box"></td><?php endfor; ?>
                                                </tr>
                                            </table>
                                        </td></tr>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="4" style="padding:0;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td class="section-header" width="15%">Pyramids :</td>
                                            <td width="25%">
                                                <table class="pyramid-container">
                                                    <tr><td class="pyramid-header">1st</td></tr>
                                                    <tr><td>
                                                        <div class="pyramid">
                                                            <div class="pyramid-top"><span><?php echo e($result['pyramid_numbers'][0]); ?></span><div class="pyramid-top-label">P1</div></div>
                                                            <div class="pyramid-bottom">
                                                                <div class="pyramid-bottom-box"><?php echo e($result['bn_single']); ?></div>
                                                                <div class="pyramid-bottom-box"><?php echo e($result['dn_single']); ?></div>
                                                            </div>
                                                            <div class="pyramid-label"><span style="margin-right:45px;">BN</span><span style="margin-left:45px;">DN</span></div>
                                                        </div>
                                                    </td></tr>
                                                </table>
                                            </td>
                                            <td width="25%">
                                                <table class="pyramid-container">
                                                    <tr><td class="pyramid-header">7th</td></tr>
                                                    <tr><td>
                                                        <div class="pyramid">
                                                            <div class="pyramid-top"><span><?php echo e($result['pyramid_numbers'][1]); ?></span><div class="pyramid-top-label">P2</div></div>
                                                            <div class="pyramid-bottom">
                                                                <div class="pyramid-bottom-box"><?php echo e($result['bn_single']); ?></div>
                                                                <div class="pyramid-bottom-box"><?php echo e($result['dn_single']); ?></div>
                                                            </div>
                                                            <div class="pyramid-label"><span style="margin-right:45px;">BN</span><span style="margin-left:45px;">DN</span></div>
                                                        </div>
                                                    </td></tr>
                                                </table>
                                            </td>
                                            <td width="25%">
                                                <table class="pyramid-container">
                                                    <tr><td class="pyramid-header">Last</td></tr>
                                                    <tr><td>
                                                        <div class="pyramid">
                                                            <div class="pyramid-top"><span><?php echo e($result['pyramid_numbers'][2]); ?></span><div class="pyramid-top-label">P3</div></div>
                                                            <div class="pyramid-bottom">
                                                                <div class="pyramid-bottom-box"><?php echo e($result['bn_single']); ?></div>
                                                                <div class="pyramid-bottom-box"><?php echo e($result['dn_single']); ?></div>
                                                            </div>
                                                            <div class="pyramid-label"><span style="margin-right:45px;">BN</span><span style="margin-left:45px;">DN</span></div>
                                                        </div>
                                                    </td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>


                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_attrs">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_attrs','lbl_attrs')">
                            ✓ Include in PDF
                        </label>
                        <h4>Attributes of your BN, DN and Name Compounds</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_attrs">
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
                                            <em>No specific attributes available for letter "<?php echo e($result['first_letter']); ?>".</em>
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
                    </div>


                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_prof">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_prof','lbl_prof')">
                            ✓ Include in PDF
                        </label>
                        <h4>Professions</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_prof">
                        <table class="remedies-table remedies_tbl">
                            <tr class="header-row"><td class="header-cell" colspan="6">Professions</td></tr>
                            <tr class="content-row">
                                <td class="content-cell number-cell">1</td>
                                <td class="content-cell birth-node">Profession</td>
                                <td class="content-cell" colspan="4"><?php echo e($result['profession']); ?></td>
                            </tr>
                        </table>
                    </div>


                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_rem">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_rem','lbl_rem')">
                            ✓ Include in PDF
                        </label>
                        <h4>Remedies</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_rem">
                        <table class="remedies-table remedies_tbl">
                            <tr class="header-row"><td class="header-cell" colspan="6">REMEDIES</td></tr>
                            <?php $cnt = 1; ?>
                            <?php if($result['bn_remedy'] && $result['bn_remedy']->bn): ?>
                            <tr class="content-row">
                                <td class="content-cell number-cell"><?php echo e($cnt++); ?></td>
                                <td class="content-cell birth-node">BN: <?php echo e($result['bn_single']); ?></td>
                                <td class="content-cell" colspan="4"><?php echo nl2br(e($result['bn_remedy']->bn)); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($result['dn_remedy'] && $result['dn_remedy']->dn): ?>
                            <tr class="content-row">
                                <td class="content-cell number-cell"><?php echo e($cnt++); ?></td>
                                <td class="content-cell birth-node">DN: <?php echo e($result['dn_single']); ?></td>
                                <td class="content-cell" colspan="4"><?php echo nl2br(e($result['dn_remedy']->dn)); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($result['nn_remedy'] && $result['nn_remedy']->nn): ?>
                            <tr class="content-row">
                                <td class="content-cell number-cell"><?php echo e($cnt++); ?></td>
                                <td class="content-cell birth-node">NN: <?php echo e($result['nn_single']); ?></td>
                                <td class="content-cell" colspan="4"><?php echo nl2br(e($result['nn_remedy']->nn)); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if((!$result['bn_remedy']||!$result['bn_remedy']->bn) && (!$result['dn_remedy']||!$result['dn_remedy']->dn) && (!$result['nn_remedy']||!$result['nn_remedy']->nn)): ?>
                            <tr class="content-row">
                                <td class="content-cell" colspan="6" style="text-align:center;padding:30px;color:#666;">
                                    <em>No specific remedies available for your calculated numbers.</em>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </div>


                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_yant">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_yant','lbl_yant')">
                            ✓ Include in PDF
                        </label>
                        <h4>ENERGISING YANTRAS</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_yant">
                        <div class="container">
                            <div class="yantras-container yantra-section">
                                <div class="yantra">
                                    <div class="yantra-title"><?php echo e(date('d-m-Y',strtotime($result['birth_date']))); ?></div>
                                    <table class="grid-table" border="1">
                                        <?php $__currentLoopData = $result['birthdate_energiser']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->last): ?>
                                                <tr><td><b><?php echo e($row[0]); ?></b></td><td><b><?php echo e($row[1]); ?></b></td><td><b><?php echo e($row[2]); ?></b></td><td><b><?php echo e($row[3]); ?></b></td><td><b><?php echo e($row[4]); ?></b></td></tr>
                                            <?php else: ?>
                                                <tr><td><?php echo e($row[0]); ?></td><td><?php echo e($row[1]); ?></td><td><?php echo e($row[2]); ?></td><td><?php echo e($row[3]); ?></td><td><b><?php echo e($row[4]); ?></b></td></tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <div class="energiser-title">Birthdate Energiser</div>
                                </div>
                                <div class="yantra">
                                    <div class="yantra-title"><?php echo e($result['full_name']); ?></div>
                                    <table class="grid-table" border="1">
                                        <?php $__currentLoopData = $result['name_energiser']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->last): ?>
                                                <tr><td><b><?php echo e($row[0]); ?></b></td><td><b><?php echo e($row[1]); ?></b></td><td><b><?php echo e($row[2]); ?></b></td><td><b><?php echo e($row[3]); ?></b></td><td><b><?php echo e($row[4]); ?></b></td></tr>
                                            <?php else: ?>
                                                <tr><td><?php echo e($row[0]); ?></td><td><?php echo e($row[1]); ?></td><td><?php echo e($row[2]); ?></td><td><?php echo e($row[3]); ?></td><td><b><?php echo e($row[4]); ?></b></td></tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <div class="energiser-title">New Name Energiser</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_fy">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_fy','lbl_fy')">
                            ✓ Include in PDF
                        </label>
                        <h4>Fortunate Year</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_fy">
                        <table class="remedies-table remedies_tbl">
                            <tr class="header-row"><td class="header-cell" colspan="6">FORTUNATE YEAR</td></tr>
                            <?php if($result['fyPre']): ?>
                            <tr class="content-row">
                                <td class="content-cell number-cell"><?php echo e($result['fynum']); ?></td>
                                <td class="content-cell birth-node" colspan="4"><?php echo e($result['fyPre']['name']); ?></td>
                                <td class="content-cell" colspan="4">
                                    <ul style="margin:0;padding-left:15px;">
                                        <li><strong>
                                            <input style="border-style:none;" type="text" name="fy_title[]"
                                                value="<?php echo e($result['fyPre']['title']); ?>" class="form-control">
                                        </strong></li>
                                        <textarea style="border-style:none" name="fy_description[]"
                                            class="form-control" rows="2"><?php echo e($result['fyPre']['description']); ?></textarea>
                                    </ul>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </div>

                        <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_rage">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_rage','lbl_rage')">
                            ✓ Include in PDF
                        </label>
                        <h4>Runing Age</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_rage">
                        <table class="remedies-table remedies_tbl">
                            <tr class="header-row"><td class="header-cell" colspan="6">RUNNING AGE</td></tr>

                            <tr class="content-row">
                                <td class="content-cell number-cell"></td>
                                <td class="content-cell birth-node" colspan="4"><?php echo e($result['running_age']); ?></td>
                                <td class="content-cell" colspan="4">
                                    Running Age
                                </td>
                            </tr>

                        </table>
                    </div>


                    
                    <div class="module-heading-row no-print">
                        <label class="mod-toggle checked" id="lbl_note">
                            <input type="checkbox" checked
                                onchange="toggleModule(this,'mod_note','lbl_note')">
                            ✓ Include in PDF
                        </label>
                        <h4>Note</h4>
                    </div>
                    <div class="pdf-module-section" id="mod_note">
                        <div class="mt-2 mb-3">
                            <label>Note</label>
                            <textarea class="form-control" name="note" cols="5" rows="3"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php endif; ?>
    </div>
</div>

<script>
/* ════════════════════════════════════════════════════
   Toggle module visibility + pill state
════════════════════════════════════════════════════ */
function toggleModule(checkbox, moduleId, labelId) {
    var section = document.getElementById(moduleId);
    var label   = document.getElementById(labelId);
    var textNode = null;

    // Find the plain text node inside the label (skip the checkbox input node)
    for (var i = 0; i < label.childNodes.length; i++) {
        if (label.childNodes[i].nodeType === 3) { // TEXT_NODE
            textNode = label.childNodes[i];
            break;
        }
    }

    if (checkbox.checked) {
        section.classList.remove('excluded');
        label.classList.remove('unchecked');
        label.classList.add('checked');
        if (textNode) textNode.nodeValue = ' ✓ Include in PDF';
    } else {
        section.classList.add('excluded');
        label.classList.remove('checked');
        label.classList.add('unchecked');
        if (textNode) textNode.nodeValue = ' ✗ Excluded';
    }
}

/* ════════════════════════════════════════════════════
   JS PDF generation using html2pdf.js
   — builds a fresh off-screen container from only
     the enabled modules, then exports to A4 PDF.
════════════════════════════════════════════════════ */
function generatePDF() {

    var btn = document.getElementById('btnJsPdf');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating…';

    var moduleIds = [
        'mod_chart',
        'mod_sounds',
        'mod_attrs',
        'mod_prof',
        'mod_rem',
        'mod_yant',
        'mod_fy',
        'mod_rage',
        'mod_note'
    ];

    // Collect styles
    var styles = '';
    document.querySelectorAll('style, link[rel="stylesheet"]').forEach(function(style) {
        styles += style.outerHTML;
    });

    // Main wrapper
    var wrapper = document.createElement('div');

    wrapper.style.cssText = `
        width: 100%;
        max-width: 760px;
        margin: 0 auto;
        padding: 0 10px;
        background:#fff;
        font-family: Arial, sans-serif;
        font-size:12px;
        color:#000;
        box-sizing:border-box;
    `;

    // Add styles
    var styleHolder = document.createElement('div');
    styleHolder.innerHTML = `
        ${styles}
        <style>

        body{
            margin:0;
            padding:0;
        }

        table{
            width:100% !important;
        }

        img{
            max-width:100% !important;
        }

        .numerology-chart,
        .main-table,
        .attributes_tbl,
        .remedies_tbl{
            width:100% !important;
        }

        </style>
    `;

    wrapper.appendChild(styleHolder);


    // ============================
    // HEADER
    // ============================

    var header = document.createElement('div');

    header.innerHTML = `
        <div style="width:100%; border-bottom:1px solid #ddd; padding-bottom:10px; margin-bottom:20px;">

            <div style="display:flex; align-items:center;">

                <div style="width:80px;">
                    <img src="${window.location.origin}/images/logo/pdflogo.jpg" style="width:70px;">
                </div>

                <div style="flex:1;">

                    <div style="font-size:18px; font-weight:bold;">
                        Name Numerology Report
                    </div>

                    <div style="font-size:12px;">
                        BY ASTRO NUMEROLOGIST ${document.getElementById('astro_name') ? document.getElementById('astro_name').innerText : ''}
                    </div>

                    <div style="font-size:12px;">
                        CREATED BY ASTRONUMERO QUEEN SADHNA GULATI
                    </div>

                </div>

            </div>

        </div>
    `;

    wrapper.appendChild(header);



    // ============================
    // TITLE
    // ============================

    var anyAdded = false;

    moduleIds.forEach(function(id) {

        var el = document.getElementById(id);

        if (!el) return;

        if (el.classList.contains('excluded')) return;

        var clone = el.cloneNode(true);

        clone.classList.remove('excluded');
        clone.removeAttribute('id');

        clone.style.marginBottom = "20px";
        clone.style.pageBreakInside = "avoid";
        clone.style.width = "100%";

        // Remove toggle
        clone.querySelectorAll('.no-print, .module-heading-row')
        .forEach(function(e){
            e.remove();
        });

        // remove editable
        clone.querySelectorAll('[contenteditable]')
        .forEach(function(e){
            e.removeAttribute('contenteditable');
        });

        // textarea fix
        clone.querySelectorAll('textarea')
        .forEach(function(textarea){

            var div = document.createElement('div');
            div.innerHTML = textarea.value.replace(/\n/g,"<br>");
            textarea.parentNode.replaceChild(div, textarea);

        });

        // input fix
        clone.querySelectorAll('input[type="text"]')
        .forEach(function(input){

            var span = document.createElement('span');
            span.innerHTML = input.value;
            input.parentNode.replaceChild(span, input);

        });

        wrapper.appendChild(clone);

        anyAdded = true;

    });


    if (!anyAdded) {

        alert('Please enable at least one module');

        btn.disabled = false;

        btn.innerHTML =
        '<i class="fas fa-file-pdf"></i> Generate PDF (Download)';

        return;
    }


    document.body.appendChild(wrapper);


    setTimeout(function() {

        html2pdf()
        .set({

            margin: [5,5,5,5],

            filename: 'Name-Numerology-Report.pdf',

            image: {
                type: 'jpeg',
                quality: 0.98
            },

            html2canvas: {
                scale: 2,
                useCORS: true,
                scrollX: 0,
                scrollY: 0
            },

            jsPDF: {
                unit: 'mm',
                format: 'a4',
                orientation: 'portrait'
            },

            pagebreak: {
                mode: ['css', 'legacy']
            }

        })
        .from(wrapper)
        .save()
        .then(function(){

            document.body.removeChild(wrapper);

            btn.disabled = false;

            btn.innerHTML =
            '<i class="fas fa-file-pdf"></i> Generate PDF (Download)';

        });

    },600);

}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/user/numerology/name.blade.php ENDPATH**/ ?>