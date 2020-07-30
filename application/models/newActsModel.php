<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewActsModel extends CI_Model {

  public function __construct(){
    $this->load->database();
  }

  public function save_act(){

      $data = array(
        'by_id' => $this->input->post('by_id'),
        'title' => $this->input->post('act_title'),
        'content' => $this->input->post('content'),
        'act_date' => $this->input->post('act_date'),
        'status' => $this->input->post('status'),
        'g_level' => $this->input->post('glevel')
      );

      $res = $this->db->insert('activities', $data);
      return $res;
  }

}
