<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Main_Controller {
	
	public function index()
	{
		$this->checkloginsession();
		$data["page"] = "receipt/not_sent.php";
		$data["page_title"] = "Receipts Not Sent";
		$this->load->view('theme/dashboard_container',$data);
	}
}
