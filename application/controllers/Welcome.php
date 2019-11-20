<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Welcome extends CI_Controller //This is the main controller. Entry Point
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

	public function index()		// Main Index Function
	{
		if (!$this->session->userdata('userdata')) {
			$this->load->view('auth_page', $this->arr);
		} else {
			$memberName = $this->session->userdata('userdata')["username"];
			$this->arr = array(
				'memberInfo' => $this->User->findUser($memberName),
				'memberPosts' => $this->Post->userPosts($memberName),
				'memberFollowDetails' => $this->Followings->getFollowCounts($memberName),
				'memberGenres' => $this->Genre->getUserGenres($memberName),
				'friendsCount' => count($this->User->getQueryFriends()),
				'genreList' => $this->Genre->loadGenres(),
				'allPosts' => $this->Post->loadHomePosts()
			);
			$this->loadAllPosts();
		}
	}

	public function loadPostView()	// Load the create post page
	{
		$this->load->view("create_post");
	}

	public function displaySearch()
	{
		$this->load->view("search_people", $this->arr);
	}

	public function retrieveLoadSearchData($genre_id){ 		// Controller Function to load user list in a specific genre
		$this->arr["userGenres"] = $this->User->filterUsers($genre_id);
		if($this->arr["userGenres"]){
			foreach($this->arr["userGenres"] as &$user){
				$isFollowed = $this->Followings->checkFollow($user["username"], $this->session->userdata('userdata')["username"]);
				$user["isFollowed"] = $isFollowed; 
			}
		}
		$this->arr["genreId"] = $genre_id;
		$this->load->view("search_people", $this->arr);
	}
	
	public function loadAllPosts()		//Controller Function to load home page
	{
		$this->load->view("home",  $this->arr);
	}


	public function routeSearch()	    // Controller Function to capture genre Id in two ways (URL segment or form inputs)
	{
		if($this->input->get("genreId")){
			$this->retrieveLoadSearchData($this->input->get("genreId"));
		}
		else {
			$this->retrieveLoadSearchData($this->uri->segment(3));
		}
	}
}
