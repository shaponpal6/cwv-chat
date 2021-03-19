<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.shapon.me
 * @since      1.0.0
 *
 * @package    Cwv_Chat
 * @subpackage Cwv_Chat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cwv_Chat
 * @subpackage Cwv_Chat/admin
 * @author     Shapon Pal <shaponpal4@gmail.com>
 */
class Cwv_Chat_Admin {


	/**
         * Set all Mr. Assistant options here.
         * Execute thought Mr_Options_tree class.
         *
         * @var null
         */
		protected $mrOptionsTree = null;
		

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function cwv_chat_admin_menu() {

		add_menu_page('CWV Chat', 'CWV Chat', 'manage_options', 'cwv_chat', array($this, 'cwv_chat_menu_page'), '', 20);
		add_submenu_page( 'cwv_chat', 'CWV Chat Console', 'Console', 'manage_options', 'cwv_chat_console', array($this, 'cwv_chat_console_app'));
		add_submenu_page( 'cwv_chat', 'CWV Chat Settings', 'Settings', 'manage_options', 'cwv_chat_setting', array($this, 'cwv_chat_setting_page'));
	}

	
	/**
	 * @return [type]
	 */
	public function cwv_chat_menu_page(){
        echo '<div id="app" class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Theme2</h2></div>';
	}
	/**
	 * @return [type]
	 */
	public function cwv_chat_console_app(){
		echo '<div id="wpcwv-adminPanel" class="wpcwv-adminPanelApp"><div id="icon-options-general" class="icon32"><br></div>
		<h2>FAQ</h2></div>';
	}

	 /**
         * Mr. Assistant Setting Page Execution.
         * This function will dynamically generate all settings options
         * using through Mr_Options_Tree core class.
         *
         * @return void
         */
        public function cwv_chat_setting_page()
        {
			$mrLogo = CWV_CHAT_BASE_URL . 'assets/images/mr-logo.png';
            echo '<div class="cwv-chat-wraper">';
			do_action('cwv_chat_before_settings');
            echo '<div class="cwv-chat-settings">';
            $this->mrOptionsTree->mrSettingTabs();
			$this->mrOptionsTree->mrSettingForms();
            echo '</div>';
			do_action('cwv_chat_after_settings');
            echo '</div>';
		}
		
		/**
         * This function will execute all options of settings
         * using MrOptionsTree core class.
         * Set all setting sections dynamically.
         * Set all settings fields under specific sections interface.
         *
         * @return void
         */
        public function mrSettingsInitialized()
        {
            $this->mrOptionsTree = new MrAssistantOptionsTree();
            $this->mrOptionsTree->mrSectionsInit(CWVChatSettings::mrSections());
            $this->mrOptionsTree->mrFieldsInit(CWVChatSettings::mrFields());
            $this->mrOptionsTree->mrAdminInitialize();
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

	
		wp_enqueue_script( 'CwvChat-main.bundle', get_site_url() . '/wp-content/plugins/cwv-chat/src/admin/main.bundle.js', array(), null, true );
	
		
	}


	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cwv-chat-admin.css', array(), $this->version, 'all' );
		// wp_enqueue_style( $this->plugin_name.'-admin.css', CWV_CHAT_PLUGIN_URL . 'assets/css/admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cwv-chat-admin.js', array( 'jquery' ), $this->version, false );

	}

}
