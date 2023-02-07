<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
  ?>

  <div id="client-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-12 form-container">
          <h4><?php echo e($title); ?></h4>
          
          <form>
            <label for="name">Họ và tên</label> <br />
            <input type="text" id="name" />
            <br />
            <label for="phone">Số điện thoại</label><br />
            <input type="text" id="phone" />
            <br />
            <label for="email">Email</label><br />
            <input type="text" id="email" />
            <br />
            <label for="message">Lời nhắn</label><br />
            <textarea
              name="message"
              id="message"
              cols="30"
              rows="5"
            ></textarea>
            <button type="submit" class="button">Gửi đăng kí</button>
          </form>
        </div>
        <div class="col-lg-8 col-sm-12 client-container">
          <h4>Đối tác của chúng tôi</h4>
          <div class="row">
            <div class="col-lg-4 col-sm-6">
              <div class="client-img">
                <img
                  src="https://f4web.vn/data/cms-image/logo/logo_400x300.png"
                  alt="FHM Client"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/form/styles/booking.blade.php ENDPATH**/ ?>