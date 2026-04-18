<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title">Dashboard</h4>
        <span>Welcome to your numerology journey</span>
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
                    
        <!-- User Details -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>Your Numerology Profile</h5>
                    </div>
                    <div class="dashboard-card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-4 mb-md-0">
                                <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 120px; height: 120px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; font-size: 3rem;">
                                    <?php echo e(substr($user->name, 0, 1)); ?>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-muted small">Full Name</label>
                                            <p class="mb-0 fw-bold"><?php echo e($user->name); ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small">Email Address</label>
                                            <p class="mb-0"><?php echo e($user->email); ?></p>
                                        </div>
                                        <div>
                                            <label class="text-muted small">Member Since</label>
                                            <p class="mb-0"><?php echo e($user->created_at->format('F d, Y')); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-muted small">Account Status</label>
                                            <p class="mb-0"><span class="badge bg-success">Active</span></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small">Total Orders</label>
                                            <p class="mb-0"><?php echo e(count($orders)); ?></p>
                                        </div>
                                        <div>
                                            <label class="text-muted small">Completed Orders</label>
                                            <p class="mb-0"><?php echo e($completedOrders); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        
        <!-- Pending Orders -->
        <div class="dashboard-card mb-4">
            <div class="dashboard-card-header">
                <h5 class="mb-0"><i class="fas fa-shopping-bag me-2"></i>Pending Orders</h5>
            </div>
            <div class="dashboard-card-body">
                <?php if($pendingOrders > 0): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pendingOrdersList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($order->id); ?></td>
                                        <td><?php echo e($order->package->name); ?></td>
                                        <td>₹<?php echo e(number_format($order->amount, 2)); ?></td>
                                        <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('user.orders.show', $order)); ?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye me-1"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                        <h5>No Pending Orders</h5>
                        <p class="text-muted">You don't have any pending orders at the moment.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/user/dashboard.blade.php ENDPATH**/ ?>