<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.shapon.me
 * @since      1.0.0
 *
 * @package    Cwv_Chat
 * @subpackage Cwv_Chat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cwv_Chat
 * @subpackage Cwv_Chat/public
 * @author     Shapon Pal <shaponpal4@gmail.com>
 */
class Cwv_Chat_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	
			/**
	 * Make Async Script
	 * @return [type]
	 */
	public function script_loader_tag($tag, $handle){
		
		if ( ! preg_match( '/^CwvChat-/', $handle ) ) { return $tag; }
	
		return str_replace( ' src', ' async defer src', $tag );
	}


	/**
	 * Make Async Script
	 * @return [type]
	 */
	public function react_enqueue_scripts(){

	
		wp_enqueue_script( 'CwvChat-main.bundle.public', get_site_url() . '/wp-content/plugins/cwv-chat/src/public/main.bundle.js', array(), null, true );
	
		
	}

	/**
	 * Make Async Script
	 * @return [type]
	 */
	public function app_loader(){
		echo '<div id="cwvChatWidgetRoot" class="cwvChatWidgetRootApp"></div>';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cwv_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cwv_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cwv-chat-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cwv_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cwv_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cwv-chat-public.js', array( 'jquery' ), $this->version, false );

	}

}
