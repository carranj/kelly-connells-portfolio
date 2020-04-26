<?php get_header(); ?>
<?php get_sidebar(); ?>
<div <?php post_class('container'); ?>>
    <div class="row">
        <div class="col-md-6 text-center">
            <h1>Kelly Connell</h1>
            <a href="#" title="Play video" class="play"></a>
            <p>This is the homepage.</p>
        </div>
        <div class="col-md-6 p-0">
        <?php 
            $image = get_field('featured_image');
            if( !empty( $image ) ): ?>
            <img class="img-fluid" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?> 
