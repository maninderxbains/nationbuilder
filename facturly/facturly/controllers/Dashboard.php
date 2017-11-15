<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Main_Controller {
	
	public function index()
	{
		$this->checkloginsession();
		$this->load->view('theme/login_container');
	}
}
