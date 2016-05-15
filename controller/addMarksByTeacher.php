<?php

/*===== Required Files =====*/
require '../model/db.php';
require 'define.php';

if (isset($_POST['addMidBestTwo'])) {  //===== Add Best Two Quiz Marks in Mid =====
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addMidBestTwo($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addFinalBestTwo'])) {  //===== Add Best Two Quiz Marks in Final =====
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addFinalBestTwo($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addMidTotal'])) {  //===== Add Total Marks in Mid =====
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addMidTotal($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addFinalTotal'])) {  //===== Add Total Marks in Final =====
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addFinalTotal($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addGrandTotal'])) {  //===== Add Grand Total Marks =====
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addGrandTotal($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} else {
	header('Location: '.SERVER.'');
}
