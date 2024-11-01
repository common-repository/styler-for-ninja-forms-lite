<?php

class Sfnf_License_Page{

	function __construct(){
		add_action('admin_menu',array($this,'register_menu') );
		add_action( 'admin_init', array( $this, 'setting_fields' ) );

		// to deactivating the key
		add_action( 'admin_footer' , array( $this, 'admin_footer_js'), 9999 );

		add_action( 'wp_ajax_deactivate_license', array( $this, 'deactivate_license' ) );
	}

	public function register_menu(){
		add_menu_page(  'Styler for Ninja Forms', 'Styler for Ninja Forms', 'manage_options', 'sfnf_licenses' );
		add_submenu_page( 'sfnf_licenses', 'Licenses', 'Licenses', 'manage_options', 'sfnf_licenses', array( $this, 'license_settings' ) );
	}

	public function license_settings(){

		?>
			<!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">

        <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
        <?php settings_errors(); ?>
        <!-- Create the form that will be used to render our options -->
        <form method="post" action="options.php">
            <?php settings_fields( 'sfnf_licenses' ); ?>
            <?php do_settings_sections( 'sfnf_licenses' ); ?>
            <?php submit_button(); ?>
        </form>

    </div><!-- /.wrap -->
	<?php
	}


	function setting_fields(){
		// If settings don't exist, create them.
		if ( false == get_option( 'sfnf_licenses' ) ) {
			add_option( 'sfnf_licenses' );
		}


		add_settings_section(
			'sfnf_licenses_section',
			'Add-On Licenses',
			array( $this, 'section_callback' ),
			'sfnf_licenses'
		);

		do_action('sfnf_license_fields',$this);

		//register settings
		register_setting( 'sfnf_licenses', 'sfnf_licenses' );

	}

	public function section_callback() {

		echo '<h4> Licence Fields will automatically appear once you install addons for \'Styles & Layouts for Gravity Forms\'. You can check all the available addons <a href="https://wpmonks.com/downloads/addon-bundle/?utm_source=dashboard&utm_medium=licence-page&utm_campaign=styles_layout_plugin">here</a></h4>';
	}

	function admin_footer_js(){ 
		echo '<script>
				jQuery(document).ready(function($) {
					$( ".edd-deactivate-license").on( "click", function(e){
						e.preventDefault();
						$(this).html("Deactivating...");
						var settingKey = $(this).data("setting-key");
						var statusKey = $(this).data("status-key");
						var id = $(this).data("id");



					// This does the ajax request
					$.post({
						url: ajaxurl,
						data: {
							action:"deactivate_license",
							settingKey : settingKey,
							statusKey : statusKey,
							id : id
						},
						success:function(data) {
							// This outputs the result of the ajax request
							location.reload();
						}
					});	
				});
			});	
		 </script>';
		
	}

	// Deactivate License
	function deactivate_license() {
		$setting_key = !empty( $_POST['settingKey']) ? $_POST['settingKey'] : false;
		$status_key = !empty( $_POST['statusKey']) ? $_POST['statusKey'] : false;
		$item_id = !empty( $_POST['id']) ? $_POST['id'] : false;
		$settings = get_option( 'sfnf_licenses' );
		$addon_license = $settings[$setting_key];

		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'deactivate_license',
			'license'  => $addon_license,
			'item_id' => $item_id,
		);

		// Call the custom API.
		$response = wp_remote_get( add_query_arg( $api_params, SFNF_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

		$response = json_encode( $_POST );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			wp_die();

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "active" or "inactive"
		update_option( $status_key, $license_data->license );

		
		$settings[$setting_key] = ''; // empty license key
		update_option( 'sfnf_licenses', $settings );

		echo $response;
		wp_die();

	}


}

new Sfnf_License_Page();