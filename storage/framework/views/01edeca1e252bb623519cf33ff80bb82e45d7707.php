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

  <div class="container">

    <div class="heading-block border-bottom-0 center mx-auto">
      <h2 class="nott ls0 mb-3"><?php echo e($title); ?></h2>
    </div>

    <div id="portfolio" class="portfolio row grid-container gutter-30" data-layout="fitRows">
      <div class="col-sm-12 col-lg-6 col-md-12">
        <div class="heading-block border-bottom-0 center mx-auto">
          <p class="text-justify">
            <?php echo nl2br($brief); ?>

          </p>
        </div>

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
            <?php if($loop->index < 2): ?>
              <article class="service-item-container portfolio-item col-sm-12 col-12 pf-media pf-icons">
                <div class="grid-inner">
                  <div class="portfolio-image">
                    <a href="<?php echo e($url_link_sub); ?>">
                      <img src="<?php echo e($image_sub); ?>" alt="Open Imagination" />
                    </a>
                    <div class="bg-overlay">
                      <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                        <a href="<?php echo e($url_link_sub); ?>" class="overlay-trigger-icon bg-light text-dark"
                          data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                          data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                      </div>
                      <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                  </div>
                  <div class="portfolio-desc">
                    <h3>
                      <a href="<?php echo e($url_link_sub); ?>"><?php echo e($title_sub); ?></a>
                    </h3>
                    <span><?php echo e($brief_sub); ?></span>
                  </div>
                </div>
              </article>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-12 col-lg-6 col-md-12">
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
            <?php if($loop->index > 1): ?>
              <article class="service-item-container portfolio-item col-sm-12 col-12 pf-media pf-icons">
                <div class="grid-inner">
                  <div class="portfolio-image">
                    <a href="<?php echo e($url_link_sub); ?>">
                      <img src="<?php echo e($image_sub); ?>" alt="Open Imagination" />
                    </a>
                    <div class="bg-overlay">
                      <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                        <a href="<?php echo e($url_link_sub); ?>" class="overlay-trigger-icon bg-light text-dark"
                          data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                          data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                      </div>
                      <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                  </div>
                  <div class="portfolio-desc">
                    <h3>
                      <a href="<?php echo e($url_link_sub); ?>"><?php echo e($title_sub); ?></a>
                    </h3>
                    <span><?php echo e($brief_sub); ?></span>
                  </div>
                </div>
              </article>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH /home/fhm/domains/fhmvietnam.vn/public_html/resources/views/frontend/blocks/custom_content/styles/service_content_list.blade.php ENDPATH**/ ?>