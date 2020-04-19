<?php get_header(); ?>
<div class="clear-fix"></div>
<div class="col-sm-12 paddingNone internalPagesImageDiv" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2015/12/internalpage-pullups-height530px.jpg);">  
  <section class="text-center internalPagesTitle">
    <h1>BLOG</h1>  
  </section>
</div>
<div class="clear-fix"></div>

  <div class="container blogContainer marginTop30px">

    <div class="col-md-9 paddingLeftNone paddingRightNoneMobile"> 
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="post">
         <h2><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><em><?php echo the_time ('l, F jS, Y');?></em></p>
          <div class="row">
            <div class="col-sm-4 featured-img-section">
              <?php 
            if ( has_post_thumbnail() ) {
            ?>  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <?php
            }
            ?>
            </div>
            <div class="col-sm-8">
              <?php the_excerpt(); ?>
            </div>
          </div>
          <div class="clearfix"></div>
          <br />
          <a style="font-family: 'Oswald', sans-serif;" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i> Read More</a>
          <p><em>Share this article:</em> <a href="http://www.facebook.com/sharer.php?u=" target="_blank"> <i class="fa fa-facebook-square"></i></a> 
            <a href="http://twitter.com/share?url=&text=" target="_blank"> <i class="fa fa-twitter-square"></i></a> 
          </p>

        </article>
        <div class="clear-fix"></div>
        <hr class="blog">

      <?php endwhile; else: ?>
        
        <div class="page-header">
          <h1>Oh No!</h1>
        </div>

        <p>No Content is appearing for this page!</p>

        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    
  </div>

<?php get_footer(); ?> 