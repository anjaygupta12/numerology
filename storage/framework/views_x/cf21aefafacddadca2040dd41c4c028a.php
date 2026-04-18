<?php $__env->startSection('title', 'Order Details'); ?>

<?php $__env->startSection('page-title', 'Order Details'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Order #<?php echo e($order->id); ?></h5>
            <div>
                <a href="<?php echo e(route('admin.orders.edit', $order)); ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
        <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted">Order Information</h6>
                            <table class="table">
                                <tr>
                                    <th style="width: 150px;">Order ID</th>
                                    <td><?php echo e($order->id); ?></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td><?php echo e($order->created_at->format('M d, Y h:i A')); ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php if($order->status == 'pending'): ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php elseif($order->status == 'processing'): ?>
                                            <span class="badge bg-info">Processing</span>
                                        <?php elseif($order->status == 'completed'): ?>
                                            <span class="badge bg-success">Completed</span>
                                        <?php elseif($order->status == 'cancelled'): ?>
                                            <span class="badge bg-danger">Cancelled</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td><?php echo e($order->payment_method); ?></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>₹<?php echo e(number_format($order->amount, 2)); ?></td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <h6 class="text-muted">User Information</h6>
                                    <table class="table">
                                        <tr>
                                            <th style="width: 100px;">User ID</th>
                                            <td><?php echo e($order->user->id); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo e($order->user->name); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo e($order->user->email); ?></td>
                                        </tr>
                                    </table>
                                    <a href="<?php echo e(route('admin.users.show', $order->user)); ?>" class="btn btn-sm btn-outline-primary">View User Profile</a>
                                </div>
                                
                                <div class="col-md-12">
                                    <h6 class="text-muted">Package Information</h6>
                                    <table class="table">
                                        <tr>
                                            <th style="width: 100px;">Package</th>
                                            <td><?php echo e($order->package->name); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td><?php echo e(ucfirst($order->package->type)); ?> Numerology</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>₹<?php echo e(number_format($order->package->price, 2)); ?></td>
                                        </tr>
                                    </table>
                                    <a href="<?php echo e(route('admin.packages.show', $order->package)); ?>" class="btn btn-sm btn-outline-primary">View Package Details</a>
                                </div>
                            </div>
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
                    
                    <div class="mt-4">
                        <h6 class="text-muted">Update Order Status</h6>
                        <form action="<?php echo e(route('admin.orders.update', $order)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="update_status" value="1">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <select class="form-select" name="status">
                                        <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                        <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                                        <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                        <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>