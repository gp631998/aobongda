<?php $__env->startSection('content'); ?>
    <div class="view-list-category">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Category name</th>
                <th>Parent id</th>
                <th>Image</th>
                <th>Description</th>
                <th><a href="<?php echo e(route('them-danh-muc')); ?>" class="btn btn-primary" >Add category</a></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->id); ?></td>
                    <td><?php echo e($category->category_name); ?></td>
                    <td><?php echo e($category->parent); ?></td>
                    <td><img class="image-category" src="<?php echo e(url('/')); ?>/<?php echo e($category->image_category); ?>"></td>
                    <td><?php echo e($category->description); ?></td>
                    <th><a href="<?php echo e(route('sua-danh-muc',$category->id)); ?>" class="btn btn-primary">Edit</a><a href="<?php echo e(route('xoa-danh-muc',$category->id)); ?>" class="btn btn-danger">Delete</a></th>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.a', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>