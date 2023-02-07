<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
  ?>

  <section id="slider" class="slider-element slider-parallax min-vh-60 min-vh-md-100 include-header">
    <div class="slider-inner"
      style="background: #FFF url('<?php echo e($image_background); ?>') center center no-repeat; background-size: cover;">

      <div class="vertical-middle slider-element-fade">
        <div class="container py-5">
          <div class="row pt-5">
            <div class="col-lg-8 col-md-8 <?php echo e($style); ?>">
              <div class="slider-title">
                <div class="badge rounded-pill badge-default">
                  <?php echo $title; ?>

                </div>
                <h2 class="text-white">
                  <?php echo nl2br($brief); ?>

                </h2>
                <?php echo nl2br($content); ?>

                <a href="#form-order"
                  class="button button-border button-rounded button-fill button-yellow button-large m-0 ls0 text-uppercase">
                  <span>Đăng ký tư vấn</span>
                </a>
                <a href="#themes"
                  class="button button-border button-rounded button-fill button-red button-large m-0 ls0 text-uppercase text-white border-white">
                  <span>Chọn giao diện</span>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="video-wrap h-100 d-block d-lg-none">
        <div class="video-overlay" style="background: rgba(255,255,255,0.85);"></div>
      </div>

    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/banner/styles/static.blade.php ENDPATH**/ ?>