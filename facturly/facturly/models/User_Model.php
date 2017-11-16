<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
	
	/********************************
		Check user against email id
	*********************************/
	public function checkExistingUser($email)
	{
		$where_cond = array("email"=>$email);
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where($where_cond);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			$return = $query->result();
		} else {
			$return = array();
		}
		return $return;
	}
	
	/********************************
		validate user login
	*********************************/	
	function validateUser($email,$password)
	{
		$where_cond = array("email"=>$email);
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where($where_cond);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$result = $query->result();
			$db_password = $result[0]->password;

			$id = $result[0]->id;
			
			if (password_verify($password, $db_password)) {
			
				$this->session->set_userdata(array("user_id"=>$id));
				$response = array("mail_exist"=>"1","valid_pass"=>"1");
				
			} else {
				$response = array("mail_exist"=>"1","valid_pass"=>"0");
			}
		}
		else
		{
			$response = array("mail_exist"=>"0","valid_pass"=>"0");
		}
		return $response;
	}
}
