<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div <?php post_class('container-fluid'); ?>>
		<div class="jumbotron">
			<h1 class="text-center"><?php the_title(); ?></h1>
		</div>
        <?php
        while ( have_posts() ) : the_post();
        ?>
        <div class="row">
			<div class="col-md-8 offset-md-2">
            <?php the_content(); ?>
			</div>
		</div>
    <?php
    endwhile;
        ?>
		
		
		
	</div>

<?php get_footer(); ?>
