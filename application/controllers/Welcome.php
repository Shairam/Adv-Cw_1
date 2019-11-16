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
		date_default_timezone_set('Europe/London');
		$this->load->model("Genre");
		$this->load->model("Followings");
		$this->load->model("Post");
		$this->load->model("User");
		$this->load->library('user_agent');
		$this->arr["genreList"] = $this->Genre->loadGenres();
		$this->arr["allPosts"] = $this->Post->loadHomePosts();
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
			$this->load->view('welcome_message', $this->arr);
		} else {
			$this->arr["genreList"] = $this->Genre->loadGenres();
			$this->arr["postsData"] = $this->Post->userPosts($this->session->userdata('userdata')["username"]);
			$this->loadAllPosts();
		}
	}

	public function validateLogin()
	{
		$username = $this->input->post("username");
		$hashedPass = password_hash($this->input->post("username"), PASSWORD_DEFAULT);

		$result = $this->load->model("Authentication");
	}


	public function loadPostView()
	{
		$this->load->view("create_post");
	}

	public function loadProfile()
	{
		$this->arr["strGenre"] = $this->Genre->getUserGenres($this->session->userdata('userdata')["username"]);
		$this->arr["postsData"] = $this->Post->userPosts($this->session->userdata('userdata')["username"]);
		$this->arr["followDetails"] = $this->Followings->getFollowCounts($this->session->userdata('userdata')["username"]);
		$this->load->view("profile", $this->arr);
	}

	public function createPost()
	{

		$imageArr = $this->User->testImagesView("myInputs");
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		if ($imageArr == null) {
			echo "<script>
					alert('Please Check your uploading images URL');
					window.location.href=\"" . base_url("index.php/welcome/loadPostView") . "\";
				</script>";
			
		} else if ($imageArr[0] == "") { 
			$this->Post->createNewPost($title, $description, null);
			echo "<script>
					alert('Post created successfully');
					window.location.href=\"" . base_url() . "\";
				</script>";
		} else {
			$this->Post->createNewPost($title, $description, $imageArr);
			echo "<script>
					alert('Post created successfully');
					window.location.href=\"" . base_url() . "\";
				</script>";
		}
	}

	public function loadAllPosts()
	{
		//var_dump($this->Post->loadHomePosts());
		$this->load->view("home",  $this->arr);
	}

	public function testSearch()
	{
		if($this->input->get("genreId")){
			$this->retrieveLoadSearchData($this->input->get("genreId"));
		}
		else {
			$this->retrieveLoadSearchData($this->uri->segment(3));
		}
	}

	public function displaySearch()
	{
		//$this->Post->testHomePosts();
		$this->load->view("search_people", $this->arr);
	}

	public function retrieveLoadSearchData($genre_id){
		$this->arr["userGenres"] = $this->User->filterUsers($genre_id);
		if($this->arr["userGenres"]){
			foreach($this->arr["userGenres"] as &$user){
				$isFollowed = $this->User->checkFollow($user["username"], $this->session->userdata('userdata')["username"]);
				$user["isFollowed"] = $isFollowed; 
			}
		}
		$this->arr["genreId"] = $genre_id;
		$this->load->view("search_people", $this->arr);
	}
}
