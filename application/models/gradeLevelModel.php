<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradeLevelModel extends CI_Model {

  public function __construct(){
    $this->load->database();
  }


  function newSub($levelid){
    $lvl = 13;
    $data = array(
      'subj_name' => $this->input->post('su_name'),
      'g_level' => $levelid
    );

    $res = $this->db->insert('subjects', $data);
  }

  function newlvl(){
    $data = array(
      'g_level_name' => $this->input->post('lvl_name'),
      'g_level_adv_id' => $this->input->post('adviser')
    );

    $res = $this->db->insert('g_level', $data);
}

  function setAdv(){
    $id = $this->input->post('adviser');
    $up_adv = array(
      't_adv' => $this->input->post('lvl_name'),
    );
    $this->db->where('t_id', $id);
    $this->db->update('teachers', $up_adv);

  }


  function getAllTeachers(){
    $query = $this->db->query('SELECT * FROM teachers');
    return $query->result();
  }

  function getTinfo($ses_id){
    $query = $this->db->query('SELECT * FROM teachers WHERE `u_id` =' .$ses_id);
    return $query->row();
  }

  function getAllSubs(){
    $query = $this->db->query('SELECT * FROM subjects');
    return $query->result();
  }

  function getAllAnns(){
    $latest = $this->db->select("*")->order_by('ann_id',"DESC")->get("announcements")->result();
    return $latest;
  }
  function getAllUsers(){
    $latest = $this->db->select("*")->order_by('u_id',"DESC")->get("users")->result();
    return $latest;
  }

  function del_sub($id){
    $this->db->where('sub_id', $id);
    $this->db->delete('subjects');
  }

  function getAll_glevel(){

    $this->db->select('*');
    $this->db->from('g_level');
    $this->db->join('teachers', 'g_level.g_level_adv_id = teachers.t_id');
    $query = $this->db->get();
    return $query->result();
  }



}
