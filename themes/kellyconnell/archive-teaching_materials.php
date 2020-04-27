<?php
    get_header();
    get_sidebar(); 
?>

    <div class="container">

        <div class="jumbotron">
            <h1 class="text-center"><?php wp_title(''); ?></h1>
        </div>

            <?php 
                $args = array( 'post_type' => 'teaching_materials', 'posts_per_page' => -1 );
                $the_query = new WP_Query( $args ); 
            
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
            <div class="row">
                <div class="col-md-6">
                    <h2><?php the_title(); ?></h2>
                    
                    <div class="entry-content">
                        <?php the_content(); ?> 
                        <?php the_sub_field('teaching_resource_description'); ?>
                    </div>
                </div>
            </div>
                    <?php wp_reset_postdata(); ?>
                
                    <?php endwhile; else:  ?>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                                </div>
                            </div>
                        </div>
                    
                <?php endif; ?>
          
    </div>
        
   <?php get_footer(); ?> 