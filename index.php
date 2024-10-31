<?php
/**
 * Plugin Name: S Gallery
 * Plugin URI: http://www.robiulawal.me/simple-gallery/
 * Description: An simple gallery plugins easy to use as a shortcode 
 * Version: 1.1.1
 * Author: Robiul Awal
 * Author URI: http://www.robiulawal.me
 * Requires at least: 3.4
 * Tested up to: 4.0
 */

    
//Group the code inside a function
add_action( 'wp_enqueue_scripts', 'simple_gallery_scripts' );
function simple_gallery_scripts(){
							wp_enqueue_style("style", plugins_url('css/styles.css', __FILE__),false, "");
							wp_enqueue_script("simple.plugins",plugins_url('js/simple-plugin.js', __FILE__),array("jquery"), "",1);
							}

function add_this_script_footer(){ ?>
									 <script>
									jQuery(document).ready(function($) {
									$(".items_small>li>a").simple_gallery();
									});
									</script>
						<?php }						
add_action('wp_footer', 'add_this_script_footer'); 


function add_this_style_footer(){ ?>
<style type="text/css">
<?php
$themeOptions = get_option('chrs_theme_options' );

echo "
.gallery_item img{
height:".$themeOptions['height']." !important;
width:".$themeOptions['width']." !important;
}
.gallery_item{
width:".$themeOptions['maxwidth'].";
}

";
?>
</style>
<?php }						
add_action('wp_footer', 'add_this_style_footer'); 


// Registers the new post type and taxonomy

function wpt_event_posttype() {
	register_post_type( 'Simple_Gallery',
		array(
			'labels' => array(
				'name' => __( 'Simple Gallery' ),
				'singular_name' => __( 'Image' ),
				'add_new' => __( 'Add New Image' ),
				'add_new_item' => __( 'Add New Image' ),
				'edit_item' => __( 'Edit Image' ),
				'new_item' => __( 'Add New Image' ),
				'view_item' => __( 'View Image' ),
				'search_items' => __( 'Search Image' ),
				'not_found' => __( 'No Image found' ),
				'not_found_in_trash' => __( 'No Image found in trash' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "gallery"), // Permalinks format
			'menu_position' => 80,
		)
	);
}
if ( is_admin() ) { // admin actions
                  add_action( 'init', 'wpt_event_posttype' );
					}


/*  Image thumbnail sizes
/* ------------------------------------ */



    add_image_size( 'thumb-small', 250, 166, true ); // Hard crop to exact dimensions (crops sides or top and bottom)
    add_image_size( 'thumb-medium', 736, 490, true ); // Crop to 520px width, unlimited height


 include_once('r-options.php');
 include_once('shortcode.php');
 include_once('aq_resizer.php');
 

?>