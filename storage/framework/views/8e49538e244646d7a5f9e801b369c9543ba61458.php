<?php $__env->startSection('content'); ?>
    <?php
        $list_order_status=[
            "pending",
            "processing",
            "completed",
            "cancel",
        ]
    ?>
    <div class="view-order-detail">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <form action="<?php echo e(route('post-edit-order',$order->id)); ?>" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th><?php echo e($order->id); ?></th>
                </tr>
                <tr>
                    <th>Order number</th>
                    <th><?php echo e($order->order_number); ?></th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th><?php echo e($order->total); ?></th>
                </tr>
                <tr>
                    <th>State</th>
                    <th>
                        <select class="form-control" name="status">
                            <?php $__currentLoopData = $list_order_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo $status == $order->status ? '  selected ' : '' ?> value="<?php echo e($status); ?>"><?php echo e($status); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </th>
                </tr>
            </table>
            <h3>List product</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Product name</th>
                    <th>Product price</th>
                    <th>Product quality</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->product_id); ?></td>
                        <td><?php echo e($product->product_name); ?></td>
                        <td><?php echo e($product->product_price); ?></td>
                        <td><?php echo e($product->product_qty); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
            <?php echo e(csrf_field()); ?>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>