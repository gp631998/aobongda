<?php $__env->startSection('content'); ?>
    <div class="view-list-product">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Product name</th>
                <th>Image</th>
                <th>Published</th>
                <th>Category</th>
                <th>Ordering</th>
                <th>Price</th>
                <th>Sale_price</th>
                <th>created_at</th>
                <th>Description</th>
                <th><a href="<?php echo e(route('them-san-pham')); ?>" class="btn btn-primary" >Add new</a></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td nowrap=""><?php echo e($product->product_name); ?></td>
                    <td nowrap=""><img class="product-image-intro" src="<?php echo e(url('/')); ?>/<?php echo e($product->product_image_intro); ?>"></td>
                    <td nowrap=""><?php echo e($product->publish); ?></td>
                    <td nowrap=""><?php echo e($product->category_id); ?></td>
                    <td nowrap=""><?php echo e($product->ordering); ?></td>
                    <td nowrap=""><?php echo e($product->price); ?></td>
                    <td nowrap=""><?php echo e($product->sale_price); ?></td>
                    <td nowrap=""><?php echo e(date('d-m-Y h:m',strtotime($product->created_at))); ?></td>
                    <td nowrap=""><?php echo e($product->description); ?></td>
                    <th nowrap=""><a href="<?php echo e(route('sua-san-pham',$product->id)); ?>" class="btn btn-info">Edit</a><a href="<?php echo e(route('xoa-san-pham',$product->id)); ?>" class="btn btn-danger">Delete</a></th>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.a', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>