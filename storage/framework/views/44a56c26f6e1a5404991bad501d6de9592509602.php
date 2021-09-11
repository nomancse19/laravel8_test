<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('billing.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('billing::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\laravel8_test\Modules/Billing\Resources/views/index.blade.php ENDPATH**/ ?>