/****
Application name : Facturly 
Developer : 
Verions : V1
Description : Facturly
******/


/****
	Function Name : deleteRecord 
	Parameter : JSON
	Description :
	Response : JSON
****/

$(".delete_record").off();
$(".delete_record").on("click",function(evt)
{
	evt.preventDefault();
	var table = $(this).attr("table");
	var column = $(this).attr("column");
	var column_value = $(this).attr("column_value");
	var post_data = {"table":table,"column":column,"column_value":column_value};
	
	var con = confirm("Are you sure, you want to delete this ?");
	if (con==true) {
		facturelyApp.deleteRecord(post_data);
	}
	
});


/****
	Function Name : addTrackingCode 
	Parameter : JSON
	Description :
	Response : JSON
****/

$("#add_tracking_code_form").off();
$("#add_tracking_code_form").on("submit",function(evt)
{
	evt.preventDefault();
	$("#new_tracking_code_error").html("");
	var tracking_code = $("#new_tracking_code").val().trim();
	if(tracking_code=="")
	{
		$("#new_tracking_code").focus();
		$("#new_tracking_code_error").html("Tracking Code can't be empty").css("color","red");
		return false;
	}
	var user_id = $("#user_id").val();
	var post_data = {"tracking_code":tracking_code,"user_id":user_id};
	$("#new_tracking_code_error").html("Please Wait....").css("color","green");
	facturelyApp.addTrackingCode(post_data);
});

/****
	Function Name : editTrackingCode 
	Parameter : JSON
	Description :
	Response : JSON
****/

$("#edit_tracking_code_form").off();
$("#edit_tracking_code_form").on("submit",function(evt)
{
	evt.preventDefault();
	$("#edit_tracking_code_error").html("");
	var tracking_code = $("#edit_tracking_code").val().trim();
	if(tracking_code=="")
	{
		$("#edit_tracking_code").focus();
		$("#edit_tracking_code_error").html("Tracking Code can't be empty").css("color","red");
		return false;
	}
	var user_id = $("#user_id").val();
	var tracking_code_id = $("#tracking_code_id").val();
	var post_data = {"tracking_code":tracking_code,"user_id":user_id,"tracking_code_id":tracking_code_id};
	$("#edit_tracking_code_error").html("Please Wait....").css("color","green");
	facturelyApp.editTrackingCode(post_data);
});

/****
	Function Name : addNationSlug 
	Parameter : JSON
	Description :
	Response : JSON
****/

$("#nation_slug_form").off();
$("#nation_slug_form").on("submit",function(evt)
{
	evt.preventDefault();
	$("#nation_slug_error").html("");
	var nation_slug = $("#nation_slug").val().trim();
	if(nation_slug=="")
	{
		$("#nation_slug").focus();
		$("#nation_slug_error").html("Nation Slug Can't be empty.").css("color","red");
		return false;
	}
	var user_id = $("#user_id").val();
	var post_data = {"nation_slug":nation_slug,"user_id":user_id};
	$("#nation_slug_error").html("Please Wait....").css("color","green");
	facturelyApp.addNationSlug(post_data);
});

/****
	Function Name : addOrganizationInfo 
	Parameter : JSON
	Description :
	Response : JSON
****/

$("#organization_info_form").off();
$("#organization_info_form").on("submit",function(evt)
{
	evt.preventDefault();
	$("#orgnaization_name_error").html("");
	$("#tax_id_number_error").html("");
	$("#phone_number_error").html("");
	$("#address_street_error").html("");
	$("#address_city_error").html("");
	$("#address_country_error").html("");
	$("#address_state_error").html("");
	$("#organization_contact_name_error").html("");
	
	var orgnaization_name = $("#orgnaization_name").val().trim();
	var tax_id_number = $("#tax_id_number").val().trim();
	var phone_number = $("#phone_number").val().trim();
	var address_street = $("#address_street").val().trim();
	var address_city = $("#address_city").val().trim();
	var address_country = $("#address_country").val().trim();
	var address_state = $("#address_state").val().trim();
	var organization_contact_name = $("#organization_contact_name").val().trim();
	
	var user_id = $("#user_id").val();
	
	if(orgnaization_name=="")
	{
		$("#orgnaization_name").focus();
		$("#orgnaization_name_error").html("Organization Name Can't be empty.").css("color","red");
		return false;
	}
	if(tax_id_number=="")
	{
		$("#tax_id_number").focus();
		$("#tax_id_number_error").html("Tax Id Number Can't be empty.").css("color","red");
		return false;
	}
	if(phone_number=="")
	{
		$("#phone_number").focus();
		$("#phone_number_error").html("Phone Nummber Can't be empty.").css("color","red");
		return false;
	}
	if(address_street=="")
	{
		$("#address_street").focus();
		$("#address_street_error").html("Street Address Can't be empty.").css("color","red");
		return false;
	}
	if(address_city=="")
	{
		$("#address_city").focus();
		$("#address_city_error").html("City Can't be empty.").css("color","red");
		return false;
	}
	if(address_country=="")
	{
		$("#address_country").focus();
		$("#address_country_error").html("Country Can't be empty.").css("color","red");
		return false;
	}
	if(address_state=="")
	{
		$("#address_state").focus();
		$("#address_state_error").html("State Can't be empty.").css("color","red");
		return false;
	}
	if(organization_contact_name=="")
	{
		$("#organization_contact_name").focus();
		$("#organization_contact_name_error").html("Contact Name Can't be empty.").css("color","red");
		return false;
	}
	
	var post_data = {"orgnaization_name":orgnaization_name,"tax_id_number":tax_id_number,"phone_number":phone_number,"address_street":address_street,"address_city":address_city,"address_country":address_country,"address_state":address_state,"organization_contact_name":organization_contact_name,"user_id":user_id};
	$("#organization_info_success").html("Please Wait....").css("color","green");
	facturelyApp.addOrganizationInfo(post_data);
});

/****
	Function Name : saveEmailSettings 
	Parameter : JSON
	Description :
	Response : JSON
****/

$(".save_email_settings").off();
$(".save_email_settings").on("click",function(evt)
{
	
	$(".tab-pane").find(".email_from_address_error").html("");
	$(".tab-pane").find(".email_subject_error").html("");
	$(".tab-pane").find(".email_body_error").html("");
	$(".tab-pane").find(".email_reply_address_error").html("");
	$(".tab-pane").find(".email_bcc_address_error").html("");
	$(".tab-pane").find(".email_setting_success").html("");
	var email_from_address = $(this).closest(".tab-pane").find(".email_from_address").val();
	var email_authenticated = $(this).closest(".tab-pane").find("input[name=email_authenticated]:checked").length;
	var email_bcc_address = $(this).closest(".tab-pane").find(".email_bcc_address").val();
	var email_reply_address = $(this).closest(".tab-pane").find(".email_reply_address").val();
	var email_subject = $(this).closest(".tab-pane").find(".email_subject").val();
	var email_body = $(this).closest(".tab-pane").find(".email_body").val();
	
	
	if (email_from_address=="") {
		$(this).closest(".tab-pane").find(".email_from_address_error").html("Email From can't be empty").css("color","red");
		return false;
	}
	if(!facturelyApp.IsEmail(email_from_address))
	{
		$(this).closest(".tab-pane").find(".email_from_address_error").html("Enter valid email.").css("color","red");
		return false;
	}
	
	if (email_bcc_address!="") {
		if (email_bcc_address.indexOf(',') > -1) {
			var bcc_address_arr = email_bcc_address.split(",");
			$.each(bcc_address_arr,function(key,value){
				if(!facturelyApp.IsEmail(value))
				{
					$(evt.currentTarget).closest(".tab-pane").find(".email_bcc_address_error").html("One of the BCC Email address is not valid.").css("color","red");
					return false;
				}
			}); 
		} else {
			if(!facturelyApp.IsEmail(email_bcc_address))
			{
				$(this).closest(".tab-pane").find(".email_bcc_address_error").html("BCC Email address is not valid.").css("color","red");
				return false;
			}
		}
		
	}
	
	if (email_reply_address!="") {
		if(!facturelyApp.IsEmail(email_reply_address))
		{
			$(this).closest(".tab-pane").find(".email_reply_address_error").html("Reply to address is not valid.").css("color","red");
			return false;
		}
	}
	
	if (email_subject=="") {
		$(this).closest(".tab-pane").find(".email_subject_error").html("Email Subject can't be empty").css("color","red");
		return false;
	}
	if (email_body=="") {
		$(this).closest(".tab-pane").find(".email_body_error").html("Email Body can't be empty").css("color","red");
		return false;
	}
	
	var user_id = $(this).closest(".tab-pane").find(".user_id").val();
	var template_id = $(this).closest(".tab-pane").find(".template_id").val();
	
	var post_data = {"email_from_address":email_from_address,"email_authenticated":email_authenticated,"email_bcc_address":email_bcc_address,"email_reply_address":email_reply_address,"email_subject":email_subject,"email_body":email_body,"user_id":user_id,"template_id":template_id};
	
	$(this).closest(".tab-pane").find(".email_setting_success").html("Please Wait....").css("color","green");
	var email_setting_success_id = $(this).closest(".tab-pane").find(".email_setting_success").attr("id");
	
	facturelyApp.saveEmailSettings(post_data,email_setting_success_id);	
});

/****
	Function Name : saveTemplateTrackingcodes 
	Parameter : JSON
	Description :
	Response : JSON
****/

$(".save_template_trackingcodes").off();
$(".save_template_trackingcodes").on("click",function(evt)
{
	$(".tab-pane").find(".template_trackingcodes_success").html("");
	$(".tab-pane").find(".tracking_codes_error").html("");
	
	var selected_tracking_codes = $(this).closest(".tab-pane").find(".tracking_codes").select2('data');
	if (selected_tracking_codes.length==0) {
		$(this).closest(".tab-pane").find(".tracking_codes_error").html("Select atleast one tracking code").css("color","red");
		return false;
	}
	var tracking_code_arr = [];
	$.each(selected_tracking_codes,function(key,value){
		tracking_code_arr.push(value.id);
	});	
	var tracking_codes = tracking_code_arr.join('|');
	
	var automate_email = $(this).closest(".tab-pane").find("input[name=automate_email]:checked").length;
	var use_sequential_receipt = $(this).closest(".tab-pane").find("input[name=use_sequential_receipt]:checked").length;
	var next_receipt_number = $(this).closest(".tab-pane").find(".next_receipt_number").val();
	
	var user_id = $(this).closest(".tab-pane").find(".user_id").val();
	var template_id = $(this).closest(".tab-pane").find(".template_id").val();
	
	var post_data = {"tracking_codes":tracking_codes,"automate_email":automate_email,"use_sequential_receipt":use_sequential_receipt,"next_receipt_number":next_receipt_number,"user_id":user_id,"template_id":template_id};
	
	$(this).closest(".tab-pane").find(".template_trackingcodes_success").html("Please Wait....").css("color","green");
	var template_trackingcodes_success_id = $(this).closest(".tab-pane").find(".template_trackingcodes_success").attr("id");
	
	facturelyApp.saveTemplateTrackingcodes(post_data,template_trackingcodes_success_id);	
	
});