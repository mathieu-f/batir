<?php
/*
  Plugin Name: WP Construction Mode
  Plugin URI: http://smartcatdesign.net/under-construction-maintenance-mode-free-wordpress-plugin/
  Description: Display a customizable Under Construction or Coming Soon page for all users who are not logged in. Perfect for developing on a live server!
  Version: 1.92
  Author: SmartCat
  Author URI: http://smartcatdesign.net
  License: GPL v2
 */

if(!defined('SC_WUC_PATH'))
    define('SC_WUC_PATH', plugin_dir_url(__FILE__));

register_activation_hook(__FILE__, 'under_construction_install');

function under_construction_install() {
    global $wp_version;
    if (version_compare($wp_version, "3.2.1", "<")) {
        deactivate_plugins(basename(__FILE__));
        wp_die("This plugin requires WordPress version 3.2.1 or higher.");
    }
    add_option('wuc_activation_redirect', true);
    set_under_construction();
}

add_action('admin_init', 'wuc_activation_redirect');

function wuc_activation_redirect() {
    if (get_option('wuc_activation_redirect', false)) {
        delete_option('wuc_activation_redirect');
        wp_redirect(admin_url('admin.php?page=smartkit_construction'));
    }
}


add_action('admin_menu', 'under_construction_menu');
add_action('admin_head', 'admin_action');

function admin_action(){
    $set_opt = get_option('set_opt');
    if($set_opt == 'Yes'){ ?>
        <div style="background: #333;color: #D34046;text-align: center;padding: 5px"><?php _e("Under Construction Mode is ON"); ?></div>        
    <?php }
}

function under_construction_menu() {
    
    global $menu;
    $found = FALSE;
    foreach( $menu as $menu_item ) :
        if( 'smartkit_menu' == $menu_item[2] ) :
            $found = TRUE;
        endif;
    endforeach;    
    
    if(!$found)
        add_menu_page('Smartkit', 'Smartkit', 'manage_options', 'smartkit_menu', 'smartkit_meow', SC_WUC_PATH . 'img/smartcat.png' );
    
    add_submenu_page('smartkit_menu', 'Under Construction', 'Construction Mode', 'manage_options', 'smartkit_construction', 'under_construction_action');    
    
//    add_menu_page('Under Construction', 'Under Construction', 'administrator', 'under-construction.php', 'under_construction_action', plugins_url('under_construction.png', __FILE__));
}
/*
 * Create smartkit menu
 */
if( !function_exists('smartkit_meow') ) :
    function smartkit_meow(){
        include_once 'inc/smartkit/sk.php';
    }
endif;

function under_construction_action() {
    $option_name1 = 'set_opt';
    $option_name2 = 'set_msg';
    if (isset($_REQUEST['act'])) {
        switch ($_REQUEST['act']) {
            case "save":
                set_under_construction();
                echo '<div class="updated below-h2" id="message" style="position:relative; clear:both;"><p>Under Construction: ' . esc_html( $_REQUEST['set_opt'] ) . '</p></div>';
                break;
            default:
        }
    }
    $option_name1 = 'set_opt';
    $option_name2 = 'set_msg';
    $option_name3 = 'set_page';
    $set_opt = get_option($option_name1);
    $set_msg = get_option($option_name2);
    $set_page = get_option($option_name3);
    $set_caption = get_option('set_caption');
    $wuc_logo = get_option('wuc_logo');
    $wuc_email = get_option('wuc_email');
    $wuc_twitter = get_option('wuc_twitter');
    $wuc_gplus = get_option('wuc_gplus');
    $wuc_facebook = get_option('wuc_facebook');
    $wuc_background = get_option('wuc_background');
    $wuc_loading = get_option('wuc_loading');
    $wuc_progress = get_option('wuc_progress');     
    require_once('form.php');
}

function set_under_construction() {
    
    
    
    $option_name1 = 'set_opt';
    $option_name2 = 'set_msg';
    $option_name3 = 'set_page';
    
    $new_value1 = (($_REQUEST['set_opt']) == "") ? 'No' : ($_REQUEST['set_opt']);
    if (get_option($option_name1) !== false) {
        update_option($option_name1, $new_value1);
    } else {
        
        
        add_option($option_name1, $new_value1);
    }


    $new_value2 = (($_REQUEST['set_msg']) == "") ? 'Page is currently under construction. ' : ($_REQUEST['set_msg']);
    if (get_option($option_name2) !== false) {
        update_option($option_name2, $new_value2);
    } else {
        
        
        add_option($option_name2, $new_value2);
    }

    $new_value3 = ($_REQUEST['set_page'] == "") ? 'Website is Under Construction' : ($_REQUEST['set_page']);
    if (get_option($option_name3) !== false) {
        update_option($option_name3, $new_value3);
    } else {
        
        
        add_option($option_name3, $new_value3);
    }
    
    $new_value4 = (($_REQUEST['set_caption']) == "") ? 'We will be back soon!' : ($_REQUEST['set_caption']);
    if (get_option('set_caption') !== false) {
        update_option('set_caption', $new_value4);
    } else {
        
        
        add_option('set_caption', $new_value4);
    }

    $new_value5 = (($_REQUEST['wuc_logo']) == "") ? '' : ($_REQUEST['wuc_logo']);
    if (get_option('wuc_logo') !== false) {
        update_option('wuc_logo', $new_value5);
    } else {
        
        
        add_option('wuc_logo', $new_value5);
    }
    $new_value6 = (($_REQUEST['wuc_facebook']) == "") ? '' : ($_REQUEST['wuc_facebook']);
    if (get_option('wuc_facebook') !== false) {
        update_option('wuc_facebook', $new_value6);
    } else {
        
        
        add_option('wuc_facebook', 'http://smartcatdesign.net');
    }
    $new_value7 = (($_REQUEST['wuc_gplus']) == "") ? '' : ($_REQUEST['wuc_gplus']);
    if (get_option('wuc_gplus') !== false) {
        update_option('wuc_gplus', $new_value7);
    } else {
        
        
        add_option('wuc_gplus', 'http://smartcatdesign.net');
    }
    $new_value8 = (($_REQUEST['wuc_twitter']) == "") ? '' : ($_REQUEST['wuc_twitter']);
    if (get_option('wuc_twitter') !== false) {
        update_option('wuc_twitter', $new_value8);
    } else {
        
        
        add_option('wuc_twitter', 'http://smartcatdesign.net');
    }
    $new_value9 = (($_REQUEST['wuc_email']) == "") ? '' : ($_REQUEST['wuc_email']);
    if (get_option('wuc_email') !== false) {
        update_option('wuc_email', $new_value9);
    } else {
        
        
        add_option('wuc_email', 'http://smartcatdesign.net');
    }
    $new_value10 = (($_REQUEST['wuc_background']) == "") ? '' : ($_REQUEST['wuc_background']);
    if (get_option('wuc_background') !== false) {
        update_option('wuc_background', $new_value10);
    } else {
        
        
        add_option('wuc_background', '');
    }
    $new_value19 = (($_REQUEST['wuc_loading']) == "") ? '' : ($_REQUEST['wuc_loading']);
    if (get_option('wuc_loading') !== false) {
        update_option('wuc_loading', $new_value19);
    } else {
        
        
        add_option('wuc_loading', 'timer');
    }
    $new_value20 = (($_REQUEST['wuc_progress']) == "") ? '' : ($_REQUEST['wuc_progress']);
    if (get_option('wuc_progress') !== false) {
        update_option('wuc_progress', $new_value20);
    } else {
        
        
        add_option('wuc_progress', '10');
    }
}

function show_uc() {

    $option_name1 = 'set_opt';
    $option_name2 = 'set_msg';
    $option_name3 = 'set_page';
    $set_opt = get_option($option_name1);
    $set_msg = get_option($option_name2);
    $set_page = get_option($option_name3);
    $set_caption = get_option('set_caption');
    $wuc_logo = get_option('wuc_logo');
    $wuc_email = get_option('wuc_email');
    $wuc_twitter = get_option('wuc_twitter');
    $wuc_gplus = get_option('wuc_gplus');
    $wuc_facebook = get_option('wuc_facebook');
    $wuc_background = get_option('wuc_background');
    $wuc_loading = get_option('wuc_loading');
    $wuc_progress = get_option('wuc_progress');     
    $current_user = wp_get_current_user();

	
    if ($set_opt == 'Yes' && !user_can($current_user, 'administrator')) {        
        if($set_page == get_the_ID()){
            //echo "<div style='margin:0 auto; text-align:center;font-size:30px;padding-top:30px;'>" . $set_msg . "</div>";
            include_once 'style/style_css.php';
            include_once 'library/construction.php';
            exit(0);
        }else if($set_page == "all"){
            //echo "<div style='margin:0 auto; text-align:center;font-size:30px;padding-top:30px;'>" . $set_msg . "</div>";
            include_once 'style/style_css.php';
            include_once 'library/construction.php';
            exit(0);
        }
    }
}

add_action('wp_head', 'show_uc');


add_action('wp_enqueue_scripts', 'sc_wuc_load_styles_scripts');
function sc_wuc_load_styles_scripts(){
    wp_register_style( 'wuc_style', plugins_url() . '/wp-construction-mode/style/style.css', false, '1.9' );
    wp_register_style( 'wuc_font', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600', false);

    wp_enqueue_style( 'wuc_font' );
    wp_enqueue_style( 'wuc_style' );    
}
?>