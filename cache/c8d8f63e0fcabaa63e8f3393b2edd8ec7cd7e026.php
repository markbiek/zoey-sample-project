<?php $__env->startSection('content'); ?>

<div class="container mx-auto">
	<p>Click on an account to impersonate it</p>

	<ul>
	<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li>
			<a href="/?impersonate=<?php echo e($account->id); ?>"><?php echo e($account->name); ?></a>
			<?php echo e($account->is_admin ? '(admin)' : ''); ?>

			<?php echo e($account->overdue ? '(overdue)' : ''); ?>

		</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>

<?php if(!empty($impersonating)): ?>
	<div class="container mx-auto">
		<h2>Currently impersonating <span class="underline"><?php echo e($impersonating->name); ?></span></h2>

		<?php if($impersonating->overdue): ?>
			<p class="font-bold text-italic text-md">This account is overdue!</p>
		<?php endif; ?>
	</div>

	<div class="container mx-auto">
		<h2>Checkout</h2>
		<p>Go to <a href="/checkout?impersonate=<?php echo e($impersonating->id); ?>">checkout</a></p>
	</div>

	<div class="container mx-auto">
		<h2>Product Lists</h2>
		<?php $__currentLoopData = $productLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<h3><?php echo e($list->name); ?></h3>

			<?php if(!$impersonating->checkACL('product_list_id', $list->id)): ?>
				<p class="font-bold text-italic text-sm">This user does not have access to this product list.</p>
			<?php endif; ?>

			<ul>
				<?php $__currentLoopData = $list->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<a href="/product?id=<?php echo e($product->id); ?>&impersonate=<?php echo e($impersonating->id); ?>">
							<?php echo e($product->name); ?>

						</a>
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mark/dev/zoey-code-test/zoey-sample-project/resources/views/homepage.blade.php ENDPATH**/ ?>