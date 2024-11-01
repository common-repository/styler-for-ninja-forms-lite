<?php
/*
Plugin Name: Ninja Forms Styler lite
Plugin URI:  https://wpmonks.com
Description: Style your Ninja Forms with live preview in Customizer
Version:     3.3.4
Author:      Sushil Kumar
License:     GPL2License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) die( '-1' );

define( "NF_STYLER_DIR", WP_PLUGIN_DIR . "/" . basename( dirname( __FILE__ ) ) );
define( "NF_STYLER_URL", plugins_url() . "/" . basename( dirname( __FILE__ ) ) );
define( "NF_STYLER_VERSION", '3.3.4' );
define( 'SFNF_STORE_URL', 'https://ninjastyler.com' );

include_once 'helpers/utils/responsive.php';

require_once NF_STYLER_DIR . '/admin-menu/licenses.php';
require_once NF_STYLER_DIR . '/admin-menu/addons.php';
require_once NF_STYLER_DIR . '/admin-menu/welcome-page.php';
//Main class of Ninja Forms Styler
class NF_Styler_Customizer_Lite {

	private $trigger = 'sfnf-customizer-preview';
	private $sfnf_form_id;
	/**
	 *  method for all hooks
	 *
	 * @since  v1.0
	 * @author Ninja Styler
	 */
	function __construct() {
		add_action( 'customize_register', array( $this, 'nf_styler_customize_register' ) ) ;
		add_action( 'customize_preview_init', array( $this, 'nf_styler_live_preview' ) );
		register_activation_hook( __FILE__, array( $this, 'nf_styler_welcome_screen_activate' ) );
		add_action( 'customize_save_after', array( $this, 'nf_styler_action_after_saving' ) );
		add_action( 'ninja_forms_before_container', array( $this, 'ninja_forms_display_before_form' ) );
		// add_action( 'init', array( $this, 'nf_styler_enable_admin_bar' ) );
		add_action ( 'customize_controls_enqueue_scripts', array( $this, 'customize_control_scripts' ) );

		add_filter( 'ninja_forms_field_template_file_paths',  array( $this, 'add_own_templates') );

		// check if customizer preview.. if so then add that in form settings
		// add_filter( 'ninja_forms_display_form_settings', array( $this, 'is_form_in_customzier_preview' ), 10, 2);

		// template path
		add_filter( 'ninja_forms_field_template_file_paths', array( $this, 'sfnf_template_custom_file_path') );   

		add_filter('ninja_forms_localize_fields', array( $this, 'field_data_localize' ), 20 );

		add_filter('ninja_forms_display_form_settings', array( $this, 'form_data_localize' ), 20, 2 );

		add_action( 'nf_admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts_callback'), 100 );

		add_filter( 'template_include', array( $this, 'preview_template' ) );

		add_action( 'admin_enqueue_scripts', array($this, 'admin_scripts') );

        if (isset($_GET[ $this->trigger ])) {

			if ( ! empty( $_GET['sfnf_form_id'] ) ) {
				$this->sfnf_form_id = sanitize_text_field( wp_unslash( $_GET['sfnf_form_id'] ) );
			}
			
            add_filter('query_vars', array( $this, 'add_query_vars' ));
        }
	}

	function sfnf_template_custom_file_path( $paths ){
        $paths[] = NF_STYLER_URL .'/includes/templates/';
        return $paths;
    }

	/**
	 * If the right query var is present load the Gravity Forms preview template
	 *
	 * @since 1.0.0
	 */
	public function preview_template( $template ) {
		

		// load this conditionally based on the query var
		if ( get_query_var( $this->trigger ) ) {
			
			$template = NF_STYLER_DIR . '/helpers/utils/html-template-preview.php';

		}
		return $template;
	}

	public function admin_scripts() {
		wp_enqueue_style( 'sfwf_admin_css', NF_STYLER_URL . '/css/sfnf-admin.css' );
	}

	public function form_data_localize( $form_settings, $form_id) {

		if( is_customize_preview() ){ 
			$sfnf_before_form_title = isset($form_settings['sfnfBeforeformTitle']) ? $form_settings['sfnfBeforeformTitle'] : '' ;

			$sfnf_before_form_wrapper = isset( $form_settings['sfnfBeforeFormWrapper'] ) ? $form_settings['sfnfBeforeFormWrapper'] : '';

			$quick_edit_shortcut_form_title = '<span class="customize-partial-edit-shortcut nf-styler-partial-form-title-shortcut"><button aria-label="Click to edit form title." title="Click to edit form title." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>';
			
			$quick_edit_shortcut_form_wrapper = '<span class="customize-partial-edit-shortcut nf-styler-partial-form-wrapper-shortcut"><button aria-label="Click to edit form wrapper." title="Click to edit form wrapper." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>';
	
			$form_settings['sfnfBeforeFormWrapper'] = $quick_edit_shortcut_form_wrapper . $sfnf_before_form_wrapper;

			$form_settings['sfnfBeforeformTitle'] = $quick_edit_shortcut_form_title . $sfnf_before_form_title;
		}

		return $form_settings;

	}

	public function field_data_localize( $field ) {
		if( is_customize_preview() ){ 
			
			// var_dump($field);

			$sfnf_before_label = isset( $field['settings']['sfnfBeforeLabel'] ) ? $field['settings']['sfnfBeforeLabel'] : '';
			$sfnf_before_input = isset( $field['settings']['sfnfBeforeInput'] ) ? $field['settings']['sfnfBeforeInput'] : '';
			$sfnf_before_description = isset( $field['settings']['sfnfBeforeDescription'] ) ? $field['settings']['sfnfBeforeDescription'] : '';


			$field_type = isset( $field['settings']['type'] ) ? $field['settings']['type'] : '' ;

			$quick_edit_shortcut_input_class = '';
			$quick_edit_shortcut_field_type = '';
			switch( $field_type ){
				case 'email':
				case 'address':
				case 'city':
				case 'firstname':
				case 'lastname':
				case 'phone':
				case 'zip':
				case 'date':
				case 'textbox':
				case 'confirm':
				case 'number':
				case 'spam':
					$quick_edit_shortcut_input_class = 'nf-styler-partial-input-shortcut';
					$quick_edit_shortcut_field_type = 'text field';
				break;

				case 'listradio':
					$quick_edit_shortcut_input_class = 'nf-styler-partial-radio-shortcut';
					$quick_edit_shortcut_field_type = 'radio field';
					break;

				case 'listcheckbox':
					$quick_edit_shortcut_input_class = 'nf-styler-partial-checkbox-shortcut';
					$quick_edit_shortcut_field_type = 'checkbox field';
					break;

				case 'listselect':
				case 'liststate':
				case 'listcountry':
				case 'listmultiselect':
					$quick_edit_shortcut_input_class = 'nf-styler-partial-dropdown-shortcut';
					$quick_edit_shortcut_field_type = 'dropdown field';
				break;

				case 'textarea':
					$quick_edit_shortcut_input_class = 'nf-styler-partial-textarea-shortcut';
					$quick_edit_shortcut_field_type = 'textarea field';
				break;

				case 'submit':
					$quick_edit_shortcut_input_class = 'nf-styler-partial-submit-shortcut';
					$quick_edit_shortcut_field_type = 'submit button';
				break;
			}

			$field_lable_position_class = '';
			$field_description_position_class = '';
			if( isset( $field['settings']['label_pos'] ) && $field['settings']['type'] !== 'checkbox' ){
				// LABEL
				$field_lable_position_class = $field['settings']['label_pos'] === 'below' ? 'sfnf-lable-shortcut-icon-below' : '';
				$field_lable_position_class = $field['settings']['label_pos'] === 'right' ? 'sfnf-lable-shortcut-icon-right' : $field_lable_position_class;

				// DESCRIPTION
				$field_description_position_class = $field['settings']['label_pos'] === 'below' ? 'sfnf-description-shortcut-icon-below' : '';
				$field_description_position_class = $field['settings']['label_pos'] === 'right' ? 'sfnf-description-shortcut-icon-right' : $field_description_position_class;
			}

			$quick_edit_shortcut_label = '<span class="customize-partial-edit-shortcut nf-styler-partial-label-shortcut '.$field_lable_position_class.'"><button aria-label="Click to edit field label." title="Click to edit field label." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>';


			$quick_edit_shortcut_description = '<span class="customize-partial-edit-shortcut nf-styler-partial-description-shortcut '.$field_description_position_class.'"><button aria-label="Click to edit field description." title="Click to edit field description." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>';

			if( empty( $field['settings']['desc_text'] ) ){
				$quick_edit_shortcut_description = '';
			}

			$quick_edit_shortcut_input = '<span class="customize-partial-edit-shortcut '.$quick_edit_shortcut_input_class.'"><button aria-label="Click to edit '.$quick_edit_shortcut_field_type.' ." title="Click to edit '.$quick_edit_shortcut_field_type.'." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>';

			$field['settings']['sfnfBeforeLabel'] = $quick_edit_shortcut_label . $sfnf_before_label;
			$field['settings']['sfnfBeforeInput'] = $quick_edit_shortcut_input . $sfnf_before_input;
			$field['settings']['sfnfBeforeDescription'] = $quick_edit_shortcut_description . $sfnf_before_description;
			
		}

		return $field;
	}

	/**
	 * Add custom variables to the available query vars
	 *
	 * @since 1.0.0
	 * @param mixed   $vars
	 * @return mixed
	 */
	public function add_query_vars( $vars ) {
		
		$vars[] = $this->trigger;
		return $vars;
	}

	function admin_enqueue_scripts_callback(){
	
		if( isset( $_GET['page'] ) && $_GET['page'] === 'ninja-forms' && isset( $_GET['form_id'] )) {

			$form_id = $_GET['form_id'];
		}
		else{
			return;
		}

		

		$url                  = admin_url( 'customize.php' );
		$url                  = add_query_arg( 'sfnf-customizer-preview', 'true', $url );
		$url                  = add_query_arg( 'sfnf_form_id', $form_id, $url );
		$url                  = add_query_arg( 'autofocus[panel]', 'nf_styler_panel', $url );
		$url                  = add_query_arg(
			'url', wp_nonce_url(
				urlencode(
					add_query_arg(
						array(
							'sfnf_form_id'     => $form_id,
							'sfnf-customizer-preview' => 'true',
							'autofocus[panel]' => 'nf_styler_panel',
						), site_url()
					)
				), 'preview-popup'
			), $url
		);

		$url                  = add_query_arg(
			'return', urlencode(
				add_query_arg(
					array(
						'page' => 'ninja-forms',
						'form_id'   => $form_id,
						'dummy'=> 'text' // adding this addintional parameter because ninja forms automatically appends the external url with form id in menu links.. so it gets appened here which doesn't cause any issue 
					), admin_url( 'admin.php' )
				)
			), $url
		);

		wp_enqueue_script( 'sfnf_admin', NF_STYLER_URL . '/js/admin.js', array('jquery'));
		wp_localize_script( 'sfnf_admin', 'sfnf_admin_localize', array( 'customzier' => $url));
	}

	// function is_form_in_customzier_preview( $form_settings, $form_id ) {
	// 	$form_settings['is_customizer_preview'] = false;
	// 	if( is_customize_preview() ) {
	// 		$form_settings['is_customizer_preview'] = true;
	// 	}

	// 	return $form_settings;
	// }

	function add_own_templates( $file_paths ){
		array_unshift( $file_paths, NF_STYLER_DIR.'/includes/templates/');
		return $file_paths;
	}

	// function nf_styler_enable_admin_bar() {
	// 	$nf_styler_genreal_options = get_option( 'nf_styler_general_settings' ) ;
	// 	$is_admin_bar_enabled = isset( $nf_styler_genreal_options['admin-bar'] )?$nf_styler_genreal_options['admin-bar']:true;
	// 	if ( current_user_can( 'manage_options' ) && $is_admin_bar_enabled ) {
	// 		add_filter( 'show_admin_bar', '__return_true', 999 );
	// 	}
	// }

	function customize_control_scripts() {
		wp_enqueue_style( 'nouislider', NF_STYLER_URL . '/css/nf_styler.css' );
		wp_enqueue_style( 'nf_styler_admin', NF_STYLER_URL . '/css/nouislider.css' );
		wp_enqueue_style( 'nf_styler_customizer_styles', NF_STYLER_URL . '/css/customizer-controls.css' );
		wp_enqueue_script( 'nf_styler_customizer_controls', NF_STYLER_URL . '/js/customizer-controls/customizer-controls.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'nouislider', NF_STYLER_URL . '/js/nouislider.min.js', array( 'jquery','customize-controls' ), '', true );
		wp_enqueue_script( 'nf_styler_auto_save_form', NF_STYLER_URL . '/js/customize.js', array( 'jquery','customize-controls' ), '', true );
	}

	/**
	 *  shows live preview of css changes
	 *
	 * @since  v1.0
	 * @author Ninja Styler
	 * @return null
	 */
	function nf_styler_live_preview() {
		wp_enqueue_style( 'live_preview', NF_STYLER_URL . '/css/live-preview.css');
		$current_form_id = get_option( 'nf_styler_select_form_id' );
		wp_enqueue_script( 'nf_styler_show_live_changes', NF_STYLER_URL . '/js/live-preview-changes.js', array( 'jquery', 'customize-preview' ), '', true );
		wp_localize_script( 'nf_styler_show_live_changes', 'nf_styler_localize_current_form', array( 'formId' => $current_form_id ) );

		wp_enqueue_script( 'nf_styler_quick_edit', NF_STYLER_URL . '/js/edit-shortcuts.js', array( 'nf_styler_show_live_changes' ), '', true );

	}

	/**
	 *  Function that adds panels, sections, settings and controls
	 *
	 * @since  v1.0
	 * @author Ninja Styler
	 * @param main       wp customizer object
	 * @return null
	 */

	function nf_styler_customize_register( $wp_customize ) {
		if ( isset( $this->sfnf_form_id ) ) {
			update_option( 'nf_styler_select_form_id', $this->sfnf_form_id );
		}

		include_once 'helpers/fonts.php';
		$current_form_id = get_option( 'nf_styler_select_form_id' );
		$border_types = array( "none" => "None", "solid" =>"Solid", "dotted"=> "Dotted", "dashed"=> "Dashed", "double"=> "Double", "groove"=> "Groove", "ridge"=> "Ridge", "inset"=> "Inset", "outset"=> "Outset" );
		$align_pos = array( "left" =>"Left", "center" => "Center", "right" => "Right", "justify" => "Justify" );
		$font_style_choices = array(
			'bold'  => 'Bold',
			'italic' => 'Italic',
			'uppercase' => 'Uppercase',
			'underline' => 'underline'
		);

		$wp_customize->add_panel( 'nf_styler_panel', array(
				'title' => __( 'Ninja Forms Styler' ),
				'description' => '<p> Craft your Forms</p>', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			) );

		//hidden field to get form id in jquery
		//var_dump($_GET);

		if ( ! array_key_exists( 'autofocus', $_GET ) ) {

			$wp_customize->add_setting( 'nf_styler_hidden_field_for_form_id' , array(
					'default'     => $current_form_id,
					'transport'   => 'postMessage',
					'type' => 'option'
				) );

			$wp_customize->add_control( 'nf_styler_hidden_field_for_form_id', array(
					'type' => 'hidden',
					'priority' => 10, // Within the section.
					'section' => 'nf_styler_select_form_section', // Required, core or custom.
					'input_attrs' => array(
						'value' => $current_form_id,
						'id' => 'nf_styler_hidden_field_for_form_id'
					),
				) );
		}
		include 'helpers/customizer-controls/margin-padding.php';
		include 'helpers/customizer-controls/desktop-text-input.php';
		include 'helpers/customizer-controls/tab-text-input.php';
		include 'helpers/customizer-controls/mobile-text-input.php';
		include 'helpers/customizer-controls/custom-controls.php';
		include 'helpers/customizer-controls/text-alignment.php';
		include 'helpers/customizer-controls/font-style.php';
		include 'includes/class-nf-customizer-range-slider.php';
		include 'includes/form-select.php';
		include 'includes/general-settings.php';
		do_action( 'nf_styler_add_theme_section', $wp_customize, $current_form_id );
		include 'includes/form-wrapper.php';
		include 'includes/form-title.php';
		include 'includes/field-labels.php';
		include 'includes/field-descriptions.php';
		include 'includes/placeholders.php';

		include 'includes/text-fields.php';
		include 'includes/dropdown-fields.php';
		include 'includes/radio-inputs.php';
		include 'includes/checkbox-inputs.php';
		include 'includes/paragraph-textarea.php';
		include 'includes/confirmation-message.php';
		include 'includes/error-message.php';
		include 'includes/submit-button.php';

	} // main customizer function ends here

	function get_form_styles( $form_id, $category ) {


		$settings = get_option( 'nf_styler_form_id_' . $form_id );

		if ( empty( $settings ) ) {
			return;
		}

		$input_styles = '';

		$input_styles .= empty( $settings['form-wrapper']['font'] ) ? '' : 'font-family:' . $settings['form-wrapper']['font'] . ';';
		$input_styles .= empty( $settings[$category]['color'] )?'':'color:' . $settings[$category]['color'] . ';';
		$input_styles .= empty( $settings[$category]['background-color'] )?'':'background-color:' . $settings[$category]['background-color'] . ';';
		$input_styles .= empty( $settings[$category]['background-color1'] )?'':'background:-webkit-linear-gradient(to left,' . $settings[$category]['background-color'] . ',' . $settings[$category]['background-color1'] . ');';
		$input_styles .= empty( $settings[$category]['background-color1'] )?'':'background:linear-gradient(to left,' . $settings[$category]['background-color'] . ',' . $settings[$category]['background-color1'] . ');';

		//$input_styles.= empty( $settings[$category]['padding'] )?'':'padding:'. $settings[$category]['padding'].';';
		$input_styles .= empty( $settings[$category]['width'] )?'':'width:' . $settings[$category]['width'] . $this->nf_styler_add_px_to_value( $settings[$category]['width'] ) . ';';
		$input_styles .= empty( $settings[$category]['height'] )?'':'height:' . $settings[$category]['height'] . $this->nf_styler_add_px_to_value( $settings[$category]['height'] ) . ';';
		$input_styles .= empty( $settings[$category]['line-height'] )?'':'line-height:' . $settings[$category]['line-height'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['line-height'] ) . ';';
		$input_styles .= empty( $settings[$category]['title-position'] )?'':'text-align:' . $settings[$category]['title-position'] . ';';
		$input_styles .= empty( $settings[$category]['text-align'] )?'':'text-align:' . $settings[$category]['text-align'] . ';';
		$input_styles .= empty( $settings[$category]['error-position'] )?'':'text-align:' . $settings[$category]['error-position'] . ';';
		$input_styles .= empty( $settings[$category]['description-position'] )?'':'text-align:' . $settings[$category]['description-position'] . ';';

		$input_styles .= empty( $settings[$category]['title-color'] )?'':'color:' . $settings[$category]['title-color'] . ';';
		$input_styles .= empty( $settings[$category]['font-color'] )?'':'color:' . $settings[$category]['font-color'] . ';';
		
		$input_styles .= empty( $settings[$category]['button-color'] )?'':'background-color:' . $settings[$category]['button-color'] . ';';
		$input_styles .= empty( $settings[$category]['description-color'] )?'':'color:' . $settings[$category]['description-color'] . ';';

	
		$input_styles .= empty( $settings[$category]['font-size'] )?'':'font-size:' . $settings[$category]['font-size'] . $this->nf_styler_add_px_to_value( $settings[$category]['font-size'] ) . ';';
		$input_styles .= empty( $settings[$category]['max-width'] )?'':'max-width:' . $settings[$category]['max-width'] . $this->nf_styler_add_px_to_value( $settings[$category]['max-width'] ) . ';';
		$input_styles .= empty( $settings[$category]['maximum-width'] )?'':'max-width:' . $settings[$category]['maximum-width'] . $this->nf_styler_add_px_to_value( $settings[$category]['maximum-width'] ) . ';';
		$input_styles .= !isset( $settings[$category]['margin'] )?'':'margin:' . $settings[$category]['margin'] . ';';
		$input_styles .= !isset( $settings[$category]['padding'] )?'':'padding:' . $settings[$category]['padding'] . ';';

		$input_styles .= !isset( $settings[$category]['border-size'] )?'':'border-width:' . $settings[$category]['border-size'] . $this->nf_styler_add_px_to_value( $settings[$category]['border-size'] ) . ';';
		$input_styles .= empty( $settings[$category]['border-color'] )?'':'border-color:' . $settings[$category]['border-color'] . ';';
		$input_styles .= empty( $settings[$category]['border-type'] )?'':'border-style:' . $settings[$category]['border-type'] . ';';
		$input_styles .= empty( $settings[$category]['border-bottom'] )?'':'border-bottom-style:' . $settings[$category]['border-bottom'] . ';';
		$input_styles .= !isset( $settings[$category]['border-bottom-size'] )?'':'border-bottom-width:' . $settings[$category]['border-bottom-size'] . $this->nf_styler_add_px_to_value( $settings[$category]['border-bottom-size'] ) . ';';
		$input_styles .= empty( $settings[$category]['border-bottom-color'] )?'':'border-bottom-color:' . $settings[$category]['border-bottom-color'] . ';';



		$input_styles .= empty( $settings[$category]['background-image-url'] )?'':'background: url(' . $settings[$category]['background-image-url'] . ') no-repeat;';
		$input_styles .= empty( $settings[$category]['border-bottom-color'] )?'':'border-bottom-color:' . $settings[$category]['border-bottom-color'] . ';';
		if ( isset( $settings[$category]['display'] ) ) {
			$input_styles .=  $settings[$category]['display'] ?'display:none;':'display:inherit;';
		}
		if ( isset( $settings[$category]['border-radius'] ) ) {
			$input_styles .= 'border-radius:' . $settings[$category]['border-radius'] . $this->nf_styler_add_px_to_value( $settings[$category]['border-radius'] ) . ';';
			$input_styles .= '-web-border-radius:' . $settings[$category]['border-radius'] . $this->nf_styler_add_px_to_value( $settings[$category]['border-radius'] ) . ';';
			$input_styles .= '-moz-border-radius:' . $settings[$category]['border-radius'] . $this->nf_styler_add_px_to_value( $settings[$category]['border-radius'] ) . ';';
		}
		$input_styles .= empty( $settings[$category]['custom-css'] )?'':$settings[$category]['custom-css'] . ';';

		$input_styles .= !isset( $settings[ $category ]['padding-left'] ) ? '' : 'padding-left:' . $settings[ $category ]['padding-left'] . $this->nf_styler_add_px_to_value( $settings[$category]['padding-left'] )  . ';';

		$input_styles .= !isset( $settings[ $category ]['padding-right'] ) ? '' : 'padding-right:' . $settings[ $category ]['padding-right'] . $this->nf_styler_add_px_to_value( $settings[$category]['padding-right'] )  . ';';

		$input_styles .= !isset( $settings[ $category ]['padding-top'] ) ? '' : 'padding-top:' . $settings[ $category ]['padding-top'] . $this->nf_styler_add_px_to_value( $settings[$category]['padding-top'] )  . ';';

		$input_styles .= !isset( $settings[ $category ]['padding-bottom'] ) ? '' : 'padding-bottom:' . $settings[ $category ]['padding-bottom'] . $this->nf_styler_add_px_to_value( $settings[$category]['padding-bottom'] )  . ';';

		$input_styles .= !isset( $settings[ $category ]['margin-left'] ) ? '' : 'margin-left:' . $settings[ $category ]['margin-left'] . $this->nf_styler_add_px_to_value( $settings[$category]['margin-left'] ) . ';';
		$input_styles .= !isset( $settings[ $category ]['margin-right'] ) ? '' : 'margin-right:' . $settings[ $category ]['margin-right'] . $this->nf_styler_add_px_to_value( $settings[$category]['margin-right'] ) . ';';
		$input_styles .= !isset( $settings[ $category ]['margin-top'] ) ? '' : 'margin-top:' . $settings[ $category ]['margin-top'] . $this->nf_styler_add_px_to_value( $settings[$category]['margin-top'] ) . ';';
		$input_styles .= !isset( $settings[ $category ]['margin-bottom'] ) ? '' : 'margin-bottom:' . $settings[ $category ]['margin-bottom'] . $this->nf_styler_add_px_to_value( $settings[$category]['margin-bottom'] ) . ';';

		if ( ! empty( $settings[ $category ]['font-style'] ) ) {
			$font_styles = explode( '|', $settings[ $category ]['font-style'] );

				foreach ( $font_styles as $value ) {
					switch ( $value ) {
					case 'bold':
						$input_styles .= 'font-weight: bold;';
						break;
					case 'italic':
						$input_styles .= 'font-style: italic;';
						break;
					case 'uppercase':
						$input_styles .= 'text-transform: uppercase;';
						break;
					case 'underline':
						$input_styles .= 'text-decoration: underline;';
						break;
					default:
						break;
					}
			}
		}
		
		return $input_styles;
	}

	public function nf_styler_get_saved_styles_tab( $form_id, $category, $important = '' ) {
		$settings = get_option( 'nf_styler_form_id_' . $form_id );
		if ( empty( $settings ) ) {
			return;
		}
		$input_styles  = '';
		$input_styles .= empty( $settings[ $category ]['width-tab'] ) ? '' : 'width:' . $settings[ $category ]['width-tab'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['width-tab'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['max-width-tab'] ) ? '' : 'width:' . $settings[ $category ]['max-width-tab'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['max-width-tab'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['maximum-width-tab'] ) ? '' : 'width:' . $settings[ $category ]['maximum-width-tab'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['maximum-width-tab'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['height-tab'] ) ? '' : 'height:' . $settings[ $category ]['height-tab'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['height-tab'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['font-size-tab'] ) ? '' : 'font-size:' . $settings[ $category ]['font-size-tab'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['font-size-tab'] ) . ' ' . $important . ';';

		$input_styles .= empty( $settings[ $category ]['line-height-tab'] ) ? '' : 'line-height:' . $settings[ $category ]['line-height-tab'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['line-height-tab'] ) . ' ' . $important . ';';
		return $input_styles;
	}

	public function nf_styler_get_saved_styles_phone( $form_id, $category, $important = '' ) {
		$settings = get_option( 'nf_styler_form_id_' . $form_id );
		if ( empty( $settings ) ) {
			return;
		}
		$input_styles  = '';
		$input_styles .= empty( $settings[ $category ]['width-phone'] ) ? '' : 'width:' . $settings[ $category ]['width-phone'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['width-phone'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['max-width-phone'] ) ? '' : 'width:' . $settings[ $category ]['max-width-phone'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['max-width-phone'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['maximum-width-phone'] ) ? '' : 'width:' . $settings[ $category ]['maximum-width-phone'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['maximum-width-phone'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['height-phone'] ) ? '' : 'height:' . $settings[ $category ]['height-phone'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['height-phone'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['font-size-phone'] ) ? '' : 'font-size:' . $settings[ $category ]['font-size-phone'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['font-size-phone'] ) . ' ' . $important . ';';
		$input_styles .= empty( $settings[ $category ]['line-height-phone'] ) ? '' : 'line-height:' . $settings[ $category ]['line-height-phone'] . $this->nf_styler_add_px_to_value( $settings[ $category ]['line-height-tab'] ) . ' ' . $important . ';';

		return $input_styles;
	}
	/**
	 * Function to add px if not available
	 */

	function nf_styler_add_px_to_value( $value ) {
		$int_parsed = (int) $value;
		if ( ctype_digit( $value ) ) {
			$value = 'px';
		}

		else {
			$value = '';
		}
		return $value;
	}

	function nf_styler_welcome_screen_activate() {
		set_transient( 'nf_styler_welcome_activation_redirect', true, 30 );
	}


	
	function nf_styler_action_after_saving() {

		//get name of style to be deleted

		$style_to_be_deleted = get_option( 'nf_styler_general_settings' );
		if ( $style_to_be_deleted['reset-styles'] != -1 || ! empty( $style_to_be_deleted['reset-styles'] ) ) {
			delete_option( 'nf_styler_form_id_' . $style_to_be_deleted['reset-styles'] );
			$style_to_be_deleted['reset-styles'] = -1;
			update_option( 'nf_styler_general_settings', $style_to_be_deleted );

		}

	}

	function ninja_forms_display_before_form( $form_id ) {	
		//show css in frontend
		$style_current_form = get_option( 'nf_styler_form_id_' . $form_id );
		if ( ! empty( $style_current_form ) ) {
			$css_form_id = $form_id;
			$main_class_object = $this;
			include 'display/class-styles.php';
		}
		do_action( 'nf_styler_after_post_style_display', $this );

	}
}// class ends here

add_action( 'plugins_loaded', 'nf_styler_customizer_lite' );

function nf_styler_customizer_lite() {
	new NF_Styler_Customizer_Lite();
}
