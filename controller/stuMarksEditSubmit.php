<?php
	require '../model/db.php';
	require 'define.php';

	if(isset($_POST['editMarks'])){
		$id = $_POST['id'];
		$m = $_POST['marks'];
		$j=0;
		for($i=0; $i<count($_POST['id']); $i++){
			for($j; $j<$i+1 ; $j++){
				updateMarks($id[$i], $m[$j]);
			}
		}
		$cid = $_GET['id1'];
		$studid = $_GET['id2'];
		echo '<script language="javascript">
							alert("Successfully Edited !!");
							window.location="'.SERVER.'/detailsMark?id1='.$cid.'&id2='.$studid.'";
						  </script>';
	}
	else{
		header('Location: '.SERVER.'');
	}
?>