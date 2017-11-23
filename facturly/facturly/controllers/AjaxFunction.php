<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxFunction extends Main_Controller {
	
	public function deleteRecord()
	{
		if ($_POST) {
			$table = $_POST["table"];
			$column = $_POST["column"];
			$column_value = $_POST["column_value"];
			$this->CM->deleteRecord($table,$column,$column_value);
		} else {
			$response = array("error"=>"1","message"=> "undefine request","record_deleted"=>"0");
		}
	}
	
	public function addTrackingCode()
	{
		if ($_POST) {
			if ( (!empty($_POST["tracking_code"]) && isset($_POST["tracking_code"])) && (!empty($_POST["user_id"]) && isset($_POST["user_id"])) ) { 
				$new_tracking_code = $_POST["tracking_code"];
				$user_id = $_POST["user_id"];
				$codes_where_cond = array("code"=>$new_tracking_code,"user_id"=>$user_id);
				$code_exist_status = $this->CM->checkExistingRecord("tracking_codes",$codes_where_cond);
				if (empty($code_exist_status)) {
					$current_date_time = date("Y-m-d H:i:s");
					
					$new_code_data = array("user_id"=>$user_id,"code"=>$new_tracking_code,"created_on"=>$current_date_time);
					$this->CM->createNewRecord($new_code_data,"tracking_codes");
					$response = array("error"=>"0","message"=> "tracking code added successfully","code_exist"=>"0","code_added"=>"1");
				} else {
					$response = array("error"=>"0","message"=> "tracking code already exists","code_exist"=>"1","code_added"=>"0");
				}
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters","code_exist"=>"0","code_added"=>"0");
			}
			
		} else {
			$response = array("error"=>"1","message"=> "undefine request","code_exist"=>"0","code_added"=>"0");
		}
		
		echo json_encode($response);
		die();
	}
	
	public function editTrackingCode()
	{
		if ($_POST) {
			if ( (!empty($_POST["tracking_code"]) && isset($_POST["tracking_code"])) && (!empty($_POST["user_id"]) && isset($_POST["user_id"])) && (!empty($_POST["tracking_code_id"]) && isset($_POST["tracking_code_id"])) ) { 
				$new_tracking_code = $_POST["tracking_code"];
				$user_id = $_POST["user_id"];
				$tracking_code_id = $_POST["tracking_code_id"];
				$codes_where_cond = array("code"=>$new_tracking_code,"user_id"=>$user_id);
				$code_exist_status = $this->CM->checkExistingRecord("tracking_codes",$codes_where_cond);
				if (empty($code_exist_status)) {
					$current_date_time = date("Y-m-d H:i:s");
					
					$new_code_data = array("code"=>$new_tracking_code,"modified_on"=>$current_date_time);
					$this->CM->updateRecord("tracking_codes","id",$tracking_code_id,$new_code_data);
					$response = array("error"=>"0","message"=> "tracking code updated successfully","code_exist"=>"0","code_updated"=>"1");
				} else {
					$response = array("error"=>"0","message"=> "tracking code already exists","code_exist"=>"1","code_updated"=>"0");
				}
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters","code_exist"=>"0","code_updated"=>"0");
			}
			
		} else {
			$response = array("error"=>"1","message"=> "undefine request","code_exist"=>"0","code_added"=>"0");
		}
		
		echo json_encode($response);
		die();
	}
	
	public function addNationSlug()
	{
		if ($_POST) {
			if ( (!empty($_POST["nation_slug"]) && isset($_POST["nation_slug"])) ) { 
				$nation_slug = $_POST["nation_slug"];
				$user_id = $_POST["user_id"];
				$nations_where_cond = array("user_id"=>$user_id);
				$nation_exist_status = $this->CM->checkExistingRecord("nations",$nations_where_cond);
				$current_date_time = date("Y-m-d H:i:s");
				if (empty($nation_exist_status)) {
					$new_nation_data = array("user_id"=>$user_id,"slug"=>$nation_slug,"created_on"=>$current_date_time);
					$this->CM->createNewRecord($new_nation_data,"nations");
					$response = array("error"=>"0","message"=> "nation saved successfully","nation_added"=>"1");
				} else {
					$nation_id = $nation_exist_status[0]->id;
					$new_nation_data = array("slug"=>$nation_slug,"modified_on"=>$current_date_time);
					$this->CM->updateRecord("nations","id",$nation_id,$new_nation_data);
					$response = array("error"=>"0","message"=> "nation updated successfully","nation_updated"=>"1");
				}
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters");
			}
			
		} else {
			$response = array("error"=>"1","message"=> "undefine request");
		}
		
		echo json_encode($response);
		die();
	}
	
	public function addOrganizationInfo()
	{
		if ($_POST) {
			if ( (!empty($_POST["orgnaization_name"]) && isset($_POST["orgnaization_name"])) && (!empty($_POST["organization_contact_name"]) && isset($_POST["organization_contact_name"])) ) { 
				$name = $_POST["orgnaization_name"];
				$tax_id_number = $_POST["tax_id_number"];
				$phone = $_POST["phone_number"];
				$street_address = $_POST["address_street"];
				$city = $_POST["address_city"];
				$country = $_POST["address_country"];
				$state = $_POST["address_state"];
				$contact_name = $_POST["organization_contact_name"];
				$user_id = $_POST["user_id"];
				$organization_where_cond = array("user_id"=>$user_id);
				$organization_exist_status = $this->CM->checkExistingRecord("organizations",$organization_where_cond);
				$current_date_time = date("Y-m-d H:i:s");
				if (empty($organization_exist_status)) {
					$new_organization_data = array("user_id"=>$user_id,"name"=>$name,"tax_id_number"=>$tax_id_number,"phone"=>$phone,"street_address"=>$street_address,"city"=>$city,"country"=>$country,"state"=>$state,"contact_name"=>$contact_name,"created_on"=>$current_date_time);
					$this->CM->createNewRecord($new_organization_data,"organizations");
					$response = array("error"=>"0","message"=> "organization info saved successfully","organization_added"=>"1");
				} else {
					$oragnization_id = $organization_exist_status[0]->id;
					$new_organization_data = array("name"=>$name,"tax_id_number"=>$tax_id_number,"phone"=>$phone,"street_address"=>$street_address,"city"=>$city,"country"=>$country,"state"=>$state,"contact_name"=>$contact_name,"modified_on"=>$current_date_time);
					$this->CM->updateRecord("organizations","id",$oragnization_id,$new_organization_data);
					$response = array("error"=>"0","message"=> "organization info updated successfully","organization_updated"=>"1");
				}
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters");
			}
			
		} else {
			$response = array("error"=>"1","message"=> "undefine request");
		}
		
		echo json_encode($response);
		die();
	}
	
	public function saveEmailSettings()
	{
		if ($_POST) {
			if ( (!empty($_POST["email_from_address"]) && isset($_POST["email_from_address"])) && (!empty($_POST["email_subject"]) && isset($_POST["email_subject"])) && (!empty($_POST["email_body"]) && isset($_POST["email_body"])) ) { 
				$user_id = $_POST["user_id"];
				$template_id = $_POST["template_id"];
				$email_authenticated = $_POST["email_authenticated"];
				$from_address = $_POST["email_from_address"];
				$reply_to = $_POST["email_reply_address"];
				$bcc_address = $_POST["email_bcc_address"];
				$email_subject = $_POST["email_subject"];
				$email_body = $_POST["email_body"];
				
				if (!empty($bcc_address)) {
					if (strpos($bcc_address, ',') !== false) {
						$bcc_address = str_replace(",","|",$bcc_address);
					}
				}
				
				$email_setting_where_cond = array("user_id"=>$user_id,"template_id"=>$template_id);
				$email_setting_exist_status = $this->CM->checkExistingRecord("email_settings",$email_setting_where_cond);
				$current_date_time = date("Y-m-d H:i:s");
				if (empty($email_setting_exist_status)) {
					$new_email_setting_data = array("user_id"=>$user_id,"template_id"=>$template_id,"email_authenticated"=>$email_authenticated,"from_address"=>$from_address,"reply_to"=>$reply_to,"bcc_address"=>$bcc_address,"email_subject"=>$email_subject,"email_body"=>$email_body,"created_on"=>$current_date_time);
					$this->CM->createNewRecord($new_email_setting_data,"email_settings");
					$response = array("error"=>"0","message"=> "email settings saved successfully","settings_added"=>"1");
				} else {
					$email_setting_id = $email_setting_exist_status[0]->id;
					$new_email_setting_data = array("email_authenticated"=>$email_authenticated,"from_address"=>$from_address,"reply_to"=>$reply_to,"bcc_address"=>$bcc_address,"email_subject"=>$email_subject,"email_body"=>$email_body,"modified_on"=>$current_date_time);
					$this->CM->updateRecord("email_settings","id",$email_setting_id,$new_email_setting_data);
					$response = array("error"=>"0","message"=> "email settings updated successfully","settings_updated"=>"1");
				}
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters");
			}
			
		} else {
			$response = array("error"=>"1","message"=> "undefine request");
		}
		
		echo json_encode($response);
		die();
	}
	
	public function saveTemplateTrackingcodes()
	{
		if ($_POST) {
			if ( (!empty($_POST["tracking_codes"]) && isset($_POST["tracking_codes"])) && (!empty($_POST["user_id"]) && isset($_POST["user_id"])) && (!empty($_POST["template_id"]) && isset($_POST["template_id"])) ) { 
				$user_id = $_POST["user_id"];
				$template_id = $_POST["template_id"];
				$tracking_codes = $_POST["tracking_codes"];
				$automate_email = $_POST["automate_email"];
				$use_sequential_receipt = $_POST["use_sequential_receipt"];
				$next_receipt_number = $_POST["next_receipt_number"];
								
				$template_trackingcode_where_cond = array("user_id"=>$user_id,"template_id"=>$template_id);
				$template_trackingcode_exist_status = $this->CM->checkExistingRecord("trackingcode_templates",$template_trackingcode_where_cond);
				$current_date_time = date("Y-m-d H:i:s");
				if (empty($template_trackingcode_exist_status)) {
					$new_template_trackingcode_data = array("user_id"=>$user_id,"template_id"=>$template_id,"automatic_email"=>$automate_email,"sequential_receipt"=>$use_sequential_receipt,"next_receipt"=>$next_receipt_number,"tracking_codes"=>$tracking_codes,"created_on"=>$current_date_time);
					$this->CM->createNewRecord($new_template_trackingcode_data,"trackingcode_templates");
					$response = array("error"=>"0","message"=> "template settings saved successfully","settings_added"=>"1");
					$this->session->set_flashdata('action_message', 'Template settings saved successfully');
				} else {
					$template_trackingcode_id = $template_trackingcode_exist_status[0]->id;
					$new_template_trackingcode_data = array("automatic_email"=>$automate_email,"sequential_receipt"=>$use_sequential_receipt,"next_receipt"=>$next_receipt_number,"tracking_codes"=>$tracking_codes,"modified_on"=>$current_date_time);
					$this->CM->updateRecord("trackingcode_templates","id",$template_trackingcode_id,$new_template_trackingcode_data);
					$response = array("error"=>"0","message"=> "template settings updated successfully","settings_updated"=>"1");
					$this->session->set_flashdata('action_message', 'Template settings updated successfully');
				}
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters");
				$this->session->set_flashdata('error_message', 'Invalid Parameters');
			}
			
		} else {
			$response = array("error"=>"1","message"=> "undefine request");
			$this->session->set_flashdata('error_message', 'Undefine Request');
		}
		
		echo json_encode($response);
		die();
	}
}
