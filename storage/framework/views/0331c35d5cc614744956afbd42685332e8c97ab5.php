<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col bg-white rounded">
            <div class="row border-bottom card-header">
                <div class="col-12 p-0">Liste des galeries</div>
            </div>
            <div class="row p-3">
                <?php $__currentLoopData = $galleries->sortByDesc('votes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallerie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mx-auto my-1">
                    <div class="card galerieItem">
                        <div class="card-header"><?php echo e($gallerie->nom_gallerie); ?></div>

                        <a href="<?php echo e(route('galleries.show', $gallerie->id)); ?>" title="<?php echo e($gallerie->nom_gallerie); ?>">
                            <?php if(!empty($gallerie->photos->sortByDesc('votes')->first())): ?>
                            <img class="card-img-top" src="<?php echo e(asset($gallerie->photos->sortByDesc('votes')->first()->nom_thumb)); ?>" alt="<?php echo e($gallerie->nom_gallerie); ?>" style="border-top-left-radius: 0; border-top-right-radius: 0;"/>
                            <?php else: ?>
                            Aucune photo pour cette Gallerie
                            <?php endif; ?>
                        </a>

                        <div class="card-body">
                            Votes : <?php echo e($gallerie->votes); ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ivry-galery/resources/views/galleries/index.blade.php ENDPATH**/ ?>