<?php
	session_start();
	require '../model/db.php';
	require 'define.php';
	
	if(isset($_POST['addStud'])){
		
		$stuId = $_POST['studId'];
		$cid = $_POST['courseId'];
		if(checkStudentId($stuId)){
			$tid = $_SESSION['tid'];
			if(checkUniqueId($tid, $stuId, $cid)){
				if(checkFourtyStud($cid)){
					addStudent($tid, $stuId, $cid);
					attendence($stuId, $cid);
					addMarks($stuId, $cid);
					
					echo '<script language="javascript">
							alert("Successfully Added");
							window.location="'.SERVER.'/teacherCourse?id='.$cid.'";
						  </script>';
				}
				else{			
					echo '<script language="javascript">
							alert("You cannot enter more than 40 students !!");
							window.location="'.SERVER.'/teacherCourse?id='.$cid.'";
						  </script>';
				}
			}
			else{
				echo '<script language="javascript">
							alert("ID has already inserted !!");
							window.location="'.SERVER.'/addStudent?id='.$cid.'";
						  </script>';
			}
		}
		else{
			echo '<script language="javascript">
							alert("Student ID is Invalid !!");
							window.location="'.SERVER.'/addStudent?id='.$cid.'";
						  </script>';
		}
	}
	else{
		header('Location: '.SERVER.'');
	}
?>