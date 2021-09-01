<?php $__env->startSection('card_title'); ?>
    Ajouter un tag
<?php $__env->stopSection(); ?>

<?php $__env->startSection('card_body'); ?>
    <form action="<?php echo e(route('tags.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group row">
            <label for="lib_tag" class="col-md-5 col-form-label text-md-right">Libellé du tag</label>

            <div class="col-md-6">
                <input id="lib_tag" type="text" class="form-control <?php $__errorArgs = ['lib_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lib_tag" value="<?php echo e(old('lib_tag')); ?>" required autocomplete="lib_tag" autofocus>

                <?php $__errorArgs = ['lib_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-5">
                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ivry-galery/resources/views/tags/create.blade.php ENDPATH**/ ?>