

<?php $__env->startSection('title', 'View First Letter Attribute'); ?>
<?php $__env->startSection('page-title', 'View First Letter Attribute'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">First Letter Attribute Details</h5>
            <div>
                <a href="<?php echo e(route('admin.first-letter-attributes.edit', $firstLetterAttribute)); ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo e(route('admin.first-letter-attributes.index')); ?>" class="btn btn-secondary">Back to First Letter Attributes</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td><?php echo e($firstLetterAttribute->id); ?></td>
                        </tr>
                        <tr>
                            <th>Letter</th>
                            <td><span class="badge bg-primary fs-5"><?php echo e(strtoupper($firstLetterAttribute->letter)); ?></span></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo $firstLetterAttribute->description ?: '<span class="text-muted">No description provided.</span>'; ?></td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td><?php echo e($firstLetterAttribute->created_at->format('d M Y, h:i A')); ?></td>
                        </tr>
                        <tr>
                            <th>Last Updated</th>
                            <td><?php echo e($firstLetterAttribute->updated_at->format('d M Y, h:i A')); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form action="<?php echo e(route('admin.first-letter-attributes.destroy', $firstLetterAttribute)); ?>" method="POST" class="mt-3" onsubmit="return confirm('Are you sure you want to delete this first letter attribute?');">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Delete First Letter Attribute</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/admin/md-yogas-prediction/show.blade.php ENDPATH**/ ?>