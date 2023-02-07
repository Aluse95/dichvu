<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // $params['status'] = App\Consts::POST_STATUS['active'];
    // $params['is_featured'] = true;
    // $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    // $rows = App\Http\Services\ContentService::getCmsPost($params)
    //     ->limit(12)
    //     ->get();
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)
    ->limit(12)
    ->get();
    $m_taxonomys = $taxonomys->chunk(6)
    
  ?>

  <!-- START CATEGORY -->
  <div id="category">
    <div class="container">
      <h4>
        <i class="<?php echo e($icon); ?>"></i> <?php echo e($title); ?>

      </h4>
      <div class="row p-category">
        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = $item->alias ?? '';
          ?>

          <!-- Category item -->
          <a href="<?php echo e($alias); ?>" class="col-lg-2 col-md-3 col-sm-4 category-item">
            <div class="category-item-img"></div>
            <p><?php echo e($title); ?></p>
          </a>
          <!-- Category item -->
          
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>
      <div class="m-category swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="container">
              <div class="row">
                <?php $__currentLoopData = $m_taxonomys[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                    $alias = $item->alias ?? '';
                  ?>

                  <!-- Category item -->
                  <div class="col-4">
                    <a href="<?php echo e($alias); ?>" class="category-item">
                      <div class="category-item-img"></div>
                      <p><?php echo e($title); ?></p>
                    </a>
                  </div>
                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="container">
              <div class="row">
                <?php $__currentLoopData = $m_taxonomys[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                    $alias = $item->alias ?? '';
                  ?>

                  <!-- Category item -->
                  <div class="col-4">
                    <a href="<?php echo e($alias); ?>" class="category-item">
                      <div class="category-item-img"></div>
                      <p><?php echo e($title); ?></p>
                    </a>
                  </div>
                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </div>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
  <!-- END CATEGORY -->

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/custom/styles/category.blade.php ENDPATH**/ ?>