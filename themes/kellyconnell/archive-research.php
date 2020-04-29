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
                $args = array( 'post_type' => 'research', 'posts_per_page' => -1 );
                $the_query = new WP_Query( $args ); 
                
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();

            ?>
                    <?php if($i % 3 == 0) :?>
                        <div class="row">
                    <?php endif; ?>
                        <div class="col-md-4">
                        <p class="category">Category: <?php the_category( ', ', 'multiple' ); ?></p>
                            <?php
                                if( have_rows('teaching_materials') ):
                                   

                                    while ( have_rows('teaching_materials') ) : the_row();
                                    $image = get_sub_field('preview_image');
                                ?>
                                <div class="grid">
                                    <figure class="effect-milo">
                                        <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
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
                        <?php if($i %3 == 2) :?>
                        </div>
                    <?php endif; ?>
        <?php 
            $i++; 
            endwhile; endif;

        ?>
        </div>
        
        <?php wp_reset_postdata(); ?>
          
    </div>
        
   <?php get_footer(); ?> 