<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Main_Controller {
	
	public function __construct () {
		parent::__construct();
		$this->load->library("google");
	}
	
	public function index()
	{
		$this->userSessionExist();
		$client = new Google_Client();
		$client->setApplicationName(GOOGLE_OAUTH_APPLICATION_NAME);
		$client->setClientId(GOOGLE_OAUTH_CLIENT_ID);
		$client->setClientSecret(GOOGLE_OAUTH_CLIENT_SECRET);
		$client->setAccessType('online');
		$client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile'));
		$client->setRedirectUri('http://localhost/facturly/login');
		
		if(isset($_GET['code'])){
			$service = new Google_Service_Plus($client);
			$oauth2 = new Google_Service_Oauth2($client);
			$client->authenticate($_GET['code']);
			/*$_SESSION['token'] = $api->getAccessToken();*/
			$client_token = $client->getAccessToken();
			$client->setAccessToken($client_token);
			$data = $service->people->get('me');
			$user_data = $oauth2->userinfo->get();
		}
		
		$data["oauth_error"] = "";
		if(isset($_GET['error'])){
			$data["oauth_error"] = $_GET['error'];
		}
		
		$auth_url = $client->createAuthUrl();
		$data["auth_url"] = $auth_url;
		$this->load->view('theme/login_container',$data);
	}
	
	public function logout() {
		$this->session->unset_userdata("user_id");

		$this->session->sess_destroy();

		redirect("Login/");
	}
}
