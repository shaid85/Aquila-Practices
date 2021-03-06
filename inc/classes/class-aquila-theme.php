<?php
/**
 * Bootstraps the Theme.
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME { 
	use Singleton;

	protected function __construct() {
			// load class.

		Assets::get_instance();
		Menus::get_instance();
		Meta_Boxes::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions.
		 */
	
add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

	}

	public function setup_theme () {

		// add_theme_support();

		add_theme_support( 'title-tag' );

		add_theme_support( 'custom-logo', [
			'header-text' => [ 'site-title', 'site-description' ],
			'height' => 70,
			'width' => 150,
			'flex-height' => true,
			'flex-height' => true,
		] );

		add_theme_support( 'custom-background', [
			'default-color' => '#fff',
			'default-image' => '',
			'default-repeat' => 'no-repeat',
		] );

		add_theme_support( 'post-thumbnails' );
		/** 
		 * Register custom image size
		 */
		add_image_size( 'feature-thumbnail', 350, 233, true );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'html5',[ 
			'comment-list', 
			'comment-form', 
			'search-form', 
			'gallery', 
			'caption', 
			'style', 
			'script', 
	    ] );

	    add_editor_style();
	    add_theme_support( 'wp-block-styles' );
	    add_theme_support( 'align-wide' );

	    global $content_width;
	    if ( ! isset($content_width) ) {
	    	$content_width = 1240;
	    }

	}

}

