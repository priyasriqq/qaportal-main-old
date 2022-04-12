<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Taximport extends CI_Controller {
	public function __construct(){
		parent::__construct();
		  $this->load->library(['session']);
			$this->load->database();

			//$this->load->model('AuditReportsModel', 'report');
	}

  public function index()
  {
		//$result = $this->report->getSystemHealth();
		//$data = array("records" => $result);
  	$this->load->view('taximport/index');
  }
}
