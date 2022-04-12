<?php
class AuditReportsModel extends CI_Model {
    public function getReports() {
        $this->db->order_by('ScheduledAt', 'DESC');
        $query = $this->db->get('executionaudit');
        return$query->result_array();
    }

    public function getSystemHealth($date = null) {
      if(!$date) {
        $date = date("Y-m-d");
      }
      $this->db->where('createdAt >=', $date." 00:00:00");
      $this->db->where('createdAt <=', $date." 23:59:59");
      $query = $this->db->get('systemhealth');

      //var_dump($this->db->last_query() );exit;
        return $query->result_array();

    }

    public function getTestCasesModel($Project, $Environment, $testingTYpe, $Device, $platform)
    {
      //SELECT TestCases FROM `testexecutiondetails` where Project='Hydroflask' and Environment='Staging' and TestingType='Build smoke testing' and DeviceType='Web'
      $this->db->where('Project', $Project);
      $this->db->where('Environment', $Environment);
      $this->db->where('TestingType', $testingTYpe);
      $this->db->where('DeviceType', $Device);
      $this->db->select('TestCaseID,TestScriptName,TestDescription');
      $query = $this->db->get('testexecutiondetails');
      $res_array =  $query->result_array();
      if($res_array) {
        return $res_array;
      } else {
        return array();
      }

    }

    public function getLatestRecordsStatus()
    {
      $this->db->select(['id', 'BuildURL']);
      $this->db->where('ExecutionStatus', 'Running');
      $query = $this->db->get('executionaudit');
      $res_array =  $query->result_array();
      return $res_array;

    }
    public function updateStatus($record)
    {
      $this->db->where('id', $record['id']);
      return $this->db->update('executionaudit', $record);
    }

}
