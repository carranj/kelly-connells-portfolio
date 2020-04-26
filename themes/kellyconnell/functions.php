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

	wp_enqueue_script('bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '4.4.1',true );
	wp_enqueue_script('howler_js', 'https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.3/howler.core.min.js', array(), '2.1.3',true );
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

	/* Remove Text from form
	=============================================== */
	function my_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		' . __( "" ) . '
		<label for="' . $label . '">' . __( "Enter Password:" ) . ' </label><br/>
		<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><br/><br/>
		<input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
		</form>
		';
		return $o;
	}
	add_filter( 'the_password_form', 'my_password_form' );

	/* Removes or edits the 'Protected:' part from posts titles
	=============================================== */
	add_filter( 'protected_title_format', 'remove_protected_text' );
	function remove_protected_text() {
		return __('%s');
	}


?>