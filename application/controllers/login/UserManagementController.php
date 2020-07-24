<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagementController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		// if (!$this->session->userdata('logged_in')) {
		// 	echo "You are not logged in";
		// 	redirect('login/login');
		// }else if($this->session->userdata('type') == 'admin'){
		// 	redirect('login/dashboardController');
		// }else {
		 	$ses_id = $this->session->userdata('u_id');
			$a_id = $this->session->userdata('a_id');

		// 	echo "logged in with id: ".$ses_id;
		// 	redirect('login/teacherDashboardController');
		// }
	}

	public function index()
	{
    $this->load->model('userManagementModel');
    $data['result'] = $this->userManagementModel->getAllTeachers();
    $this->load->view('login/userManagementView', $data);
	}


  public function addTeacher(){
    $this->load->model('userManagementModel');
    $this->userManagementModel->addNewTeacher();
		$rez = $this->userManagementModel->getLatestT();
		$rez2 = $this->userManagementModel->create_T_Acc($rez->t_id);

    $this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
    <strong>Alright!</strong> You have successfully added a new teachers record and an account has been made!
  </div>');

    $this->load->view('login/userManagementView');

  }


}
