// On Document Ready...
jQuery( document ).ready( function( $ ) {
    var myCustomFieldController = Marionette.Object.extend({
		initialize: function() {
	
			// On the Form Submission's field validaiton…
			var submitChannel = Backbone.Radio.channel( 'app' );
			this.listenTo( submitChannel, 'init:domainCollection', this.addToCollection );
	
		},
		
		addToCollection: function( model ) {
		
			var lastMenuItem = model.models[model.models.length-1];
			model.models.splice(model.models.length-1, 1);
			model.add(
				{
					id: 'sfnfStyler',
					nicename: 'Styler',
					classes: 'sfnf-styler',
					dashicons: 'dashicons-art',
					mobileDashicon: 'dashicons-art',
					url: sfnf_admin_localize.customzier
				}
			);

			model.models.push(lastMenuItem);
		}

	});

	function GetURLParameter(sParam)
	{
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) 
		{
			var sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] == sParam) 
			{
				return sParameterName[1];
			}
		}
	}
        // Instantiate our custom field's controller, defined above.
        new myCustomFieldController();

		// open styler in same tab
		$('body').on('mouseenter', '.sfnf-styler', function(){
			var urlQueryFormId = GetURLParameter('form_id');

			// on blank form chaning new with form id on styler button.
			var updateLink = $(this).attr('href').replace(/(form_id(=|%3\D))(?:new)/g, '$1' + urlQueryFormId);
			$(this).attr('href', updateLink);

			$(this).attr( 'target', '_self');
		});
    });
