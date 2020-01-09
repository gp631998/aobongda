<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <div class="ao-clb">
            <div class="wrapper-title-aoclb">
                <h3 class="title-aoclb-product">Tìm kiếm</h3>
                <div class="count-product">
                    <p class="pull-left">Tìm thấy <?php echo e(count($search)); ?> sản phẩm</p>
                    <div class="clearfix">
            </div>
            <div class="row">
                <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>