<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <style>
    #oc-clients .oc-item img {
      height: unset !important;
    }
  </style>
  <div class="section bg-transparent mb-0 mt-0">
    <div class="container">
      <div class="heading-block border-bottom-0 center mx-auto" style="max-width: 650px">
        <h3 class="nott ls0 mb-3"> <?php echo e($title); ?></h3>
        <p>
          <?php echo e($brief); ?>

        </p>
      </div>
      <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="false"
        data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              
              $url_link_sub = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
              $url_link_title_sub = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              
            ?>
            <div class="oc-item">
              <a href="<?php echo e($url_link_sub); ?>"><img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>" /></a>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH /home/fhm/domains/fhmvietnam.vn/public_html/resources/views/frontend/blocks/custom_seo/styles/seo_partner.blade.php ENDPATH**/ ?>