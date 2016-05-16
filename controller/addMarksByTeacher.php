<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/*===== Required Files =====*/
require '../model/db.php';
require 'define.php';

if (isset($_POST['addMidBestTwo'])) {  /** Add Best Two Quiz Marks in Mid */

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Marks of Best two Quizes In Mid Term Exam
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addMidBestTwo($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addFinalBestTwo'])) {  /** Add Best Two Quiz Marks in Final */

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Marks of Best two Quizes In Final Term Exam
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addFinalBestTwo($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addMidTotal'])) {  /** Add Total Marks in Mid */

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Total Marks of Mid Term
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addMidTotal($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addFinalTotal'])) {  /** Add Total Marks in Final */

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Total Marks of Final Term
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addFinalTotal($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} elseif (isset($_POST['addGrandTotal'])) {  /** Add Grand Total Marks */

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Grand Total Marks of Final Term
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

	addGrandTotal($cid, $sid, $mark);
	header('Location: '.SERVER.'/detailsMark?id1='.$cid.'&id2='.$sid.'');
} else {

    /** @link Home Page */
	header('Location: '.SERVER.'');
}
