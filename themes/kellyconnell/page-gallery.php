<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div <?php post_class('container-fluid'); ?>>
		<div class="jumbotron">
			<h1 class="text-center"><?php the_title(); ?></h1>
		</div>
		<?php
		if ( ! post_password_required() ):
			get_template_part( 'page-templates/gallery' );
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

<?php get_footer(); ?>
