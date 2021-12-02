

<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    
<form action="<?php echo e(route('article.store')); ?>" enctype="multipart/form-data" method="POST" > 
    <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title">Title:</label>   
            <input type="text" class="form-control" name="title">
        </div>
        
        <category-selector></category-selector>
        
        <div>
            <label for="vip"><?php echo e(__('Loai Tin')); ?></label>
            <br />
            <select name="is_vip" id="">
                <option value="0">Thuong</option>
                <option value="1">Vip</option>
            </select>
        </div>
        <br>
        
        <location-selector></location-selector>
        <div class="form-group">
            <label for="title">Valid date:</label>   
            
            <input type="date" class="form-control" name="valid_date" min="<?php echo e(\Carbon\Carbon::now()->addDay(1)->toDateString()); ?>">
        </div>
         <br>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" rows="20"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\raovat1\resources\views/user/article/create.blade.php ENDPATH**/ ?>