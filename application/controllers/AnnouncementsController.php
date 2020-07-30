<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnouncementsController extends CI_Controller {

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
        $this->load->helper('url');
		$this->load->model('AnnouncementModel');
		$data['announcements'] = $this->AnnouncementModel->getAllAnns();
		$this->load->view('announcementView', $data);
    }
    

}