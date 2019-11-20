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

    public function userPosts($username)           // Fetch all posts made by a particular user 
    {

        $this->db->order_by("createdOn", "desc");
        $query = $this->db->get_where("Posts", array('createdBy' => $username));
        $resultArr =  $query->result_array();
        if ($resultArr) {
            foreach ($resultArr as &$postItem) {
                $query = $this->db->get_where("Post_Images", array('postId' => $postItem["postId"]));
                $postItem["ImageLists"] = $query->result_array();
            }
        }
        return $resultArr;
    }

    public function createNewPost($title, $description, $imageArr)  // Creates a new post 
    {
        $date = date('Y-m-d H:i:s');
        $data = array(
            'createdBy' => $this->session->userdata("userdata")["username"],
            'createdOn' => $date,
            'description' => $description,
            'title' => $title
        );
        $this->db->insert('Posts', $data);
        $id = $this->db->insert_id();

        if (isset($imageArr)) {
            $this->insertPostImages($id, $imageArr);
        }
    }

    public function loadPostImages($post_id)       // Fetch images' URLs of a post if available
    {
        $query = $this->db->get_where("Post_Images", array('postId' => $post_id));
        return $query->result_array();
    }

    public function loadHomePosts()         // Fetches the list of posts made by currently logged in user and also the posts made by that user's followers
    {

        $result = $this->db->query("(SELECT Posts.*, Users.imageURL FROM Posts INNER JOIN
    Follows on Posts.createdBy = Follows.followed_user INNER JOIN Users on Follows.followed_user = Users.username WHERE Follows.followed_by =\"" . $this->session->userdata("userdata")["username"] . "\")
     UNION 
     (SELECT Posts.*,  Users.imageURL FROM Posts INNER JOIN Users on Posts.createdBy = Users.username WHERE Users.username = \"" . $this->session->userdata("userdata")["username"] . "\") ORDER BY `createdOn` DESC
        ");
        $resultArr = $result->result_array();
        if ($resultArr) {
            foreach ($resultArr as &$postItem) {
                $query = $this->db->get_where("Post_Images", array('postId' => $postItem["postId"]));
                $postItem["ImageLists"] = $query->result_array();
            }
        }
        return $resultArr;
    }

    public function insertPostImages($post_id, $imageArr)   // Insert image URLS included for a particular post
    {
        foreach ($imageArr as $imageURL) {
            $data = array(
                'postId' => $post_id,
                'imageURL' => $imageURL
            );
            $this->db->insert('Post_Images', $data);
        }
    }
}
