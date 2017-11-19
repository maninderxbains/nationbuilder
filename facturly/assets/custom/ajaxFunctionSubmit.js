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