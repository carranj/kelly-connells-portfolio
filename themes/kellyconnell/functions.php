<?php


function theme_styles(){
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css' );
	wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_register_script('html5_shiv','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script('respond_js','https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '',true );
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array('bootstrap_js'), '',true );	 
}
add_action( 'wp_enqueue_scripts', 'theme_js');
add_theme_support ( 'menus' );
add_theme_support ( 'post-thumbnails' );

/* Obfuscate E-Mail Addresses
	Use shotcode in editor: [mailto][/mailto]
	=============================================== */
	function cwc_mail_shortcode( $atts , $content=null ) {
		for ($i = 0; $i < strlen($content); $i++) $encodedmail .= "&#" . ord($content[$i]) . ';';
		return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';
	}
	add_shortcode('mailto', 'cwc_mail_shortcode');


	/* Remove Post Formatting Around Images
	=============================================== */
    function filter_ptags_on_images($content){
       return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }
    add_filter('the_content', 'filter_ptags_on_images');


	/* Truncate Page & Post WYSIWYG Content
	/* Use <?php echo content(20); ?> In The Template
	=============================================== */
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content ', $content);
  $content = str_replace(']]>', ']]>', $content);
  return $content;
}
//Link Excerpt to post
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('...more <i class="fa fa-angle-double-right"></i>', 'your-text-domain') . '</a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );

?>