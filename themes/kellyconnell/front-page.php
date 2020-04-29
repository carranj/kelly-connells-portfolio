<?php 
    get_header();
    get_sidebar();
    $image = get_field('featured_image'); 
?>
<div <?php post_class('container-fluid p-0'); ?>>
    <div class="homelanding" style="background-image:url(<?php echo esc_url($image['url']) ?>); background-size:cover;">
        <div class="home-content text-center">
            <h2><?php the_field('featured_line_1'); ?></h2>
            <h2><?php the_field('featured_line_2'); ?></h2>
            <h2><?php the_field('featured_line_3'); ?></h2>
            <a href="#" title="Play video" class="play"></a>
        </div>
    </div>
</div>

<?php get_footer(); ?> 
