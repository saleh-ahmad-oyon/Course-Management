<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if (isset($_POST['addMidBestTwo'])) {

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Marks of Best two Quizes In Mid Term Exam
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

    /** Add Best Two Quiz Marks in Mid */
	addMidBestTwo($cid, $sid, $mark);

    /** @link Mark Details */
	header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'');
} elseif (isset($_POST['addFinalBestTwo'])) {

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Marks of Best two Quizes In Final Term Exam
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

    /** Add Best Two Quiz Marks in Final */
	addFinalBestTwo($cid, $sid, $mark);

    /** @link Mark Details */
	header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'');
} elseif (isset($_POST['addMidTotal'])) {

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Total Marks of Mid Term
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

    /** Add Total Marks in Mid */
	addMidTotal($cid, $sid, $mark);

    /** @link Mark Details */
	header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'');
} elseif (isset($_POST['addFinalTotal'])) {

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Total Marks of Final Term
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

    /** Add Total Marks in Final */
	addFinalTotal($cid, $sid, $mark);

    /** @link Mark Details */
	header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'');
} elseif (isset($_POST['addGrandTotal'])) {

    /**
     * @var int     $cid    Course ID
     * @var int     $sid    Student ID
     * @var double  $mark   Grand Total Marks of Final Term
     */
	$cid  = $_POST['cid'];
	$sid  = $_POST['sid'];
	$mark = $_POST['mark'];

    /** Add Grand Total Marks */
	addGrandTotal($cid, $sid, $mark);

    /** @link Mark Details */
	header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'');
} else {

    /** @link Home Page */
	header('Location: '.SERVER.'');
}
