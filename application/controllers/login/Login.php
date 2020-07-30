<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
    $this->load->helper('url');
		$this->load->view('login/login');
	}

  function verify(){

    $this->load->model('loginModel');
    $check = $this->loginModel->validate();

    if ($check) {

			if ($check->acc_type_id == 1) {
				$admData = array(
                   'u_id'  => $check->acc_type_id,
                   'u_name'     => $check->u_name,
					'a_id'      => $check->a_id,
					'logged_in' => TRUE,
					'type' => 'admin'
               );
		    $this->session->set_userdata($admData);
				//echo $this->session->userdata('u_name');
				redirect('login/DashboardController');
			}else{

			$t_info = $this->loginModel->getTinfo($check->a_id);	
				$tData = array(
					 'u_id'  => $check->acc_type_id,
					 'a_id'      => $check->a_id,
					 'u_name'     => $check->u_name,
					 'logged_in' => TRUE,
						 't_adv' => $t_info->t_adv,
					 'lname' => $t_info->lname,
					 'fname' => $t_info->fname,
					 't_hea' => $t_info->t_hea,
					 't_pda' => $t_info->t_pda,
					 't_desn' => $t_info->t_desn,
					 'idnum' => $t_info->idnum,
					 't_stat' => $t_info->status,
					 'type' => 'teacher'
					);
					$this->session->set_userdata($tData);
				//echo $this->session->userdata('a_id');
				// echo "<pre>";
				// var_dump($tData);
				// echo "</pre>";
				redirect('login/TeacherDashboardController');
			}

    }else{
		$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">
	  <strong>Uh-oh!</strong> Incorrect Username or Password.
	</div>');

      redirect(base_url().'login');
      echo "<h1>Incorrect uname or password</h1>";
    }

  }




}
