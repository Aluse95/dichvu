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
        $childs = $block_childs->chunk(1)
    ?>

    <div id="people">
        <div class="container">
            <h4><?php echo e($title); ?></h4>
            <p>
                <?php echo e($brief); ?>

            </p>
            
            <div class="people-leader">
                <?php if($childs[0]): ?>
                    <?php $__currentLoopData = $childs[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title_child = $item->json_params->title->{$locale} ?? $item->title;
                        $sub = $item->sub;
                        $block_sub = $blocks->filter(function ($val, $key) use ($item) {
                            return $val->parent_id == $item->id;
                        });
                    ?>
                    <div class="badge">
                        <p><?php echo e($title_child); ?></p>
                    </div>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php if($block_sub): ?>
                                <?php $__currentLoopData = $block_sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $image_sub = $item->image != '' ? $item->image : null;
                                ?>

                                <div class="swiper-slide">
                                    <div class="people-leader-img">
                                        <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($brief_sub); ?>" />
                                        <div class="people-leader-img-text">
                                        <p class="name"><?php echo e($title_sub); ?></p>
                                        <p class="duty">-<?php echo e($brief_sub); ?>-</p>
                                        </div>
                                    </div>
                                </div> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </div>
            <div class="people-employee">
                <?php if($childs[1]): ?>
                    <?php $__currentLoopData = $childs[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title_child_2 = $item->json_params->title->{$locale} ?? $item->title;
                        $sub = $item->sub;
                        $block_sub_2 = $blocks->filter(function ($val, $key) use ($item) {
                            return $val->parent_id == $item->id;
                        });

                    ?>

                    <div class="badge">
                        <h5><?php echo e($title_child_2); ?></h5>
                    </div>
                    <div class="row">
                        <?php if($block_sub_2): ?>
                            <?php $__currentLoopData = $block_sub_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_sub_2 = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image_sub_2 = $item->image != '' ? $item->image : null;
                            ?>

                            <div class="col-lg-3 col-sm-6">
                                <div class="people-employee-img">
                                <img src="<?php echo e($image_sub_2); ?>" alt="<?php echo e($title_child_2); ?>" />
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/custom_intro/styles/intro_people.blade.php ENDPATH**/ ?>