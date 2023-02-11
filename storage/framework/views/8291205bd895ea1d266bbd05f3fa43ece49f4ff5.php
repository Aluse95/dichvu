

<?php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? '';
  $content = $detail->json_params->content->{$locale} ?? '';
  $image = $detail->image != '' ? $detail->image : '';
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : '';
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $taxonomy_alias = Str::slug($taxonomy_title);
  if (isset($taxonomy) && $taxonomy->parent_title !== null) {
      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy->parent_alias ?? $taxonomy->parent_title, $taxonomy->id, null, $taxonomy->alias ?? $taxonomy_title);
  } else {
      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
  }
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
  // schema information
  $datePublished = date('Y-m-d', strtotime($detail->created_at));
  $dateModified = date('Y-m-d', strtotime($detail->updated_at));
?>

<?php $__env->startSection('content'); ?>
  
  <style>
    #banner {
      background-image: url("<?php echo e($image_background); ?>");
      background-position: center top;
      background-repeat: no-repeat;
      background-size: 100%;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      padding: 250px 0 0;
    }
  </style>
  
  <div id="banner">
    <div class="container">
      <h1><?php echo e($title); ?></h1>
    </div>
  </div>

  <div id="blog-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-12">
          <p style="text-align: justify">
            <?php echo $content; ?>

          </p>
          <div class="blog-detail-share">
            <p><?php echo app('translator')->get('Share this post'); ?>:</p>
            <div class="social">
              <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::fullUrl()); ?>"
                class="" rel="nofollow" target="_blank">
                <i class="fa-brands fa-facebook"></i>
              </a>
              <a href="https://twitter.com/intent/tweet?url=<?php echo e(Request::fullUrl()); ?>"
                class="" rel="nofollow" target="_blank">
                <i class="fa-brands fa-twitter"></i>
              </a>
            </div>
          </div>
          <div class="blog-detail-relate-post">
            <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
                <p class="title"><?php echo app('translator')->get('Related Posts'); ?></p>
                <div class="row">
                  <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                      // $date = date('d/m/Y', strtotime($item->created_at));
                      $date = date('d', strtotime($item->created_at));
                      $month = date('M', strtotime($item->created_at));
                      $year = date('Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                    ?>

                    <div class="col-lg-4 col-sm-12">
                      <div class="blog-post-container">
                        <div class="blog-post-img">
                          <a href="<?php echo e($alias); ?>"><img src="<?php echo e($image); ?>" alt="Blog Single"></a>
                        </div>
                        <div class="blog-post-text">
                          <a href="<?php echo e($alias); ?>" class="title">
                            <?php echo e(Str::limit($title, 100)); ?>

                          </a>
                          <p class="date">
                            <i class="fa-solid fa-calendar"></i><?php echo e($date); ?>/<?php echo e($month); ?>/<?php echo e($year); ?>

                          </p>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              <?php endif; ?>
          </div>
        </div>
        <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
      </div>
    </div>
  </div>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/pages/post/detail.blade.php ENDPATH**/ ?>