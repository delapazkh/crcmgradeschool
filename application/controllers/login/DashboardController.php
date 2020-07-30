<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('DashboardModel');
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

		$this->load->model('dashboardModel');
		$data['result'] = $this->dashboardModel->getAllTeachers();
		$data['allUsers'] = $this->dashboardModel->getAllUsers();
		$data['announcements'] = $this->dashboardModel->getAllAnns();
		$this->load->view('login/dashboardView', $data);
	}

	public function deleteAnn($id){
		$this->DashboardModel->delAnn($id);
		$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
    <strong>Alright!</strong> Record has been deleted successfully!
  </div>');
    redirect("login/DashboardController");
	}

	public function manageGradelvl()
	{
		$this->load->helper('url');
		$this->load->model('loginModel');
		$data['result'] = $this->loginModel->getAllSubs();
		$data['allT'] = $this->loginModel->getAllTeachers();
		$data['glevels'] = $this->loginModel->getAll_glevel();
		// echo "<pre>";
		// var_dump($data['glevels']);
		// echo "<pre>";
		$this->load->view('login/manageGradelvlView', $data);
	}

	public function add_T(){
		$this->load->model('loginModel');
		$this->loginModel->addTeacher();
		$rez = $this->loginModel->getLatestT();
		$rez2 = $this->loginModel->create_T_Acc($rez->t_id);
		//echo "<pre>";
		//var_dump();
		//echo "</pre>";

		$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
	  <strong>Alright!</strong> You have successfully added a new teachers record and an account has been made!
	</div>');
		redirect("login/dashboardController");

	}

	public function add_glevel(){
		$this->load->model('loginModel');
		$this->loginModel->newlvl();
		$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
		<strong>Alright!</strong> You have successfully added a new grade level!
		</div>');
		redirect("login/dashboardController/manageGradelvl");

	}

	public function newAnn(){
		$this->load->model('loginModel');
		$this->loginModel->postAnn();
		$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
		<strong>Alright!</strong> Announcement posted successfully!
		</div>');
		redirect("login/dashboardController");

	}

	public function addSub(){
		$this->load->model('loginModel');
		$this->loginModel->newSub();
		$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
		<strong>Alright!</strong> Subject added successfully!
	</div>');
		redirect("login/dashboardController/manageGradelvl");

	}

	public function deleteSubj($id){
		$this->load->model('loginModel');
		$this->loginModel->del_sub($id);
		redirect("login/dashboardController/manageGradelvl");
	}

	function logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}





}
