<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-shopping-bag me-2"></i>My Orders</h4>
        <span>Track your numerology service purchases</span>
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
                    
                    <?php if($orders->isEmpty()): ?>
                        <div class="alert alert-info">
                            You haven't placed any orders yet. Browse our packages to get started.
                        </div>
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Browse Packages</a>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($order->id); ?></td>
                                            <td><?php echo e($order->package->name); ?></td>
                                            <td>₹<?php echo e(number_format($order->amount, 2)); ?></td>
                                            <td>
                                                <?php if($order->status == 'pending'): ?>
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                <?php elseif($order->status == 'completed'): ?>
                                                    <span class="badge bg-success">Completed</span>
                                                <?php elseif($order->status == 'cancelled'): ?>
                                                    <span class="badge bg-danger">Cancelled</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('user.orders.show', $order)); ?>" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/user/orders/index.blade.php ENDPATH**/ ?>