<?php
session_start();
require 'model/db.php';
require 'controller/define.php';

if(isset($_POST['loginbtn'])){
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	if(preg_match('/^\d{2}\-\d{5}\-\d{1}$|^\d{4}\-\d{4}\-\d{1}$/',$user)){
		if(preg_match('/^\d{4}\-\d{4}\-1$/',$user)){
			$sql = check_authority_login($user, $pass);
			if($sql){
				$_SESSION['authority'] = $user;
				$_SESSION['aid'] = authority_id($user);
				header('Location: '.SERVER.'');
			}
			else{
				header('Location: '.SERVER.'?err=1');
			}		
		}
		elseif(preg_match('/^\d{4}\-\d{4}\-2$/',$user)){
			$sql = check_teacher_login($user, $pass);
			if($sql){
				$_SESSION['teacher'] = $user;
				$_SESSION['tid'] = teacher_id($user);
				header('Location: '.SERVER.'');
			}
			else{
				header('Location: '.SERVER.'?err=1');
			}		
		}
		elseif(preg_match('/^\d{2}\-\d{5}\-\d{1}$/',$user)){
			$sql = check_stud_login($user, $pass);
			if($sql){
				$_SESSION['stud'] = $user;
				$_SESSION['sid'] = student_id($user);
				header('Location: '.SERVER.'');
			}
			else{
				header('Location: '.SERVER.'?err=1');
			}
		}
		else{
			header('Location: '.SERVER.'?err=2');
		}
	}
	else{
		header('Location: '.SERVER.'');
	}
}
?>