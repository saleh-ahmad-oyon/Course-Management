<?php
	session_start();
	require '../model/db.php';
	require 'define.php';

	if(isset($_POST['changePassSubmit'])){
		$oldPass = $_POST['oldPass'];
		if($_POST['user'] == '00'){
			$authority = $_POST['user'];
			$aid = $_SESSION['aid'];
			if(checkAuthorOldPass($aid, $oldPass)){
				$newpass = $_POST['newPass'];
				$confirmNewPass = $_POST['confirmNewPass'];
				if($newpass == $confirmNewPass){
					updateAuthorityPass($aid, $newpass);
					
					echo '<script language="javascript">
							alert("Update Successful !!");
							window.location="'.SERVER.'";
						  </script>';
				}
				else{
					echo '<script language="javascript">
							alert("Donot Match !!");
							window.location="'.SERVER.'";
						  </script>';
				}
			}
			else{
				echo '<script language="javascript">
							alert("Old Password did not match !!");
							window.location="'.SERVER.'/changePass?id='.$authority.'";
						  </script>';
			}
		}
		elseif($_POST['user'] == '11'){
			$teacher = $_POST['user'];
			$tid = $_SESSION['tid'];
			if(checkTeacherOldPass($tid, $oldPass)){
				$newpass = $_POST['newPass'];
				$confirmNewPass = $_POST['confirmNewPass'];
				if($newpass == $confirmNewPass){
					updateTeacherPass($tid, $newpass);
					
					echo '<script language="javascript">
							alert("Update Successful !!");
							window.location="'.SERVER.'";
						  </script>';
				}
				else{
					echo '<script language="javascript">
							alert("Donot Match !!");
							window.location="'.SERVER.'";
						  </script>';
				}
			}
			else{
				echo '<script language="javascript">
							alert("Old Password did not match !!");
							window.location="'.SERVER.'/changePass?id='.$teacher.'";
						  </script>';
			}
		}
		elseif($_POST['user'] == '22'){
			$student = $_POST['user'];
			$sid = $_SESSION['sid'];
			if(checkStudentOldPass($sid, $oldPass)){
				$newpass = $_POST['newPass'];
				$confirmNewPass = $_POST['confirmNewPass'];
				if($newpass == $confirmNewPass){
					updateStudentPass($sid, $newpass);
					
					echo '<script language="javascript">
							alert("Update Successful !!");
							window.location="'.SERVER.'";
						  </script>';
				}
				else{
					echo '<script language="javascript">
							alert("Donot Match !!");
							window.location="'.SERVER.'";
						  </script>';
				}
			}
			else{
				echo '<script language="javascript">
							alert("Old Password did not match !!");
							window.location="'.SERVER.'/changePass?id='.$student.'";
						  </script>';
			}
		}
	}
	else{
		header('Location: '.SERVER.'');
	}
?>