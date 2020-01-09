<?php $__env->startSection('content'); ?>
    <div class="view-product-detail">
        <div class="container">
            <div class="col-md-3">

            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        gallery
                    </div>
                    <div class="col-md-6">
                        <form action="<?php echo e(route('add-to-cart',$product->id)); ?>" method="post">
                        <h3><?php echo e($product->product_name); ?></h3>
                        <div><?php echo e($product->description); ?></div>
                        <div class="prices">
                            <span class="prices"><?php echo e($product->price); ?></span>
                            <span class="currency"> đ</span>
                        </div>
                        <div>
                            <span class="quality">Số lượng</span>
                            <select name="quality">
                                <?php for($i=1;$i<=10;$i++): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                            <span class="size">Size</span>
                            <select name="size">
                                <option value="s">Size S</option>
                                <option value="m">Size M</option>
                                <option value="l">Size L</option>
                                <option value="xl">Size XL</option>
                                <option value="xxl">Size XXL</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Thêm hàng</button>
                        <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>