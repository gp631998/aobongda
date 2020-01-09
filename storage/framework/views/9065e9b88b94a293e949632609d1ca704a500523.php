<?php $__env->startSection('content'); ?>
    <div class="view-edit-product">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('post-sua-san-pham',$product->id)); ?>" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Product name</th>
                    <th><input type="text" class="form-control" value="<?php echo e($product->product_name); ?>" name="product_name"></th>
                </tr>
                <tr>
                    <th>Product image intro</th>
                    <th>
                        <img class="product-image-intro-edit" src="<?php echo e(url('/')); ?>/<?php echo e($product->product_image_intro); ?>">
                        <input type="file" class="form-control" name="product_image_intro">
                    </th>
                </tr>
                <tr>
                    <th>Category</th>
                    <th>
                        <select name="category_id">
                            <option value="">Chọn danh mục</option>
                            <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <optgroup label="<?php echo e($category->category_name); ?>">
                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sub_category->parent==$category->id): ?>
                                            <option <?php echo e($product->category_id == $sub_category->id ? " selected " : ""); ?> value="<?php echo e($sub_category->id); ?>"><?php echo e($sub_category->category_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>Publish</th>
                    <th>
                        <select name="publish">
                            <option  <?php echo $product->publish==1?' selected ':'' ?> value="1">Yes</option>
                            <option <?php echo $product->publish==0?' selected ':'' ?> value="0">No</option>
                        </select>

                    </th>
                </tr>
                <tr>
                    <th>price</th>
                    <th>
                        <input type="text" name="price" value="<?php echo e($product->price); ?>" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Sale price</th>
                    <th>
                        <input type="text" name="sale_price" value="<?php echo e($product->sale_price); ?>" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Size</th>
                    <th>
                        <input type="text" name="size" value="<?php echo e($product->size); ?>" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Ordering</th>
                    <th>
                        <input type="text" name="ordering" value="<?php echo e($product->ordering); ?>" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>
                        <textarea class="form-control" name="description"><?php echo e($product->description); ?></textarea>
                    </th>
                </tr>
                <tr>
                    <th>Full description</th>
                    <th>
                        <textarea class="form-control" id="full_description" name="full_description"><?php echo e($product->full_description); ?></textarea>
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?php echo e(route('danh-sach-san-pham')); ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </td>
                </tr>
            </table>
            <?php echo e(csrf_field()); ?>

        </form>
        <script type="text/javascript">
            //CKEDITOR.replace( 'full_description' );
        </script>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>