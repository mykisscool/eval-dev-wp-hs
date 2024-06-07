<?php
/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

if ( ! function_exists( 'add_device_body_class' ) ) {
	function add_device_body_class() {
		wp_enqueue_script( 'wp-custom-blocks', plugin_dir_url( __FILE__ ) . 'build/ua.js', [ ], filemtime( __dir__ . '/build/ua.js' ), false );
	}
}
function create_block_dynamic_content_block_init() {
	register_block_type_from_metadata( __DIR__ . '/build' );
	add_action( 'wp_enqueue_scripts', 'add_device_body_class' );
}
add_action( 'init', 'create_block_dynamic_content_block_init' );
