<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Automation Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="<?php echo site_url();?>/DailyTrends"><img src="<?php echo base_url();?>images/logo.svg" height="30" alt=""></a>
        <ul class="navbar-nav my-0 mr-md-auto">
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="home"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/DailyTrends" role="button">Dashboard</a></li>
            <!-- <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="bvtportal"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/executionportal/bvtportal" role="button">Execution Portal</a></li>
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="tracker"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/dashboard/tracker" role="button">Automation Stats</a></li> -->
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="kibana"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/loganalytics/ApplicationLogErrors" role="button">Application Log Errors</a></li>
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="automationerrors"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/loganalytics/AutomationErrors" role="button">Automation Errors</a></li>
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="errorcharts"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/loganalytics/LogAnalyticsCharts" role="button">Log Analytics Charts</a></li>
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="execution"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/Execution_Controller" role="button">Execution Report</a></li>
         
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="reconcile"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/loganalytics/ReconcilationReport" role="button">Reconcilation Report</a></li>
            <li class="nav-item"><a class="<?php if($this->uri->segment(2)=="automationstatus"){echo "nav-link active";} else {echo "nav-link";} ?>" href="<?php echo site_url();?>/AutomationStatus" role="button">Automation Status</a></li>
        </ul>
        <ul class="navbar-nav my-2 my-md-0 mr-md-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php $this->load->library('session');print_r($_SESSION['user']); ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url();?>">Signout</a>
                </div>
            </li>
        </ul>
    </nav>