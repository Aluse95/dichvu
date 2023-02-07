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

  <div id="about-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-sm-12">
          <div class="about-us-img">
            <img class="img-fluid" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
          </div>
        </div>
        <div class="col-lg-5 col-sm-12">
          <div class="about-us-container">
            <h4><?php echo e($title); ?></h4>
            <p>
              <?php echo $content; ?>

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/custom_intro/styles/intro_about_us.blade.php ENDPATH**/ ?>