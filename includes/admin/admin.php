<?php
/**
 * Global admin related items and functionality.
 *
 * @since 1.3.9
 */

/**
 * Load styles for all cwv_chat-related admin screens.
 *
 * @since 1.3.9
 */
function cwv_chat_admin_styles() {

	if ( ! cwv_chat_is_admin_page() ) {
		return;
	}

	// $min = cwv_chat_get_min_suffix();
	$min = '';


	// Main admin styles.
	wp_enqueue_style(
		'cwv-chat-admin',
		CWV_CHAT_PLUGIN_URL . "assets/css/admin{$min}.css",
		array(),
		CWV_CHAT_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'cwv_chat_admin_styles' );

/**
 * Load scripts for all cwv_chat-related admin screens.
 *
 * @since 1.3.9
 */
function cwv_chat_admin_scripts() {

	if ( ! cwv_chat_is_admin_page() ) {
		return;
	}

	$min = cwv_chat_get_min_suffix();


	// Main admin script.
	// wp_enqueue_script(
	// 	'cwv_chat-admin',
	// 	CWV_CHAT_PLUGIN_URL . "assets/js/admin{$min}.js",
	// 	array( 'jquery' ),
	// 	CWV_CHAT_VERSION,
	// 	false
	// );

	$strings = array(
		'addon_activate'                  => esc_html__( 'Activate', 'cwv-chat-lite' ),
		'addon_activated'                 => esc_html__( 'Activated', 'cwv-chat-lite' ),
		'addon_active'                    => esc_html__( 'Active', 'cwv-chat-lite' ),
		'addon_deactivate'                => esc_html__( 'Deactivate', 'cwv-chat-lite' ),
		'addon_inactive'                  => esc_html__( 'Inactive', 'cwv-chat-lite' ),
		'addon_install'                   => esc_html__( 'Install Addon', 'cwv-chat-lite' ),
		'addon_error'                     => esc_html__( 'Could not install addon. Please download from cwv_chat.com and install manually.', 'cwv-chat-lite' ),
		'plugin_error'                    => esc_html__( 'Could not install a plugin. Please download from WordPress.org and install manually.', 'cwv-chat-lite' ),
		'addon_search'                    => esc_html__( 'Searching Addons', 'cwv-chat-lite' ),
		'ajax_url'                        => admin_url( 'admin-ajax.php' ),
		'cancel'                          => esc_html__( 'Cancel', 'cwv-chat-lite' ),
		'close'                           => esc_html__( 'Close', 'cwv-chat-lite' ),
		'entry_delete_confirm'            => esc_html__( 'Are you sure you want to delete this entry?', 'cwv-chat-lite' ),
		'entry_delete_all_confirm'        => esc_html__( 'Are you sure you want to delete ALL entries?', 'cwv-chat-lite' ),
		'entry_empty_fields_hide'         => esc_html__( 'Hide Empty Fields', 'cwv-chat-lite' ),
		'entry_empty_fields_show'         => esc_html__( 'Show Empty Fields', 'cwv-chat-lite' ),
		'entry_field_columns'             => esc_html__( 'Entries Field Columns', 'cwv-chat-lite' ),
		'entry_note_delete_confirm'       => esc_html__( 'Are you sure you want to delete this note?', 'cwv-chat-lite' ),
		'entry_unstar'                    => esc_html__( 'Unstar entry', 'cwv-chat-lite' ),
		'entry_star'                      => esc_html__( 'Star entry', 'cwv-chat-lite' ),
		'entry_read'                      => esc_html__( 'Mark entry read', 'cwv-chat-lite' ),
		'entry_unread'                    => esc_html__( 'Mark entry unread', 'cwv-chat-lite' ),
		'form_delete_confirm'             => esc_html__( 'Are you sure you want to delete this form?', 'cwv-chat-lite' ),
		'form_duplicate_confirm'          => esc_html__( 'Are you sure you want to duplicate this form?', 'cwv-chat-lite' ),
		'heads_up'                        => esc_html__( 'Heads up!', 'cwv-chat-lite' ),
		'importer_forms_required'         => esc_html__( 'Please select at least one form to import.', 'cwv-chat-lite' ),
		'isPro'                           => '',
		'nonce'                           => wp_create_nonce( 'cwv_chat-admin' ),
		'almost_done'                     => esc_html__( 'Almost Done', 'cwv-chat-lite' ),
		'oops'                            => esc_html__( 'Oops!', 'cwv-chat-lite' ),
		'ok'                              => esc_html__( 'OK', 'cwv-chat-lite' ),
		'plugin_install_activate_btn'     => esc_html__( 'Install and Activate', 'cwv-chat-lite' ),
		'plugin_install_activate_confirm' => esc_html__( 'needs to be installed and activated to import its forms. Would you like us to install and activate it for you?', 'cwv-chat-lite' ),
		'plugin_activate_btn'             => esc_html__( 'Activate', 'cwv-chat-lite' ),
		'plugin_activate_confirm'         => esc_html__( 'needs to be activated to import its forms. Would you like us to activate it for you?', 'cwv-chat-lite' ),
		'provider_delete_confirm'         => esc_html__( 'Are you sure you want to disconnect this account?', 'cwv-chat-lite' ),
		'provider_auth_error'             => esc_html__( 'Could not authenticate with the provider.', 'cwv-chat-lite' ),
		'save_refresh'                    => esc_html__( 'Save and Refresh', 'cwv-chat-lite' ),
		'server_error'                    => esc_html__( 'Unfortunately, there was an server connection error.', 'cwv-chat-lite' ),
		'settings_form_style_base'        => sprintf(
			wp_kses(
				/* translators: %s - cwv_chat.com docs page URL. */
				__( 'You\'ve selected <strong>Base Styling Only</strong>, which may result in styling issues. <a href="%s" target="_blank" rel="noopener noreferrer">Please check out our tutorial</a> for common issues and recommendations.', 'cwv-chat-lite' ),
				array(
					'strong' => array(),
					'a'      => array(
						'href'   => array(),
						'target' => array(),
						'rel'    => array(),
					),
				)
			),
			'https://cwvchat.xyz/docs/how-to-choose-an-include-form-styling-setting/'
		),
		'settings_form_style_none'        => sprintf(
			wp_kses(
				/* translators: %s - cwv_chat.com docs page URL. */
				__( 'You\'ve selected <strong>No Styling</strong>, which will likely result in significant styling issues and is recommended only for developers. <a href="%s" target="_blank" rel="noopener noreferrer">Please check out our tutorial</a> for more details and recommendations.', 'cwv-chat-lite' ),
				array(
					'strong' => array(),
					'a'      => array(
						'href'   => array(),
						'target' => array(),
						'rel'    => array(),
					),
				)
			),
			'https://cwv_chat.com/docs/how-to-choose-an-include-form-styling-setting/'
		),
		'testing'                         => esc_html__( 'Testing', 'cwv-chat-lite' ),
		'upgrade_completed'               => esc_html__( 'Upgrade was successfully completed!', 'cwv-chat-lite' ),
		'upload_image_title'              => esc_html__( 'Upload or Choose Your Image', 'cwv-chat-lite' ),
		'upload_image_button'             => esc_html__( 'Use Image', 'cwv-chat-lite' ),
		'upgrade_modal'                   => cwv_chat_get_upgrade_modal_text(),
		'choicesjs_loading'               => esc_html__( 'Loading...', 'cwv-chat-lite' ),
		'choicesjs_no_results'            => esc_html__( 'No results found', 'cwv-chat-lite' ),
		'choicesjs_no_choices'            => esc_html__( 'No choices to choose from', 'cwv-chat-lite' ),
		'choicesjs_item_select'           => esc_html__( 'Press to select', 'cwv-chat-lite' ),
	);
	$strings = apply_filters( 'cwv_chat_admin_strings', $strings );

	wp_localize_script(
		'cwv_chat-admin',
		'cwv_chat_admin',
		$strings
	); 
}

add_action( 'admin_enqueue_scripts', 'cwv_chat_admin_scripts' );



/**
 * Output the cwv_chat admin header.
 *
 * @since 1.3.9
 */
function cwv_chat_admin_header() {

	// Bail if we're not on a cwv_chat screen or page (also exclude form builder).
	if ( ! cwv_chat_is_admin_page() ) {
		return;
	}

	if ( ! apply_filters( 'cwv_chat_admin_header', true ) ) {
		return;
	}

	// Omit header from Welcome activation screen.
	if ( 'cwv_chat-getting-started' === $_REQUEST['page'] ) {
		return;
	}

	do_action( 'cwv_chat_admin_header_before' );
	?>
	<div id="cwv-chat-header-temp"></div>
	<div id="cwv-chat-header" class="cwv-chat-header">
		<img class="cwv-chat-logo" src="<?php echo CWV_CHAT_PLUGIN_URL; ?>assets/images/mr-logo.png" alt="CWV chat Logo"/>
	</div>
	<?php
	do_action( 'cwv_chat_admin_header_after' );
}

add_action( 'in_admin_header', 'cwv_chat_admin_header', 100 );

/**
 * Remove non-cwv_chat notices from cwv_chat pages.
 *
 * @since 1.3.9
 */
function cwv_chat_admin_hide_unrelated_notices() {

	// Bail if we're not on a cwv_chat screen or page.
	if ( empty( $_REQUEST['page'] ) || strpos( $_REQUEST['page'], 'cwv_chat' ) === false ) {
		return;
	}

	// Extra banned classes and callbacks from third-party plugins.
	$blacklist = array(
		'classes'   => array(),
		'callbacks' => array(
			'cwv_chat_admin_notice', // 'Database for cwv_chat' plugin.
		),
	);

	global $wp_filter;

	foreach ( array( 'user_admin_notices', 'admin_notices', 'all_admin_notices' ) as $notices_type ) {
		if ( empty( $wp_filter[ $notices_type ]->callbacks ) || ! is_array( $wp_filter[ $notices_type ]->callbacks ) ) {
			continue;
		}
		foreach ( $wp_filter[ $notices_type ]->callbacks as $priority => $hooks ) {
			foreach ( $hooks as $name => $arr ) {
				if ( is_object( $arr['function'] ) && $arr['function'] instanceof Closure ) {
					unset( $wp_filter[ $notices_type ]->callbacks[ $priority ][ $name ] );
					continue;
				}
				$class = ! empty( $arr['function'][0] ) && is_object( $arr['function'][0] ) ? strtolower( get_class( $arr['function'][0] ) ) : '';
				if (
					! empty( $class ) &&
					strpos( $class, 'cwv_chat' ) !== false &&
					! in_array( $class, $blacklist['classes'], true )
				) {
					continue;
				}
				if (
					! empty( $name ) && (
						strpos( $name, 'cwv_chat' ) === false ||
						in_array( $class, $blacklist['classes'], true ) ||
						in_array( $name, $blacklist['callbacks'], true )
					)
				) {
					unset( $wp_filter[ $notices_type ]->callbacks[ $priority ][ $name ] );
				}
			}
		}
	}
}
add_action( 'admin_print_scripts', 'cwv_chat_admin_hide_unrelated_notices' );


/**
 * Check the current PHP version and display a notice if on unsupported PHP.
 *
 * @since 1.4.0.1
 * @since 1.5.0 Raising this awareness of old PHP version message from 5.2 to 5.3.
 */
function cwv_chat_check_php_version() {

	// Display for PHP below 5.6
	if ( version_compare( PHP_VERSION, '5.5', '>=' ) ) {
		return;
	}

	// Display for admins only.
	if ( ! is_super_admin() ) {
		return;
	}

	// Display on Dashboard page only.
	if ( isset( $GLOBALS['pagenow'] ) && 'index.php' !== $GLOBALS['pagenow'] ) {
		return;
	}

	// Display the notice, finally.
	cwv_chat_Admin_Notice::error(
		'<p>' .
		sprintf(
			wp_kses(
				/* translators: %1$s - cwv_chat plugin name; %2$s - cwv_chat.com URL to a related doc. */
				__( 'Your site is running an outdated version of PHP that is no longer supported and may cause issues with %1$s. <a href="%2$s" target="_blank" rel="noopener noreferrer">Read more</a> for additional information.', 'cwv-chat-lite' ),
				array(
					'a' => array(
						'href'   => array(),
						'target' => array(),
						'rel'    => array(),
					),
				)
			),
			'<strong>cwv_chat</strong>',
			'https://cwv_chat.com/docs/supported-php-version/'
		) .
		'<br><br><em>' .
		wp_kses(
			__( '<strong>Please Note:</strong> Support for PHP 5.5 will be discontinued in 2020. After this, if no further action is taken, cwv_chat functionality will be disabled.', 'cwv-chat-lite' ),
			array(
				'strong' => array(),
				'em'     => array(),
			)
		) .
		'</em></p>'
	);
}
add_action( 'admin_init', 'cwv_chat_check_php_version' );

/**
 * Get an upgrade modal text.
 *
 * @since 1.4.4
 *
 * @param string $type Either "pro" or "elite". Default is "pro".
 *
 * @return string
 */
function cwv_chat_get_upgrade_modal_text( $type = 'pro' ) {

	switch ( $type ) {
		case 'elite':
			$level = 'cwv_chat Elite';
			break;
		case 'pro':
		default:
			$level = 'cwv_chat Pro';
	}

	return
		'<p>' .
		sprintf( /* translators: %s - license level, cwv_chat Pro or cwv_chat Elite. */
			esc_html__( 'Thanks for your interest in %s!', 'cwv-chat-lite' ),
			$level
		) . '<br>' .
		sprintf(
			wp_kses(
				/* translators: %s - cwv_chat.com contact page URL. */
				__( 'If you have any questions or issues just <a href="%s" target="_blank" rel="noopener noreferrer">let us know</a>.', 'cwv-chat-lite' ),
				array(
					'a' => array(
						'href'   => array(),
						'target' => array(),
						'rel'    => array(),
					),
				)
			),
			'https://cwv_chat.com/contact/'
		) .
		'</p>' .
		'<p>' .
		sprintf(
			wp_kses( /* translators: %s - license level, cwv_chat Pro or cwv_chat Elite. */
				__( 'After purchasing a license,<br>just <strong>enter your license key on the cwv_chat Settings page</strong>.<br>This will let your site automatically upgrade to %s!', 'cwv-chat-lite' ),
				[
					'strong' => [],
					'br'     => [],
				]
			),
			$level
		) . '<br>' .
		esc_html__( '(Don\'t worry, all your forms and settings will be preserved.)', 'cwv-chat-lite' ) .
		'</p>' .
		'<p>' .
		sprintf(
			wp_kses( /* translators: %s - cwv_chat.com upgrade from Lite to paid docs page URL. */
				__( 'Check out <a href="%s" target="_blank" rel="noopener noreferrer">our documentation</a> for step-by-step instructions.', 'cwv-chat-lite' ),
				array(
					'a' => array(
						'href'   => array(),
						'target' => array(),
						'rel'    => array(),
					),
				)
			),
			'https://cwv_chat.com/docs/upgrade-cwv-chat-lite-paid-license/?utm_source=WordPress&amp;utm_medium=link&amp;utm_campaign=liteplugin'
		) .
		'</p>';
}

/**
 * Hide the wp-admin area "Version x.x" in footer on cwv_chat pages.
 *
 * @since 1.5.7
 *
 * @param string $text Default "Version x.x" or "Get Version x.x" text.
 *
 * @return string
 */
function cwv_chat_admin_hide_wp_version( $text ) {

	// Reset text if we're not on a cwv_chat screen or page.
	if ( cwv_chat_is_admin_page() ) {
		return '';
	}

	return $text;
}
add_filter( 'update_footer', 'cwv_chat_admin_hide_wp_version', PHP_INT_MAX );
