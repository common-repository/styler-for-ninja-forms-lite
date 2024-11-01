(function($){
	//for font style
	wp.customize.bind('ready', function() {
		$('body').on('change', 'input.nf_styler_font_style_checkbox[type=checkbox]', function(){
	
			var $this_el      = $(this),
				$main_option  = $this_el.closest( 'span' ).siblings( 'input.nf_styler_font_styles' ),
				value         = $this_el.val(),
				current_value = $main_option.val(),
				values        = ( current_value != 'false' ) ? current_value.split( '|' ) : [],
				query         = $.inArray( value, values ),
				result        = '';
		
			if ( $this_el.prop('checked' ) === true ) {
		
				if ( current_value.length ) {
		
					if ( query < 0 ) {
						values.push( value );
		
						result = values.join( '|' );
					}
				} else {
					result = value;
				}
			} else {
		
				if ( current_value.length !== 0 ) {
		
					if ( query >= 0 ) {
						values.splice( query, 1 );
		
						result = values.join( '|' );
					} else {
						result = current_value;
					}
				}
			}
		
			$main_option.val( result ).trigger( 'change' );
		});
		
		$( 'body' ).on('click', 'span.nf_styler_font_style', function() {
			var style_checkbox = $( this ).find( 'input' );
			$( this ).toggleClass( 'nf_styler_font_style_checked' );
		
			if ( style_checkbox.is( ':checked' ) ) {
				style_checkbox.prop( 'checked', false );
			} else {
				style_checkbox.prop( 'checked', true );
			}
		
			style_checkbox.change();
		});
	
		//Text alignment control
	
		$('body').on('change', 'input.nf_styler_alignment_radio[type=radio]', function(){
	
			var $this_el      = $(this),
				$main_option  = $this_el.closest( 'span' ).siblings( 'input.nf_styler_alignment_control' ),
				value         = $this_el.val();
			
		
			$main_option.val( value ).trigger( 'change' );
		});
	

		$( 'body' ).on('click', 'span.nf_styler_alignment', function() {
			var style_radio = $( this ).find( 'input' );
			var remove_radios = $( this ).siblings( 'span' );
			remove_radios.each(function(){
				$(this).removeClass( 'nf_styler_alignment_checked');
				$(this).find('input').prop( 'checked', false );
			});
			$( this ).addClass( 'nf_styler_alignment_checked' );
			style_radio.prop( 'checked', true );
		
			style_radio.change();
		});
	
	
		//to switch between different views ( Desktop, Mobile, Tablet)
	
		$( 'body' ).on('click', 'span.nf_styler_desktop_text_input:not(.active)', function() {
			if( ! $('.devices .preview-desktop').hasClass('active') ) {
				$('.preview-desktop').trigger('click');
				$('.nf_styler_desktop_text_input').addClass('active');
				$('.nf_styler_tab_text_input').removeClass('active');
				$('.nf_styler_mobile_text_input').removeClass('active');
			}		
		});
	
		$( 'body' ).on('click', 'span.nf_styler_tab_text_input:not(.active)', function() {
			if( ! $('.devices .preview-tablet').hasClass('active') ) {
				$('.nf_styler_tab_text_input').addClass('active');
				$('.nf_styler_desktop_text_input').removeClass('active');
				$('.nf_styler_mobile_text_input').removeClass('active');
				$('.preview-tablet').trigger('click');
			}
		});
	
	
		$( 'body' ).on('click', 'span.nf_styler_mobile_text_input:not(.active)', function() {
			if( ! $('.devices .preview-mobile').hasClass('active') ) {
				$('.nf_styler_mobile_text_input').addClass('active');
				$('.nf_styler_tab_text_input').removeClass('active');
				$('.nf_styler_desktop_text_input').removeClass('active');
				$('.preview-mobile').trigger('click');
			}
		});
			// when click on customizer responsive buttons
			$('body').on('click', '.devices .preview-desktop', function(){
				$('.nf_styler_desktop_text_input').addClass('active');
				$('.nf_styler_tab_text_input').removeClass('active');
				$('.nf_styler_mobile_text_input').removeClass('active');
			})
		
			$('body').on('click', '.devices .preview-tablet', function(){
	
				$('.nf_styler_desktop_text_input').removeClass('active');
				$('.nf_styler_tab_text_input').addClass('active');
				$('.nf_styler_mobile_text_input').removeClass('active');
			})
		
			$('body').on('click', '.devices .preview-mobile', function(){
				$('.nf_styler_desktop_text_input').removeClass('active');
				$('.nf_styler_tab_text_input').removeClass('active');
				$('.nf_styler_mobile_text_input').addClass('active');
			})
	
		// $( function () {
			// Range Slider
			$( 'body' ).on( 'mousedown', 'input.gf-nf_styler-range-btn' , function () {
				var $range = $( this ),
					$range_input = $range.parent().children( '.gf-nf_styler-range-input' );
	
				value = $( this ).attr( 'value' );
				$range_input.val( value );
	
				$( this ).mousemove( function () {
					value = $( this ).attr( 'value' );
					$range_input.val( value );
				} );
			} );
	
			
	
	
	
	
			// Range Slider
			$( 'body' ).on( 'change', 'input.gf-nf_styler-range-input' , function () {
				var $range_input = $( this ),
					$range = $range_input.parent().children( '.gf-nf_styler-range-btn' );
	
				value = $( this ).attr( 'value' );
				$range.val( value );
			//	$('input.gf-nf_styler-range-btn').trigger(' change ');
	
	
		});
		var et_range_input_number_timeout;
	
			function et_autocorrect_range_input_number( input_number, timeout ) {
				var $range_input = input_number,
					$range       = $range_input.parent().find('input.gf-nf_styler-range-btn'),
					value        = parseFloat( $range_input.val() ),
				//	reset        = parseFloat( $range.attr('data-reset_value') ),
					step         = parseFloat( $range_input.attr('step') ),
					min          = parseFloat( $range_input.attr('min') ),
					max          = parseFloat( $range_input.attr('max') );
				clearTimeout( et_range_input_number_timeout );
	
				et_range_input_number_timeout = setTimeout( function() {
					if ( isNaN( value ) ) {
						$range_input.val( min );
						$range.val( min ).trigger( 'change' );
						return;
					}
	
					if ( step >= 1 && value % 1 !== 0 ) {
						value = Math.round( value );
						$range_input.val( value );
						$range.val( value );
					}
	
					if ( value > max ) {
						$range_input.val( max );
						$range.val( max ).trigger( 'change' );
					}
	
					if ( value < min ) {
						$range_input.val( min );
						$range.val( min ).trigger( 'change' );
					}
				}, timeout );
	
				$range.val( value ).trigger( 'change' );
			}
	
			$('body').on( 'change keyup', 'input.gf-nf_styler-range-input' , function() {
				et_autocorrect_range_input_number( $(this), 1000 );
			}).on( 'focusout', 'input.gf-nf_styler-range-input', function() {
				et_autocorrect_range_input_number( $(this), 0 );
			});


			//to add focus
			wp.customize.previewer.bind('nf-focus-control', function(data) {
				var form_id = data.form_id;
				switch (data.control_type) {
					case 'field-labels':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[field-labels][font-size]');
						break;	
					case 'field-input':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[text-fields][width]');
						break;
					case 'field-dropdown':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[dropdown-fields][width]');
						break;	
					case 'form-title':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[form-title][font-color]');
						break;	
					case 'form-wrapper':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[form-wrapper][width]');
						break;	
					case 'field-descripton':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[field-descriptions][display]');
						break;	
					case 'field-radio':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[radio-inputs][width]');
						break;	
					case 'field-checkbox':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[checkbox-inputs][width]');
						break;	
					case 'field-textarea':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[paragraph-textarea][width]');
						break;	
					case 'submit':
						var control = wp.customize.control('nf_styler_form_id_' + form_id + '[submit-button][width]');
						break;	
				}
				control.focus();
			});
		
		});
	})(jQuery);
	