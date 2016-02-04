<?php
	require '../model/db.php';
	require 'define.php';
	
	if(isset($_POST['attend'])){
		$cid = $_GET['id'];
		if(!empty($_POST['check_att'])){
			foreach($_POST['check_att'] as $sid){
				insertAttendence($sid, $cid);
			}
		}
		echo '<script language="javascript">
				alert("Attendence Confirmed !!");
				window.location="'.SERVER.'/teacherCourse?id='.$cid.'";
			  </script>';
	}
	else{
		header('Location: '.SERVER.'');
	}
?>