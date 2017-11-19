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
}
