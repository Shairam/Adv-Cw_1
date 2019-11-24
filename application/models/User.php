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
    function createUser($username, $password, $first_name, $last_name, $dob, $email, $imageURL, $genresChosen)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'username' => $username,
            'pwd' => $hashedPassword,
            'firstname' => $first_name,
            'lastname' => $last_name,
            'dob' => $dob,
            'email' => $email,
            'imageURL' => $imageURL
        );

        if ($this->db->insert('Users', $data) == false) {

            return $this->db->error()["code"];
        } else {
            $this->Genre->updateGenre($genresChosen, $username);
            return true;
        }
    }

    //Validate Sign In operation
    function validateSignIn($username, $password)
    {
        $result =  $this->db->get_where('Users', array('username' => $username));
        $row = $result->row();

        if (isset($row) && password_verify($password, $row->pwd)) {
            return $row;
        } else {
            return null;
        }
    }

    function filterUsers($genreId)  // Fetch users under a specific genre
    {
        $this->db->select('Users.*');
        $this->db->from('Users');
        $this->db->join('Genre_Bridge', 'Users.username = Genre_Bridge.username', 'inner');
        $this->db->where('Genre_Bridge.genre_id =', $genreId);
        $query = $this->db->get_where();
        return $query->result_array();
    }

    function findUser($username)    // find if a user with the given username exists in the system
    {
        $result =  $this->db->get_where('Users', array('username' => $username));
        $row = $result->result_array();
        if (isset($row)) {
            return $row[0];
        } else {
            return null;
        }
    }

    function testImagesView($formData)  // Perform image URL check
    {
        if (is_array($formData)) {
            if ($formData[0] != "") {

                foreach ($formData as $value) {
                    if (!$this->testimages($value)) {
                        return null;
                    }
                }
            }
            return $formData;
        } else {
            if ($formData == "" || $formData == null) {
                $formData = "https://avatarsed1.serversdev.getgo.com/2205256774854474505_medium.jpg";   // update profile picture of a new user if URL not given
            } else {
                if (!$this->testimages($formData)) {
                    return null;
                }
            }
            return $formData;
        }
    }
    function checkURL($text)        // Check if a string is a valid URL
    {
        if (filter_var($text, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }


    function testimages($URL)   // Check if the given Image URL actually returns an Image 
    {
        if (!$this->checkURL($URL)) {
            return false;
        }

        $urlHeaders = get_headers($URL, 1);

        if (count($urlHeaders['Content-Type']) != 1) {
            return false;
        }

        $type = strtolower($urlHeaders['Content-Type']);

        $valid_image_type = array();
        $valid_image_type['image/png'] = '';
        $valid_image_type['image/jpg'] = '';
        $valid_image_type['image/jpeg'] = '';
        $valid_image_type['image/jpe'] = '';

        if (isset($valid_image_type[$type])) {
            return true;
        } else {
            return false;
        }
    }

    public function getQueryFriends()       // Get list of friends (Both way follows) of current user
    {
        $query = $this->db->query("SELECT 
        u.*,
        case when b.followed_by is null then -- No record in b if current user didn't follow this user back.
           'User is not following back'
        else
           'User is following back'
        end as back
    FROM 
        Follows f -- IDs of followers of current user
        INNER JOIN Users u  -- User information of those followers
           ON u.username = f.followed_by
        Inner JOIN Follows b  -- Check if current user follows them back.
           ON b.followed_by = f.followed_user and
              b.followed_user = u.username
    WHERE
        f.followed_user =\"" . $this->session->userdata('userdata')["username"] . "\"");
        return $query->result_array();
    }

    function getQueryFollowings() // Get list of current user's followings
    {
        $this->db->select('Users.*');
        $this->db->from('Users');
        $this->db->join('Follows', 'Users.username = Follows.followed_user', 'inner');
        $this->db->where('Follows.followed_by', $this->session->userdata('userdata')["username"]);
        $query = $this->db->get_where();
        return $query->result_array();
    }

    function getQueryFollowers()    // Get list of current user's followers
    {
        $this->db->select('Users.*');
        $this->db->from('Follows');
        $this->db->join('Users', 'Follows.followed_by = Users.username ', 'inner');
        $this->db->where('Follows.followed_user', $this->session->userdata('userdata')["username"]);
        $query = $this->db->get_where();
        return $query->result_array();
    }
    
}
