/****
Application name : Facturely 
Developer : 
Verions : V1
Description : Facturely
******/

var facturelyApp=
	{
		_SERVICE_PATH: "http://localhost/nationbuildergit/nationbuilder/facturly/",
		
		IsEmail:function(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		},
			
		/****
			Function Name : deleteRecord 
			Parameter : JSON
			Description :
			Response : JSON
		****/
		deleteRecord:function(post_data)
		{
			var base_url = facturelyApp._SERVICE_PATH;
			$.ajax({
					url:base_url+"AjaxFunction/deleteRecord",
					data:post_data,
					type:"POST",
					success:function(response)
					{
						alert("Record deleted Successfully");
						window.location.reload();
					}
				});
		},
		
		/****
			Function Name : addTrackingCode 
			Parameter : JSON
			Description :
			Response : JSON
		****/
		addTrackingCode:function(post_data)
		{
			var base_url = facturelyApp._SERVICE_PATH;
			$.ajax({
				url:base_url+"AjaxFunction/addTrackingCode",
				data:post_data,
				type:"POST",
				success:function(response)
				{
					$("#new_tracking_code_error").html("");
					response = JSON.parse(response);
					$("#new_tracking_code_error").html(response.message);
					$("#add_tracking_code_form")[0].reset();
				}
			});
		},
		
		/****
			Function Name : editTrackingCode 
			Parameter : JSON
			Description :
			Response : JSON
		****/
		editTrackingCode:function(post_data)
		{
			var base_url = facturelyApp._SERVICE_PATH;
			$.ajax({
					url:base_url+"AjaxFunction/editTrackingCode",
					data:post_data,
					type:"POST",
					success:function(response)
					{
						$("#edit_tracking_code_error").html("");
						response = JSON.parse(response);
						$("#edit_tracking_code_error").html(response.message);
					}
				});
		},
		/****
			Function Name : addNationSlug 
			Parameter : JSON
			Description :
			Response : JSON
		****/
		addNationSlug:function(post_data)
		{
			var base_url = facturelyApp._SERVICE_PATH;
			$.ajax({
					url:base_url+"AjaxFunction/addNationSlug",
					data:post_data,
					type:"POST",
					success:function(response)
					{
						$("#nation_slug_error").html("");
						response = JSON.parse(response);
						$("#nation_slug_error").html(response.message);
					}
				});
		},
		/****
			Function Name : addOrganizationInfo 
			Parameter : JSON
			Description :
			Response : JSON
		****/
		addOrganizationInfo:function(post_data)
		{
			var base_url = facturelyApp._SERVICE_PATH;
			$.ajax({
					url:base_url+"AjaxFunction/addOrganizationInfo",
					data:post_data,
					type:"POST",
					success:function(response)
					{
						$("#organization_info_success").html("");
						response = JSON.parse(response);
						$("#organization_info_success").html(response.message);
					}
				});
		},
		/****
			Function Name : saveEmailSettings 
			Parameter : JSON
			Description :
			Response : JSON
		****/
		saveEmailSettings:function(post_data,email_setting_success_id)
		{
			var base_url = facturelyApp._SERVICE_PATH;
			$.ajax({
					url:base_url+"AjaxFunction/saveEmailSettings",
					data:post_data,
					type:"POST",
					success:function(response)
					{
						$("#"+email_setting_success_id).html("");
						response = JSON.parse(response);
						$("#"+email_setting_success_id).html(response.message).css("color","green");
					}
				});
		},
		/****
			Function Name : saveTemplateTrackingcodes 
			Parameter : JSON
			Description :
			Response : JSON
		****/
		saveTemplateTrackingcodes:function(post_data,template_trackingcodes_success_id)
		{
			var base_url = facturelyApp._SERVICE_PATH;
			$.ajax({
					url:base_url+"AjaxFunction/saveTemplateTrackingcodes",
					data:post_data,
					type:"POST",
					success:function(response)
					{
						$("#"+template_trackingcodes_success_id).html("");
						response = JSON.parse(response);
						$("#"+template_trackingcodes_success_id).html(response.message).css("color","green");
						setTimeout(function(){
							window.location.reload();
						}, 1000);
					}
				});
		}
	};
	