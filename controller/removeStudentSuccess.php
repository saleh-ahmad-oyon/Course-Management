<?php
	require '../model/db.php';
	require 'define.php';

	if(isset($_POST['dltBtn'])){
		$cid = $_GET['id1'];
		$sid = $_GET['id2'];
		deleteStudent($cid, $sid);
		deleteStudentAttendence($cid, $sid);
		removeStudentExam($cid, $sid);
		removeStudentQuizTerm($cid, $sid);
		
		echo '<script language="javascript">
				alert("Successfully Removed !!");
				window.location="'.SERVER.'/studentlist?id='.$cid.'";
			  </script>';
	}
	else{
		header('Location: '.SERVER.'');
	}
?>