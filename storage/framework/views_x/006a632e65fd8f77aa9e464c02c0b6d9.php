<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-file-invoice me-2"></i>Order Details</h4>
        <a href="<?php echo e(route('user.orders.index')); ?>" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Back to Orders
        </a>
    </div>
    <div class="content-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted">Order Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Order ID:</th>
                                    <td><?php echo e($order->id); ?></td>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <td><?php echo e($order->created_at->format('M d, Y h:i A')); ?></td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        <?php if($order->status == 'pending'): ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php elseif($order->status == 'completed'): ?>
                                            <span class="badge bg-success">Completed</span>
                                        <?php elseif($order->status == 'cancelled'): ?>
                                            <span class="badge bg-danger">Cancelled</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Method:</th>
                                    <td><?php echo e($order->payment_method); ?></td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td>₹<?php echo e(number_format($order->amount, 2)); ?></td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="text-muted">Package Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Package:</th>
                                    <td><?php echo e($order->package->name); ?></td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td><?php echo e(ucfirst($order->package->type)); ?> Numerology</td>
                                </tr>
                                <tr>
                                    <th>Price:</th>
                                    <td>₹<?php echo e(number_format($order->package->price, 2)); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <?php if($order->description): ?>
                        <div class="mt-4">
                            <h6 class="text-muted">Additional Information</h6>
                            <p><?php echo e($order->description); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($order->payment_screenshot): ?>
                        <div class="mt-4">
                            <h6 class="text-muted">Payment Screenshot</h6>
                            <div class="mt-2">
                                <img src="<?php echo e(asset('storage/' . $order->payment_screenshot)); ?>" alt="Payment Screenshot" class="img-fluid img-thumbnail" style="max-height: 300px;">
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($order->status == 'completed'): ?>
                        <div class="mt-4">
                            <h6 class="text-muted">Access Your Numerology Report</h6>
                            <p>Your order has been completed. You can now access your numerology report.</p>
                            
                            <?php if($order->package->type == 'name'): ?>
                                <a href="<?php echo e(route('user.numerology.name')); ?>" class="btn btn-primary">Access Name Numerology</a>
                            <?php elseif($order->package->type == 'mobile'): ?>
                                <a href="<?php echo e(route('user.numerology.mobile')); ?>" class="btn btn-primary">Access Mobile Numerology</a>
                            <?php elseif($order->package->type == 'birth'): ?>
                                <a href="<?php echo e(route('user.numerology.birth')); ?>" class="btn btn-primary">Access Birth Numerology</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/user/orders/show.blade.php ENDPATH**/ ?>