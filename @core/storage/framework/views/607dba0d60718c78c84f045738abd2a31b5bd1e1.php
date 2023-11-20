



<?php $__env->startSection('custom-page-title'); ?>
    <?php echo __('All Blogs'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php $page_slug = get_blog_slug_by_page_id(get_static_option('blog_page')) ?>
    <li class="list-item"><a href="#">  <?php echo App\Page::where('id',get_static_option('blog_page'))->first()->getTranslation('title',$user_select_lang_slug); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo App\Page::where('id',get_static_option('blog_page'))->first()->getTranslation('title',$user_select_lang_slug); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <?php echo render_site_meta(); ?>

    <?php echo render_site_title(App\Page::where('id',get_static_option('blog_page'))->first()->getTranslation('title',$user_select_lang_slug)); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="blog-area-wrapper Political-blog-grid-wrapper" data-padding-top="100" data-padding-bottom="100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="two-column">
                    <div class="row">
                        <?php if(count($all_blogs) < 1): ?>
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-block col-md-12 ">
                                    <strong><div class="error-message "><span><?php echo e(__('No Post Available')); ?></span></div></strong>
                                </div>
                            </div>
                        <?php else: ?>

                       <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-6">
                            <div class="blog-grid-style-03 small-02">
                                <div class="img-box">
                                    <?php echo render_image_markup_by_attachment_id($data->image, '', 'grid'); ?>

                                </div>
                                <div class="content">
                                    <div class="post-meta">
                                        <ul class="post-meta-list style-02">
                                            <?php if($data->created_by == 'user'): ?>
                                                <?php $user = $data->user; ?>
                                            <?php else: ?>
                                                <?php $user = $data->admin; ?>
                                            <?php endif; ?>
                                            <li class="post-meta-item">
                                                <a <?php if(!empty($user->id)): ?>  href="<?php echo e(route('frontend.user.created.blog', ['user'=> $data->created_by, 'id'=>$user->id])); ?>" <?php endif; ?>>
                                                    <span class="text author"> <?php echo e($data->author ?? __('Anonymous')); ?></span>
                                                </a>
                                            </li>
                                            <li class="post-meta-item date">
                                                <span class="text"> <?php echo e(date('d M Y',strtotime($data->created_at))); ?> </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="title">
                                        <a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"><?php echo e(Str::words($data->getTranslation('title',$user_select_lang_slug),6 ?? '')); ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-12">
                            <div class="pagination" data-padding-top="50">
                                <div class="pagination-wrapper">
                                    <?php echo e($all_blogs->links()); ?>

                                </div>
                            </div>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-7 col-md-6 col-lg-4">
                 <div class="widget-area-wrapper">
                   <?php echo render_frontend_sidebar('details_page_sidebar',['column' => false]); ?>

                 </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Katerio\@core\Modules/Blog\Resources/views/frontend/blog/blog.blade.php ENDPATH**/ ?>