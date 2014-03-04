<?php
// remove WP3.1 admin bar
add_filter('show_admin_bar', '__return_false');

// remove underused items from dashboard menu
function remove_menus () {
	global $menu;
	$restricted = array( __('Links'), __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

// custom logo
function my_custom_login_logo() {
	echo '';
}
function my_custom_logo() {
	echo '';
}
add_action('login_head', 'my_custom_login_logo');
add_action('admin_head', 'my_custom_logo');

// remove updatenag
add_action('admin_menu','wp_hide_update');
function wp_hide_update() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}

// ads browser detection to body_class();
// from: http://wpsnipp.com/index.php/functions-php/browser-detection-and-os-detection-with-body_class/
function mv_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) {
        $classes[] = 'ie';
        if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
        $classes[] = 'ie'.$browser_version[1];
    } else $classes[] = 'unknown';
    if($is_iphone) $classes[] = 'iphone';
    if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
        $classes[] = 'osx';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
        $classes[] = 'linux';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
        $classes[] = 'windows';
    }
    return $classes;
}
add_filter('body_class','mv_browser_body_class');

// remove theme and plugin editor
define('DISALLOW_FILE_EDIT', true);

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// removing dashboard widgets
function example_remove_dashboard_widgets() {
 	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

// custom menu
function register_custom_menu() {
	register_nav_menu('menu_principal', __('Menu Principal'));
}
add_action('init', 'register_custom_menu');

// enable featured thumb
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	// add_image_size( 'cuadrado_pequeno', 134, 123, true );
	// add_image_size( 'rectangulo_grande', 380, 320, true );
}

// set permalink
function set_permalink(){
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%year%/%monthnum%/%postname%/');
}
add_action('init', 'set_permalink');

?>