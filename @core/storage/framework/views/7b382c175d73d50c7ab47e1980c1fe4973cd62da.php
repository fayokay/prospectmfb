<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo session('msg'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/nexelit304/@core/resources/views/components/flash-msg.blade.php ENDPATH**/ ?>