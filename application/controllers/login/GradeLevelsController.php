<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradeLevelsController extends CI_Controller {

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

    $this->load->model('gradeLevelModel');
    $data['result'] = $this->gradeLevelModel->getAllSubs();
    $data['allT'] = $this->gradeLevelModel->getAllTeachers();
    $data['glevels'] = $this->gradeLevelModel->getAll_glevel();
    $this->load->view('login/manageGradelvlView', $data);
	}

  public function addSub(){
    $this->load->model('gradeLevelModel');
    $this->gradeLevelModel->newSub();
    $this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
    <strong>Alright!</strong> Subject added successfully!
  </div>');
    redirect("login/GradeLevelsController");

  }

  public function add_glevel(){
    $this->load->model('gradeLevelModel');
    $this->gradeLevelModel->newlvl();
    $this->gradeLevelModel->setAdv();
    $this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
    <strong>Alright!</strong> You have successfully added a new grade level!
    </div>');
    redirect("login/GradeLevelsController");

  }

}
