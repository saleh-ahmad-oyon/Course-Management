<?php
	require '../model/db.php';
	require 'define.php';
	
	if(isset($_POST['addMidBestTwo'])){
		$cid = $_POST['cid'];
		$sid = $_POST['sid'];
		$mark = $_POST['mark'];

		addMidBestTwo($cid, $sid, $mark);
		header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
	}
	elseif(isset($_POST['addFinalBestTwo'])){
		$cid = $_POST['cid'];
		$sid = $_POST['sid'];
		$mark = $_POST['mark'];

		addFinalBestTwo($cid, $sid, $mark);
		header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
	}
	elseif(isset($_POST['addMidTotal'])){
		$cid = $_POST['cid'];
		$sid = $_POST['sid'];
		$mark = $_POST['mark'];

		addMidTotal($cid, $sid, $mark);
		header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
	}
	elseif(isset($_POST['addFinalTotal'])){
		$cid = $_POST['cid'];
		$sid = $_POST['sid'];
		$mark = $_POST['mark'];

		addFinalTotal($cid, $sid, $mark);
		header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
	}
	elseif(isset($_POST['addGrandTotal'])){
		$cid = $_POST['cid'];
		$sid = $_POST['sid'];
		$mark = $_POST['mark'];
		
		addGrandTotal($cid, $sid, $mark);
		header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
	}
	else{
		header('Location: '.SERVER.'');
	}
?>