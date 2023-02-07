

<?php
$page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>
<?php $__env->startPush('style'); ?>
  <style>
    body {
      line-height: 1.5;
      color: #000000;
      font-family: Muli, sans-serif;
    }

    .highlights-tag {
      position: absolute;
      right: 0px;
      top: -20px;
      padding: 16px 10px 60px 10px;
      font-weight: 700;
      color: #FFE351;
      background-image: url("data:image/svg+xml,%3Csvg width='89' height='100' viewBox='0 0 89 120' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0H89V120L44.5 72L0 120V0Z' fill='%23D42027'/%3E%3C/svg%3E%0A");
      background-size: contain;
      background-repeat: no-repeat;
    }

    .bg-secondary {
      background-color: #a7acb0 !important;
    }

    .pricing-title {
      padding: 1rem 0;
      background-color: #f9f9f9;
      border-bottom: 1px solid rgba(0, 0, 0, .075);
      letter-spacing: 1px;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <section id="page-title" class="page-title-parallax page-title-center page-title-dark include-header"
    style="background-image: linear-gradient(to top, rgba(254,150,3,0.5), #39384D), url('<?php echo e($image_background); ?>'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      
      <h1><?php echo e($page_title); ?></h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($page->name ?? ''); ?></li>
      </ol>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">

      <?php echo $page->content ?? ''; ?>


    </div>
  </section>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\fhmvn\resources\views/frontend/pages/custom/index.blade.php ENDPATH**/ ?>