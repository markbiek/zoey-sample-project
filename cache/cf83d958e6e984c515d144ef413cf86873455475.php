<?php $__env->startSection('content'); ?>
<h2>Checkout</h2>

<?php if($impersonating->overdue): ?>
	<p>This account is currently <em>overdue</em> and cannot access the checkout!</p>
<?php else: ?>
	<p>This account is current and able to checkout!</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mark/dev/zoey-code-test/zoey-sample-project/resources/views/checkout.blade.php ENDPATH**/ ?>