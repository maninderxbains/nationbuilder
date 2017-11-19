/****
Application name : Facturely 
Developer : 
Verions : V1
Description : Facturely
******/

var facturelyApp=
	{
		_SERVICE_PATH: "http://localhost/nationbuildergit/nationbuilder/facturly/",
		
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
		}
	};
	