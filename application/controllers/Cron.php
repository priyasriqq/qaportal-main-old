<?php
 $mysqli = new mysqli("localhost","root","","qaportal");

 if ($mysqli -> connect_errno) {
   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
   exit();
 }

 $sql = "SELECT id,BuildURL from executionaudit where JobStatus='Running'";

//$result = $result1 -> fetch_array(MYSQLI_ASSOC);
$result = [];
if ($result1 = mysqli_query($mysqli, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result1)) {
  array_push($result,$row);
  }
}

//var_dump($result);exit;
 //$result = $this->report->getLatestRecordsStatus();

 if(count($result) === 0){
     echo "Nothing to update. All are upto date.";
 }

 for($i=0; $i<sizeof($result); $i++){
     $url = $result[$i][1];
     if($url){
            $status = getrecorddetails($url);
            $jobstatus=gettestdetails($url);
            $result[$i]['ExecutionStatus'] = $jobstatus;
            if($status=="FAILURE"){
                $result[$i]['JobStatus'] = "Completed";
            }
     }
 }

 if($result){
     for($i=0; $i<sizeof($result); $i++){
         if($result[$i]['JobStatus']!=""){
            $sqlupdate = "UPDATE executionaudit set JobStatus= '".$result[$i]['JobStatus']."',ExecutionStatus= '".$result[$i]['ExecutionStatus']."' where id=". $result[$i][0];
            if ($mysqli->query($sqlupdate) === TRUE){
            echo "Status Updated for Record with ID >".$result[$i][0];
            } else {
            echo "Error updating record: " . $mysqli->error;
            }
        }else{
            echo "No Update for record " . $result[$i][0];
        }
     }
 }

 function getrecorddetails($url)
 {

   		$clientstatus=array();
   		$curl = curl_init();

   			curl_setopt_array($curl, array(
   			//CURLOPT_URL => 'http://jenkins.helenoftroy.com:8080/view/all/job/TestAutomation/job/RevlonSystemTests/lastBuild/api/json/',
            CURLOPT_URL => $url . "/api/json",
   			CURLOPT_RETURNTRANSFER => true,
   			CURLOPT_ENCODING => '',
   			CURLOPT_MAXREDIRS => 10,
   			CURLOPT_TIMEOUT => 0,
   			CURLOPT_FOLLOWLOCATION => true,
   			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   			CURLOPT_CUSTOMREQUEST => 'GET',
   			CURLOPT_USERPWD => "mchiruvella:11c7c177b711f81e5c7c3e531f9614fbb6",
   			));

   			$response = curl_exec($curl);

   			curl_close($curl);

   			if ($err) {
   				echo "cURL Error #:" . $err;
   			} else {
   				//echo $response;
   			}

   		$status = json_decode($response);
           
        $nodestatus=$status->result;
       // echo $nodestatus;

   		return $nodestatus;
 }


    function gettestdetails($url)
    {
            
            $clientstatus=array();
            $curl = curl_init();

                curl_setopt_array($curl, array(
                //CURLOPT_URL => 'http://jenkins.helenoftroy.com:8080/view/all/job/TestAutomation/job/RevlonSystemTests/lastBuild/api/json/',
                CURLOPT_URL => $url . "logText/progressiveText",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_USERPWD => "mchiruvella:11c7c177b711f81e5c7c3e531f9614fbb6",
                ));

                $response = curl_exec($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    //echo $response;
                }

            //$status = json_decode($response);

            $passed = explode('No of test passed: ',$response);
            $total = explode('No of test total: ',$response);
            //var_dump($total[1][0]);exit;

            if($total[1][0]==$passed[1][0]){
                
                return "Passed";
            }           

            return "Failed";
    }
?>