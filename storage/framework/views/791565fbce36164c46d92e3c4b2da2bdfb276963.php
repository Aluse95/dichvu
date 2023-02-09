<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $first_child = $block_childs->first();
    if(count($block_childs) > 2) {
        $childs = $block_childs->chunk(2);
    }

  ?>

    <div id="vision">
        <div class="container">
            <h4><?php echo e($title); ?></h4>
            <?php if($childs[0]): ?>
                <?php $__currentLoopData = $childs[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                    $image_child = $item->image != '' ? $item->image : null;
                    $row = $item->id == $first_child->id ? '' : 'flex-row-reverse';
                ?>

                <div class="row <?php echo e($row); ?>">
                    <div class="col-lg-6 col-sm-12">
                        <div class="vision-content">
                            <h5><?php echo e($title_child); ?></h5>
                            <p>
                                <?php echo e($brief_child); ?>

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="vision-content-img">
                            <img
                            src="<?php echo e($image_child); ?>"
                            alt="<?php echo e($title_child); ?>"
                            />
                        </div>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="row">
                <?php if($childs[1]): ?>
                    <?php $__currentLoopData = $childs[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title_child = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                            $sub = $item->sub;
                            $block_sub = $blocks->filter(function ($val, $key) use ($item) {
                                return $val->parent_id == $item->id;
                            });
                        ?>

                        <div class="col-lg-6 col-sm-12 d-flex align-items-center">
                            <div class="vision-content">
                                <h5><?php echo e($title_child); ?></h5>
                                <p>
                                    <?php echo e($brief_child); ?>

                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php if($block_sub): ?>
                                    <?php $__currentLoopData = $block_sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                        $image_sub = $item->image != '' ? $item->image : null;
                                    ?>

                                    <div class="swiper-slide">
                                        <div class="vision-content-img">
                                        <img
                                            src="<?php echo e($image_sub); ?>"
                                            alt="<?php echo e($title_sub); ?>"
                                        />
                                        </div>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
                            <div class="swiper-pagination"></div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/custom_intro/styles/intro_vision.blade.php ENDPATH**/ ?>