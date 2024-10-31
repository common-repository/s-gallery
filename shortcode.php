<?php
/**
 * This is shortcode for frontend

 */

function r_gallery_shortcode($atts, $content=null) { 

ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'Simple_Gallery',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'color' => '',
        'fabric' => '',
        'category' => '',
    ), $atts ) );
 
    // define query parameters based on attributes
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'color' => $color,
        'fabric' => $fabric,
        'category_name' => $category,
    );
$the_query = new WP_Query( $options );

if ( $the_query->have_posts() ) {
									echo '<div id="gallery_container"> <ul class="items_small">';
									while ( $the_query->have_posts() ) {
									$the_query->the_post(); ?>
									<?php $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full', true);
                                           $image= aq_resize($thumb_url[0], 360, 240, true, true)
									?>
									
									<li class="gallery_item"><a href="<?php echo $thumb_url[0]; ?>" class="lightbox_trigger"> <img src="<?php echo $thumb_url[0]; ?>" /> </a>
									<p class="simple_capture"> <?php the_title(); ?> </p>
									</li>
									<?php
									}
										echo '</ul>';
										echo '</div> 
										    <div id="lightbox">
											 <div class="simple_all_content">
											 
											   <div id="lightbox_content"> </div>
												<div id="gallery_btn"> 
												<a href="#" id="gallery_prev"> <div id="arrow_prev"> </div> </a> 
												<a href="#" id="gallery_next"> <div id="arrow_next"> </div> </a> 
												</div> 
												<a href="#"><div class="close_button"> </div></a>
											 </div>
											</div>';
								}
else {
        echo "Sorry no posts found"; 
     }

wp_reset_postdata();
return ob_get_clean();
}
add_shortcode('gallery', 'r_gallery_shortcode'); 


?>