<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Post_controller extends CI_Controller
{
	public $arr;
	public function __construct()
	{
		// placing it here fails: $this has no `load` property yet.
		// $this->load->database(); <!-- NO WAY JOSÉ!
		parent::__construct();
		// placing it here should work as the parent class has added that property
		// during it's own constructor

		date_default_timezone_set('Europe/London');
		$this->load->model("Genre");
		$this->load->model("Followings");
		$this->load->model("Post");
		$this->load->model("User");
		$this->arr["genreList"] = $this->Genre->loadGenres();
		$this->arr["allPosts"] = $this->Post->loadHomePosts();
    }
    
    
	public function createPost()  // Create Post 
	{

		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$this->Post->createNewPost($title, $description);
	}
}
