<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageLessonsModel extends CI_Model {

  public function __construct(){
    $this->load->database();
  }

  function validate(){

    $arr['u_name'] = $this->input->post('u_name');
    $arr['p_word'] = $this->input->post('p_word');
    return $this->db->get_where('users', $arr)->row();
  }

}