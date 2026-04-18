<?php $__env->startSection('title', 'Package Details'); ?>

<?php $__env->startSection('page-title', 'Package Details'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?php echo e($package->name); ?></h5>
            <div>
                <a href="<?php echo e(route('admin.packages.edit', $package)); ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo e(route('admin.packages.index')); ?>" class="btn btn-secondary">Back to Packages</a>
            </div>
        </div>
        <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <th style="width: 200px;">Package ID</th>
                                    <td><?php echo e($package->id); ?></td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo e($package->name); ?></td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td><?php echo e(ucfirst($package->type)); ?> Numerology</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?php echo e($package->description); ?></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>₹<?php echo e(number_format($package->price, 2)); ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php if($package->active): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td><?php echo e($package->created_at->format('M d, Y h:i A')); ?></td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td><?php echo e($package->updated_at->format('M d, Y h:i A')); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h6>Orders for this Package</h6>
                        <?php if($package->orders->isEmpty()): ?>
                            <div class="alert alert-info">
                                No orders found for this package.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $package->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($order->id); ?></td>
                                                <td><?php echo e($order->user->name); ?></td>
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
                                                    <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="btn btn-sm btn-info">View</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/admin/packages/show.blade.php ENDPATH**/ ?>