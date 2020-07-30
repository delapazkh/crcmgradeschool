<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

  public function __construct(){
    $this->load->database();
  }


  function addTeacher(){
    $uid = 3;
    $data = array(
      'u_id' =>  $uid,
      'lname' => $this->input->post('lname'),
      'fname' => $this->input->post('fname'),
      'mname' => $this->input->post('mname'),
      't_hea' => $this->input->post('t_hea'),
      't_pda' => $this->input->post('t_pda'),
      't_desn' => $this->input->post('t_desn'),
      'idnum' => $this->input->post('idnum')
    );

    $res = $this->db->insert('teachers', $data);
    return $res;
  }

  function delAnn($id){
    $this->db->where('ann_id', $id);
    $this->db->delete('announcements');
  }

  function newSub($levelid){
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
}
    function postAnn(){
      $data = array(
        'ann_title' => $this->input->post('ann_subj'),
        'ann_body' => $this->input->post('ann_cont'),
        'ann_by_id' => $this->input->post('ann_by'),
        'date' => $this->input->post('ann_date')
      );

    $res = $this->db->insert('announcements', $data);
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

  function getLatestT($glevel_id){
    $latest = $this->db->select("*")->limit(1)->order_by('t_id',"DESC")->get("teachers")->row();
    return $latest;
  }

  function getMyG_level($a_id){
    $query = $this->db->query('SELECT * FROM g_level WHERE `g_level_adv_id` =' .$a_id);
    return $query->row();
  }

  function getMysubs($mysubid){
    $query = $this->db->query('SELECT * FROM subjects WHERE `g_level` =' .$mysubid);
    return $query->result();
  }

  function addWS(){
    $data = array(
      'ws_subject' => $this->input->post('sub_id'),
      'ws_title' => $this->input->post('ws_name'),
      'ws_g_level' => $this->input->post('glevel'),
      'ws_unit_id' => 3,
      'ws_file_name' => $this->upload->data('file_name'),
      'ws_location' => base_url().'worksheets'
    );

    $res = $this->db->insert('worksheets', $data);
    return $res;
  }

  function addUnit(){
    $data = array(
      'unit_name' => $this->input->post('unit_name'),
      'glevel_id' => $this->input->post('glevel_id'),
      'subj_id' => $this->input->post('subj_id')
    );

    $res = $this->db->insert('unit', $data);
    return $res;
  }


  function myUnits($glevelid){
    //$query = $this->db->query('SELECT * FROM unit WHERE `glevel_id` =' .$mysubid);
    $this->db->where('glevel_id', $glevelid);
    //$this->db->where('subj_id', $mysubid);
    $query = $this->db->get('unit');
    return $query->result();
  }

  function getAll($mysubid){


      $mysubs = $this->getMySubs($mysubid);
      foreach ($mysubs as $subs) {
        $myUnits = $this->myUnits($subs->g_level);
        foreach ($myUnits as $unit) {
          $getws = $this->getMyWS($unit->unit_id);
          foreach ($getws as $row) {

            $woksh[] = array(
                "ws_title" => $row->ws_title
            );

             // echo "<pre>";
             // var_dump($woksh);
             // echo "</pre>";
          }
        }
      }

      $arr = array($mysubs,$myUnits,$woksh);
    // echo "<pre>";
    // var_dump($arr);
    // echo "</pre>";
    return $arr;
  }

}
