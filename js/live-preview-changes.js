( function ( $ ) {

	var urlParams = nf_styler_localize_current_form.formId;

	/**
	 * 
	 * Not compatible with wordpress 4.7 onwards
	 * using wp_localize script from now onwards
	 */
	// (window.onpopstate = function () {
	//     var match,
	//         pl     = /\+/g,  // Regex for replacing addition symbol with a space
	//         search = /([^&=]+)=?([^&]*)/g,
	//         decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
	//         query  = window.location.search.substring(1);

	//     urlParams = {};
	//     while (match = search.exec(query))
	//        urlParams[decode(match[1])] = decode(match[2]);
	// })();

	//Check if px is added, if not then add automatically
	function addPxToValue( to ) {
		var parsedTo = parseInt( to );
		if ( parsedTo == to ) {
			to = to + 'px';
		}
		return to;
	}

	function addGoogleFont( FontName ) {
		var fontPlus = '';
		FontName = FontName.split( " " );
		if ( $.isArray( FontName ) ) {
			fontPlus = FontName[ 0 ];
			for ( var i = 1; i < FontName.length; i++ ) {
				fontPlus = fontPlus + '+' + FontName[ i ];
			}

		}
		$( "head" ).append( "<link href='https://fonts.googleapis.com/css?family=" + fontPlus + "' rel='stylesheet' type='text/css'>" );
	}
	//********************************* Form Wrapper *******************************************

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'width', to );

		} );
	} );
	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][background-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont' ).css( 'background', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][font]', function ( value ) {
		value.bind( function ( to ) {
			if ( to == 'Default' ) {
				$( '#nf-form-' + urlParams + '-cont' ).css( 'font-family', 'inherit' );
			}
			else {
				addGoogleFont( to );
				$( '#nf-form-' + urlParams + '-cont' ).css( 'font-family', to );
			}
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][border-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'border-width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][border-type]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont' ).css( 'border-style', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][border-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont' ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][border-radius]', function ( value ) {
	
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'border-radius', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][background-image]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont' ).css( 'background-image', 'url(' + to + ')' );
		} );
	} );

	// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-wrapper][padding]', function ( value ) {
		value.bind( function ( to ) {
			 to = addPxToValue(to);
			$( '#nf-form-' + urlParams + '-cont' ).css( 'padding', to );
		} );
	} );

	function setFontStyles( value ){
		var value = value.split('|');
		var fontStyles = {
			"font-weight": "normal",
			"font-style": "normal",
			"text-transform": "none",
			"text-decoration": "none"
		};
		value.map( function(currentValue){
			// if( fontStyles !== ''){
			// 	fontStyles = fontStyles +',';
			// }
			switch (currentValue){
				case 'bold':
				fontStyles["font-weight"]= "bold";
				break;
				case 'italic':
				fontStyles["font-style"]= "italic";
				break;
				case 'uppercase':
				fontStyles["text-transform"]= "uppercase";
				break;
				case 'underline':
				fontStyles["text-decoration"]= "underline";
				break;
				default:
				break;
			}
		});
		return fontStyles;
	}

	//********************************* Form Title *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'color', to );
		} );
	} );
	wp.customize( 'nf_styler_form_id_'+ urlParams +'[form-title][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-title-' + urlParams + ' h3' ).css( setFontStyles( to ) );
			 } );
	  } );



	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'font-size', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][text-align]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'text-align', to );
		} );
	} );

// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[form-title][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-title-' + urlParams + ' h3' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	

	//********************************* Field Labels *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_'+ urlParams +'[field-labels][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][text-align]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'text-align', to );
		} );
	} );


// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-labels][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-label label' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	



	//********************************* Field Descriptions *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'color', to );
		} );
	} );
	wp.customize( 'nf_styler_form_id_'+ urlParams +'[field-descriptions][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$('#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][text-align]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-field-description').css( 'display', 'block' );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'text-align', to );
		} );
	} );


// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[field-descriptions][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-field-description' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	//********************************* Text Fields *******************************************

	var nf_all_text_field_types = '#nf-form-' + urlParams + '-cont .textbox-container input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .email-container input[type="email"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .firstname-container input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .lastname-container input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .address-container input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .city-container input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .spam-container input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .date-container .nf-field-element input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .phone-container .nf-field-element input[type="tel"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .zip-container .nf-field-element input[type="text"],';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .quantity-container .nf-field-element input,';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .number-container .nf-field-element input,';
	nf_all_text_field_types += '#nf-form-' + urlParams + '-cont .confirm-container .nf-field-element input';

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( nf_all_text_field_types ).css( 'color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][font-style]', function( value ) {
		value.bind( function( to ) {
				$( nf_all_text_field_types ).css( setFontStyles( to ) );
			 } );
	  } );
	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][max-width]', function ( value ) {
		value.bind( function ( to ) {
		
			to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][background-color]', function ( value ) {
		value.bind( function ( to ) {
			$( nf_all_text_field_types ).css( 'background', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'border-width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-type]', function ( value ) {
		value.bind( function ( to ) {
			$( nf_all_text_field_types ).css( 'border-style', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-color]', function ( value ) {
		value.bind( function ( to ) {
			$( nf_all_text_field_types ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-radius]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'border-radius', to );
		} );
	} );

// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_text_field_types ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	//********************************* Dropdown Fields *******************************************

	var nf_all_dropdown_field_types = '#nf-form-' + urlParams + '-cont .listcountry-container select,';
	nf_all_dropdown_field_types += '#nf-form-' + urlParams + '-cont .liststate-container select,';
	nf_all_dropdown_field_types += '#nf-form-' + urlParams + '-cont .listmultiselect-container select,';
	nf_all_dropdown_field_types += '#nf-form-' + urlParams + '-cont .listselect-container select';

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$(nf_all_dropdown_field_types ).css( 'color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][font-style]', function( value ) {
		value.bind( function( to ) {
				$( nf_all_dropdown_field_types ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][max-width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][background-color]', function ( value ) {
		value.bind( function ( to ) {
			$( nf_all_dropdown_field_types ).css( 'background', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][border-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'border-width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][border-type]', function ( value ) {
		value.bind( function ( to ) {
			$( nf_all_dropdown_field_types ).css( 'border-style', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][border-color]', function ( value ) {
		value.bind( function ( to ) {
			$( nf_all_dropdown_field_types ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][border-radius]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'border-radius', to );
		} );
	} );

	// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[dropdown-fields][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( nf_all_dropdown_field_types ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	
	//********************************* Radio Inputs *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element label' ).css( 'color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element label' ).css( 'font-size', to );
		} );
	} );
	wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element label' ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][max-width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element label' ).css( 'width', to );
		} );
	} );

	
	// ***** start padding ****
	// ***** Switched to refresh method as default padding given by Ninja Form is Important. ****
	// ***** Can't overwrite important using jquery. ****
	// ***** Details: https://stackoverflow.com/questions/2655925/how-to-apply-important-using-css ****
	// wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][padding-top]', function( value ) {
	
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element > ul li' ).css( 'padding-top', to );
	// 		 } );
	//   } );
	  
	  
	//   wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][padding-right]', function( value ) {
	  
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element > ul li' ).css( 'padding-right', to );
	// 		 } );
	//   } );
	  
	  
	//   wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][padding-bottom]', function( value ) {
	  
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element > ul li' ).css( 'padding-bottom', to );
	// 		 } );
	//   } );
	  
	  
	//   wp.customize( 'nf_styler_form_id_' + urlParams + '[radio-inputs][padding-left]', function( value ) {
	  
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listradio-container .nf-field-element > ul li' ).css( 'padding-left', to );
	// 		 } );
	//   } );
	  
	  // ***** end padding ****

	//********************************* Checkbox Inputs *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .listcheckbox-container .nf-field-element label' ).css( 'color', to );
		} );
	} );
	wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .listcheckbox-container .nf-field-element label' ).css( setFontStyles( to ) );
			 } );
	  } );
	wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .listcheckbox-container .nf-field-element label' ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][max-width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .listcheckbox-container .nf-field-element label' ).css( 'width', to );
		} );
	} );


	// wp.customize( 'nf_styler_form_id_'+urlParams+'[checkbox-inputs][margin]', function( value ) {
	//     value.bind( function( to ) {
	//             $( '#gform_wrapper_'+urlParams+' .gform_body .gform_fields .gfield .gfield_checkbox' ).css( 'margin',to );
	//          } );
	//   } );

	  // ***** Same error as on radio inputs ****
	//   wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][padding-top]', function( value ) {
	
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listcheckbox-wrap .nf-field-element > ul li' ).css( 'padding-top', to );
	// 		 } );
	//   } );
	  
	  
	//   wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][padding-right]', function( value ) {
	  
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listcheckbox-wrap .nf-field-element > ul li' ).css( 'padding-right', to );
	// 		 } );
	//   } );
	  
	  
	//   wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][padding-bottom]', function( value ) {
	  
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listcheckbox-wrap .nf-field-element > ul li' ).css( 'padding-bottom', to );
	// 		 } );
	//   } );
	  
	  
	//   wp.customize( 'nf_styler_form_id_' + urlParams + '[checkbox-inputs][padding-left]', function( value ) {
	  
	// 	value.bind( function( to ) {
	// 		to = addPxToValue( to );
	// 			$( '#nf-form-' + urlParams + '-cont .listcheckbox-wrap .nf-field-element > ul li' ).css( 'padding-left', to );
	// 		 } );
	//   } );
	  
	  // ***** end padding ****
	//********************************* Paragraph Textarea Fields *******************************************
	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'font-size', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][background-color]', function ( value ) {
		value.bind( function ( to ) {
			$('#nf-form-' + urlParams + '-cont .textarea-container textarea').css( 'background', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'border-width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-type]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea').css( 'border-style', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[text-fields][border-radius]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'border-radius', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][max-width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'width', to );
		} );
	} );


	// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[paragraph-textarea][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .textarea-container textarea' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****



	//********************************* Submit Button *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][button-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'background', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$('#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][height]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'height', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][text-align]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .submit-container .nf-field-element' ).css( 'text-align', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'font-size', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][border-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'border-width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][border-type]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'border-style', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][border-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][border-radius]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'border-radius', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'color', to );
		} );
	} );

// ***** start margin ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][margin-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'margin-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][margin-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'margin-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][margin-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'margin-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][margin-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'margin-left', to );
		 } );
  } );
  
  // ***** end margin ****

  // ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[submit-button][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .submit-container input[type=button]' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	

	//********************************* Confirmation Message *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][text-align]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'text-align', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][max-width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][background-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'background', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][border-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'border-width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][border-type]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'border-style', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][border-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][border-radius]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'border-radius', to );
		} );
	} );

 // ***** start padding ****
 wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[confirmation-message][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-response-msg' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****

	//********************************* error Message *******************************************


	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][font-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][font-style]', function( value ) {
		value.bind( function( to ) {
				$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( setFontStyles( to ) );
			 } );
	  } );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][text-align]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'text-align', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][font-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#gform_wrapper_' + urlParams + ' .validation_error' ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][max-width]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][background-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'background', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][border-size]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'border-width', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][border-type]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'border-style', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][border-color]', function ( value ) {
		value.bind( function ( to ) {
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][border-radius]', function ( value ) {
		value.bind( function ( to ) {
			to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'border-radius', to );
		} );
	} );

// ***** start padding ****
wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][padding-top]', function( value ) {

	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'padding-top', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][padding-right]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'padding-right', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][padding-bottom]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'padding-bottom', to );
		 } );
  } );
  
  
  wp.customize( 'nf_styler_form_id_' + urlParams + '[error-message][padding-left]', function( value ) {
  
	value.bind( function( to ) {
		to = addPxToValue( to );
			$( '#nf-form-' + urlParams + '-cont .nf-error-msg' ).css( 'padding-left', to );
		 } );
  } );
  
  // ***** end padding ****



} )( jQuery );