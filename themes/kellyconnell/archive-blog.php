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

            // Check if the flexible content field exists
            if (have_rows('flexible_content')) :
                while (have_rows('flexible_content')) : the_row();
                    // Assuming you have a WYSIWYG field or a text field
                    if( get_row_layout() == 'full_width_wysiwyg' ):
                        $has_title= get_sub_field('has_title');
                        $title = get_sub_field('title');
                        $full_width_content = get_sub_field('full_width_wysiwyg');
                        $trimmed_content = wp_trim_words($full_width_content, 250, '...');
                    endif;
                endwhile;
            endif;

            $src = wp_get_attachment_image_src(get_post_thumbnail_id($queried_post->ID), '') ;
            ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="grid">
                  
                        <img src="<?php echo $src[0]; ?>" class="img-responsive" />
                        
                            <h2><?php the_title(); ?></h2>
                            <?php
                            // Display the trimmed content

                            echo '<p>' . $trimmed_content . 'test' .'</p>';
                            ?>
                            <a href ="<?php the_permalink(); ?>">View More</a>			
                </div>
            </div>
        
            <?php if($i %3 == 2) :?>
                </div>
            <?php endif; 
           

            $i++; 
        endwhile; endif; wp_reset_postdata(); ?>
</div>
        
      