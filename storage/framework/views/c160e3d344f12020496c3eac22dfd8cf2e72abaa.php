<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col bg-white rounded">
            <div class="row border-bottom card-header">
                <div class="col-12 p-0">Liste des tags</div>
            </div>
            <div class="row p-3">
                <?php $__currentLoopData = $tags->sortBy('lib_tag'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mx-auto my-1">
                    <div class="card galerieItem">
                        <div class="card-header"><?php echo e($tag->lib_tag); ?></div>

                        <a href="<?php echo e(route('tags.show', $tag->id)); ?>" title="<?php echo e($tag->lib_tag); ?>">
                            <?php if(!empty($tag->photos->sortByDesc('votes')->first())): ?>
                            <img class="card-img-top rounded-bottom" src="<?php echo e(asset($tag->photos->sortByDesc('votes')->first()->nom_thumb)); ?>" alt="<?php echo e($tag->lib_tag); ?>" style="border-top-left-radius: 0; border-top-right-radius: 0;"/>
                            <?php else: ?>
                            Aucune photo pour ce tag
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ivry-galery/resources/views/tags/index.blade.php ENDPATH**/ ?>