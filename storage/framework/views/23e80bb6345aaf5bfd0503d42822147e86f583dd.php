 <!-- Stylesheets ============================================= -->
 <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900&amp;display=swap" rel="stylesheet"
   type="text/css" />
 <link rel="stylesheet" id="flatsome-googlefonts-css"
   href="//fonts.googleapis.com/css?family=Roboto+Condensed%3Aregular%2Cregular%2C700%7CRoboto%3Aregular%2Cregular%7CDancing+Script%3Aregular%2C400&amp;display=swap&amp;ver=3.9"
   type="text/css" media="all" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/css/bootstrap.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/style.css')); ?>" type="text/css" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/css/dark.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/css/font-icons.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/css/animate.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/css/magnific-popup.css')); ?>" type="text/css" />

 <!-- Bootstrap Switch CSS -->
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/css/components/bs-switches.css')); ?>" type="text/css" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/css/custom.css')); ?>" type="text/css" />

 <!-- Seo Demo Specific Stylesheet -->
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/demos/seo/css/fonts.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/fhmvn/demos/seo/seo.css')); ?>" type="text/css" />

 <style>
   html {
     scroll-behavior: smooth;
   }

   :root {
     scroll-behavior: smooth;
   }

   :target:before {
     content: "";
     display: block;
     margin: 25px 0 0;
   }

   .price-number {
     font-family: "Roboto Condensed", sans-serif;
   }

   .pricing-price span.price-tenure {
     color: #333;
   }

   .heading-block h2 {
     font-size: 2rem;
   }

   .dark .top-links-item>a {
     color: #eee;
   }

   .dark #top-social li a {
     color: #eee;
   }

   .main-color {
     color: #0C4DA2 !important;
   }
 </style>

 <?php if(isset($web_information->source_code->css)): ?>
   <style>
     <?php echo $web_information->source_code->css; ?>

   </style>
 <?php endif; ?>

 <?php if(isset($web_information->source_code->javascript)): ?>
   <?php echo $web_information->source_code->javascript; ?>

 <?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>