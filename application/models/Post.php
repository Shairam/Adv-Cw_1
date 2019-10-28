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
}
