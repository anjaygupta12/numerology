<?php $__env->startSection('title', 'Manage Packages'); ?>

<?php $__env->startSection('page-title', 'Manage Packages'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Packages List</h5>
            
        </div>
        <div class="card-body">
            <?php if($packages->isEmpty()): ?>
                <div class="alert alert-info">
                    No packages found. Create your first package.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($package->id); ?></td>
                                    <td><?php echo e($package->name); ?></td>
                                    <td><?php echo e(ucfirst($package->type)); ?></td>
                                    <td>₹<?php echo e(number_format($package->price, 2)); ?></td>
                                    <td>
                                        <?php if($package->active): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.packages.edit', $package)); ?>"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?php echo e(route('admin.packages.show', $package)); ?>"
                                                class="btn btn-sm btn-info">View</a>
                                            
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/vhosts/srknumerology.com/numro.srknumerology.com/resources/views/admin/packages/index.blade.php ENDPATH**/ ?>