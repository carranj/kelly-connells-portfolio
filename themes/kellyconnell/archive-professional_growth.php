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
                $args = array( 'post_type' => 'professional_growth', 'posts_per_page' => -1 );
                $the_query = new WP_Query( $args ); 
                
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();

            ?>
                    <?php if($i % 3 == 0) :?>
                        <div class="row">
                    <?php endif; ?>
                        <div class="col-md-4">
                            <?php
                                if( have_rows('teaching_materials') ):
                                   

                                    while ( have_rows('teaching_materials') ) : the_row();
                                    $src = wp_get_attachment_image_src(get_post_thumbnail_id($queried_post->ID), '') ;
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