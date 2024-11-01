<?php

class Sfnf_Welcome_Page {

	function __construct() {
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
	}

	public function register_menu() {

		add_submenu_page( 'sfnf_licenses', 'Documentation', 'Documentation', 'manage_options', 'sfnf-documentation', array( $this, 'show_documentation' ) );
		// add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts' ) );
	}

	function show_documentation() {
		$sfnf_version = get_plugin_data( NF_STYLER_DIR . '/ninja-forms-styler-lite.php', $markup = true, $translate = true );

		?>

<div class="sfnf-wel-page-wrap" >
	<div class="sfnf-wel-header-info">
		<img class="sfnf-intro-image" src="<?php echo NF_STYLER_URL . '/admin-menu/images/logo.png'; ?>" />
		<div class="sfnf-wel-heading-text sfnf-wel-padding-container">
			<h2 class="sfnf-welcome-heading">Welcome to Styler for Ninja Forms</h2>
			<p >Thank you for choosing Styler for Ninja Forms - the most used, cost free plugin that let you style Ninja Forms without any coding.</p>
		</div>

		<div class="sfnf-wel-video-section">
			<?php add_thickbox(); ?>

			<a href="https://www.youtube.com/embed/XsPETsP30dc?autoplay=1&TB_iframe=true&width=980&height=551&allowfullscreen=1" class="thickbox">
		
				<img class="" src="<?php echo NF_STYLER_URL . '/admin-menu/images/video-image.jpg'; ?>" />
			</a>
		</div>

	</div>
	<div class="sfnf-wel-feature">
		<div class="sfnf-wel-padding-container">
			<h2> Plugin Features & Addon</h2>
			<p>It comes with 100+ options to customize various parts of Ninja Forms like form wrapper, form header, form title and description, submit button, radio inputs, checkbox inputs, paragraph textarea, labels, descriptions, text inputs , dropdown menus, labels, sub labels, placeholders, confirmation message, error messages and more.
			</p>
			<div class="sfnf-wel-feature-info-cont">
				<div class="sfnf-wel-left-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/welcome-feature.png'; ?>">
					<h5>100+ Styling options</h5>
					<h6>Easily create amazing form designs in few minutes without writing any code.</h6>
				</div>
				<div class="sfnf-wel-right-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/preview.png'; ?>">
					<h5>Live Preview Changes</h5>
					<h6>All the changes you make are previewed instantly without any need to refresh the page.</h6>
				</div>

				<div class="sfnf-wel-left-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/free.png'; ?>">
					<h5>No need hire a Designer</h5>
					<h6>No need to hire a designer to create a form design of your liking. You can now do it on your own.</h6>
				</div>
				<div class="sfnf-wel-right-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/cs-theme.png'; ?>">
					<h5>Renders Only Required Styles</h5>
					<h6>Doesn't slow down your page with unnecessary code. Ninja Styler only shows the essential code</h6>
				</div>

				<div class="sfnf-wel-left-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/content.png'; ?>">
					<h5>Styles Work Everyware</h5>
					<h6>Easily create an amazing form designs in just a few minutes without writing any code.</h6>
				</div>
				<div class="sfnf-wel-right-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/easy-to-use.png'; ?>">
					<h5>Easy to Use</h5>
					<h6>Easy to use controls like color picker, range slider and ability to give values in px, %, rem, em etc.</h6>
				</div>

				<div class="sfnf-wel-left-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/responsive.png'; ?>">
					<h5>Responsive Options</h5>
					<h6>Style your form differently for Desktops, Tablets and Mobile devices.</h6>
				</div>
				<div class="sfnf-wel-right-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/individual-form.png'; ?>">
					<h5>Style Individual Form</h5>
					<h6>Each form can be designed separtely even if there are multiple forms on the same page</h6>
				</div>

				<div class="sfnf-wel-left-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/theme.png'; ?>">
					<h5>Compatible with Every Theme</h5>
					<h6>Ability to overwrite default theme styles by making Ninja Styler design design as important.</h6>
				</div>
				
				<div class="sfnf-wel-right-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/addons.png'; ?>">
					<h5>Regular Updates</h5>
					<h6>The plugin get regular updates with new fetures and bugfixes.</h6>
				</div>

				<div class="sfnf-wel-left-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/flexible.png'; ?>">
					<h5>Flexible</h5>
					<h6>Multiple settings for each field type to create the design you want to have.</h6>
				</div>
				<div class="sfnf-wel-right-cont sfnf-wel-feature-box">
					<img src="<?php echo NF_STYLER_URL . '/admin-menu/images/welcome/customer-service.png'; ?>">
					<h5><a href="https://wpmonks.com/contact-us/?utm_source=dashboard&utm_medium=welcome&utm_campaign=styles_layout_plugin" target="_blank">Premium Support</a></h5>
					<h6>Need custom design, functionality or want to report an issue then get in touch.</h6>
				</div>
				
				
			</div>
		</div>

		
	</div>

	<div class="sfnf-testimonial-container" >
		<div class="sfnf-wel-testimonials sfnf-wel-padding-container">
			<h2> Testimonials </h2>
			<div class="sfnf-wel-testimonial-block sfnf-first-test-block">
				<p>
				"This add on does exactly what it’s supposed to. You can style nearly every aspect of your form."<span class="sfnf-testimonial-author"> -Jasvir</span>
				</p>
			</div>
			<div class="sfnf-wel-testimonial-block">
				<p>
				"Thank you so much for a great plugin, helps so much with Ninja forms!."<span class="sfnf-testimonial-author"> -stormpill222</span>
				</p>
			</div>
		</div>

		<div class="sk-donate-cont sfnf-wel-padding-container">
			<div class="sfnf-wel-btn-wrapper">
				<div class="sfnf-wel-left-cont">
					<a href="https://paypal.me/wpmonks" class="sfnf-wel-btn sfnf-wel-btn-block"> Donate to Support Plugin</a>
				</div>
				<div class="sfnf-wel-right-cont"> 
					<a href="https://twitter.com/wp_monk" target="_blank" class="sfnf-wel-btn sfnf-wel-btn-custom"> 
						<span class="sfnf-wel-custom-btn-text"> Follow us on Twitter 
							<span class="dashicons dashicons-arrow-right"></span>  
						<span> 
					</a>
				</div>
			</div>
		</div>
	</div>
	

	<div class="sfnf-wel-review-cont" style="background: url('<?php echo NF_STYLER_URL . '/admin-menu/images/suggestions.jpg'; ?>')" >
		<div class="sfnf-wel-padding-container">
			<div class="sfnf-update-left">
				<h2> Let us Know your Suggestions.</h2>
				<p>
				Your suggestion and reviews are valuable for us. Let us know if you have any problem with plugin.
				</p>
				<a class="sfnf-wel-btn sfnf-wel-btn-space" href="https://ninjastyler.com/contact-us/?utm_source=dashboard&utm_medium=welcome&utm_campaign=styles_layout_plugin">Contact Us</a>
			</div>
		</div>
	</div>
</div>
		<?php
	}
}

new Sfnf_Welcome_Page();
