

<?php $__env->startSection('title', 'Manage First Letter Attributes'); ?>
<?php $__env->startSection('page-title', 'Manage First Letter Attributes'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">First Letter Attributes List</h5>
            <a href="<?php echo e(route('admin.first-letter-attributes.create')); ?>" class="btn btn-primary">Add New First Letter Attribute</a>
        </div>
        <div class="card-body">
            <?php if($firstLetterAttributes->isEmpty()): ?>
                <div class="alert alert-info">No first letter attributes found. Create your first attribute.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Letter</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $firstLetterAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-primary fs-5"><?php echo e(strtoupper($attribute->letter)); ?></span>
                                    </td>
                                    <td><?php echo e(Str::limit(strip_tags($attribute->description), 100) ?: '-'); ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.first-letter-attributes.edit', $attribute)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?php echo e(route('admin.first-letter-attributes.show', $attribute)); ?>" class="btn btn-sm btn-info">View</a>
                                            <form action="<?php echo e(route('admin.first-letter-attributes.destroy', $attribute)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this first letter attribute?');">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if($firstLetterAttributes->hasPages()): ?>
                    <div class="d-flex justify-content-center mt-3"><?php echo e($firstLetterAttributes->links()); ?></div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/admin/first-letter-attributes/index.blade.php ENDPATH**/ ?>