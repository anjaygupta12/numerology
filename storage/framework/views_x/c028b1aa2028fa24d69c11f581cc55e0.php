<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-shopping-cart me-2"></i>Place Order for <?php echo e($package->name); ?></h4>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Back to Packages
        </a>
    </div>
    <div class="content-body">
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($package->name); ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo e(ucfirst($package->type)); ?> Numerology</h6>
                                    <p class="card-text"><?php echo e($package->description); ?></p>
                                    <p class="card-text"><strong>Price: ₹<?php echo e(number_format($package->price, 2)); ?></strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="<?php echo e(route('user.orders.store', $package)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="amount" name="amount" value="<?php echo e(old('amount', $package->price)); ?>" min="<?php echo e($package->price); ?>" step="0.01" required>
                            <div class="form-text">The amount must be at least ₹<?php echo e(number_format($package->price, 2)); ?></div>
                            <?php $__errorArgs = ['amount'];
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
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select class="form-select <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="payment_method" name="payment_method" required>
                                <option value="">Select Payment Method</option>
                                <option value="UPI" <?php echo e(old('payment_method') == 'UPI' ? 'selected' : ''); ?>>UPI</option>
                                <option value="Bank Transfer" <?php echo e(old('payment_method') == 'Bank Transfer' ? 'selected' : ''); ?>>Bank Transfer</option>
                                <option value="PayTM" <?php echo e(old('payment_method') == 'PayTM' ? 'selected' : ''); ?>>PayTM</option>
                                <option value="Google Pay" <?php echo e(old('payment_method') == 'Google Pay' ? 'selected' : ''); ?>>Google Pay</option>
                                <option value="PhonePe" <?php echo e(old('payment_method') == 'PhonePe' ? 'selected' : ''); ?>>PhonePe</option>
                            </select>
                            <?php $__errorArgs = ['payment_method'];
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
                            <label for="payment_screenshot" class="form-label">Payment Screenshot</label>
                            <input type="file" class="form-control <?php $__errorArgs = ['payment_screenshot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="payment_screenshot" name="payment_screenshot" accept="image/*" required>
                            <div class="form-text">Please upload a screenshot of your payment confirmation.</div>
                            <?php $__errorArgs = ['payment_screenshot'];
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
                            <label for="description" class="form-label">Additional Information (Optional)</label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description" rows="3"><?php echo e(old('description')); ?></textarea>
                            <div class="form-text">Any additional information you'd like to provide.</div>
                            <?php $__errorArgs = ['description'];
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
                        
                        <div class="alert alert-info">
                            <h6>Payment Instructions:</h6>
                            <p>Please make your payment using one of the following methods:</p>
                            <ul>
                                <li><strong>UPI ID:</strong> srknumerology@upi</li>
                                <li><strong>Bank Account:</strong> SRK Numerology, Account No: 1234567890, IFSC: SBIN0001234</li>
                                <li><strong>PayTM/Google Pay/PhonePe:</strong> +91 9876543210</li>
                            </ul>
                            <p>After making the payment, take a screenshot and upload it above.</p>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/user/orders/create.blade.php ENDPATH**/ ?>