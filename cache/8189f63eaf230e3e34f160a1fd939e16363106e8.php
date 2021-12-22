<?php $__env->startSection('content'); ?>
<?php if(!$impersonating->checkACL('product_list_id', $product->product_list->id)): ?>
	<p>This user does not have access to this product.</p>
<?php else: ?>
	<h2><?php echo e($product->name); ?></h2>

	<p><?php echo e($product->sku); ?></p>
	<p><?php echo e($product->price); ?></p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mark/dev/zoey-code-test/zoey-sample-project/resources/views/product.blade.php ENDPATH**/ ?>