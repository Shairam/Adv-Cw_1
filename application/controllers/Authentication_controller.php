<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Authentication_controller extends CI_Controller
{

	public function __construct()
	{
		// placing it here fails: $this has no `load` property yet.
		// $this->load->database(); <!-- NO WAY JOSÉ!
		parent::__construct();
		// placing it here should work as the parent class has added that property
		// during it's own constructor
		$this->load->database();
		$this->load->model("User");
		$this->load->model("Genre");
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function registerUser()
	{
		$result = $this->User->createUser(
			$this->input->post("username"),
			$this->input->post("password"),
			$this->input->post("email"),
			$this->input->post("fname"),
			$this->input->post("lname"),
			$this->input->post("imgURL"),
			$this->input->post("genres")
		);

		if ($result === 1062) {
			$arr = $this->Genre->loadGenres();
			$this->load->view("welcome_message", $arr);
		} else {
			redirect("welcome/");
		}
	}

	public function signInUser()
	{
		$userData = $this->User->validateSignIn($this->input->post("username"), $this->input->post("password"));
		if (isset($userData)) {

			$newdata = array(
				'username'  => $userData->username,
				'firstname' => $userData->firstname,
				'lastname'  => $userData->lastname,
				'imageURL'  => $userData->imageURL,
				//'email'   => $userData->email,
				'dob' => $userData->dob,
				'logged_in' => TRUE
			);

			$this->session->set_userdata('userdata', $newdata);
			redirect("welcome/");
		} else {
			redirect("welcome/");
		}
	}

	public function logoutuser()
	{
		$this->session->sess_destroy();
		redirect("welcome/");
	}
}
