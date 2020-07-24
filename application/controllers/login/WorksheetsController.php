<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorksheetsController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('worksheetsModel');
		// if (!$this->session->userdata('logged_in')) {
		// 	echo "You are not logged in";
		// 	redirect('login/login');
		// }else if($this->session->userdata('type') == 'admin'){
		// 	redirect('login/dashboardController');
		// }else {
		 	$ses_id = $this->session->userdata('u_id');
            $a_id = $this->session->userdata('a_id');
            $t_adv = $this->session->userdata('t_adv');
            
		// 	echo "logged in with id: ".$ses_id;
		// 	redirect('login/teacherDashboardController');
		// }
	}

	public function index()
	{   
        $data['result'] = $this->worksheetsModel->getMysubs($this->session->userdata('t_adv'));
        $this->load->view('login/worksheetsView', $data);
    }

    public function newUnit(){
        $this->load->model('worksheetsModel');
		$this->worksheetsModel->addUnit();
    }

    public function addSub(){
		$this->load->model('worksheetsModel');
		$this->worksheetsModel->newSub();
		$this->session->set_flashdata('success', '<div style="margin: 10px" class="alert alert-success" role="alert">
		<strong>Alright!</strong> Subject added successfully!
	</div>');
		redirect("login/worskheetsController");

	}
    
}