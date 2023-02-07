<footer id="footer" class="border-0">
  <div class="container">
    <!-- Footer Widgets
    ============================================= -->
    <div class="footer-widgets-wrap pb-5 clearfix">

      <div class="row col-mb-50">
        <div class="col-md-4">

          <div class="widget clearfix">

            <img src="<?php echo e($web_information->image->logo_footer ?? ''); ?>" alt="Footer Logo" class="alignleft">
          </div>

        </div>

        <div class="col-md-4">
          <div class="widget clearfix">

            <div class="row clearfix">
              <div class="col-12">
                <div class="feature-box fbox-plain fbox-sm align-items-center">
                  <div class="fbox-icon">
                    <i class="icon-home main-color"></i>
                  </div>
                  <div class="fbox-content">
                    <h3 class="nott ls0 fw-semibold main-color"><?php echo e($web_information->information->address ?? ''); ?></h3>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-3">
                <div class="feature-box fbox-plain fbox-sm align-items-center">
                  <div class="fbox-icon">
                    <i class="icon-phone3 main-color"></i>
                  </div>
                  <div class="fbox-content">
                    <h3 class="nott ls0 fw-semibold main-color"><?php echo e($web_information->information->phone ?? ''); ?></h3>
                  </div>
                </div>
              </div>

              <div class="col-12 mt-3">
                <div class="feature-box fbox-plain fbox-sm align-items-center">
                  <div class="fbox-icon">
                    <i class="icon-envelope main-color"></i>
                  </div>

                  <div class="fbox-content">
                    <h3 class="nott ls0 fw-semibold main-color"><?php echo e($web_information->information->email ?? ''); ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="widget clearfix">
            <?php if(isset($web_information->source_code->facebook_fanpage)): ?>
              <?php echo $web_information->source_code->facebook_fanpage; ?>

            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</footer>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>