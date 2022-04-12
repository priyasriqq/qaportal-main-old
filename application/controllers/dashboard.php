<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('session');
		//$this->load->view('dashboard/login');
		//$this->load->view('dashboard/index');
		$this->load->view('dashboard/BVTportal');
		//$this->load->view('dashboard/HealthCheck');
		//$this->load->view('dashboard/ExecutionAudit');

		//dummy
		//$this->load->view('dashboard/header');
		//$this->load->view('dashboard/footer');

	}


	function authenticate()
	{
		$this->load->library('session');
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/home');
		$this->load->view('dashboard/footer');



	}



}
