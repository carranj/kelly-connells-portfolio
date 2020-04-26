<?php 
    get_header();
    get_sidebar();
    $image = get_field('featured_image'); 
?>
<div <?php post_class('container p-0'); ?>>
    <div class="homelanding" style="background-image:url(<?php echo esc_url($image['url']) ?>); background-size:cover;">
        <div class="home-content text-center">
            <h2>Educator</h2>
            <h2>Creative</h2>
            <h2>Band Director</h2>
            <a href="#" title="Play video" class="play"></a>
        </div>
    </div>
</div>

<?php get_footer(); ?> 
