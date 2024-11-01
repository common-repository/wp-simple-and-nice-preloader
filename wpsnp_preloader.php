<?php
/*
Plugin Name: WP Simple and Nice Preloader
Plugin URI: http://shawon.info/
Description: Add great preloaders to your wordpress website
Author: A.H Shawon
Author URI: http://shawon.info/
Version: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpsnp_preloader
*/
//-----------------
function wpsnp_activate() {
 update_option( 'wpsnp_color', 'blue' );
 update_option( 'wpsnp_theme', 'pace-theme-center-radar' );
 update_option( 'wpsnp_ietheme', 'pace-theme-loading-bar' );
}
register_activation_hook( __FILE__, 'wpsnp_activate' );
add_action('admin_menu', 'wpsnp_admin_menu');
//Admin menu add function
function wpsnp_admin_menu(){
  add_menu_page('WP Simple and Nice Preloader', 'WP Preloader', 'manage_options', 'wp_simple_preloader', 'wpsnp_admin_function', plugins_url( 'icon/spinner.gif',__FILE__ ));
}
// Add settings link on plugin page
function wpsnp_plugin_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=wp_simple_preloader">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'wpsnp_plugin_settings_link' );
//Admin screen functionality
function wpsnp_admin_function(){
	if(isset($_POST['wpsnp_submit'])){
		update_option( 'wpsnp_color',$_POST['wpsnp_color'] );
		update_option( 'wpsnp_theme',$_POST['wpsnp_style'] );
		update_option( 'wpsnp_ietheme',$_POST['wpsnp_iestyle'] );
	}
  $wpsnp_color=get_option( 'wpsnp_color' );
  $wpsnp_theme=get_option( 'wpsnp_theme' );
  $wpsnp_ietheme=get_option( 'wpsnp_ietheme' );
  ?>
  <div class="wrap">
    <h2>WP Simple and Nice Preloader</h2>
    <style type="text/css">
     label.wpsnp > input{ /* HIDE RADIO */
      visibility: hidden;
      position: absolute;
    }
    label.wpsnp > input + img{ /* IMAGE STYLES */
      cursor:pointer;
      border:3px solid #CCC;
    }
    label.wpsnp > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
      border:3px solid #090;
    }
  </style>
  <form method="post" action="">
   <table class="form-table">
    <tbody>
      <tr>
        <th scope="row"><label>Preloader Style:</label></th>
        <td><label class="wpsnp">
          <input type="radio" name="wpsnp_style" value="pace-theme-center-atom" <?php if($wpsnp_theme=="pace-theme-center-atom"){ echo 'checked="checked"';};?>/>
          <img title="Center Atom" src="<?php echo plugins_url( 'icon/atom.jpg',__FILE__ ); ?>">
        </label><label class="wpsnp">
        <input type="radio" name="wpsnp_style" value="pace-theme-barber-shop" <?php if($wpsnp_theme=="pace-theme-barber-shop"){ echo 'checked="checked"';};?>/>
        <img title="Barbar Shop" src="<?php echo plugins_url( 'icon/barbar.jpg',__FILE__ ); ?>">
      </label><label class="wpsnp">
      <input type="radio" name="wpsnp_style" value="pace-theme-big-counter" <?php if($wpsnp_theme=="pace-theme-big-counter"){ echo 'checked="checked"';};?>/>
      <img title="Big Counter" src="<?php echo plugins_url( 'icon/big-counter.jpg',__FILE__ ); ?>">
    </label><label class="wpsnp">
    <input type="radio" name="wpsnp_style" value="pace-theme-bounce" <?php if($wpsnp_theme=="pace-theme-bounce"){ echo 'checked="checked"';};?>/>
    <img title="Corner Bounce" src="<?php echo plugins_url( 'icon/bounce.jpg',__FILE__ ); ?>">
  </label><label class="wpsnp">
  <input type="radio" name="wpsnp_style" value="pace-theme-center-circle" <?php if($wpsnp_theme=="pace-theme-center-circle"){ echo 'checked="checked"';};?>/>
  <img title="Center Circle Count" src="<?php echo plugins_url( 'icon/circle_count.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-fill-left" <?php if($wpsnp_theme=="pace-theme-fill-left"){ echo 'checked="checked"';};?>/>
<img title="Fill Left" src="<?php echo plugins_url( 'icon/fill-left.jpg',__FILE__,__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-flash" <?php if($wpsnp_theme=="pace-theme-flash"){ echo 'checked="checked"';};?>/>
<img title="Top Flash" src="<?php echo plugins_url( 'icon/flash.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-flat-top" <?php if($wpsnp_theme=="pace-theme-flat-top"){ echo 'checked="checked"';};?>/>
<img title="Top Flat" src="<?php echo plugins_url( 'icon/flat-top.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-corner-indicator" <?php if($wpsnp_theme=="pace-theme-corner-indicator"){ echo 'checked="checked"';};?>/>
<img title="Corner Indicator" src="<?php echo plugins_url( 'icon/indicator.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-loading-bar" <?php if($wpsnp_theme=="pace-theme-loading-bar"){ echo 'checked="checked"';};?>/>
<img title="Loading Bar" src="<?php echo plugins_url( 'icon/loading_bar.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-mac-osx" <?php if($wpsnp_theme=="pace-theme-mac-osx"){ echo 'checked="checked"';};?>/>
<img title="Mac OSX" src="<?php echo plugins_url( 'icon/mac.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-minimal" <?php if($wpsnp_theme=="pace-theme-minimal"){ echo 'checked="checked"';};?>/>
<img title="Minimal" src="<?php echo plugins_url( 'icon/minimal.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-center-radar" <?php if($wpsnp_theme=="pace-theme-center-radar"){ echo 'checked="checked"';};?>/>
<img title="Center Radar" src="<?php echo plugins_url( 'icon/radar.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_style" value="pace-theme-center-simple" <?php if($wpsnp_theme=="pace-theme-center-simple"){ echo 'checked="checked"';};?>/>
<img title="Center Simple Bar" src="<?php echo plugins_url( 'icon/simple_loading.jpg',__FILE__ ); ?>">
</label><p class="description">Please select a preloader style.</p></td>
</tr>
<tr>
  <th scope="row"><label>Preloader Color:</label></th>
  <td><label class="wpsnp">
    <input type="radio" name="wpsnp_color" value="white" <?php if($wpsnp_color=="white"){ echo 'checked="checked"';};?>/>
    <img title="White" src="<?php echo plugins_url( 'icon/white.jpg',__FILE__ ); ?>">
  </label><label class="wpsnp">
  <input type="radio" name="wpsnp_color" value="black" <?php if($wpsnp_color=="black"){ echo 'checked="checked"';};?>/>
  <img title="Black" src="<?php echo plugins_url( 'icon/black.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="blue" <?php if($wpsnp_color=="blue"){ echo 'checked="checked"';};?>/>
<img title="Blue" src="<?php echo plugins_url( 'icon/blue.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="orange" <?php if($wpsnp_color=="orange"){ echo 'checked="checked"';};?>/>
<img title="Orange" src="<?php echo plugins_url( 'icon/orange.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="pink" <?php if($wpsnp_color=="pink"){ echo 'checked="checked"';};?>/>
<img title="Pink" src="<?php echo plugins_url( 'icon/pink.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="red" <?php if($wpsnp_color=="red"){ echo 'checked="checked"';};?>/>
<img title="Red" src="<?php echo plugins_url( 'icon/red.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="silver" <?php if($wpsnp_color=="silver"){ echo 'checked="checked"';};?>/>
<img title="Silver" src="<?php echo plugins_url( 'icon/silver.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="green" <?php if($wpsnp_color=="green"){ echo 'checked="checked"';};?>/>
<img title="Green" src="<?php echo plugins_url( 'icon/green.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="yellow" <?php if($wpsnp_color=="yellow"){ echo 'checked="checked"';};?>/>
<img title="Yellow" src="<?php echo plugins_url( 'icon/yellow.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_color" value="purple" <?php if($wpsnp_color=="purple"){ echo 'checked="checked"';};?>/>
<img title="Purple" src="<?php echo plugins_url( 'icon/purple.jpg',__FILE__ ); ?>">
</label><p class="description">Please select preloader color.</p></td>
</tr>
<tr>
  <th scope="row"><label>Preloader Style for IE.</label></th>
  <td><label class="wpsnp">
    <input type="radio" name="wpsnp_iestyle" value="pace-theme-center-atom" <?php if($wpsnp_ietheme=="pace-theme-center-atom"){ echo 'checked="checked"';};?>/>
    <img title="Center Atom" src="<?php echo plugins_url( 'icon/atom.jpg',__FILE__ ); ?>">
  </label><label class="wpsnp">
  <input type="radio" name="wpsnp_iestyle" value="pace-theme-barber-shop" <?php if($wpsnp_ietheme=="pace-theme-barber-shop"){ echo 'checked="checked"';};?>/>
  <img title="Barbar Shop" src="<?php echo plugins_url( 'icon/barbar.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-big-counter" <?php if($wpsnp_ietheme=="pace-theme-big-counter"){ echo 'checked="checked"';};?>/>
<img title="Big Counter" src="<?php echo plugins_url( 'icon/big-counter.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-center-circle" <?php if($wpsnp_ietheme=="pace-theme-center-circle"){ echo 'checked="checked"';};?>/>
<img title="Center Circle Count" src="<?php echo plugins_url( 'icon/circle_count.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-fill-left" <?php if($wpsnp_ietheme=="pace-theme-fill-left"){ echo 'checked="checked"';};?>/>
<img title="Fill Left" src="<?php echo plugins_url( 'icon/fill-left.jpg',__FILE__,__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-flash" <?php if($wpsnp_ietheme=="pace-theme-flash"){ echo 'checked="checked"';};?>/>
<img title="Top Flash" src="<?php echo plugins_url( 'icon/flash.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-loading-bar" <?php if($wpsnp_ietheme=="pace-theme-loading-bar"){ echo 'checked="checked"';};?>/>
<img title="Loading Bar" src="<?php echo plugins_url( 'icon/loading_bar.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-mac-osx" <?php if($wpsnp_ietheme=="pace-theme-mac-osx"){ echo 'checked="checked"';};?>/>
<img title="Mac OSX" src="<?php echo plugins_url( 'icon/mac.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-minimal" <?php if($wpsnp_ietheme=="pace-theme-minimal"){ echo 'checked="checked"';};?>/>
<img title="Minimal" src="<?php echo plugins_url( 'icon/minimal.jpg',__FILE__ ); ?>">
</label><label class="wpsnp">
<input type="radio" name="wpsnp_iestyle" value="pace-theme-center-simple" <?php if($wpsnp_ietheme=="pace-theme-center-simple"){ echo 'checked="checked"';};?>/>
<img title="Center Simple Bar" src="<?php echo plugins_url( '/icon/simple_loading.jpg',__FILE__ ); ?>">
</label>
<p class="description">Please select a preloader style for internet explorer.</p>
</td>
</tr>
<tr>
  <td>&nbsp;</td><td><p class="submit"><input type="submit" value="Save Changes" class="button button-primary" id="submit" name="wpsnp_submit"></p></td>
</tr>
</tbody></table>
</form>
</div>
<?php
}
//Frontend functionality
function wpsnp_scripts() {
  $wpsnp_color=get_option( 'wpsnp_color' );
  $wpsnp_theme=get_option( 'wpsnp_theme' );
  $wpsnp_ietheme=get_option( 'wpsnp_ietheme' );
  if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){
    wp_register_style('wpsnp_css', plugins_url('/themes/'.$wpsnp_color.'/'.$wpsnp_ietheme.'.css',__FILE__ ));
}
else
{
  wp_register_style('wpsnp_css', plugins_url('/themes/'.$wpsnp_color.'/'.$wpsnp_theme.'.css',__FILE__ ));
}
wp_register_style('wpsnp_css', plugins_url('/themes/'.$wpsnp_color.'/'.$wpsnp_theme.'.css',__FILE__ ));
wp_enqueue_style('wpsnp_css');
wp_register_script( 'wpsnp_js', plugins_url('/js/pace.js',__FILE__ ));
wp_enqueue_script('wpsnp_js');
}
add_action( 'wp_enqueue_scripts', 'wpsnp_scripts' );