( function ( $ ) {

	var waitforformsubmit;
	var intialBtnVal = $( 'form #customize-header-actions #save' ).val();

	//change select form dropdown to -1 value
	$( 'body' ).on( 'click', '#accordion-section-nf_styler_select_form_section h3.accordion-section-title', function () {
		if ( $( '#customize-control-nf_styler_hidden_field_for_form_id' ).length ) {
			$( '#customize-control-nf_styler_select_form_id select' ).val( -1 );
		}
	} );


	//hide all the selection fields if no form selected
	$( 'body' ).on( 'click', '#accordion-panel-nf_styler_panel', function () {
		if ( $( '#customize-control-nf_styler_hidden_field_for_form_id' ).length ) {
			$( '#accordion-section-nf_styler_form_id_form_wrapper' ).hide();
			$( '#accordion-section-nf_styler_form_id_form_title' ).hide();
			$( '#accordion-section-nf_styler_form_id_form_header' ).hide();
			$( '#accordion-section-nf_styler_form_id_form_title_description' ).hide();
			$( '#accordion-section-nf_styler_form_id_submit_button' ).hide();
			$( '#accordion-section-nf_styler_form_id_field_labels' ).hide();
			$( '#accordion-section-sfnf_field_icons_section' ).hide();
			$( '#accordion-section-nf_styler_form_id_field_descriptions' ).hide();
			$( '#accordion-section-nf_styler_form_id_text_fields' ).hide();
			$( '#accordion-section-nf_styler_form_id_dropdown_fields' ).hide();
			$( '#accordion-section-nf_styler_form_id_radio_inputs' ).hide();
			$( '#accordion-section-nf_styler_form_id_checkbox_inputs' ).hide();
			$( '#accordion-section-nf_styler_form_id_paragraph_textarea' ).hide();
			$( '#accordion-section-nf_styler_form_id_section_break_title_description' ).hide();
			$( '#accordion-section-nf_styler_form_id_confirmation_message' ).hide();
			$( '#accordion-section-nf_styler_form_id_error_message' ).hide();
			$( '#accordion-section-nf_styler_form_id_addons' ).hide();
			$( '#accordion-section-nf_styler_form_id_field_sub_labels' ).hide();
			$( '#accordion-section-nf_styler_form_id_general_settings' ).hide();
			$( '#accordion-section-nf_styler_form_id_list_field' ).hide();
			$( '#accordion-section-nf_styler_form_id_placeholders' ).hide();
		}

	} );

	//append form id in url and refresh the page
	$( 'body' ).on( 'change', '#customize-control-nf_styler_select_form_id select', function () {

		alert( 'Saving Form Selection. Start Styling after page refresh !!!' );
		$( 'form #customize-header-actions #save' ).click();
		$( '#customize-preview' ).removeClass( 'iframe-ready' );
		$( '#customize-preview iframe' ).hide();
		waitforformsubmit = setInterval( check_button_disabled, 1000 );
	} );

	function check_button_disabled() {

		if ( !$( 'body.wp-customizer' ).hasClass( 'saving' ) ) {

			clearInterval( waitforformsubmit );
			var reload_url_key = 'autofocus[panel]';
			var reload_url_value = 'nf_styler_panel';
			reload_url_key = encodeURIComponent( reload_url_key ); reload_url_value = encodeURIComponent( reload_url_value );
			//get the search query from url, it starts after ?
			var kvp = document.location.search.substr( 1 ).split( '&' );

			//check if the search query already contains autofocus link 

			// var focusUrl =$.inArray('autofocus[panel]=nf_styler_panel',kvp);

			// //add autofocus query if not present
			// if(focusUrl == -1){
			//     kvp[kvp.length]='autofocus[panel]=nf_styler_panel';

			// }
			if ( kvp == '' ) {
				document.location.search = '?' + reload_url_key + '=' + reload_url_value;
			}
			else {

				var i = kvp.length;

				var x; while ( i-- ) {

					x = kvp[ i ].split( '=' );

					if ( x[ 0 ] == reload_url_key ) {
						x[ 1 ] = reload_url_value;
						kvp[ i ] = x.join( '=' );
						break;
					}
				}

				if ( i < 0 ) { kvp[ kvp.length ] = [ reload_url_key, reload_url_value ].join( '=' ); }

				//this will reload the page, it's likely better to store this until finished
				document.location.search = kvp.join( '&' );
			}

		}
	}


	//Auto save and refresh on reset style button      
	$( 'body' ).on( 'click', '.nf-styler-reset-style-button', function () {

		alert( ' Resetting Style !!!' );
		$( 'form #customize-header-actions #save' ).click();
		$( '#customize-preview' ).removeClass( 'iframe-ready' );
		$( '#customize-preview iframe' ).hide();
		waitforformsubmit = setInterval( check_button_disabled, 2000 );

	} );


	$( function () {
		// Range Slider
		$( 'input[type=range]' ).on( 'mousedown', function () {
			var $range = $( this ),
				$range_input = $range.parent().children( '.nf-styler-range-input' );

			value = $( this ).attr( 'value' );
			$range_input.val( value );

			$( this ).mousemove( function () {
				value = $( this ).attr( 'value' );
				$range_input.val( value );
			} );
		} );

		// spacing control
		$( '.nf_styler_spacing_control_ul ' ).on( 'keyup mouseup', 'input', function () {
			var ul = $( this ).parent().parent();
			var spacing = nf_styler_get_spacing_val( ul.find( '.spacing-top' ).val() ) + 'px ';
			spacing +=   nf_styler_get_spacing_val( ul.find( '.spacing-right' ).val() ) + 'px ';
			spacing +=  nf_styler_get_spacing_val( ul.find( '.spacing-bottom' ).val() ) + 'px ';
			spacing +=    nf_styler_get_spacing_val( ul.find( '.spacing-left' ).val() ) + 'px ';
			ul.next().val(spacing).trigger('change');
		} )


	} );


	function nf_styler_get_spacing_val( val ) {
		if ( val == '' ) {
			return 0;
		}
		return val;
	}
} )( jQuery );