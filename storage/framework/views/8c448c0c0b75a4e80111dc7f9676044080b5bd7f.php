<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <div class="section bg-white mt-0 mb-0 pb-0"
    style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover; background-position: center center;">
    <div class="container">
      <div class="heading-block center mt-0">
        <h3 class="text-uppercase"><?php echo e($title); ?></h3>
      </div>
      <div class="row justify-content-between align-items-center">

        <div class="col-lg-4 col-md-6">

          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
                $icon_sub = $item->icon != '' ? $item->icon : null;
              ?>
              <?php if($loop->index < 2): ?>
                <div class="feature-box flex-md-row-reverse text-md-end border-0 mb-5">
                  <div class="fbox-icon">
                    <?php echo $icon_sub; ?>

                  </div>
                  <div class="fbox-content">
                    <p class="nott ls0 text-dark"><?php echo e($title_sub); ?></p>
                    <p><?php echo nl2br($brief_sub); ?></p>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>

        </div>

        <div class="col-lg-3 col-7 col-md-3 offset-3 offset-sm-0 d-none d-lg-block center my-5">
          <img src="<?php echo e($image); ?>" alt="iphone" class="rounded parallax"
            data-bottom-top="transform: translateY(-30px)" data-top-bottom="transform: translateY(30px)">
        </div>

        <div class="col-lg-4 col-md-6">

          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
                $icon_sub = $item->icon != '' ? $item->icon : null;
              ?>
              <?php if($loop->index > 1): ?>
                <div class="feature-box border-0 mb-5">
                  <div class="fbox-icon">
                    <?php echo $icon_sub; ?>

                  </div>
                  <div class="fbox-content">
                    <p class="nott ls0 text-dark"><?php echo e($title_sub); ?></p>
                    <p><?php echo nl2br($brief_sub); ?></p>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH /home/fhm/domains/f4web.vn/public_html/resources/views/frontend/blocks/custom_content/styles/service_content_trust.blade.php ENDPATH**/ ?>