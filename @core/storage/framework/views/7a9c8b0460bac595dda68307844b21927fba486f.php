

    $('#frontend_darkmode').on('click', function(){
        var el = $(this)
        var mode = el.data('mode');

        $.ajax({
            type:'GET',
            url:  '<?php echo e(route("frontend.dark.mode.toggle")); ?>',
            data:{mode:mode},
            success: function(data){
                location.reload();
            },error: function(){
            }
        });
    });
<?php /**PATH C:\xampp2\htdocs\Katerio-V1.0.8\@core\resources\views/components/frontend/dark-mode.blade.php ENDPATH**/ ?>