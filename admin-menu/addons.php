<?php

class Sfnf_Addons_Page {

	function __construct() {
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
	}

	public function register_menu() {

		add_submenu_page(  'sfnf_licenses', 'Add-Ons', 'Add-Ons', 'manage_options', 'sfnf-addons', array( $this, 'show_addons' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts' ) );


	}

	public function add_scripts() {
		wp_enqueue_style( 'sfnf-admin-css', NF_STYLER_URL.'/css/customizer-controls.css', '', NF_STYLER_VERSION );
	}

	public function show_addons() { ?>
		<div class="sfnf-wrapper">
			<div class="sfnf-header">
				<h2 class="sfnf-title">Addons</h2>
				<p class="sfnf-addon-page-subtitle">You can use below addons to extend the functionality of Styler for Ninja Forms</p>
			</div>
			<div class="sfnf-addon-page-body">
				<div class="sfnf-addon-row">
					<!-- <div class="sfnf-addon-container"></div> -->
					<div class="sfnf-addon-container">
						<div class="sfnf-addon-image">
							<a href="https://ninjastyler.com/downloads/field-icons-for-ninja-forms/"><img src="<?php echo NF_STYLER_URL; ?>/admin-menu/images/addons/field-icons.jpg" alt=""></a>
						</div>
						<div class="sfnf-addon-content">
							<!-- <h3 class="sfnf-addon-title">Field Icons</h3>'
							<p class="sfnf-addon-description">Easily add field icons to your forms</p> -->
							<a href="https://ninjastyler.com/downloads/field-icons-for-ninja-forms/" target="_blank" class=" sfnf-doc-button sfnf-button">Learn More</a>
						

						</div>
					</div>
					<!-- <div class="sfnf-addon-container"></div> -->
				</div>
			</div>
		</div>
	<?php
	}



}

add_action( 'plugins_loaded', 'sfnf_addons_page_callback' );

function sfnf_addons_page_callback() {
	new Sfnf_Addons_Page();

}