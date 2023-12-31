<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Package Order Payment Accept Template')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-msg','data' => []]); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash-msg','data' => []]); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp d-flex justify-content-between">
                            <h4 class="header-title"><?php echo e(__('Package Order Payment Accept Template')); ?></h4>
                            <a class="btn btn-info" href="<?php echo e(route('admin.email.template.all')); ?>"><?php echo e(__('All Email Templates')); ?></a>
                        </div>
                        <form action="<?php echo e(route('admin.email.template.package.order.payment.accept')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="nav-item nav-link <?php if($key == 0): ?> active <?php endif; ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home-<?php echo e($lang->slug); ?>" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo e($lang->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="nav-home-<?php echo e($lang->slug); ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="package_order_payment_accept_<?php echo e($lang->slug); ?>_subject"><?php echo e(__('Subject')); ?></label>
                                            <input type="text" name="package_order_payment_accept_<?php echo e($lang->slug); ?>_subject"  class="form-control" value="<?php echo e(get_static_option('package_order_payment_accept_'.$lang->slug.'_subject')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="package_order_payment_accept_<?php echo e($lang->slug); ?>_message"><?php echo e(__('Message')); ?></label>
                                            <input type="hidden" name="package_order_payment_accept_<?php echo e($lang->slug); ?>_message"  class="form-control" value="<?php echo e(get_static_option('package_order_payment_accept_'.$lang->slug.'_message')); ?>" >
                                            <div class="summernote" data-content='<?php echo e(get_static_option('package_order_payment_accept_'.$lang->slug.'_message')); ?>'></div>

                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@order_price_plan</code> </small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@order_billing_info</code> </small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@payment_status</code> </small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@order_id</code> </small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@order_payment_gateway</code> </small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@order_date</code></small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@billing_name</code> </small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@billing_email</code> </small>
                                            <small class="d-inline-block m-1 form-text text-muted text-danger"><code>@site_title</code></small>
                                            <small class="info-text"><?php echo e(__('all above code will be replace dynamically')); ?></small>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Save Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            var SummerNoteSelector = $('.summernote');
            SummerNoteSelector.summernote({
                height: 200,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    },
                    onPaste: function (e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        document.execCommand('insertText', false, bufferText);
                    }
                },
                toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                ],

            });
            if(SummerNoteSelector.length > 0){
                SummerNoteSelector.each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        });
    </script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/nexelit304/@core/resources/views/backend/email-template/package-order/payment-accept.blade.php ENDPATH**/ ?>