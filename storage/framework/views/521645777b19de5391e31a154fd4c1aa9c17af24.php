<?php $__env->startSection('content'); ?>
    <div class="view-list-order">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Order Number</th>
                <th>Customer name</th>
                <th>Status</th>
                <th>Total</th>
                <th>Xem</th>
                <th>Add new</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->order_name); ?></td>
                    <td><?php echo e($order->customer_id); ?></td>
                    <td><?php echo e($order->status); ?></td>
                    <td><?php echo e($order->total); ?></td>
                    <td><a href="<?php echo e(route('chi-tiet-don-hang',$order->id)); ?>" class="btn btn-primary">Xem</a></td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.a', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>