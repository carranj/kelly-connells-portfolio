<?php get_header(); ?>
<div class="clear-fix"></div>
<div class="col-sm-12 paddingNone internalPagesImageDiv" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2015/12/internalpage-pullups-height530px.jpg);">  
  <section class="text-center internalPagesTitle">
    <h1>BLOG</h1>  
  </section>
</div>
<div class="clear-fix"></div>

<div class="container blogContainer marginTop30px">
  <div class="col-md-12 paddingLeftNone paddingRightNoneMobile"> 
    <div class="row"> <!-- Start a new row for blog posts -->
      <?php if (have_posts()) :
        while (have_posts()) : the_post(); 
        // Check if current post index is odd or even
          $post_index = $wp_query->current_post;
          $is_even = $post_index % 2 == 1; // 1 for even (because index is zero-based)
          // Get the current post ID
          $post_id = get_the_ID();
          $likes = get_post_meta($post_id, 'post_likes', true);
      ?>
          <div class="col-md-12">
            <article class="post">
              <div class="row">
                <!-- If it's an even post -->
                 <?php if ($is_even) : ?>
                  <div class="col-md-7">
                    <h2><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><em><?php echo get_the_date('l, F jS, Y'); ?></em></p>
                    <?php 
                      // Get the post content
                      $content = get_the_content();

                      // Optionally apply filters to format the content
                      $formatted_content = apply_filters('the_content', $content);
                      
                      // Trim to 40 words
                      $trimmed_content = wp_trim_words($formatted_content, 40, '...');
                      
                      echo '<p class="post-preview">' . $trimmed_content . '</p>';
                    ?>
                    <a style="font-family: 'Oswald', sans-serif;" href="<?php the_permalink(); ?>">
                        <i class="fa fa-link"></i> Read More
                    </a>
                    <p><em>Share this article:</em>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                    
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
                        <i class="fa fa-linkedin"></i> LinkedIn
                    </a>
                    </p>
                  </div>
                  <div class="col-md-5">
                      <div class="featured-img-section">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                              <?php the_post_thumbnail(); ?>
                              <div class="color-overlay"></div>
                            </a>
                        <?php endif; ?>
                      </div>
                  </div>
                  <!-- If it's an odd post -->
                  <?php else : ?>
                  <div class="col-md-5">
                      <div class="featured-img-section">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                              <?php the_post_thumbnail(); ?>
                              <div class="color-overlay"></div>
                            </a>
                        <?php endif; ?>
                      </div>
                  </div>
                  <div class="col-md-7">
                      <h2><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <p><em><?php echo get_the_date('l, F jS, Y'); ?></em></p>
                      <?php 
                          // Initialize a variable to hold all content

                          // Get the post content
                          $content = get_the_content();
                          
                          // Optionally apply filters to format the content
                          $formatted_content = apply_filters('the_content', $content);
                          
                          // Trim to 40 words
                          $trimmed_content = wp_trim_words($formatted_content, 40, '...');
                          
                          echo '<p class="post-preview">' . $trimmed_content . '</p>';

                      ?>
                      <a style="font-family: 'Oswald', sans-serif;" href="<?php the_permalink(); ?>">
                          <i class="fa fa-link"></i> Read More
                      </a>
                      
                    <p><em>Share this article:</em>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                    
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
                        <i class="fa fa-linkedin"></i> LinkedIn
                    </a>
                    </p>
                  </div>
                  <?php endif; ?>
                            </div>
                        </article>
                        <hr class="blog">
                    </div>
                                      
                <?php endwhile; else: ?>
                
                <div class="page-header">
                    <h1>Oh No!</h1>
                </div>
                <p>No Content is appearing for this page!</p>

            <?php endif; ?>
        </div> <!-- End of the last row -->
    </div>
    
    <?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>
