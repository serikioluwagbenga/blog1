<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo session('msg'); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp2\htdocs\Katerio-V1.0.8\@core\resources\views/components/flash-msg.blade.php ENDPATH**/ ?>