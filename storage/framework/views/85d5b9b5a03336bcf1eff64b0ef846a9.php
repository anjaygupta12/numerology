<?php $__env->startSection('content'); ?>
    <style>
        /* ── Base Layout ─────────────────────────────────────────────────────────── */
        .content-wrapper {
            padding: 20px;
        }

        * {
            box-sizing: border-box;
        }

        /* ── Section Titles ─────────────────────────────────────────────────────── */
        .section-title {
            background: linear-gradient(135deg, #003366, #005599);
            color: #fff;
            padding: 10px 16px;
            font-size: 15px;
            font-weight: bold;
            margin: 24px 0 10px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ── Summary Cards ──────────────────────────────────────────────────────── */
        .summary-card {
            border: 1px solid #ccc;
            background: #fff;
            padding: 10px 16px;
            display: inline-block;
            margin: 4px;
            min-width: 110px;
            text-align: center;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .08);
            transition: transform .2s;
        }

        .summary-card:hover {
            transform: translateY(-2px);
        }

        .summary-card .sc-label {
            font-size: 11px;
            color: #666;
        }

        .summary-card .sc-value {
            font-size: 24px;
            font-weight: bold;
            color: #003366;
        }

        .summary-card .sc-planet {
            font-size: 11px;
            color: #999;
            font-style: italic;
        }

        /* ── Natal Grids ────────────────────────────────────────────────────────── */
        .natal-grid {
            border-collapse: collapse;
            width: 165px;
        }

        .natal-header {
            background: #003366;
            color: #fff;
            text-align: center;
            border: 1px solid #003366;
            padding: 6px;
            font-weight: bold;
            font-size: 13px;
        }

        .natal-cell {
            width: 55px;
            height: 55px;
            border: 1px solid #aaa;
            text-align: center;
            vertical-align: middle;
            background: #f9f5e8;
            font-weight: bold;
            font-size: 15px;
            color: #222;
        }

        /* ── Pairing Table ──────────────────────────────────────────────────────── */
        .pairing-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .pairing-table th {
            background: #d6e9f8;
            border: 1px solid #aaa;
            padding: 7px 10px;
            text-align: center;
            font-weight: bold;
        }

        .pairing-table td {
            border: 1px solid #ddd;
            padding: 7px 10px;
            text-align: center;
        }

        /* ── Badges ─────────────────────────────────────────────────────────────── */
        .badge-friendly {
            background: #28a745;
            color: #fff;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-neutral {
            background: #ffc107;
            color: #000;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-enemy {
            background: #dc3545;
            color: #fff;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-yoga {
            background: #6f42c1;
            color: #fff;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-prof {
            background: #17a2b8;
            color: #fff;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
        }

        .badge-shotgun {
            background: #fd7e14;
            color: #fff;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
        }

        /* ── Digit Row ──────────────────────────────────────────────────────────── */
        .digit-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
        }

        .digit-box {
            border: 1px solid #bbb;
            width: 56px;
            text-align: center;
            background: #fff;
            padding: 4px 0;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
        }

        .digit-box .d-num {
            font-size: 20px;
            font-weight: bold;
            color: #003366;
        }

        .digit-box .d-bn {
            font-size: 10px;
            margin-top: 2px;
            padding: 1px;
        }

        .digit-box .d-dn {
            font-size: 10px;
            padding: 1px;
        }

        /* ── Planet Card ────────────────────────────────────────────────────────── */
        .planet-card {
            border-radius: 8px;
            padding: 14px;
            margin: 6px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
        }

        .planet-card h5 {
            margin: 0 0 8px;
            font-size: 16px;
            font-weight: 700;
        }

        .planet-card ul {
            margin: 0;
            padding-left: 18px;
        }

        .planet-card ul li {
            font-size: 13px;
            margin-bottom: 3px;
        }

        .planet-card .represents {
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
            padding: 5px 8px;
            background: rgba(255, 255, 255, .4);
            border-radius: 4px;
        }

        /* ── Yoga Cards ─────────────────────────────────────────────────────────── */
        .yoga-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            margin: 6px 0;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
        }

        .yoga-card .yoga-name {
            font-weight: 700;
            color: #003366;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .yoga-card .yoga-nums {
            font-size: 18px;
            font-weight: bold;
            color: #6f42c1;
            margin-bottom: 6px;
        }

        .yoga-card ul {
            margin: 0;
            padding-left: 16px;
        }

        .yoga-card ul li {
            font-size: 12px;
            color: #444;
            margin-bottom: 2px;
        }

        .yoga-category {
            font-size: 10px;
            background: #e8eaf6;
            color: #3949ab;
            padding: 2px 8px;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 6px;
        }

        /* ── Shotgun Pair Cards ─────────────────────────────────────────────────── */
        .shotgun-card {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 6px;
            padding: 10px;
            margin: 5px 0;
        }

        .shotgun-card .sg-pair {
            font-size: 22px;
            font-weight: bold;
            color: #856404;
        }

        .shotgun-card .sg-desc {
            font-size: 12px;
            color: #664d03;
            margin-top: 4px;
        }

        .shotgun-card .sg-pos {
            font-size: 10px;
            color: #997404;
            font-style: italic;
        }

        /* ── Remedy Card ────────────────────────────────────────────────────────── */
        .remedy-card {
            border-radius: 8px;
            padding: 16px;
            color: #fff;
            margin: 8px 0;
        }

        .remedy-card h5 {
            margin: 0 0 10px;
            font-size: 16px;
        }

        .remedy-item {
            background: rgba(255, 255, 255, .2);
            border-radius: 6px;
            padding: 8px;
            margin-bottom: 8px;
        }

        .remedy-item .r-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            opacity: .8;
        }

        .remedy-item .r-value {
            font-size: 13px;
            margin-top: 3px;
        }

        /* ── Profession Card ────────────────────────────────────────────────────── */
        .prof-card {
            background: #e8f5e9;
            border: 1px solid #a5d6a7;
            border-radius: 8px;
            padding: 10px;
            margin: 5px;
            display: inline-block;
            min-width: 160px;
            text-align: center;
        }

        .prof-card .pf-icon {
            font-size: 24px;
        }

        .prof-card .pf-name {
            font-weight: 600;
            font-size: 13px;
            color: #1b5e20;
            margin: 4px 0;
        }

        .prof-card .pf-combo {
            font-size: 11px;
            color: #388e3c;
        }

        .prof-card.pf-match {
            background: #c8e6c9;
            border-color: #66bb6a;
            box-shadow: 0 0 0 2px #4caf50;
        }

        /* ── Tabs ────────────────────────────────────────────────────────────────── */
        .nav-tabs .nav-link {
            color: #003366;
            font-size: 13px;
        }

        .nav-tabs .nav-link.active {
            background: #003366;
            color: #fff;
            border-color: #003366;
        }

        /* ── Grid container ─────────────────────────────────────────────────────── */
        .grids-wrap {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .grid-wrap-single {
            text-align: center;
        }

        .grid-sub {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
        }

        /* ── Responsive ─────────────────────────────────────────────────────────── */
        @media(max-width:576px) {
            .natal-cell {
                width: 44px;
                height: 44px;
                font-size: 13px;
            }

            .natal-grid {
                width: 135px;
            }

            .digit-box {
                width: 46px;
            }
        }
    </style>

    <div class="content-wrapper">
        <div class="content-header">
            <h4 class="content-title"><i class="fas fa-mobile-alt me-2"></i>Advance Predictive Mobile Numerology</h4>
            <span class="text-muted">Analyse the vibrations of your mobile number against your birth numbers (SRK
                Method)</span>
        </div>

        <div class="content-body">

            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>

            
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo e(route('user.numerology.mobile.calculate')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="mobile_number" class="form-label fw-bold">📱 Mobile Number</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="mobile_number" name="mobile_number"
                                    value="<?php echo e(old('mobile_number', $result['mobile_number'] ?? '')); ?>"
                                    placeholder="e.g. 9876543210" required>
                                <?php $__errorArgs = ['mobile_number'];
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
                            <div class="col-md-6">
                                <label for="birth_date" class="form-label fw-bold">🎂 Birth Date</label>
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
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold">
                                    <i class="fas fa-user me-1"></i> 📝 Name
                                </label>
                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="birth_date" name="name" value="<?php echo e(old('name', $result['name'] ?? '')); ?>"
                                    required>
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
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-calculator me-1"></i> Calculate Mobile Numerology
                        </button>
                    </form>
                </div>
            </div>

            <?php if(isset($result)): ?>

                
                
                
                <div class="section-title">🔢 Core Numbers</div>
                <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:16px;">
                    <div class="summary-card">
                        <div class="sc-label">Birth Number (BN)</div>
                        <div class="sc-value"><?php echo e($result['bn']); ?></div>
                        <div class="sc-label">(Day <?php echo e($result['bn_raw']); ?>)</div>
                        <?php if(!empty($result['bn_description'])): ?>
                            <div class="sc-planet"><?php echo e($result['bn_description']['planet'] ?? ''); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="summary-card">
                        <div class="sc-label">Destiny Number (DN)</div>
                        <div class="sc-value"><?php echo e($result['dn']); ?></div>
                        <div class="sc-label">(Sum <?php echo e($result['dn_raw']); ?>)</div>
                        <?php if(!empty($result['dn_description'])): ?>
                            <div class="sc-planet"><?php echo e($result['dn_description']['planet'] ?? ''); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="summary-card">
                        <div class="sc-label">Mobile Number (MN)</div>
                        <div class="sc-value"><?php echo e($result['mn']); ?></div>
                        <div class="sc-label">(Sum <?php echo e($result['mn_raw']); ?>)</div>
                        <?php if(!empty($result['mn_description'])): ?>
                            <div class="sc-planet"><?php echo e($result['mn_description']['planet'] ?? ''); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="summary-card">
                        <div class="sc-label">BS</div>
                        <div class="sc-value"><?php echo e($result['bs']); ?></div>
                    </div>
                    <div class="summary-card">
                        <div class="sc-label">Zodiac</div>
                        <div class="sc-value" style="font-size:14px;padding-top:6px;"><?php echo e($result['zodiac_sign']); ?></div>
                        <div class="sc-label">No. <?php echo e($result['zodiac_num']); ?></div>
                    </div>
                </div>

                
                
                
                <div class="section-title">🪐 Planet / Number Analysis</div>
                <div class="row">
                    <?php $__currentLoopData = ['bn' => 'Birth Number', 'dn' => 'Destiny Number', 'mn' => 'Mobile Number']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $desc = $result[$key . '_description'] ?? []; ?>
                        <?php if(!empty($desc)): ?>
                            <div class="col-md-4">
                                <div class="planet-card"
                                    style="background:<?php echo e($desc['color'] ?? '#003366'); ?>22;border:2px solid <?php echo e($desc['color'] ?? '#003366'); ?>;">
                                    <h5 style="color:<?php echo e($desc['color'] ?? '#003366'); ?>;">
                                        <?php echo e($desc['symbol'] ?? ''); ?> <?php echo e($label); ?> – <?php echo e($result[$key]); ?>

                                        (<?php echo e($desc['planet'] ?? ''); ?>)
                                    </h5>
                                    <ul>
                                        <?php $__currentLoopData = array_slice($desc['traits'] ?? [], 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trait): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($trait); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="represents">🌟 <?php echo e($desc['represents'] ?? ''); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                
                
                <div class="section-title">📊 Vedic Natal Grids</div>
                <div class="grids-wrap">

                    
                    <div class="grid-wrap-single">
                        <table class="natal-grid" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="natal-header" colspan="3">
                                    NATAL GRID – DOB<br>
                                    <small
                                        style="font-weight:normal;"><?php echo e(date('d-m-Y', strtotime($result['birth_date']))); ?></small>
                                </td>
                            </tr>
                            <?php $__currentLoopData = $result['dob_vedic_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="natal-cell"><?php echo e($cell); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <div class="grid-sub">BN = <?php echo e($result['bn']); ?> &nbsp;|&nbsp; DN = <?php echo e($result['dn']); ?></div>
                    </div>

                    
                    <div class="grid-wrap-single">
                        <table class="natal-grid" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="natal-header" colspan="3">
                                    NATAL GRID – MOBILE<br>
                                    <small style="font-weight:normal;"><?php echo e($result['mobile_number']); ?></small>
                                </td>
                            </tr>
                            <?php $__currentLoopData = $result['mobile_vedic_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="natal-cell"><?php echo e($cell); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <div class="grid-sub">MN = <?php echo e($result['mn']); ?> &nbsp;|&nbsp; Sum = <?php echo e($result['mn_raw']); ?></div>
                    </div>

                    
                    <div class="grid-wrap-single">
                        <table class="natal-grid" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="natal-header" colspan="3">VEDIC GRID REFERENCE</td>
                            </tr>
                            <?php $__currentLoopData = [[3, 1, 9], [6, 7, 5], [2, 8, 4]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="natal-cell" style="background:#e8f4fd;color:#003366;">
                                            <?php echo e($cell); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <div class="grid-sub">Standard Position Reference</div>
                    </div>
                </div>

                
                
                
                <div class="section-title">🔗 Number Pairing (BN/DN vs MN)</div>
                <table class="pairing-table">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Value</th>
                            <th>Planet</th>
                            <th>vs Mobile MN (<?php echo e($result['mn']); ?>)</th>
                            <th>Verdict</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Birth Number (BN)</strong></td>
                            <td><?php echo e($result['bn']); ?></td>
                            <td><?php echo e($result['bn_description']['planet'] ?? '-'); ?></td>
                            <td><?php echo e($result['bn']); ?> ↔ <?php echo e($result['mn']); ?></td>
                            <td><span
                                    class="badge-<?php echo e($result['bn_mn_relation']); ?>"><?php echo e(ucfirst($result['bn_mn_relation'])); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Destiny Number (DN)</strong></td>
                            <td><?php echo e($result['dn']); ?></td>
                            <td><?php echo e($result['dn_description']['planet'] ?? '-'); ?></td>
                            <td><?php echo e($result['dn']); ?> ↔ <?php echo e($result['mn']); ?></td>
                            <td><span
                                    class="badge-<?php echo e($result['dn_mn_relation']); ?>"><?php echo e(ucfirst($result['dn_mn_relation'])); ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                
                
                
                
                
                
                

                
                
                
                <div class="section-title">🔫 Shot Gun Number Pairs Detected</div>
                <?php if(!empty($result['shotgun_pairs'])): ?>
                    <div class="row">
                        <?php $__currentLoopData = $result['shotgun_pairs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="shotgun-card">
                                    <div class="sg-pair"><?php echo e($sg['pair']); ?></div>
                                    <div class="sg-desc"><?php echo e($sg['description']); ?></div>
                                    <div class="sg-pos"><?php echo e($sg['position']); ?></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted small">No specific Shot Gun pairs detected in consecutive digits.</p>
                <?php endif; ?>

                
                
                
                <div class="section-title">🕉️ Yogas Detected in Charts</div>

                <ul class="nav nav-tabs mb-3" id="yogaTabs" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-mobile-yogas">
                            📱 Mobile Yogas (<?php echo e(count($result['mobile_yogas'])); ?>)
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-dob-yogas">
                            🎂 DOB Yogas (<?php echo e(count($result['dob_yogas'])); ?>)
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <?php $__currentLoopData = ['mobile_yogas' => 'tab-mobile-yogas', 'dob_yogas' => 'tab-dob-yogas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade <?php echo e($key === 'mobile_yogas' ? 'show active' : ''); ?>"
                            id="<?php echo e($tabId); ?>">
                            <?php if(!empty($result[$key])): ?>
                                <div class="row">
                                    <?php $__currentLoopData = $result[$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4">
                                            <div class="yoga-card">
                                                <div class="yoga-category"><?php echo e($det['category']); ?></div>
                                                <div class="yoga-nums">
                                                    <?php $__currentLoopData = $det['yoga']['numbers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($n); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="yoga-name"><?php echo e($det['yoga']['name']); ?></div>
                                                <ul>
                                                    <?php $__currentLoopData = array_slice($det['yoga']['traits'], 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($t); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted small">No major yogas detected in this chart.</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                
                
                <div class="section-title">💼 Profession Indicators</div>

                <?php if(!empty($result['profession_matches'])): ?>
                    <div class="alert alert-success" style="font-size:13px;">
                        <strong>✅ Matched Professions from your Mobile Number:</strong>
                        <?php $__currentLoopData = $result['profession_matches']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge-prof ms-2"><?php echo e($pm['icon']); ?> <?php echo e($pm['profession']); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <p style="font-size:12px;color:#666;">All profession indicators (PDF reference):</p>
                <div style="display:flex;flex-wrap:wrap;gap:4px;">
                    <?php $__currentLoopData = $result['all_professions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isMatch = !empty($result['profession_matches']) && in_array($prof['profession'], array_column($result['profession_matches'], 'profession')); ?>
                        <div class="prof-card <?php echo e($isMatch ? 'pf-match' : ''); ?>">
                            <div class="pf-icon"><?php echo e($prof['icon']); ?></div>
                            <div class="pf-name"><?php echo e($prof['profession']); ?></div>
                            <div class="pf-combo"><?php echo e($prof['combinations']); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                
                
                <div class="section-title">🌿 Remedy for Birth Number <?php echo e($result['bn']); ?></div>
                <?php if(!empty($result['remedy'])): ?>
                    <?php $rem = $result['remedy']; ?>
                    <div class="remedy-card"
                        style="background:linear-gradient(135deg,<?php echo e($rem['color']); ?>,<?php echo e($rem['color']); ?>99);">
                        <h5>🛡️ Remedies for Birth Number <?php echo e($result['bn']); ?>

                            (<?php echo e($result['bn_description']['planet'] ?? ''); ?>)</h5>

                        <div class="remedy-item">
                            <div class="r-label">📱 Mobile Screen Saver</div>
                            <div class="r-value"><?php echo e($rem['screensaver']); ?></div>
                        </div>
                        <div class="remedy-item">
                            <div class="r-label">📿 Bracelet</div>
                            <div class="r-value"><?php echo e($rem['bracelet']); ?></div>
                        </div>
                        <div class="remedy-item">
                            <div class="r-label">💎 Mani (Gem)</div>
                            <div class="r-value" style="font-size:16px;font-weight:700;"><?php echo e($rem['mani']); ?></div>
                        </div>
                    </div>
                <?php endif; ?>

                
                
                
                <div class="section-title">📋 Mobile Based Shot Gun Number</div>

                <div style="overflow-x:auto;">
                    <table class="pairing-table">
                        <thead>
                            <tr>
                                <th>Pair</th>
                                <th>Interpretation</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                                /* --------------------------
            Your Mobile Number
            ---------------------------*/
                                // dd($result['mobile']);

                                $mobile = $result['mobile_number'] ?? 0; // Change variable if needed

                                /* --------------------------
            Create Mobile Pairs
            ---------------------------*/

                                $digits = str_split($mobile);

                                $userPairs = [];

                                for ($i = 0; $i < count($digits) - 1; $i++) {
                                    $userPairs[] = $digits[$i] . '-' . $digits[$i + 1];
                                    $userPairs[] = $digits[$i + 1] . '-' . $digits[$i];
                                }

                                /* --------------------------
            All Shot Gun Numbers
            ---------------------------*/

                                $sgAll = [
                                    ['1-2', 'Attraction on Face, Brilliance Face'],
                                    ['2-1', 'Wastage of Money'],
                                    ['1-3/3-1', 'Educated / Good Advisor'],
                                    ['1-4/4-1', 'Loan Liability and Health Issues'],
                                    ['1-5/5-1', 'Budh-Aditya Yoga / Benefits from Father'],
                                    ['1-6/6-1', 'No Income at Time of Speaking / Spouse Health'],
                                    ['1-7/7-1', 'Raj Yog, Govt, International Tours, Famous'],
                                    ['1-8/8-1', 'Spouse Health Issues / Govt Issues'],
                                    ['1-9/9-1', 'Freedom Loving'],
                                    ['2-3/3-2', 'Lack of Response from Child / Enemies Can\'t Harm'],
                                    ['2-4/4-2', 'Negative Thoughts / Fear. Patience = Success'],
                                    ['2-5/5-2', 'Air Travelling Good / Occult Science'],
                                    ['2-6/6-2', 'Obstruction in Education / Sperm Issues'],
                                    ['2-7/7-2', 'Joint Pain'],
                                    ['2-8/8-2', 'Leakage / Negative Thoughts / Good Money if habits avoided'],
                                    ['2-9/9-2', 'Lakshmi Yoga'],
                                    ['3-4/4-3', 'Stubborn / Heart Problem / Paralysis'],
                                    ['3-5/5-3', 'Intelligent but Feels Lack of Money'],
                                    ['3-6/6-3', 'Having Rules and Regulations'],
                                    ['3-7/7-3', 'High Education'],
                                    ['3-8/8-3', 'Good Consultant / Judge'],
                                    ['3-9/9-3', 'Intelligence and Active'],
                                    ['4-5/5-4', 'Bandhan Yoga / Court / Hospital'],
                                    ['4-6/6-4', 'Urine Infection / Piles / Extra Marital'],
                                    ['4-7/7-4', 'Adjust and Manage Things Clearly'],
                                    ['4-8/8-4', 'Chronic Disease / Addiction'],
                                    ['4-9/9-4', 'Risk Factor / Uniform Type Work'],
                                    ['5-6/6-5', 'Money Gets Stuck'],
                                    ['5-7/7-5', 'Good Consultant / Astrologer / Writer'],
                                    ['5-8/8-5', 'Finance Sector / Big Talks on Money'],
                                    ['5-9/9-5', 'Straightforward / Bad Relations'],
                                    ['6-7/7-6', 'Music/Luxury Lover, Romance'],
                                    ['6-8/8-6', 'Major Organ Transplant & Heart Surgery'],
                                    ['6-9/9-6', 'Other Sex / Good Planner / Lover'],
                                    ['7-8/8-7', 'Healer / Spiritual but May Get Depressed'],
                                    ['7-9/9-7', 'Joint Pain / Family Turmoil'],
                                    ['8-9/9-8', 'Argumentative for Rights / Good Lawyer'],
                                ];

                                /* --------------------------
            Filter Mobile Based Pairs
            ---------------------------*/

                                $filtered = [];

                                foreach ($sgAll as $sg) {
                                    $pairs = explode('/', $sg[0]);

                                    foreach ($pairs as $pair) {
                                        if (in_array($pair, $userPairs)) {
                                            $filtered[] = $sg;
                                            break;
                                        }
                                    }
                                }

                            ?>


                            <?php if(count($filtered) > 0): ?>
                                <?php $__currentLoopData = $filtered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <span class="badge-shotgun">
                                                <?php echo e($item[0]); ?>

                                            </span>
                                        </td>

                                        <td style="font-size:12px;text-align:left;">
                                            <?php echo e($item[1]); ?>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2">No Shot Gun Numbers Found</td>
                                </tr>
                            <?php endif; ?>


                        </tbody>
                    </table>
                </div>

                <?php

                    /* =========================================
   MOBILE NUMBER
========================================= */

                    $mobile = $result['mobile_number'] ?? 0;

                    $digits = str_split($mobile);

                    /* =========================================
   2 Digit Pairs
========================================= */

                    $twoDigitPairs = [];

                    for ($i = 0; $i < count($digits) - 1; $i++) {
                        $twoDigitPairs[] = $digits[$i] . ',' . $digits[$i + 1];
                        $twoDigitPairs[] = $digits[$i + 1] . ',' . $digits[$i];
                    }

                    /* =========================================
   3 Digit Pairs
========================================= */

                    $threeDigitPairs = [];

                    for ($i = 0; $i < count($digits) - 2; $i++) {
                        $threeDigitPairs[] = $digits[$i] . ',' . $digits[$i + 1] . ',' . $digits[$i + 2];
                    }

                    /* =========================================
   4 Digit Pairs
========================================= */

                    $fourDigitPairs = [];

                    for ($i = 0; $i < count($digits) - 3; $i++) {
                        $fourDigitPairs[] =
                            $digits[$i] . ',' . $digits[$i + 1] . ',' . $digits[$i + 2] . ',' . $digits[$i + 3];
                    }

                ?>



                <div class="section-title">📖 Complete Yoga Reference (Mobile Based)</div>

                <ul class="nav nav-tabs mb-3">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#ref-conj">Conjunctions</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ref-hostile">Hostile</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ref-4th">4th Aspect</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ref-3digit">3 Digit</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ref-4digit">4 Digit</button>
                    </li>

                </ul>



                <div class="tab-content">




                    

                    <div class="tab-pane fade show active" id="ref-conj">

                        <div class="row">

                            <?php

                                $conjs = [
                                    ['nums' => '7,5', 'name' => 'Easy Money Yoga'],
                                    ['nums' => '3,6', 'name' => 'Don\'t Want to Marry'],
                                    ['nums' => '3,1', 'name' => 'Sun Jupiter'],
                                    ['nums' => '1,9', 'name' => 'Sun Mars'],
                                    ['nums' => '1,7', 'name' => 'Sun Ketu'],
                                    ['nums' => '6,2', 'name' => 'Venus Moon'],
                                ];

                            ?>


                            <?php $__currentLoopData = $conjs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($y['nums'], $twoDigitPairs)): ?>
                                    <div class="col-md-4">

                                        <div class="yoga-card">

                                            <div class="yoga-category">Conjunction</div>

                                            <div class="yoga-nums"><?php echo e($y['nums']); ?></div>

                                            <div class="yoga-name"><?php echo e($y['name']); ?></div>

                                        </div>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>




                    

                    <div class="tab-pane fade" id="ref-hostile">

                        <div class="row">

                            <?php

                                $hostiles = [
                                    ['nums' => '1,8', 'name' => 'Sun Saturn'],
                                    ['nums' => '2,4', 'name' => 'Moon Rahu'],
                                    ['nums' => '9,4', 'name' => 'Mars Rahu'],
                                    ['nums' => '3,9', 'name' => 'Jupiter Mars'],
                                    ['nums' => '6,5', 'name' => 'Venus Mercury'],
                                    ['nums' => '3,2', 'name' => 'Jupiter Moon'],
                                    ['nums' => '7,8', 'name' => 'Ketu Saturn'],
                                    ['nums' => '8,4', 'name' => 'Saturn Rahu'],
                                    ['nums' => '5,4', 'name' => 'Mercury Rahu'],
                                    ['nums' => '9,5', 'name' => 'Mars Mercury'],
                                    ['nums' => '2,8', 'name' => 'Moon Saturn'],
                                    ['nums' => '6,7', 'name' => 'Venus Ketu'],
                                    ['nums' => '8,5', 'name' => 'Saturn Mercury'],
                                ];

                            ?>


                            <?php $__currentLoopData = $hostiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($y['nums'], $twoDigitPairs)): ?>
                                    <div class="col-md-4">

                                        <div class="yoga-card">

                                            <div class="yoga-category">Hostile</div>

                                            <div class="yoga-nums"><?php echo e($y['nums']); ?></div>

                                            <div class="yoga-name"><?php echo e($y['name']); ?></div>

                                        </div>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>




                    

                    <div class="tab-pane fade" id="ref-4th">

                        <div class="row">

                            <?php

                                $fourthAsp = [
                                    ['nums' => '1,2', 'name' => 'Sun Moon'],
                                    ['nums' => '1,4', 'name' => 'Sun Rahu'],
                                    ['nums' => '3,8', 'name' => 'Jupiter Saturn'],
                                    ['nums' => '3,5', 'name' => 'Jupiter Mercury'],
                                    ['nums' => '9,8', 'name' => 'Mars Saturn'],
                                    ['nums' => '2,5', 'name' => 'Moon Mercury'],
                                    ['nums' => '6,4', 'name' => 'Venus Rahu'],
                                    ['nums' => '6,9', 'name' => 'Venus Mars'],
                                ];

                            ?>


                            <?php $__currentLoopData = $fourthAsp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($y['nums'], $twoDigitPairs)): ?>
                                    <div class="col-md-4">

                                        <div class="yoga-card">

                                            <div class="yoga-category">4th Aspect</div>

                                            <div class="yoga-nums"><?php echo e($y['nums']); ?></div>

                                            <div class="yoga-name"><?php echo e($y['name']); ?></div>

                                        </div>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>




                    

                    <div class="tab-pane fade" id="ref-3digit">

                        <div class="row">

                            <?php

                                $threeD = [
                                    ['nums' => '6,9,4', 'name' => 'Venus Mars Rahu'],
                                    ['nums' => '1,2,4', 'name' => 'Sun Moon Rahu'],
                                    ['nums' => '3,5,2', 'name' => 'Jupiter Moon Mercury'],
                                    ['nums' => '3,9,8', 'name' => 'Jupiter Mars Saturn'],
                                    ['nums' => '3,1,9', 'name' => 'Jupiter Sun Mars'],
                                    ['nums' => '6,7,5', 'name' => 'Venus Ketu Mercury'],
                                    ['nums' => '9,5,4', 'name' => 'Mars Mercury Rahu'],
                                    ['nums' => '3,6,2', 'name' => 'Jupiter Venus Moon'],
                                    ['nums' => '2,8,4', 'name' => 'Moon Saturn Rahu'],
                                    ['nums' => '1,7,8', 'name' => 'Sun Ketu Saturn'],
                                ];

                            ?>


                            <?php $__currentLoopData = $threeD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($y['nums'], $threeDigitPairs)): ?>
                                    <div class="col-md-4">

                                        <div class="yoga-card">

                                            <div class="yoga-category">3 Digit</div>

                                            <div class="yoga-nums"><?php echo e($y['nums']); ?></div>

                                            <div class="yoga-name"><?php echo e($y['name']); ?></div>

                                        </div>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>




                    

                    <div class="tab-pane fade" id="ref-4digit">

                        <div class="row">

                            <?php

                                $fourD = [['nums' => '1,6,5,8', 'name' => 'RAJ YOG']];

                            ?>


                            <?php $__currentLoopData = $fourD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($y['nums'], $fourDigitPairs)): ?>
                                    <div class="col-md-4">

                                        <div class="yoga-card">

                                            <div class="yoga-category">4 Digit</div>

                                            <div class="yoga-nums"><?php echo e($y['nums']); ?></div>

                                            <div class="yoga-name"><?php echo e($y['name']); ?></div>

                                        </div>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>



                </div>

                <div class="mt-4">
                    <label for="note" class="form-label fw-bold">📝 Consultant Note</label>
                    <textarea class="form-control" name="note" id="note" rows="3" placeholder="Add your notes here..."></textarea>
                </div>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/user/numerology/mobileresult.blade.php ENDPATH**/ ?>