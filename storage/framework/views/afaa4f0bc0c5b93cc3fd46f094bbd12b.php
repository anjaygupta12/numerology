<?php $__env->startSection('title', 'Ad Yoda Prediction'); ?>
<?php $__env->startSection('page-title', 'Ad Yoda Prediction'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Ad Yoda Predictiona</h5>
            <a href="<?php echo e(route('admin.ad-yoga-prediction.create')); ?>" class="btn btn-primary">Add New Combination</a>
        </div>
        <div class="card-body">
            <?php if($yogaPredictions->isEmpty()): ?> 
                <div class="alert alert-info">No Combinations found. Create your first attribute.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Combinations</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $yogaPredictions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td>
                                        <span class="badge bg-primary fs-5"><?php echo e(strtoupper($attribute->combination)); ?></span>
                                    </td>
                                    <td><?php echo e(Str::limit(strip_tags($attribute->description), 100) ?: '-'); ?></td>
                                    <td><?php echo e(($attribute->type=='ad')? 'AD Prediction' :$attribute->type); ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.ad-yoga-prediction.edit', $attribute)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="<?php echo e(route('admin.ad-yoga-prediction.destroy', $attribute)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Combination?');">
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
                <?php if($yogaPredictions->hasPages()): ?> 
                    <div class="d-flex justify-content-center mt-3"><?php echo e($yogaPredictions->links()); ?></div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/admin/ad-yogas-prediction/index.blade.php ENDPATH**/ ?>