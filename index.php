<?php
/*
Plugin Name: Flack Custom Functions
Description: A plugin to display WooCommerce products with category tabs.
Version: 1.0
Author: UnikForce IT
License: GPL2
*/

// Ensure this file is loaded within WordPress.
defined('ABSPATH') || exit;

if( !function_exists( 'flack_enqueue_scripts' ) ){
    function flack_enqueue_scripts(){
        wp_enqueue_style( 'flack-addons-style', plugins_url( '/assets/flack.css' , __FILE__ ), array(), '', 'all' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'flack-addons-script',  plugins_url( '/assets/flack.js' , __FILE__ ), array( 'jquery'), '', true );

        $ajax_url = admin_url( 'admin-ajax.php' );
        $FLACK_ADDON_DATA = array(
            'ajaxurl'   => $ajax_url,
            'site_url'  => site_url(),
        );
        wp_localize_script( 'flack-addons-script', 'FLACK_ADDON_DATA', $FLACK_ADDON_DATA );
    }
}
add_action( 'wp_enqueue_scripts', 'flack_enqueue_scripts' );

require_once( __DIR__ . '/helper.php' );

// Include the Elementor widget class.
function register_new_widgets( $widgets_manager ) {
    require_once( __DIR__ . '/widget/index.php' );
}
add_action( 'elementor/widgets/register', 'register_new_widgets' );
