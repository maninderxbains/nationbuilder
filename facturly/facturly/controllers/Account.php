<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Main_Controller {
	
	public function index()
	{
		$this->checkloginsession();
		$data["page"] = "account_settings.php";
		$data["page_title"] = "Account Settings";
		$user_id = $this->session->userdata("user_id");
		$data["user_id"] = $user_id;
		$nations_where_cond = array("user_id"=>$user_id);
		$data["nation_slug"] = $this->CM->getRecordList("nations",$nations_where_cond);
		$organization_info = $this->CM->getRecordList("organizations",$nations_where_cond);
		$data["organization_info"] = $organization_info;
		if (!empty($organization_info)) {
			$data["organization_name"] = $organization_info[0]->name;
			$data["organization_tax_id_number"] = $organization_info[0]->tax_id_number;
			$data["organization_phone"] = $organization_info[0]->phone;
			$data["organization_street_address"] = $organization_info[0]->street_address;
			$data["organization_city"] = $organization_info[0]->city;
			$data["organization_country"] = $organization_info[0]->country;
			$data["organization_state"] = $organization_info[0]->state;
			$data["organization_contact_name"] = $organization_info[0]->contact_name;
		} else {
			$data["organization_name"] = "";
			$data["organization_tax_id_number"] = "";
			$data["organization_phone"] = "";
			$data["organization_street_address"] = "";
			$data["organization_city"] = "";
			$data["organization_country"] = "";
			$data["organization_state"] = "";
			$data["organization_contact_name"] = "";
		}
		$this->load->view('theme/dashboard_container',$data);
	}
	
	public function email () {
		$this->checkloginsession();
		$user_id = $this->session->userdata("user_id");
		
		$template_where_cond = array("status"=>"1");
		$active_template_arr = $this->CM->getRecordList("templates",$template_where_cond);
		$template_arr = array();
		if (!empty($active_template_arr)) {
			foreach ($active_template_arr as $key=>$value) {
				$template_id = $value->id;
				$template_arr[$key]["template_id"] = $template_id;
				$template_arr[$key]["template_name"] = $value->name;
				$email_setting_where_cond = array("user_id"=>$user_id,"template_id"=>$template_id);
				$template_email_setting = $this->CM->getRecordList("email_settings",$email_setting_where_cond);
				if (empty($template_email_setting)) {
					$template_arr[$key]["email_authenticated"] = "";
					$template_arr[$key]["from_address"] = "";
					$template_arr[$key]["reply_to"] = "";
					$template_arr[$key]["bcc_address"] = "";
					$template_arr[$key]["email_subject"] = "";
					$template_arr[$key]["email_body"] = "";
				} else {
					$template_arr[$key]["email_authenticated"] = $template_email_setting[0]->email_authenticated;
					$template_arr[$key]["from_address"] = $template_email_setting[0]->from_address;
					$template_arr[$key]["reply_to"] = $template_email_setting[0]->reply_to;
					$bcc_address = $template_email_setting[0]->bcc_address;
					if (!empty($bcc_address)) {
						if (strpos($bcc_address, '|') !== false) {
							$bcc_address = str_replace("|",",",$bcc_address);
						}
					}
					$template_arr[$key]["bcc_address"] = $bcc_address;
					$template_arr[$key]["email_subject"] = $template_email_setting[0]->email_subject;
					$template_arr[$key]["email_body"] = $template_email_setting[0]->email_body;
				}	
			}
		}
		
		$data["user_id"] = $user_id;
		$data["page"] = "account_email.php";
		$data["page_title"] = "Email Settings";
		$data["template_arr"] = $template_arr;
		$this->load->view('theme/dashboard_container',$data);
	}
	
	public function template () {
		$this->checkloginsession();
		$user_id = $this->session->userdata("user_id");
		
		$trackingcode_where_cond = array("user_id"=>$user_id);
		$user_tracking_codes = $this->CM->getRecordList("tracking_codes",$trackingcode_where_cond);
		
		$user_tracking_codes_names = array();
		$user_tracking_codes_ids = array();
		if (!empty($user_tracking_codes)) {
			$user_tracking_codes = json_decode(json_encode($user_tracking_codes), true);
			foreach ($user_tracking_codes as $key=>$value) {
				$user_tracking_codes_names[$value["id"]] = $value["code"];
				$user_tracking_codes_ids[] = $value["id"];
			}
		}
		
		$user_existing_trackingcode_where_cond = array("user_id"=>$user_id);
		$existing_tracking_codes_user = $this->CM->getRecordList("trackingcode_templates",$user_existing_trackingcode_where_cond);
		$user_existing_tracking_codes = array();
		if (!empty($existing_tracking_codes_user)) {
			foreach ($existing_tracking_codes_user as $key=>$value) {
				$template_tracking_code = $value->tracking_codes;
				if ($template_tracking_code!=="") {
					if (strpos($template_tracking_code, '|') !== false) {
					$explode_template_tracking_code = explode("|",$template_tracking_code);
						foreach ($explode_template_tracking_code as $explode_tracking_code) {
							$user_existing_tracking_codes[] = $explode_tracking_code;
						}
					} else {
						$user_existing_tracking_codes[] = $template_tracking_code;
					}
				}
				
			}
		}		 
		
		if (!empty($user_existing_tracking_codes)) {
			$available_tracking_codes = array_diff($user_tracking_codes_ids, $user_existing_tracking_codes);
			$available_tracking_codes = array_values($available_tracking_codes);
		} else {
			$available_tracking_codes = $user_tracking_codes_ids;
		}
		
		$template_where_cond = array("status"=>"1");
		$active_template_arr = $this->CM->getRecordList("templates",$template_where_cond);
		$template_arr = array();
		if (!empty($active_template_arr)) {
			foreach ($active_template_arr as $key=>$value) {
				$template_id = $value->id;
				$template_arr[$key]["template_id"] = $template_id;
				$template_arr[$key]["template_name"] = $value->name;
				$template_arr[$key]["template_message"] = $value->message;
				$trackingcode_master_where_cond = array("user_id"=>$user_id,"template_id"=>$template_id);
				$trackingcode_master = $this->CM->getRecordList("trackingcode_templates",$trackingcode_master_where_cond);
				if (empty($trackingcode_master)) {
					$template_arr[$key]["automatic_email"] = "";
					$template_arr[$key]["sequential_receipt"] = "";
					$template_arr[$key]["next_receipt"] = "";
					$template_arr[$key]["existing_tracking_code"] = array();
					$template_arr[$key]["available_tracking_code"] = $available_tracking_codes;
				} else {
					$trackingcode_template_master_id = $trackingcode_master[0]->id;
					$template_arr[$key]["automatic_email"] = $trackingcode_master[0]->automatic_email;
					$template_arr[$key]["sequential_receipt"] = $trackingcode_master[0]->sequential_receipt;
					$template_arr[$key]["next_receipt"] = $trackingcode_master[0]->next_receipt;
					
					$template_arr[$key]["existing_tracking_code"] = array();
					$template_arr[$key]["existing_tracking_code"] = array();
					$tacking_codes = $trackingcode_master[0]->tracking_codes;
					if ($tacking_codes!="") {
						if (strpos($tacking_codes, '|') !== false) {
							$explode_tacking_codes = explode("|",$tacking_codes);
							$template_arr[$key]["existing_tracking_code"] = $explode_tacking_codes;
						} else {
							$template_arr[$key]["existing_tracking_code"][] = $tacking_codes;
						}
					}
					
					$template_arr[$key]["available_tracking_code"] = $available_tracking_codes;
				}
			}
		}
		
		
		$data["user_tracking_codes_names"] = $user_tracking_codes_names;
		$data["user_id"] = $user_id;
		$data["page"] = "account_template.php";
		$data["page_title"] = "Template Settings";
		$data["template_arr"] = $template_arr;
		$this->load->view('theme/dashboard_container',$data);
	}
}
