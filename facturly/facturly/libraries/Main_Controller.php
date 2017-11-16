<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

/**
 * @subpackage      Controllers
 */
class Main_Controller extends CI_Controller
{
	protected $userRole;
	function Main_Controller()
	{
		parent::__construct();
		/*Load Base Codeigniter Files*/
		$this->load->database();

		/*Load Libraries*/
		$this->load->library("session");	##Load Session Class
		$this->load->library("email");		##Load Email Class

		/*Load Helpers*/
		$this->load->helper('url');		##Load URL Helper
		$this->load->helper("form");	##Load Form Helper

		/*Load Base Prop Files
		$this->load->config("prop");*/

		/*view container files*/

		/*Load different models*/
		$this->load->model("User_Model","UM");
		$this->load->model("Common_Model","CM");
	}

	function checkloginsession() {
		if(!($this->session->userdata("user_id"))){
			redirect("Login/","refresh");
		}
	}

	function userSessionExist() {
		if(($this->session->userdata("user_id"))){
			redirect("Dashboard/","refresh");
		}
	}

/**Start Functions for Random String Generator**/
function crypto_rand_secure($min, $max)
{
	$range = $max - $min;
	if ($range < 1) return $min; // not so random...
	$log = ceil(log($range, 2));
	$bytes = (int) ($log / 8) + 1; // length in bytes
	$bits = (int) $log + 1; // length in bits
	$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
	do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits
	} while ($rnd > $range);
	return $min + $rnd;
}

function getToken($length)
{
	$token = "";
	$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	$codeAlphabet.= "0123456789";
	$max = strlen($codeAlphabet); // edited

	for ($i=0; $i < $length; $i++) {
			$token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
	}

	return $token;
}
	/**End Functions for Random String Generator**/

}
/* End of Main_controller.php */
/* Location: ./style/libraries/Main_Controller.php */
