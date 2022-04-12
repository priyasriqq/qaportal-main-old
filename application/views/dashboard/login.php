<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Automation Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="icon" type="image/png" href="images/faviconV11.png" />
	<link rel="stylesheet" href="css/codepen.io/marcobiedermann/css/style.css">
	<link rel="stylesheet" href="css/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/loginstyle.css">
</head>
<body class="align">

	<form method="post" action=" <?php echo site_url();?>/dashboard/authenticate" class="form form--login">
		<img src="images/download.png"><br>
		<?php 
		$this->load->library('session');
		echo ($this->session->flashdata('statusMsg')!=NULL) ? '<p style="color:red;">'.$this->session->flashdata('statusMsg').'</p>':'';
		?>
		<br>
		<div class="form__field">
			<label for="tl_login"> <i class="fa fa-user"></i></label>
			<input type="text" name="username" id="name"/>
		
		</div>
		<div class="form__field">
			<label for="tl_password"><i class="fa fa-lock"> </i> </label> 
			<input type="password" name="password" />
		</div>
		<?php 
		$count = $this->session->flashdata('counter');
		 ?>
		
	     <input type="submit" name="submit" value="Submit"
		 <?php 
		 if($count > 2 ){?>
	     disabled
		 <?php 
		}?> />
		<?php
		if ($count > 2 ){
		 echo "<script> window.alert(' ".$_SESSION['user']." is restricted to login');</script>";
		}?>
		
		</form>
</body>
</html>
