
<button onclick="topFunction()" id="myBtn"><i class="fa-solid fa-chevron-up"></i></button>

<script src="<?php echo e(asset('themes/frontend/f4web/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/f4web/js/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/f4web/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/f4web/js/service.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/f4web/js/faq.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/f4web/js/footer.js')); ?>"></script>

<?php if(isset($web_information->source_code->footer)): ?>
  <?php echo $web_information->source_code->footer; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/panels/scripts.blade.php ENDPATH**/ ?>