<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $image = $block->image != '' ? $block->image : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    $image_for_screen = null;
    if ($agent->isDesktop() && $image_background != null) {
        $image_for_screen = $image_background;
    } else {
        $image_for_screen = $image;
    }
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    
  ?>

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

  <!-- START BANNE  -->
  <div id="banner">
    <div class="container">
      <h1><?php echo $brief; ?></h1>
      <div class="btn-container">
        <a href="#form-order" class="btn-item">Đăng kí tư vấn</a>
        <a href="<?php echo e($url_link); ?>" class="btn-item"><?php echo e($url_link_title); ?></a>
      </div>
    </div>
    <div class="container-fluid">
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image != '' ? $item->image : null;
                $image_background = $item->image_background != '' ? $item->image_background : null;
                $video = $item->json_params->video ?? null;
                $video_background = $item->json_params->video_background ?? null;
                $url_link = $item->url_link != '' ? $item->url_link : '';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                $icon = $item->icon != '' ? $item->icon : '';
                $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
                
              ?>

              <!-- Slides -->
              <div class="swiper-slide">
                <img src="<?php echo e($image); ?>" alt="FHM Image" />
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END BANNER  -->

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/banner/styles/static.blade.php ENDPATH**/ ?>