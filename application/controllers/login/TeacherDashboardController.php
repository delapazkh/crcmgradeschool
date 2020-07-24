<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherDashboardController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		// if (!$this->session->userdata('logged_in')) {
		// 	echo "You are not logged in";
		// 	redirect('login/login');
		// }else if($this->session->userdata('type') == 'admin'){
		// 	redirect('login/dashboardController');
		// }else {
		 	$ses_id = $this->session->userdata('u_id');
			$aid = $this->session->userdata('a_id');
			$t_adv = $this->session->userdata('t_adv');
		 //	echo "logged in with the id: ".$aid;
		// 	redirect('login/teacherDashboardController');
		// }

		$config['allowed_types'] = 'jpg|png';
    $config['upload_path'] = './worksheets/';
    $this->load->library('upload', $config);
	}

	public function index()
	{
    $this->load->helper('url');
		$this->load->model('loginModel');
		$data['result'] = $this->loginModel->getAllTeachers();
		$data['announcements'] = $this->loginModel->getAllAnns();
		$data['myLevel'] = $this->loginModel->getMyG_level($this->session->userdata('a_id'));
		$data['mysubs'] = $this->loginModel->getMysubs($data['myLevel']->g_level_id);

		foreach ($data['mysubs'] as $row) {
			$data['getUnits'] = $this->loginModel->myUnits($data['myLevel']->g_level_id, $row->sub_id);
			foreach ($data['getUnits'] as $unit) {
				$data['myws'] = $this->loginModel->getMyWS($data['myLevel']->g_level_id, $row->sub_id);
				//$data['myws'][] = $this->loginModel->getMyWS($unit->unit_id);
			}
		}

		//$data['all'] = $this->loginModel->getAll($data['myLevel']->g_level_id);

		// foreach ($data['getUnits'] as $unit) {
		// 	$data['myws'] = $this->loginModel->getMyWS($data['myLevel']->g_level_id, $row->sub_id, $unit->unit_id);
		// }

		$data['t_info'] = $this->loginModel->getTinfo($this->session->userdata('u_id'));
		//echo $data['myws'][0];



			// echo "<pre>";
			// var_dump($data['myws']);
			// echo "</pre>";






		$this->load->view('login/teachersDashboardView', $data);
	}
	public function add_T(){
		$this->load->model('loginModel');
		$this->loginModel->addTeacher();
		$this->loginModel->create_T_Acc();
		$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
	  <strong>Alright!</strong> You have successfully added a new teachers record!
	</div>');
		redirect("login/dashboardController");

	}
	function logout()
		{
			$this->session->sess_destroy();
			redirect('login/login');
		}


		public function addSub(){
			$this->load->model('loginModel');
			$data['myLevel'] = $this->loginModel->getMyG_level($this->session->userdata('a_id'));
			$this->loginModel->newSub($data['myLevel']->g_level_id);
			$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
			<strong>Alright!</strong> You have successfully added a new subject!
		</div>');
			redirect("login/teacherDashboardController/");

		}

		public function new_WS(){
			$this->load->model('loginModel');

			if ($this->upload->do_upload('ws_file')) {
			$this->loginModel->addWS();
			}else{
				print_r($this->upload->display_errors());
			}
			$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
			<strong>Alright!</strong> You have successfully added a new subject!
		</div>');
		redirect("login/teacherDashboardController/");

		}

		public function newUnit(){
			$this->load->model('loginModel');
			$this->loginModel->addUnit();
			$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
			<strong>Alright!</strong> You have successfully added a new unit/chapter!
		</div>');
		redirect("login/teacherDashboardController/");
		}



}
