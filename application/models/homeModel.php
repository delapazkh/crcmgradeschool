<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeModel extends CI_Model {

  public function __construct(){
    $this->load->database();
  }

  function getAllAnns(){
    $latest = $this->db->select("*")->order_by('ann_id',"DESC")->get("announcements")->result();
    return $latest;
  }



}
