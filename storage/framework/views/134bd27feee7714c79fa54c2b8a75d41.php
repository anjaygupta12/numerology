<?php $__env->startSection('title', 'Edit First Letter Attribute'); ?>
<?php $__env->startSection('page-title', 'Edit First Letter Attribute'); ?>

<?php $__env->startSection('styles'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit First Letter Attribute</h5>
            <a href="<?php echo e(route('admin.ad-yoga-prediction.index')); ?>" class="btn btn-secondary">Back to First Letter Attributes</a>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.ad-yoga-prediction.update', $AdYogaPrediction)); ?>" method="POST">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-md-6">
                       <div class="mb-3">
                            <label for="cobination" class="form-label">Cobination</label>
                            <input type="text" name="combination" id="combination" class="form-control <?php $__errorArgs = ['combination'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=" <?php echo e(old('combination', $AdYogaPrediction->combination)); ?> ">
                            <?php $__errorArgs = ['cobination'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="cobination" class="form-label" >Type</label>
                           <select name="type" class="form-control" >
                                <option value="ad" <?php echo e($AdYogaPrediction->type == 'ad' ? 'selected' : ''); ?>>
                                    Ad prediction
                                </option>

                                <option value="cobination" <?php echo e($AdYogaPrediction->type == 'cobination' ? 'selected' : ''); ?>>
                                    Combination
                                </option>
                            </select>
                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control summernote <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description"><?php echo e(old('description', $AdYogaPrediction->description)); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <small class="form-text text-muted">Enter the description for this letter attribute.</small>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update First Letter Attribute</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').each(function() {
            $(this).summernote({
                placeholder: 'Enter description here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']], ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });

        // Auto-capitalize letter input
        $('#letter').on('input', function() {
            this.value = this.value.toUpperCase();
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\numerology\resources\views/admin/ad-yogas-prediction/edit.blade.php ENDPATH**/ ?>