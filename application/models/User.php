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

    function filterUsers($genreId)
    {
        $this->db->select('Users.*');
        $this->db->from('Users');
        $this->db->join('Genre_Bridge', 'Users.username = Genre_Bridge.username', 'inner');
        $this->db->where('Genre_Bridge.genre_id =', $genreId);
        $query = $this->db->get_where();
        return $query->result_array();
    }

    function findUser($username)
    {
        $result =  $this->db->get_where('Users', array('username' => $username));
        $row = $result->result_array();
        if (isset($row)) {
            return $row[0];
        } else {
            return null;
        }
    }

    function checkFollow($member, $loggedUser)
    {
        $result =  $this->db->get_where('Follows', array('followed_by' => $loggedUser, 'followed_user' => $member));
        $row = $result->row();
        if (isset($row)) {
            return true;
        }
        return false;
    }

    function startFollowing($memberName)
    {
        $data = array(
            'followed_user' => $memberName,
            'followed_by' => $this->session->userdata('userdata')["username"]
        );

        return $this->db->insert("Follows", $data);
    }
    public function stopFollowing($memberName)
    {
        $this->db->where(array('followed_user' => $memberName, 'followed_by' => $this->session->userdata('userdata')["username"]));
        $this->db->delete('Follows');
    }

    function testImagesView($formData)
    {
        $imageArr = $this->input->post($formData);
        var_dump($imageArr);
        if (is_array($imageArr)) {
            if ($imageArr[0] != "") {

                foreach ($imageArr as $value) {
                    if (!$this->testimages($value)) {
                        return null;
                    }
                }
            }
            return $imageArr;
        } else {
            if ($imageArr != "" || isset($imageArr)) {
                var_dump($imageArr);
                    if (!$this->testimages($imageArr)) {
                        var_dump("hit");
                        return null;
                    }
                
            }
            return $imageArr;
         }
    }
    function checkURL($text)
    {
        if (filter_var($text, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }


    function testimages($URL)
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
}
