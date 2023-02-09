<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div id="testimonials">
    <div class="container-fluid">
      <h4>
        <i class="<?php echo e($icon); ?>"></i> <?php echo $title; ?>

      </h4>
      <div class="swiper testimonials-p">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_child = $item->json_params->title->{$locale} ?? $item->title;
                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                $image_child = $item->image != '' ? $item->image : null;
                $url_link = $item->url_link != '' ? $item->url_link : '';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                $icon = $item->icon != '' ? $item->icon : '';
                $style = $item->json_params->style ?? '';
              ?>
              <div class="swiper-slide">
                <div class="testimonials-wrapper">
                  <div class="testimonials-title-container">
                    <p class="testimonials-badge"><?php echo e($title_child); ?></p>
                    <p class="testimonials-title"><?php echo e($brief_child); ?></p>
                  </div>
                  <p class="testimonials-content">
                    <?php echo $content_child; ?>

                  </p>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="swiper testimonials-m">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_child = $item->json_params->title->{$locale} ?? $item->title;
                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                $image_child = $item->image != '' ? $item->image : null;
                $url_link = $item->url_link != '' ? $item->url_link : '';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                $icon = $item->icon != '' ? $item->icon : '';
                $style = $item->json_params->style ?? '';
              ?>
              <div class="swiper-slide">
                <div class="testimonials-wrapper">
                  <div class="testimonials-title-container">
                    <p class="testimonials-badge"><?php echo e($title_child); ?></p>
                    <p class="testimonials-title"><?php echo e($brief_child); ?></p>
                  </div>
                  <p class="testimonials-content">
                    <?php echo $content_child; ?>

                  </p>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-12" style="border-right: 2px dashed #ddd">
          <div class="form-container">
            <h4>Đăng kí nhận báo giá</h4>
            <div class="form-result"></div>
            <form class="row mb-0 form_ajax" action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="col-12 form-group">
                <label for="name"><?php echo app('translator')->get('Fullname'); ?></label>
                <input type="text" id="name" name="name" value="" required>
              </div>
              <div class="col-12 form-group">
                <label for="phone"><?php echo app('translator')->get('phone'); ?></label>
                <input type="text" id="phone" name="phone" value="" required>
              </div>
              <div class="col-12 form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="">
              </div>
              <div class="col-12 form-group">
                <label for="content"><?php echo app('translator')->get('Content'); ?></label>
                <textarea type="text" id="content" name="content" cols="30" rows="5" value=""></textarea>
              </div>
              <div class="col-12 form-group">
                <button
                  class="button"
                  type="submit" id="submit" name="submit" value="submit">
                  <span>Gửi đăng ký</span>
                </button>
              </div>

              <input type="hidden" name="is_type" value="call_request">
            </form>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="video-container">
            <h4><?php echo e($brief); ?></h4>
            <div class="video">
              <?php echo $content; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/custom/styles/testimonial.blade.php ENDPATH**/ ?>