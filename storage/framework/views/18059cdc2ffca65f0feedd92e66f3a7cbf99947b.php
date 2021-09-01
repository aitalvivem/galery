<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Liste des profils</div>
                <div class="card-body">
                    <div class="container mt-3">
                        <div class="row">
                            <?php $__currentLoopData = $profils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mx-auto my-1 p-1">
                                <div class="card">
                                    <div class="card-header"><?php echo e($profil->nom); ?></div>
                                    <div class="card-body">
                                        <?php echo e($profil->photo); ?>

                                        <?php $__currentLoopData = $profil->gages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($gage->rang); ?> - <?php echo e($gage->lib); ?><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.game', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ivry-galery/resources/views/profils/index.blade.php ENDPATH**/ ?>