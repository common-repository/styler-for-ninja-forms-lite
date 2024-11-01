jQuery( document).ready( function($){
	var formId = nf_styler_localize_current_form.formId;

	var allEditableElements = '.nf-field-label, .ninja-forms-field, .nf-form-title, .nf-field-description, .listradio-wrap .nf-field-element ul, .listcheckbox-wrap .nf-field-element ul' ;

	// move form wrapper icon on top of wrapper
	setTimeout( function() { 
		$( $( '.nf-styler-partial-form-wrapper-shortcut' ).detach() ).insertBefore( '.nf-form-cont' ); 
	}, 3000 );
	

	// show selection on mouse hover
	$('body').on('mouseenter', allEditableElements, function(){

			$(allEditableElements).removeClass('nf-styler-selected-field');
			$('.nf-form-cont .customize-partial-edit-shortcut').css('display', 'none');

			$(this).addClass('nf-styler-selected-field');
			var quickEditShortcuts = $(this).prevAll('.customize-partial-edit-shortcut');

			$(quickEditShortcuts[0] ).css('display', 'block');
	});

	// remove quick edit shortcut on click
	function removeShortcut(editShortcut){
		$('.nf-form-cont .customize-partial-edit-shortcut').css('display', 'none');
		$(editShortcut).next().removeClass('nf-styler-selected-field');
	}

	//send control to field lables
	$( document.body ).on( 'click', '.nf-styler-partial-label-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'field-labels'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control 
	$( document.body ).on( 'click', '.nf-styler-partial-input-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'field-input'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control 
	$( document.body ).on( 'click', '.nf-styler-partial-dropdown-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'field-dropdown'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control form title
	$( document.body ).on( 'click', '.nf-styler-partial-form-title-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'form-title'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control form Wrapper
	$( document.body ).on( 'click', '.nf-styler-partial-form-wrapper-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'form-wrapper'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control field description
	$( document.body ).on( 'click', '.nf-styler-partial-description-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'field-descripton'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});
	
	//send control field Radio
	$( document.body ).on( 'click', '.nf-styler-partial-radio-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'field-radio'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control field Checkbox
	$( document.body ).on( 'click', '.nf-styler-partial-checkbox-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'field-checkbox'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control field Paragraph
	$( document.body ).on( 'click', '.nf-styler-partial-textarea-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'field-textarea'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});

	//send control field submit
	$( document.body ).on( 'click', '.nf-styler-partial-submit-shortcut', function(e){
		e.preventDefault(); // otherwise the focus gets shifted to input field in form
		var data={'form_id':formId, 'control_type':'submit'};
		wp.customize.preview.send( 'nf-focus-control', data );
		 removeShortcut(this);
	});
})
