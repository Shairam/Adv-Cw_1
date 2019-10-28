<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Welcome extends CI_Controller
{
	public $arr;
	public function __construct()
	{
		// placing it here fails: $this has no `load` property yet.
		// $this->load->database(); <!-- NO WAY JOSÉ!
		parent::__construct();
		// placing it here should work as the parent class has added that property
		// during it's own constructor

		$this->load->model("Genre");
		$this->arr["genreList"] = $this->Genre->loadGenres();
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
	public function index()
	{
		if (!$this->session->userdata('userdata')) {
			$this->load->view('welcome_message',$this->arr);
		} else {
			$this->arr["strGenre"] = $this->getUserGenres();
			$this->load->view('profile',$this->arr);
		}
	}

	public function validateLogin()
	{
		$username = $this->input->post("username");
		$hashedPass = password_hash($this->input->post("username"), PASSWORD_DEFAULT);

		$result = $this->load->model("Authentication");
	}

	public function getUserGenres(){
		$strGenre = [];
		foreach($this->arr["genreList"] as $genreItem ){
			if(in_array($genreItem["genre_id"], $this->Genre->loadUserGenres())){
				$strGenre[ ]= $genreItem["name"];
			}	
		}
		return implode(', ', $strGenre);
	}
}