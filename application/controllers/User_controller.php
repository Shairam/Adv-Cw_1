<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class User_controller extends CI_Controller
{

	public $memberDataArr;
	public function __construct()
	{
		parent::__construct();
		// placing it here should work as the parent class has added that property
		// during it's own constructor
		$this->load->database();
		$this->load->model("User");
		$this->load->model("Post");
		$this->load->model("Genre");
		$this->load->model("Followings");
	}

	public function loadMemberProfile() // Controller Function to load a profile page (either logged In user's or a specific user's)
	{
		$memberName = $this->uri->segment(3);

		if ($memberName != $this->session->userdata('userdata')["username"]) {
			$this->loadUserData($memberName);
			$isFollowed = $this->Followings->checkFollow($memberName, $this->session->userdata('userdata')["username"]);
			$this->memberDataArr["isFollowed"] = $isFollowed;
			$this->load->view("user_profile", $this->memberDataArr);
		} else {
			$this->loadUserData($memberName);
			$this->load->view("profile", $this->memberDataArr); // For logged in  User
		}
	}
	public function loadUserData($memberName)
	{
		$this->memberDataArr = array(
			'memberInfo' => $this->User->findUser($memberName),
			'memberPosts' => $this->Post->userPosts($memberName),
			'memberFollowDetails' => $this->Followings->getFollowCounts($memberName),
			'memberGenres' => $this->Genre->getUserGenres($memberName),
			'friendsCount' => count($this->User->getQueryFriends())
		);
	}

	public function startFollowing()  // Controller Function to start following a user
	{
		$genreId = $this->uri->segment(3);
		$memberName = $this->uri->segment(4);
		$added = $this->Followings->startFollowing($memberName);
		if($genreId != 0){
			redirect("welcome/routeSearch/$genreId");
		} else{
			redirect("welcome/");
		}
	}

	public function stopFollowing()	 // Controller Function to stop following a user
	{
		$genreId = $this->uri->segment(3);
		$memberName = $this->uri->segment(4);
		$removed = $this->Followings->stopFollowing($memberName);
		if($genreId != 0){
			redirect("welcome/routeSearch/$genreId");
		} else{
			redirect("welcome/");
		}	
	}

	public function getFriends() // load friends list of the logged in user
	{
		$this->memberDataArr["friendsList"] = $this->User->getQueryFriends();
		$this->memberDataArr["membersType"] = $this->config->item('membersTypes')[0];
		$this->performFollowCheck($this->memberDataArr["friendsList"]);
		$this->load->view("friends", $this->memberDataArr);
	}

	public function getFollowings() // load followings list of the logged in user
	{
		$this->memberDataArr["friendsList"] = $this->User->getQueryFollowings();
		$this->memberDataArr["membersType"] = $this->config->item('membersTypes')[1];
		$this->performFollowCheck($this->memberDataArr["friendsList"]);
		$this->load->view("friends", $this->memberDataArr);
	}

	public function getFollowers()	// load followers list of the logged in user
	{
		$this->memberDataArr["friendsList"] = $this->User->getQueryFollowers();
		$this->memberDataArr["membersType"] = $this->config->item('membersTypes')[2];
		$this->performFollowCheck($this->memberDataArr["friendsList"]);
		$this->load->view("friends", $this->memberDataArr);
	}

	public function performFollowCheck(&$membersList){ // Controller function to check if the currently logged in user follows members in a list
		if($membersList){
			foreach($membersList as &$user){
				$isFollowed = $this->Followings->checkFollow($user["username"], $this->session->userdata('userdata')["username"]);
				$user["isFollowed"] = $isFollowed; 
			}
		}
	}
}
