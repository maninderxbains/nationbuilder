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
		$client->setRedirectUri(GOOGLE_REDIRECT_URI);
		
		if(isset($_GET['code'])){
			/*$service = new Google_Service_Plus($client);*/
			$oauth2 = new Google_Service_Oauth2($client);
			$client->authenticate($_GET['code']);
			/*$_SESSION['token'] = $api->getAccessToken();*/
			$client_token = $client->getAccessToken();
			$client->setAccessToken($client_token);
		/*	$user_profile = $service->people->get('me');
			print_r($user_profile);	*/
			$user_data = $oauth2->userinfo->get();
			
			$first_name = $user_data["givenName"];
			$last_name = $user_data["familyName"];
			$email = $user_data["email"];
			$gender = $user_data["gender"];
			$oauth_uid = $user_data["id"];
			$locale = $user_data["locale"];
			
			$current_date_time = date("Y-m-d H:i:s");
			
		/*	$random_pass = $this->getToken(10);	*/
			
			$new_record_data = array("email"=>$email,"first_name"=>$first_name,"last_name"=>$last_name,"oauth_provider"=>"google","oauth_uid"=>$oauth_uid,"gender"=>$gender,"locale"=>$locale,"group_id"=>"3","email_verified"=>"1","created_on"=>$current_date_time,"last_loggged_in"=>$current_date_time);
			
			$existing_user_status = $this->UM->checkExistingUser($email);
			
			if (empty($existing_user_status)) {
				$new_user_id = $this->CM->createNewRecordWithId($new_record_data,"users");
				$this->session->set_userdata(array("user_id"=>$new_user_id));
			} else {
				$email_verification_status = $existing_user_status[0]->email_verified;
				$existing_user_id = $existing_user_status[0]->id;
				if ($email_verification_status==0) {
					$update_record_data = array("email_verified"=>"1");
					$this->CM->updateRecord("users","id",$existing_user_id,$update_record_data);
				}
				$this->session->set_userdata(array("user_id"=>$existing_user_id));
			}
			redirect("dashboard/","refresh");
			
		}
		
		$data["oauth_error"] = "";
		if(isset($_GET['error'])){
			$data["oauth_error"] = $_GET['error'];
		}
		
		$auth_url = $client->createAuthUrl();
		$data["auth_url"] = $auth_url;
		$this->load->view('theme/login_container',$data);
	}
	
	public function validateUser () 
	{
		if ($_POST) {
			if ( (!empty($_POST["email"]) && isset($_POST["email"])) && (!empty($_POST["password"]) && isset($_POST["password"])) ) { 
				$email = $_POST["email"];
				$password = $_POST["password"];
				
				$validate_status = $this->UM->validateUser($email,$password);
				if ($validate_status["mail_exist"]==0 && $validate_status["valid_pass"]==0) {
					$response = array("error"=>"0","message"=> "no record found","email_exist"=>"0","user_authenticate"=>"0");
				} else if ($validate_status["mail_exist"]==1 && $validate_status["valid_pass"]==0) {
					$response = array("error"=>"0","message"=> "incorrect password","email_exist"=>"1","user_authenticate"=>"0");
				} else if ($validate_status["mail_exist"]==1 && $validate_status["valid_pass"]==1) {
					$response = array("error"=>"0","message"=> "login successful","email_exist"=>"1","user_authenticate"=>"1");
				}
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters","email_exist"=>"0","user_authenticate"=>"0");
			}
		} else {
			$response = array("error"=>"1","message"=> "undefine request","email_exist"=>"0","user_authenticate"=>"0");
		}
		
		echo json_encode($response);
		die();
	}
	
	public function registerUser () 
	{
		if ($_POST) {
			if ( (!empty($_POST["name"]) && isset($_POST["name"])) && (!empty($_POST["email"]) && isset($_POST["email"]))  && (!empty($_POST["password"]) && isset($_POST["password"])) && (!empty($_POST["nation"]) && isset($_POST["nation"])) ) {
				$name = $_POST["name"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$nation = $_POST["nation"];
				$current_date_time = date("Y-m-d H:i:s");
				$users_where_cond = array("email"=>$email);
				$email_exist_status = $this->CM->checkExistingRecord("users",$users_where_cond);
				
				if (empty($email_exist_status)) {
					$nations_where_cond = array("slug"=>$nation);
					$nationslug_exists = $this->CM->checkExistingRecord("nations",$nations_where_cond);
					if (empty($nationslug_exists)) {
						
						$password = password_hash($password, PASSWORD_DEFAULT);
						$new_user_data = array("email"=>$email,"password"=>$password,"complete_name"=>$name,"group_id"=>"3","group_id"=>"3","created_on"=>$current_date_time);
						$new_user_id = $this->CM->createNewRecordWithId($new_user_data,"users");
						$new_nation_data = array("user_id"=>$new_user_id,"slug"=>$nation);
						$response = array("error"=>"0","message"=> "registered_successfully,login to continue","email_exist"=>"0","nationslug_exist"=>"0","user_registered"=>"1");
					} else {
						$response = array("error"=>"0","message"=> "nation slug already registered","email_exist"=>"0","nationslug_exist"=>"1","user_registered"=>"0");
					}
					
				} else {
					$response = array("error"=>"0","message"=> "user exists with this email","email_exist"=>"1","nationslug_exist"=>"0","user_registered"=>"0");
				}
				
			} else {
				$response = array("error"=>"1","message"=> "invalid parameters","email_exist"=>"0","nationslug_exist"=>"0","user_registered"=>"0");
			}
		} else {
			$response = array("error"=>"1","message"=> "undefine request","email_exist"=>"0","nationslug_exist"=>"0","user_registered"=>"0");
		}
		echo json_encode($response);
		die();
	}
	
	public function logout() 
	{
		$this->session->unset_userdata("user_id");

		$this->session->sess_destroy();

		redirect("Login/");
	}
}
