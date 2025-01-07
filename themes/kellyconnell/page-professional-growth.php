<?php
    get_header();
    get_sidebar(); 
?>

    <div class="container_fluid">
        <div class="jumbotron">
            <h1 class="text-center"><?php wp_title(''); ?></h1>
        </div>
        <?php 
            if ( ! post_password_required() ):
                $posts = get_posts(array(
                    'post_type'	=> 'professional_growth',
                    'posts_per_page' => -1,
                ));
                $i = 0;
                if( $posts ) : foreach( $posts as $post ) : 
                    setup_postdata( $post );
        ?>
        
                    <?php if($i % 2 == 0) :?>
                        <div class="row">
                    <?php endif; ?>

                    <div class="col-md-6">
                            <?php
                                if( have_rows('teaching_materials') ):


                                    while ( have_rows('teaching_materials') ) : the_row();
                                    $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '') ;
                                    echo $src;
                                ?>
                                <div class="grid">
                                    <figure class="effect-milo professional-growth">
                                    <div class="img-placement"></div>
                                        <figcaption>
                                            <h2><?php the_title(); ?></h2>
                                            <p><?php the_sub_field('teaching_resource_description'); ?></p>
                                            <a href ="<?php the_permalink(); ?>">View More</a>
                                        </figcaption>			
                                    </figure>
                                </div>
                                <?php
                                    endwhile;

                                endif;

                                ?>
                        </div>

                    <?php if($i % 2 == 1) :?>
                        </div>
                    <?php endif; $i++; ?>

                <?php endforeach; endif; else: ?>
                    <div class="row">
                        <div class="col-md-8 offset-md-2 text-center">
                            <p>THIS PAGE IS PASSWORD PROTECTED. PLEASE ENTER THE PASSWORD TO VIEW THIS PAGE.</p>
                            <?php echo get_the_password_form($post); ?>
                        </div>
                    </div>
                <?php endif; ?>
	</div>
    <?php get_footer(); ?>