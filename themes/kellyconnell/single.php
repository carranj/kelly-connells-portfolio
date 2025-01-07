<?php get_header(); ?>

<div class="container single-post-container marginTop30px">
    <div class="col-md-12 paddingLeftNone paddingRightNoneMobile"> 
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
            <article <?php post_class(); ?>>
              
              <h1><?php the_title(); ?></h1>    
                
                <p><em><?php echo get_the_date('l, F jS, Y'); ?></em></p>

                <div class="post-content">
                <?php
		if ( ! post_password_required() ):
			the_content();
		else:
		?>
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<p>THIS PAGE IS PASSWORD PROTECTED. PLEASE ENTER THE PASSWORD TO VIEW THIS PAGE.</p>
				<?php echo get_the_password_form($post); ?>
			</div>
		</div>
		<?php endif; ?> 
                </div>

                <div class="post-navigation">
                    <div class="prev-post"><?php previous_post_link('%link', 'Previous Post'); ?></div>
                    <div class="next-post"><?php next_post_link('%link', 'Next Post'); ?></div>
                </div>
            </article>

            <div class="post-comments">
                <?php
                // If comments are open or there are comments, load the comment template
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>

        <?php endwhile; else: ?>

            <div class="page-header">
                <h1>Oh No!</h1>
            </div>
            <p>No Content is appearing for this post!</p>

        <?php endif; ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
