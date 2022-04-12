<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Systemhealth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		  $this->load->library(['session']);
			$this->load->database();

			$this->load->model('AuditReportsModel', 'report');
	}

  public function index()
  {
		$date = $this->input->get('date');
		$result = $this->report->getSystemHealth($date);
		$data = array("records" => $result);
  	$this->load->view('system/index', $data);
  }
}
