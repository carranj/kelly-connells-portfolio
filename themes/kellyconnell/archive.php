<?php
    get_header(); 
    get_sidebar();
?>

<div class="container">
<div class="jumbotron">
            <h1 class="text-center"><?php wp_title(''); ?></h1>
        </div>
    <?php 
        $i = 0;
        if ( have_posts() ) : while ( have_posts() ) : the_post();  
            
            $src = wp_get_attachment_image_src(get_post_thumbnail_id($queried_post->ID), '') ;
            if($i % 3 == 0) : ?>
                <div class="row">
            <?php endif; ?>
            
            <div class="col-md-4">
                <div class="grid">
                    <figure class="effect-milo">
                        <img src="<?php echo $src[0]; ?>" class="img-responsive" />
                        <figcaption>
                            <h2><?php the_title(); ?></h2>
                            <a href ="<?php the_permalink(); ?>">View More</a>
                        </figcaption>			
                    </figure>
                </div>
            </div>
        
            <?php if($i %3 == 2) :?>
                </div>
            <?php endif; 
           

            $i++; 
        endwhile; endif; wp_reset_postdata(); ?>
</div>
        
      