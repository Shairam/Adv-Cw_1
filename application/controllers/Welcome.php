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
		$this->load->model("Post");
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
			$this->arr["postsData"] = $this->Post->userPosts();
			$this->loadHomeView();
		}
	}

	public function validateLogin()
	{
		$username = $this->input->post("username");
		$hashedPass = password_hash($this->input->post("username"), PASSWORD_DEFAULT);

		$result = $this->load->model("Authentication");
	}

	public function getUserGenres()
	{
		$strGenre = [];
		foreach ($this->arr["genreList"] as $genreItem) {
			if (in_array($genreItem["genre_id"], $this->Genre->loadUserGenres())) {
				$strGenre[] = $genreItem["name"];
			}
		}
		return implode(', ', $strGenre);
	}

	public function loadPostView()
	{
		$this->load->view("create_post");
	}

	public function loadProfile()
	{
		$this->arr["strGenre"] = $this->getUserGenres();
		$this->arr["postsData"] = $this->Post->userPosts();
		$this->load->view("profile", $this->arr);
	}

	public function createPost()
	{
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$this->Post->createNewPost($title, $description);
		echo "<script>
				alert('Post created successfully');
				window.location.href='/test-1';
			</script>";
	}

	public function loadHomeView()
	{
		//var_dump($this->Post->loadHomePosts());
		$this->load->view("home",  $this->arr);
	}

	public function testSearch()
	{
		$external_link = "https://photo-1499018658500-b21c72d7172b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80";
		if (@getimagesize($external_link)) {
			echo  "image exists ";
		} else {
			echo  "image does not exist ";
		}
	}
}
