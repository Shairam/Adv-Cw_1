<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Genre extends CI_Model
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
    public function loadGenres()
    {
        $result =  $this->db->get('Genre_lists');
        return $result->result_array();
    }

    public function updateGenre($genrelist, $username)
    {
        foreach ($genrelist as $id) {
            $data = array(
                'username' => $username,
                'genre_id' => $id
            );
            $this->db->insert('Genre_Bridge', $data);
        }
    }

    public function loadUserGenres($username)
    {   $dataArr =array();
        if ($this->session->userdata('userdata')) {
            $query = $this->db->get_where('Genre_Bridge', array('username' => $username));
            foreach ($query->result_array() as $item){
                    $dataArr[] = $item["genre_id"];
            }
            return $dataArr;
        } else {
            redirect("welcome/");
        }
    }

    public function getUserGenres($username)
	{
        $strGenre = [];
        $genreLists = $this->loadGenres();
		foreach ($genreLists as $genreItem) {
			$memberGenre =  $this->loadUserGenres($username);
			if (in_array($genreItem["genre_id"],$memberGenre)) {
				$strGenre[] = $genreItem["name"];
			}
		}
		return implode(', ', $strGenre);
	}
}
