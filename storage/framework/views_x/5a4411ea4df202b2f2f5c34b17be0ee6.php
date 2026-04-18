<?php $__env->startSection('content'); ?>
    <style>
        .detail-info {
            background:#F5F5DC;
        }

        table.grid-table{
            width:50%;
            text-align: center;   
            margin:10px auto;
        }

        table.grid-table td{
            width:100px;
            height:85px;
            background:#e1eeda;
            border:1px solid #222222;
        }

        .card .card-body h4{
            padding:10px;
            background:#CFF4FC;
        }

        .heading-box{
            padding: 10px;
            background: #f5f5dc;
        }

        .heading-box h5{
            padding: 0;
            margin:0;
            background: #f5f5dc;
        }

        .recommendations-tbl td.rec-td-title{
            background:#f5f5dc;
        }

        
    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <h4 class="content-title"><i class="fas fa-mobile-alt me-2"></i>Mobile Number Numerology</h4>
            <span>Discover the influence of your mobile number</span>
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
                <p><strong>Mobile Number Numerology</strong> analyzes the vibrations of your phone number to reveal its
                    influence on your daily communications, relationships, and opportunities.</p>
            </div>

            <form action="<?php echo e(route('user.numerology.mobile.calculate')); ?>" method="POST">
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
unset($__errorArgs, $__bag); ?>" id="middle_name"
                            name="middle_name" value="<?php echo e(old('middle_name', $result['middle_name'] ?? '')); ?>">
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
                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Enter Mobile Number</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mobile_number"
                        name="mobile_number" value="<?php echo e(old('mobile_number', $result['mobile_number'] ?? '')); ?>" placeholder="e.g., 9876543210" required>
                    <div class="form-text">Enter your 10-digit mobile number without country code.</div>
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

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Calculate Mobile Numerology</button>
                </div>
            </form>

            <?php if(isset($result)): ?>
                <div class="mt-4">
                    <div class="card result-card">
                        <div class="card-header text-dark d-flex justify-content-between align-items-center" style="background:#ffd966;">
                            <div class="row w-100">
                                <div class="col-md-2 text-center">
                                    <img src="<?php echo e(asset('images/logo/logo_from_pdf.png')); ?>" width="80px" class="mt-1">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <h3>Mobile Numerology Premium</h3>
                                        <p class="p-0 m-0">
                                            BY ASTROVASTU NUMEROLOGIST <b> <?php echo e(auth()->user()->name); ?> </b>
                                        </p>
                                        <p class="mb-0">
                                            CERTIFIED BY ASTRONUMERO QUEEN SADHNA GULATI
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>                            
                        </div>
                        <div class="card-body" style="background:#d4b8ea">
                            
                            <div class="row my-5">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item border-1">
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">Full Name: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e($result['full_name']); ?></div>
                                            </div>
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">Gender: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e(strtoupper($result['gender'])); ?></div>
                                            </div>
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">Date Of Birth: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e(date('d M, Y', strtotime($result['birth_date']))); ?></div>
                                            </div>
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">Mobile: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e($result['mobile']); ?></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item border-1">
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">BN: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e($result['bn_single']); ?> (Friendly)</div>
                                            </div>
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">DN: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e($result['dn_single']); ?> (Friendly)</div>
                                            </div>
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">Mobile Compound: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e($result['number_compound']); ?></div>
                                            </div>
                                            <div class="d-flex my-3">
                                                <div class="detail-name fw-bold w-50 p-1">Mobile Root: </div>
                                                <div class="detail-info w-50 px-2 py-1 border border-dark"><?php echo e($result['number_root']); ?></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>

                            
                            <div class="row my-5">
                                <div class="col-sm-12 mb-4">
                                    <h4>Natal & Mobile Grids</h4>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center py-4" style="border:1px dashed #000000">
                                        <h5>Natal Grid</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered grid-table">
                                                <tbody>
                                                    <?php $__currentLoopData = $result['vedic_chart_array']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chart_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($chart_row[0]); ?></td>
                                                            <td><?php echo e($chart_row[1]); ?></td>
                                                            <td><?php echo e($chart_row[2]); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center py-4" style="border:1px dashed #000000">
                                        <h5>Mobile Grid</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered grid-table">
                                                <tbody>
                                                    <?php $__currentLoopData = $result['mobile_chart_array']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chart_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($chart_row[0]); ?></td>
                                                            <td><?php echo e($chart_row[1]); ?></td>
                                                            <td><?php echo e($chart_row[2]); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            
                            <div class="row my-5">
                                <div class="col-sm-12 mb-4">
                                    <h4>Mobile Compound and Root Prediction</h4>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center border border-dark pb-4">
                                        <div class="heading-box">
                                            <h5> Mobile Compound : <?php echo e($result['number_compound']); ?> - Prediction</h5>
                                        </div>
                                        <p class="p-4 m-0">Very good no - can give anyone with any business - international name and fame - multi talented - more than 2 sources Of income - well balanced life - divine support - can reach top position thro' continuous efforts • a very good compound if you don't get PR or govt support - they can rise rapidly in corporate world</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center border border-dark pb-4">
                                        <div class="heading-box">
                                            <h5> Digit Sum = <?php echo e($result['number_root']); ?> : Effect on Numero Grid</h5>
                                        </div>                                       
                                        <p class="p-4 m-0">
                                             Royal nature, Leadership quality, Confident, Easy name & fame, Good management, Straight forward, Independent, Farsightedness, Good in friendship, Innovators, Pioneers, Blessed with son
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="row my-5">
                                <div class="col-sm-12 mb-4">
                                    <h4>WALL PAPER & DP RECOMMENDATIONS</h4>                                    
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered recommendations-tbl">
                                        <tbody>
                                            <tr>
                                                <td class="rec-td-title">FOR DP</td>
                                                <td>As BN is friendly use any DP or your Photo</td>
                                            </tr>
                                            <tr>
                                                <td class="rec-td-title">WALL PAPER</td>
                                                <td>As DN is friendly use any Wall Paper</td>
                                            </tr>
                                            <tr>
                                                <td class="rec-td-title">PHONE COLOR</td>
                                                <td>Yellow, Green, Silky, Grey</td>
                                            </tr>
                                        </tbody>    
                                    </table>  
                                     
                                </div>
                                
                            </div>

                            <hr>
                                                      
                            <div class="row my-5">
                                <div class="col-sm-12 mb-4">
                                    <h4>DESCRIPTION OF SHOT GUNS FROM THE MOBILE NUMBER</h4>                                    
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered recommendations-tbl">
                                        <tbody>
                                            <?php $__currentLoopData = $result['r_arr']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="rec-td-title"><?php echo e($rsg); ?></td>
                                                <td>As BN is friendly use any DP or your Photo</td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </tbody>    
                                    </table>                                       
                                </div>
                            </div>


                            <hr>
                                                      
                            <div class="row my-5">
                                <div class="col-sm-12 mb-4">
                                    <h4>Yogas created by your Mobile Number Grid</h4>                                    
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered recommendations-tbl">
                                        <tbody>
                                            <?php $__currentLoopData = $result['r_arr']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="rec-td-title"><?php echo e($rsg); ?></td>
                                                <td>As BN is friendly use any DP or your Photo</td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </tbody>    
                                    </table>                                       
                                </div>
                            </div>

                            <hr>
                                                      
                            <div class="row my-5">
                                <div class="col-sm-12 mb-4">
                                    <h4>Yogas activated by your mobile Number in DOB NATAL Grid</h4>                                    
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered recommendations-tbl">
                                        <tbody>
                                            <?php $__currentLoopData = $result['r_arr']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="rec-td-title"><?php echo e($rsg); ?></td>
                                                <td>As BN is friendly use any DP or your Photo</td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </tbody>    
                                    </table>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/user/numerology/mobile.blade.php ENDPATH**/ ?>