<?php get_header(); ?>
<?php get_sidebar(); ?>


<div class="container blogContainer marginTop30px">
<div class="jumbotron">
  <h1 class="text-center"><?php wp_title(''); ?></h1>
</div>
    <div class="row">
      <div class="col-md-12">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php  if( have_rows('teaching_materials') ): while ( have_rows('teaching_materials') ) : the_row(); 
          $file = get_sub_field('teaching_resource_file');
          $url = $file['url'];
          ?>
            <p><?php the_sub_field('teaching_resource_description'); ?></p>
            <div class="featured-img-section">
              <object data="<?php echo esc_html($url); ?>" type="application/pdf" width="100%" height="800px">
                  <embed src="<?php echo esc_html($url); ?>" type="application/pdf">
                      <p>This browser does not support PDFs. Please download the PDF to view it: <a href="<?php echo esc_html($url); ?>">Download PDF</a>.</p>
                  </embed>
              </object>
            </div>
          <?php endwhile; endif;?>

      <?php endwhile; else: ?>
          <h1>Oh No!</h1>
          <p>No Content is appearing for this page!</p>
      <?php endif; ?>
      </div>
    </div>


      </div>







</div>



<?php get_footer(); ?> 