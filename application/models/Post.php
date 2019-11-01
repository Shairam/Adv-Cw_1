<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Model
{
    public function __construct()
    {

        // placing it here fails: $this has no `load` property yet.
        // $this->load->database(); <!-- NO WAY JOSÉ!
        parent::__construct();
        // placing it here should work as the parent class has added that property
        // during it's own constructor
        $this->load->database();
    }

    public function userPosts()
    {
        $username = $this->session->userdata('userdata')["username"];
        $this->db->order_by("createdOn", "desc");
        $query = $this->db->get_where("Posts", array('createdBy' => $username));
        return $query->result_array();
    }

    public function createNewPost($title, $description)
    {
        $data = array(
            'createdBy' => $this->session->userdata("userdata")["username"],
            'createdOn' => date("Y.m.d"),
            'description' => $description,
            'title' => $title
        );
        $this->db->insert('Posts', $data);
    }

    public function loadHomePosts(){
        $this->db->select('Follows.followed_user, Posts.*,Users.imageURL');
    $this->db->from('Posts');
    $this->db->join('Follows', 'Posts.createdBy = Follows.followed_user', 'inner'); 
    $this->db->join('Users', 'Follows.followed_user = Users.username', 'inner');
    $this->db->where('Follows.followed_by',$this->session->userdata("userdata")["username"]);
    $this->db->order_by("createdOn", "desc");
    $query = $this->db->get_where();
    $result = $this->db->query("(SELECT Posts.*, Users.imageURL FROM Posts INNER JOIN
    Follows on Posts.createdBy = Follows.followed_user INNER JOIN Users on Follows.followed_user = Users.username WHERE Follows.followed_by =\"".$this->session->userdata("userdata")["username"]."\")
     UNION 
     (SELECT Posts.*,  Users.imageURL FROM Posts INNER JOIN Users on Posts.createdBy = Users.username WHERE Users.username = \"".$this->session->userdata("userdata")["username"]."\") ORDER BY `createdOn` DESC
        ");
    return $result->result_array();
    }
}
