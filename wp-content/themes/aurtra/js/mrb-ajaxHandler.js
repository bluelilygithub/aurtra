jQuery(document).ready(function($) {
		var userSubmitButton = document.getElementById( 'user-submit-button' );
		var cancelupdate = document.getElementById( 'cancelupdate' );		
		var returntoassets = document.getElementById( 'returntoassets' );
	
		if( document.getElementById("cancelupdate")) {
			cancelupdate.addEventListener( 'click', function(event) {
					window.location.href = "http://aurtra.bluelilyclients.com/member-devices";
			});
		}
		if( document.getElementById("returntoassets")) {
			returntoassets.addEventListener( 'click', function(event) {
					window.location.href = "http://aurtra.bluelilyclients.com/member-devices";
			});
		}		

		if( document.getElementById("user-submit-button")) {
			
			var adminAjaxRequest = function( formData, action ) {
				jQuery.ajax({
					type: 'post',
				//	dataType: 'json',
					url: frontendajax.adminAjax,
					data: {
						action: action,
						data: formData,
					submission: document.getElementById( 'xyq').value,
						security: frontendajax.security
					},
					success: function(response) {
						document.getElementById('result_msg').innerHTML='-- Asset Updated --';
						console.log(document.getElementById( 'devicePostID').value);
						console.log('record updated');
						console.log(response);					
					},
					error: function(errorThrown){
						document.getElementById('result_msg').innerHTML=' -- Update Failed --';
						console.log('broken');
						console.log(errorThrown);
					}
				});

			};


			userSubmitButton.addEventListener( 'click', function(event) {
				event.preventDefault();
				formData = {
					'deviceLocation' : document.getElementById( 'deviceLocation').value,
					'deviceDescription' : document.getElementById( 'deviceDescription').value,
					'devicePostID' : document.getElementById( 'devicePostID').value
				};
				adminAjaxRequest( formData, 'process_user_generated_post' );
			});
		}		
	});
