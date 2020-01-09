<?php $__env->startSection('content'); ?>
    <div class="view-home">
        <div class="container">
            <?php if(Session::has('message')): ?>
                <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            <div class="b">
                <div class="wrapper-title-aoclb">
                    <h3 class="title-aoclb-product">Áo câu lạc bộ</h3>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $aoclb_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="clb-item">
                                <div clb-item-content>
                                    <div class="wrapper-image">
                                        <img class="clb-image-intro" src="<?php echo e(url('/')); ?>/<?php echo e($product->product_image_intro); ?>">
                                    </div>
                                    <h4 class="clb-name"><?php echo e($product->product_name); ?></h4>
                                    <div class="prices">
                                        <span class="prices"><?php echo e($product->price); ?></span>
                                        <span class="currency"> đ</span>
                                    </div>
                                    <a href="<?php echo e(route('product-detail',$product->id)); ?>" class="btn btn-primary btn-block"><i class="fas fa-search-plus"></i> Mua hàng</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            <div class="ao-doi-tuyen" style="margin-top: 60px">
                <div class="wrapper-title-aodoituyen">
                    <h3 class="title-aodoituyen-product">Áo đội tuyển</h3>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $aodoituyen_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="doituyen-item">
                                <div doituyen-item-content>
                                    <div class="wrapper-image">
                                        <img class="doituyen-image-intro" src="<?php echo e(url('/')); ?>/<?php echo e($product->product_image_intro); ?>">
                                    </div>
                                    <h4 class="doituyen-name"><?php echo e($product->product_name); ?></h4>
                                    <div class="prices">
                                        <span class="prices"><?php echo e($product->price); ?></span>
                                        <span class="currency"> đ</span>
                                    </div>
                                    <a href="<?php echo e(route('product-detail',$product->id)); ?>" class="btn btn-primary btn-block"><i class="fas fa-search-plus"></i> Mua hàng</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="ao-logo" style="margin-top: 60px">
                <div class="wrapper-ao-logo">
                    <h3 class="title-aologo-product">Áo không logo</h3>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        áo logo
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>