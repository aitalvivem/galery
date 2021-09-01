<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-3">
                            <img src="<?php echo e(asset('img/logohome.png')); ?>" class="mw-100" />
                        </div>
                        <div class="col-9">
                            <p>Bienvenus dans le section consacrée aux photos d'<b>Ivary Gallery</b>. Enjoy !</p>

                            <br>
                            <a href="<?php echo e(route('galleries.index')); ?>" >Galeries</a>
                            <br>
                            <a href="<?php echo e(route('photos.index')); ?>" >Photos</a>
                            <br>
                            <a href="<?php echo e(route('tags.index')); ?>" >Tags</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ivry-galery/resources/views/home.blade.php ENDPATH**/ ?>