<?php $__env->startSection('content'); ?>
    <div class="view-cart">
        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Size</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e(($item->options->has('size') ? $item->options->size : '')); ?></td>
                        <td><?php echo e($item->price); ?></td>
                        <td><?php echo e($item->qty); ?></td>
                        <td><?php echo e($item->price*$item->qty); ?></td>
                        <td>
                            <form action="<?php echo e(route('remove-item-cart',$item->rowId)); ?>" method="post">
                                <button class="btn btn-primary">Delete</button>
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">Tổng</td>
                    <td><?php echo e(Cart::subtotal()); ?></td>
                </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo e(route('thanh-toan')); ?>">Thanh toán</a>
                        <a class="btn btn-primary" href="<?php echo e(route('home')); ?>">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>