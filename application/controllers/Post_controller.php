<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Post_controller extends CI_Controller
{
	public $arr;
	public function __construct()
	{
		parent::__construct();
		// placing it here should work as the parent class has added that property
		// during it's own constructor
		$this->load->model("Post");
	}


	public function createPost()  // Create Post 
	{
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$this->Post->createNewPost($title, $description, null);
		//Discussed with Simon
		echo "<script>
					alert('Post created successfully');
					window.location.href=\"" . base_url("index.php/welcome/") . "\";
			  </script>";
	}
}
