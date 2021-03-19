<?php

/**
 * Helper function to determine if loading an cwv_chat related admin page.
 *
 * Here we determine if the current administration page is owned/created by
 * cwv_chat. This is done in compliance with WordPress best practices for
 * development, so that we only load required cwv_chat CSS and JS files on pages
 * we create. As a result we do not load our assets admin wide, where they might
 * conflict with other plugins needlessly, also leading to a better, faster user
 * experience for our users.
 *
 * @since 1.3.9
 *
 * @param string $slug Slug identifier for a specific cwv_chat admin page.
 *
 * @return bool
 */
function cwv_chat_is_admin_page( $slug = '' ) {

	// phpcs:disable WordPress.Security.NonceVerification.Recommended
	// Check against basic requirements.
	if (
		! is_admin() ||
		empty( $_REQUEST['page'] ) ||
		strpos( $_REQUEST['page'], 'cwv_chat' ) === false
	) {
		return false;
	}

	// Check against page slug identifier.
	if (
		( ! empty( $slug ) && 'cwv_chat-' . $slug !== $_REQUEST['page'] ) 
	) {
		return false;
	}

	// Check against sub-level page view.
	// if (
	// 	! empty( $view ) &&
	// 	( empty( $_REQUEST['view'] ) || $view !== $_REQUEST['view'] )
	// ) {
	// 	return false;
	// }
	// phpcs:enable

	return true;
}


/**
 * Check whether plugin works in a debug mode.
 *
 * @since 1.2.3
 *
 * @return bool
 */
function cwv_chat_debug() {

	$debug = false;

	if ( ( defined( 'CWV_CHAT_DEBUG' ) && true === CWV_CHAT_DEBUG ) && is_super_admin() ) {
		$debug = true;
	}

	$debug_option = get_option( 'cwv_chat_debug' );

	if ( $debug_option ) {
		$current_user = wp_get_current_user();
		if ( $current_user->user_login === $debug_option ) {
			$debug = true;
		}
	}

	return apply_filters( 'cwv_chat_debug', $debug );
}

/**
 * Get a suffix for assets, `.min` if debug is disabled.
 *
 * @since 1.4.1
 *
 * @return string
 */
function cwv_chat_get_min_suffix() {
	return cwv_chat_debug() ? '' : '.min';
}