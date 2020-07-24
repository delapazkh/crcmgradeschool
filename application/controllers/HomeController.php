<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
    $this->load->helper('url');
		$this->load->view('homeView');
	}

  public function announcement()
  {
    $this->load->helper('url');
		$this->load->model('homeModel');
		$data['announcements'] = $this->homeModel->getAllAnns();
		$this->load->view('announcementView', $data);
  }


}
