<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuditReports extends CI_Controller {
	public function __construct(){
		parent::__construct();
		  $this->load->library(['session']);
			$this->load->database();

			$this->load->model('AuditReportsModel', 'report');
	}

  public function index()
  {
		$result = $this->report->getReports();
		$data = array("records" => $result);
  	$this->load->view('audit/index', $data);
  }

  public function getLatestStatus()
  {
	  $result = $this->report->getLatestRecordsStatus();

	  if(count($result) === 0){
		  echo "Nothing to update. All are upto date.";
	  }

	  for($i=0; $i<sizeof($result); $i++){
		  $url = $result[$i]['BuildURL'];
		  if($url){
				  $status = $this->getrecorddetails($url);
				  $result[$i]['ExecutionStatus'] = $status;
		  }
	  }
	  //var_dump($result);exit;
	  if($result){
		  for($i=0; $i<sizeof($result); $i++){
			  $r = $this->report->updateStatus($result[$i]);
			  if($r){
			  echo "Status Updated for Record with ID >".$result[$i]['id'];
			  }
		  }
	  }

  }

  function getrecorddetails($url) {


	  $clientstatus=array();
	  $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			  'Authorization: Basic bWNoaXJ1dmVsbGE6MTFjN2MxNzdiNzExZjgxZTVjN2MzZTUzMWY5NjE0ZmJiNg==',
			  'Cookie: JSESSIONID.a3638212=node062785luglgeo1bw0khrqx96us432.node0'
		  ),
		  ));

		  $response = curl_exec($curl);

		  curl_close($curl);

		  if ($err) {
			  echo "cURL Error #:" . $err;
		  } else {
			  //echo $response;
		  }

	  $status = json_decode($response);

	  return $status;

  }
}
