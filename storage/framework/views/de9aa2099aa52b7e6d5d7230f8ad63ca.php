<?php $__env->startSection('content'); ?>
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

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mobile_number" class="form-label">Enter Mobile Number</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="mobile_number" name="mobile_number" value="<?php echo e(old('mobile_number')); ?>"
                            placeholder="e.g., 9876543210" required>
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

                    <div class="col-md-6 mb-3">
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
                    <div class="col-md-6 mb-3">
                        <label for="birth_date" class="form-label">Name</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="birth_date"
                            name="name" value="<?php echo e(old('name', $result['name'] ?? '')); ?>" required>
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


                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Calculate Mobile Numerology</button>
                </div>
            </form>

            <?php if(isset($result)): ?>
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Numerology Results for: <?php echo e($mobile_number); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Mobile Number Sum</h6>
                                    <div class="display-4 text-center mb-3"><?php echo e($result['mobile_sum']); ?></div>
                                    <p><?php echo e($result['mobile_sum_meaning']); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Reduced Number</h6>
                                    <div class="display-4 text-center mb-3"><?php echo e($result['reduced_number']); ?></div>
                                    <p><?php echo e($result['reduced_number_meaning']); ?></p>
                                </div>

                            </div>

                            <div class="mt-4">
                                <h6>Number Frequency Analysis</h6>
                                <div class="row">
                                    <?php $__currentLoopData = $result['number_frequency']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number => $frequency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h5>Number <?php echo e($number); ?></h5>
                                                    <p class="mb-0">Appears <?php echo e($frequency); ?> times</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6>Compatibility</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Career Compatibility:</strong> <?php echo e($result['career_compatibility']); ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Relationship Compatibility:</strong>
                                            <?php echo e($result['relationship_compatibility']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6>Detailed Analysis</h6>
                                <p><?php echo e($result['detailed_analysis']); ?></p>
                            </div>

                            <div class="mt-4">
                                <h6>Recommendations</h6>
                                <ul>
                                    <?php $__currentLoopData = $result['recommendations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($recommendation); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/user/numerology/mobile.blade.php ENDPATH**/ ?>