

<?php $__env->startSection('content'); ?>
<div>
    <form action=" <?php echo e(route('homePage')); ?>" method="GET">
        
            <category-selector></category-selector>
            
            <location-selector></location-selector>
        <button type="submit">Loc</button>
    </form>
    
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <h3><?php echo e($article->title); ?> 
                
                <?php if($article->is_vip): ?>
                    <span style="color:red">VIP</span>
                <?php endif; ?>
                <br>
                <?php echo e($article->content); ?>

            </h3>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\raovat1\resources\views/home/index.blade.php ENDPATH**/ ?>