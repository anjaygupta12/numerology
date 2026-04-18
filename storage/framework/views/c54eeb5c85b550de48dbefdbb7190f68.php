<?php $__env->startSection('title', 'Manage Attributes'); ?>

<?php $__env->startSection('page-title', 'Manage Attributes'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Attributes List</h5>
            <a href="<?php echo e(route('admin.attributes.create')); ?>" class="btn btn-primary">Add New Attribute</a>
        </div>
        <div class="card-body">
            
            <?php if($attributes->isEmpty()): ?>
                <div class="alert alert-info">
                    No attributes found. Create your first attribute.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Compound Number</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-primary"><?php echo e($attribute->compound_number); ?></span>
                                    </td>
                                    <td><?php echo e(Str::limit(strip_tags($attribute->description), 50)); ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.attributes.edit', $attribute)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?php echo e(route('admin.attributes.show', $attribute)); ?>" class="btn btn-sm btn-info">View</a>
                                            <form action="<?php echo e(route('admin.attributes.destroy', $attribute)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this attribute?');">
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
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/admin/attributes/index.blade.php ENDPATH**/ ?>