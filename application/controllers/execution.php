<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Execution extends CI_Controller {
	public function __construct(){
		parent::__construct();
		  $this->load->library(['session']);
			$this->load->database();
			$this->load->model('AuditReportsModel', 'report');
	}

  public function index()
  {
    $this->load->view('execution/index');
  }

	public function run()
	{
		//var_dump($_POST['project']);var_dump($_POST['environment']);var_dump($_POST['testingTYpe']);var_dump($_POST['browsers']);exit;
		$Project = str_replace(' ', '', $_POST['project']);
		$Environment = $_POST['environment'];
		$TestingType = $_POST['testingTYpe'];
		$Browser = $_POST['browsers'];
		$Emails = str_replace(' ', '',$_POST['emails']);;
		
		if($TestingType=="Demo testing"){
			$TestingType="demo";
		}elseif ($TestingType=="Build smoke testing"){
			$TestingType="ST";
		}

		if($Environment=="Staging"){
			if($Project=="RevlonUK"){
				$URL="https://stage-uk.revlonhairtools.com/";
			}elseif($Project=="RevlonUS"){
				$URL="https://stage.revlonhairtools.com/";
			}elseif($Project=="HotTools"){
				$URL="https://stage.hottools.com/";
			}
		}elseif ($Environment=="Production"){
			if($Project=="RevlonUK"){
				$URL="https://revlonhairtools.co.uk/";
			}elseif($Project=="RevlonUS"){
				$URL="https://revlonhairtools.com/";
			}elseif($Project=="HotTools"){
				$URL="https://www.hottools.com/";
			}
		}

		if($Project=="HotTools"){
			$Project="Hottools";
		}



		//$runURL = "http://jenkins.helenoftroy.com:8080/view/all/job/TestAutomation/job/RevlonSystemTests/buildWithParameters?delay=0sec&config=RevlonUK%5C%5Cconfig.properties&testNG=RevlonUK%5C%5CRevlonUK_ST.xml";
		$runURL = "http://jenkins.helenoftroy.com:8080/view/all/job/TestAutomation/job/RevlonSystemTests/buildWithParameters?delay=0sec&config=" . $Project . "%5C%5Cconfig.properties&testNG=" . $Project . "%5C%5C" . $Project . "_" . $TestingType . ".xml&mailId=". $Emails ."&BASEURL=". $URL ."&browser=" . $Browser . "&WEBSITE=" . $Project;
		//var_dump($runURL);exit;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $runURL,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_USERPWD => "mchiruvella:11c7c177b711f81e5c7c3e531f9614fbb6",
		  //CURLOPT_HTTPHEADER => array(),
		));


		$response = curl_exec($curl);

		curl_close($curl);
		$this->session->set_flashdata('run_response',$response);


		$status=$this->getrecorddetails();
		$nodestatus=$status->result;
		if(is_null($status->result)){
			$nodestatus="Running";
		}
		$BuildURL=$status->url;

			$domain = "http://jenkins.helenoftroy.com";
            $url = explode($domain,$BuildURL);
            $BuildURL = $domain.':8080'.$url[1];

		$record=array("Project"=>$this->input->post('project'),
				"Environment"=>$this->input->post('environment'),
				"TestingType"=>$this->input->post('testingTYpe'),
				"DeviceType"=>$this->input->post('device'),
				"Browser"=>$this->input->post('browsers'),
				"Devices"=>$this->input->post('devices'),
				"Machine"=>$this->input->post('machine'),
				"TriggeredBy"=>"mchiruvella@helenoftroy.com",
				"JobStatus"=>$nodestatus,
				"ExecutionStatus"=>"Running",
				"BuildURL"=>$BuildURL,
				"Emails"=>$this->input->post('emails'));
		$this->load->database();
		$this->db->insert('ExecutionAudit',$record);
		//echo $response;
		redirect('auditreports');
	}

	function getrecorddetails() {


		$clientstatus=array();
		$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://jenkins.helenoftroy.com:8080/view/all/job/TestAutomation/job/RevlonSystemTests/lastBuild/api/json/',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_USERPWD => "mchiruvella:11c7c177b711f81e5c7c3e531f9614fbb6",
			/*CURLOPT_HTTPHEADER => array(
				'Authorization: Basic bWNoaXJ1dmVsbGE6MTFjN2MxNzdiNzExZjgxZTVjN2MzZTUzMWY5NjE0ZmJiNg==',
				'Cookie: JSESSIONID.a3638212=node062785luglgeo1bw0khrqx96us432.node0'
			),*/
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

	public function getTestCases()
	{
		$Project = $this->input->get('project');
		$Environment = $this->input->get('environment');
		$testingTYpe = $this->input->get('testingTYpe');
		$Device = $this->input->get('device');
		$platform =  $this->input->get('platform');
		$result = $this->report->getTestCasesModel($Project, $Environment, $testingTYpe, $Device, $platform);
		echo json_encode($result);

	}
}
