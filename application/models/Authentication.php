<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Model {

  function getUsers(){
 
    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('users');
    $response = $q->result_array();

    return $response;
  }

}