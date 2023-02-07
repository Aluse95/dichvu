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
  <div class="section my-0">
    <div class="container">
      <div class="heading-block border-bottom-0 center mx-auto">
        <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
        <h3 class="nott ls0 mb-3">
          <?php echo e($brief); ?>

        </h3>
      </div>
      <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />

    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/fhm/domains/f4web.vn/public_html/resources/views/frontend/blocks/custom_ads_google/styles/ads_google_process.blade.php ENDPATH**/ ?>