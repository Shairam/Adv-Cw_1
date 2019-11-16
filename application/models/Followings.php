<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Followings extends CI_Model
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

    public function getFollowCounts($username)
    {
        $result = $this->db->query("SELECT (SELECT COUNT(*) FROM Follows WHERE followed_by = \"".$username."\") AS Following, (SELECT COUNT(*) FROM Follows WHERE followed_user = \"".$username."\") AS Followers");
        return $result->row_array();
    }
  
    
}
