$(document).on('click','#save',function () {
    $(this).addClass("disabled")
    $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Saving")); ?>');
});<?php /**PATH C:\xampp2\htdocs\Katerio-V1.0.8\@core\resources\views/components/btn/save.blade.php ENDPATH**/ ?>