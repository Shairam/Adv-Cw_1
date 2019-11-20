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

    public function getFollowCounts($username)  //Model function to get followers and following counts from Database
    {
        $result = $this->db->query("SELECT (SELECT COUNT(*) FROM Follows WHERE followed_by = \"".$username."\") AS Following, (SELECT COUNT(*) FROM Follows WHERE followed_user = \"".$username."\") AS Followers");
        return $result->row_array();
    }
  

    function checkFollow($member, $loggedUser)  // Model function to check if a user is followed by another
    {
        $result =  $this->db->get_where('Follows', array('followed_by' => $loggedUser, 'followed_user' => $member));
        $row = $result->row();
        if (isset($row)) {
            return true;
        }
        return false;
    }
    
    function startFollowing($memberName)    // Model function to follow a user by the currently logged in user
    {
        $data = array(
            'followed_user' => $memberName,
            'followed_by' => $this->session->userdata('userdata')["username"]
        );

        return $this->db->insert("Follows", $data);
    }

    public function stopFollowing($memberName) // Model function to stop following a user by the currently logged in user
    {
        $this->db->where(array('followed_user' => $memberName, 'followed_by' => $this->session->userdata('userdata')["username"]));
        $this->db->delete('Follows');
    }
    
}
