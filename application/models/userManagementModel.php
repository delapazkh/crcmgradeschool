<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userManagementModel extends CI_Model {

  public function __construct(){
    $this->load->database();
  }

  function getAllTeachers(){
    $query = $this->db->query('SELECT * FROM teachers');
    return $query->result();
  }

  function addNewTeacher(){
    $uid = 3;
    $data = array(
      'u_id' =>  $uid,
      'lname' => $this->input->post('lname'),
      'fname' => $this->input->post('fname'),
      'mname' => $this->input->post('mname'),
      't_hea' => $this->input->post('t_hea'),
      't_pda' => $this->input->post('t_pda'),
      't_desn' => $this->input->post('t_desn'),
      'idnum' => $this->input->post('idnum'),
      't_adv' => $this->input->post('t_adv'),
      'status' => $this->input->post('status'),
    );

    $res = $this->db->insert('teachers', $data);
    return $res;

  }

  function getLatestT(){
    $latest = $this->db->select("*")->limit(1)->order_by('t_id',"DESC")->get("teachers")->row();
    return $latest;
  }

  function create_T_Acc($theID){

    $uname = strtolower(str_replace(' ', '', $this->input->post('lname'))."".substr($this->input->post('fname'), 0,2));
    $typeid = 3;
    $data = array(
      'name' => $this->input->post('lname').", ".$this->input->post('fname'),
      'u_name' => $uname,
      'p_word' => $uname,
      'a_id'=> $theID,
      'acc_type_id' => $typeid
    );

    $res = $this->db->insert('users', $data);
  }



}
