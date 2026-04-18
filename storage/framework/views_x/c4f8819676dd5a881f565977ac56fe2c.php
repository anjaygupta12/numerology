<?php $__env->startSection('title', 'Manage Orders'); ?>

<?php $__env->startSection('page-title', 'Manage Orders'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Orders List</h5>
        </div>
        <div class="card-body">
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
                    
                    <div class="mb-3">
                        <div class="btn-group" role="group">
                            <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn <?php echo e(request()->query('status') == null ? 'btn-primary' : 'btn-outline-primary'); ?>">All Orders</a>
                            <a href="<?php echo e(route('admin.orders.index', ['status' => 'pending'])); ?>" class="btn <?php echo e(request()->query('status') == 'pending' ? 'btn-primary' : 'btn-outline-primary'); ?>">Pending</a>
                            <a href="<?php echo e(route('admin.orders.index', ['status' => 'processing'])); ?>" class="btn <?php echo e(request()->query('status') == 'processing' ? 'btn-primary' : 'btn-outline-primary'); ?>">Processing</a>
                            <a href="<?php echo e(route('admin.orders.index', ['status' => 'completed'])); ?>" class="btn <?php echo e(request()->query('status') == 'completed' ? 'btn-primary' : 'btn-outline-primary'); ?>">Completed</a>
                            <a href="<?php echo e(route('admin.orders.index', ['status' => 'cancelled'])); ?>" class="btn <?php echo e(request()->query('status') == 'cancelled' ? 'btn-primary' : 'btn-outline-primary'); ?>">Cancelled</a>
                        </div>
                    </div>
                    
                    <?php if($orders->isEmpty()): ?>
                        <div class="alert alert-info">
                            No orders found.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
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
                                            <td><?php echo e($order->user->name); ?></td>
                                            <td><?php echo e($order->package->name); ?></td>
                                            <td>₹<?php echo e(number_format($order->amount, 2)); ?></td>
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
                                            <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="btn btn-sm btn-info">View</a>
                                                    <a href="<?php echo e(route('admin.orders.edit', $order)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                                </div>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>