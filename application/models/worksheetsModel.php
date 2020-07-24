<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class worksheetsModel extends CI_Model {

  public function __construct(){
    $this->load->database();
  }

  
function newSub(){
    $lvl = 13;
    $data = array(
      'subj_name' => $this->input->post('su_name'),
      'g_level' => $this->input->post('g_level')
    );

    $res = $this->db->insert('subjects', $data);
  }

  function getMysubs($g_level){
    $this->db->select('*');
    $this->db->from('subjects');
    $this->db->where('g_level', $g_level);
    $query = $this->db->get();
    $res = $query->result();

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

  function myUnits($subj_id){
    $this->db->select('*');
    $this->db->from('unit');
    $this->db->where('subj_id', $subj_id);
    $query = $this->db->get();
    return $query->result();
  }

  function getAll($mysubid){



    $mysubs = $this->getMySubs($mysubid);
     foreach ($mysubs as $subs) {
       $myUnits = $this->myUnits($subs->sub_id);
       foreach($myUnits as $unit){
           $arr2 [] = array( 
                "unit_id" => $unit->unit_id,
                "unit_name" => $unit->unit_name
           );
           
        }
        
     }
     $arr[] = array(
        "sub_id" => $subs->sub_id,
        "sub_name" =>$subs->subj_name,
        "sub_g_level" => $subs->g_level,

        "Units" => $arr2 
        );
    
//    echo "<pre>";
//    var_dump($arr);
//    echo "</pre>";
  return $arr;
}

}
