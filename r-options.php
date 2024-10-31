<?php
if ( is_admin() ) { // admin actions
					add_action( 'admin_enqueue_scripts', 'chrs_options_style' );
					add_action( 'admin_init', 'chrs_theme_options_init' );
					add_action( 'admin_menu', 'chrs_theme_options_add' ); 
					
					}

function chrs_options_style() {
								wp_register_style( 'chrs_options_css',  plugins_url('css/admin-styles.css', __FILE__), false, '1.0.0' );
								wp_enqueue_style( 'chrs_options_css' );
                             }
function chrs_theme_options_init(){
									register_setting( 'chrs_options', 'chrs_theme_options');
								}
function chrs_theme_options_add() {
										//add_menu_page( __( 'Theme Options', 'chrstheme' ), __( 'Theme Options', 'chrstheme' ), 'edit_theme_options', 'theme_options', 'chrs_theme_options_do',plugins_url( 'myplugin/images/icon.png' ),80.5);
										
										add_submenu_page( 'edit.php?post_type=simple_gallery', 'Gallery settings', 'Gallery settings', 'manage_options', 'my-custom-submenu-page', 'chrs_theme_options_do' ); 
									}
function chrs_theme_options_do() {
										global $select_options;
										if ( ! isset( $_REQUEST['settings-updated'] ) )
											$_REQUEST['settings-updated'] = false;
										?>

<div class="chrs-options-wrap">
	<?php screen_icon(); echo "<h2>". __( 'Theme Options', 'chrstheme' ) . "</h2>"; ?>
	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated">
		<p>
			<?php _e( 'Options saved', 'chrstheme' ); ?>
		</p>
	</div>
	<?php endif; ?>
	<form method="post" action="options.php">
		<?php settings_fields( 'chrs_options' ); ?>
		<?php $options = get_option( 'chrs_theme_options' ); ?>

		<div class="chrs-settings-block">
			<h3>setting</h3>
			<table>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Height', 'chrstheme' ); ?>
					</th>
					<td>
					     <input id="chrs_theme_options[height]" type="text" name="chrs_theme_options[height]" value="<?php if($options['height']) {esc_attr_e( $options['height'] );} else echo '166px'; ?>" />
						
						<label for="chrs_theme_options[height]">
							<?php _e( 'Please enter the height of images', 'chrstheme' ); ?>
						</label>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"> 
					   <?php _e( 'Width', 'chrstheme' ); ?>
					</th>
					<td>
					     <input id="chrs_theme_options[width]" type="text" name="chrs_theme_options[width]" value="<?php if($options['width']) {esc_attr_e( $options['width'] );} else echo 'auto'; ?>" />
						<label for="chrs_theme_options[width]">
							<?php _e( 'Please enter the width of images', 'chrstheme' ); ?>
						</label>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"> 
					   <?php _e( 'Maximum width', 'chrstheme' ); ?>
					</th>
					<td> 
						   <select id="chrs_theme_options[maxwidth]" name="chrs_theme_options[maxwidth]" value="<?php if($options['maxwidth']) {esc_attr_e( $options['maxwidth'] );} else echo '17%'; ?>">
							  <option value="17%" <?php if($options['maxwidth']=="17%") {echo "selected";}; ?>>Five column</option>
							  <option value="22%" <?php if($options['maxwidth']=="22%") {echo "selected";}; ?>>Four column</option>
							  <option value="30%" <?php if($options['maxwidth']=="30%") {echo "selected";}; ?>>Three column</option>
							  <option value="47%" <?php if($options['maxwidth']=="47%") {echo "selected";}; ?>>Two column</option>
							  
							</select> 
						 
						<label for="chrs_theme_options[maxwidth]">
							<?php _e( 'If you want the actual with, keep in blank', 'chrstheme' ); ?>
						</label>
					</td>
				</tr>
				

			</table>
		</div>
		<p>
			<input type="submit" value="<?php _e( 'Save Options', 'chrstheme' ); ?>" class="button" />
		</p>
	</form>
</div>
<?php
}																									
 ?>