<?php 
$images = get_field('gallery');
if( $images ): 
$i = 0;?>
    <?php if($i % 3 == 0) :?>
        <div class="row">
    <?php endif; ?>
        <?php foreach( $images as $image ): ?>
            <div class="col-md-4">
                <a href="<?php echo esc_url($image['url']); ?>" data-lightbox="gallery" data-title="<?php echo esc_attr($image['caption']); ?>">
                     <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
        <?php endforeach; ?>
        <?php if($i %3 == 2) :?>
            </div>
        <?php endif; ?>
    <?php $i++;
 endif; ?>