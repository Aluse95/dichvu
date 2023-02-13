<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
      ->limit(6)
      ->get();
    $m_rows = App\Http\Services\ContentService::getCmsPost($params)
      ->limit(3)
      ->get();
    // $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    // $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    // $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)
    // ->limit(12)
    // ->get();
    
  ?>

  <style>
    #project {
      margin-top: 80px;
      background-image: url("<?php echo e($background); ?>");
      background-size: 50%;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>

  <div id="project">
    <div class="container">
      <h4>
        <i class="<?php echo e($icon); ?>"></i> <?php echo e($title); ?>

      </h4>
      <div class="row p-project">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            // $image = $block->image != '' ? $block->image : '';

            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias = $item->alias ?? '';
          ?>

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
              <a href="<?php echo e($alias); ?>" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="<?php echo e($alias); ?>" class="project-item-title"><?php echo e($title); ?></a>
          </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="<?php echo e($url_link); ?>" class="button"
            ><?php echo e($url_link_title); ?> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
      <div class="row m-project">
        <?php $__currentLoopData = $m_rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            // $image = $block->image != '' ? $block->image : '';

            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias = $item->alias ?? '';
          ?>

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
              <a href="<?php echo e($alias); ?>" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="<?php echo e($alias); ?>" class="project-item-title"><?php echo e($title); ?></a>
          </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="<?php echo e($url_link); ?>" class="button"
            ><?php echo e($url_link_title); ?> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>