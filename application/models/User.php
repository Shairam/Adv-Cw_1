<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {

        // placing it here fails: $this has no `load` property yet.
        // $this->load->database(); <!-- NO WAY JOSÉ!
        parent::__construct();
        // placing it here should work as the parent class has added that property
        // during it's own constructor
        $this->load->database();
        $this->load->model("Genre");
    }

    // Create User in Database
    function createUser($username, $password, $email, $first_name, $last_name, $imageURL, $genresChosen)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'username' => $username,
            'pwd' => $hashedPassword,
            'firstname' => $first_name,
            'lastname' => $last_name,
            'dob' => "1990-03-27",
            'imageURL' => $imageURL
        );

        if ($this->db->insert('Users', $data)==false){
            
            return $this->db->error()["code"];
        }
        else {
            $this->Genre->updateGenre($genresChosen,$username);
            return true;
        }
    }

    //Validate Sign In operation
    function validateSignIn($username, $password)
    {
        $result =  $this->db->get_where('Users', array('username' => $username));

        $row = $result->row();
        if (isset($row)) {
            return $row;
        } else {
            return null;
        }
    }

    function filterUsers($genreId){
        $this->db->select('Users.*');
        $this->db->from('Users');
        $this->db->join('Genre_Bridge', 'Users.username = Genre_Bridge.username', 'inner'); 
        $this->db->where('Genre_Bridge.genre_id =',$genreId);
        $query = $this->db->get_where();
        return $query->result_array();
    }
}
