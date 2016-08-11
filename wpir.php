<?php
/*
Plugin Name: WPIR
Plugin URI: http://github.com/steveorevo/wpir
Description: The WPIR plugin allows you to maniuplate IR controllable devices (televisions, Blueray players, XBox, etc.) as IoT (Internet of Things) devices using WordPress atop LIRC.
Author: Stephen J. Carnam
Version: 1.0.0
Author URI: http://steveorevo.com
License: GPL2 or later
*/


require('vendor/autoload.php');
use Steveorevo\WP_Hooks;

class WPIR extends WP_Hooks {

	function shortcode_hello(){
		// This will appear when using the shortcode [hello]
		return  "I'm a shortcode called hello!";
	}

	function wp_enqueue_scripts() {
		wp_enqueue_script( 'wpir', plugins_url( '/wpir.js', __FILE__ ), array('jquery'), false, true );
	}

	function wp_head() {
		$params = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'steveorevo_wpir' ),
		);
		wp_localize_script( 'wpir', 'wpir', $params );
	}

	function wp_ajax_hello_wpir() {
		check_ajax_referer( 'steveorevo_wpir', 'security' );
		$r =  exec( 'irsend SEND_ONCE CANDLE KEY_NAVY' );
//		$r =  exec( 'irsend SEND_ONCE CANDLE KEY_RED' );
		echo json_encode( $r );
		exit;
	}
}

global $wpir;
$wpir = new WPIR();
