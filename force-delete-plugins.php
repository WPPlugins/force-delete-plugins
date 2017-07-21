<?php
/*
Plugin Name: Force Delete Plugins
Plugin URI:  https://wordpress.org/plugins/force-delete-plugins/
Description: Changes the default behavior of the bulk delete plugin actions so it deletes plugins regardless whether they are active or not. Helpful for site developers.
Version:     1.0.5
Author:      Jan Beck
Author URI:  http://jancbeck.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: force-delete-plugins
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * AJAX handler for deactivating a plugin before deleting it.
 *
 * @since 1.0.5
 */
function wp_ajax_pre_delete_plugin() {
	check_ajax_referer( 'updates' );

	if ( empty( $_POST['slug'] ) || empty( $_POST['plugin'] ) ) {
		return false;
	}

	$plugin = plugin_basename( sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) );

	if ( ! current_user_can( 'delete_plugins' ) ) {
		return false;
	}

	if ( is_plugin_active( $plugin ) ) {
		deactivate_plugins( $plugin );
	}
}

/**
 *  Removes core ajax action, adds custom action that deactivates plugin, then adds core ajax action again.
 *  This is necessary because core hooks run with priorty of 1 so 'wp_ajax_pre_delete_plugin' can never run earlier.
 *
  * @since 1.0.5
 *
 *  @return  void
 */
function reorder_ajax_hooks_before_deleting() {
	$removed = remove_action( 'wp_ajax_delete-plugin', 'wp_ajax_delete_plugin', 1 );
	add_action( 'wp_ajax_delete-plugin', 'wp_ajax_pre_delete_plugin', 1 );
	add_action( 'wp_ajax_delete-plugin', 'wp_ajax_delete_plugin', 2 );
	return $removed;
}
add_action( 'admin_init', 'reorder_ajax_hooks_before_deleting' );