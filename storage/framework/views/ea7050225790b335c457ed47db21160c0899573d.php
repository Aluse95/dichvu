

<?php $__env->startSection('content'); ?>

  <style>
    #banner {
    background-image: url("<?php echo e($web_information->image->background_breadcrumbs); ?>");
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
      <h1>Liên hệ tư vấn</h1>
    </div>
  </div>

  <div id="contact-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-12">
          <div class="contact-form-container">
            <form class="mb-0 form_ajax" method="post" action="<?php echo e(route('frontend.contact.store')); ?>">
              <?php echo csrf_field(); ?>
              <div class="contact-form-input">
                <p for="name"><?php echo app('translator')->get('Fullname'); ?> <small class="text-danger">*</small></p>
                <input type="text" id="name" name="name" value="" placeholder="Nguyễn Văn A"
                  required />
              </div>
              <div class="d-flex justify-content-between">
                <div class="contact-form-input">
                  <p for="email">Email <small class="text-danger">*</small></p>
                  <input type="email" id="email" name="email" value="" placeholder="example@example.com"
                  required />
                </div>
                <div class="contact-form-input">
                  <p for="phone"><?php echo app('translator')->get('phone'); ?> <small class="text-danger">*</small></p>
                  <input type="text" id="phone" name="phone" value="" class="sm-form-control"
                  placeholder="0123 456 789" required />
                </div>
              </div>
              <div class="contact-form-input">
                <p for="content"><?php echo app('translator')->get('Content'); ?> <small class="text-danger">*</small></p>
                <textarea class="required sm-form-control" id="content" name="content" rows="10" cols="30"
                 required placeholder="Để lại lời nhắn..."></textarea>
              </div>
              <button class="button"
                type="submit" name="submit" value="submit">
                <span>Gửi liên hệ</span>
              </button>
              <input type="hidden" name="is_type" value="contact">
            </form>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="contact-form-information">
            <p>
              <strong><?php echo app('translator')->get('address'); ?>:</strong><br>
              <?php echo $web_information->information->address ?? ''; ?>

            </p>
            <p>
              <strong><?php echo app('translator')->get('phone'); ?>:</strong>
              <?php echo $web_information->information->phone ?? ''; ?><br>
            </p>
            <p>
              <strong>Email:</strong>
              <?php echo $web_information->information->email ?? ''; ?>

            </p>
          </div>
          <div class="contact-form-maps">
            <?php if(isset($web_information->source_code->map)): ?>
              <?php echo $web_information->source_code->map; ?>

            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/pages/contact/index.blade.php ENDPATH**/ ?>