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
		$this->load->view('theme/dashboard_container',$data);
	}
}
