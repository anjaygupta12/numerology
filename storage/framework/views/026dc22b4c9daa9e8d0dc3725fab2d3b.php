

<?php $__env->startSection('title', 'Manage Remedies'); ?>

<?php $__env->startSection('page-title', 'Manage Remedies'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Remedies List</h5>
            <a href="<?php echo e(route('admin.remedies.create')); ?>" class="btn btn-primary">Add New Remedy</a>
        </div>
        <div class="card-body">
            
            <?php if($remedies->isEmpty()): ?>
                <div class="alert alert-info">
                    No remedies found. Create your first remedy.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>BN</th>
                                <th>DN</th>
                                <th>NN</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $remedies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remedy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-primary"><?php echo e($remedy->number); ?></span>
                                    </td>
                                    <td><?php echo e(Str::limit($remedy->bn, 50) ?: '-'); ?></td>
                                    <td><?php echo e(Str::limit($remedy->dn, 50) ?: '-'); ?></td>
                                    <td><?php echo e(Str::limit($remedy->nn, 50) ?: '-'); ?></td>
                                    <td>
                                        <?php if($remedy->status): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.remedies.edit', $remedy)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?php echo e(route('admin.remedies.show', $remedy)); ?>" class="btn btn-sm btn-info">View</a>
                                            <form action="<?php echo e(route('admin.remedies.destroy', $remedy)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this remedy?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if($remedies->hasPages()): ?>
                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($remedies->links()); ?>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/admin/remedies/index.blade.php ENDPATH**/ ?>