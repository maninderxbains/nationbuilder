<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trackingcode extends Main_Controller {
	
	public function index()
	{
		$this->checkloginsession();
		$user_id = $this->session->userdata("user_id");
		$data["page"] = "tracking_code/list.php";
		$data["page_title"] = "Tracking Code";
		$data["user_id"] = $user_id;
		$table_name = "tracking_codes";
		$where_cond = array("user_id"=>$user_id);
		$data['tracking_codes_arr'] = $this->CM->getRecordList($table_name,$where_cond);
		$this->load->view('theme/dashboard_container',$data);
	}
	
	public function add()
	{
		$this->checkloginsession();
		$data["page"] = "tracking_code/add.php";
		$data["page_title"] = "Add | Tracking Code";
		$user_id = $this->session->userdata("user_id");
		$data["user_id"] = $user_id;
		$this->load->view('theme/dashboard_container',$data);
	}
	
	public function edit()
	{
		$this->checkloginsession();
		$tracking_code_id = $this->uri->segment(3);
		$user_id = $this->session->userdata("user_id");
		$data["user_id"] = $user_id;
		$codes_where_cond = array("user_id"=>$user_id,"id"=>$tracking_code_id);
		$tracking_code_data = $this->CM->checkExistingRecord("tracking_codes",$codes_where_cond);
		if (empty($tracking_code_data)) {
			$this->session->set_flashdata('action_message','Invalid Request'); 
			redirect("trackingcode/","refresh");
		} 
		$data["page"] = "tracking_code/edit.php";
		$data["page_title"] = "Edit | Tracking Code";
		$data['tracking_code_data'] = $tracking_code_data;
		$this->load->view('theme/dashboard_container',$data);
	}
}
