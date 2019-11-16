<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class User_controller extends CI_Controller
{

    public $memberDataArr;
	public function __construct()
	{
		// placing it here fails: $this has no `load` property yet.
		// $this->load->database(); <!-- NO WAY JOSÉ!
		parent::__construct();
		// placing it here should work as the parent class has added that property
		// during it's own constructor
		$this->load->database();
        $this->load->model("User");
        $this->load->model("Post");
        $this->load->model("Genre");
        $this->load->model("Followings");
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

     public function loadMemberProfile(){
        $memberName = $this->uri->segment(3);
        $this->memberDataArr = array(
            'memberInfo' => $this->User->findUser($memberName),
            'memberPosts' => $this->Post->userPosts($memberName),
            'memberFollowDetails' => $this->Followings->getFollowCounts($memberName),
            'memberGenres' => $this->Genre->getUserGenres($memberName)
		);
		$isFollowed = $this->User->checkFollow($memberName, $this->session->userdata('userdata')["username"]);
		$this->memberDataArr["isFollowed"] = $isFollowed;
		$this->load->view("user_profile", $this->memberDataArr);
		
	 }
	 
	 public function startFollowing(){
		$genreId = $this->uri->segment(3);
		$memberName = $this->uri->segment(4);
		$added = $this->User->startFollowing($memberName);
		redirect("welcome/testSearch/$genreId");
	 }
	 
	 public function stopFollowing(){
		$genreId = $this->uri->segment(3);
		$memberName = $this->uri->segment(4);
		$removed = $this->User->stopFollowing($memberName);
		redirect("welcome/testSearch/$genreId");
	 }

}
