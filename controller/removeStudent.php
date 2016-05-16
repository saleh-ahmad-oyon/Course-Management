<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if (isset($_POST['dltBtn'])) {
	$cid = $_GET['id1'];
	$sid = $_GET['id2'];

    /**
     * Removing Students from all the Records
     */
	deleteStudent($cid, $sid);
	deleteStudentAttendence($cid, $sid);
	removeStudentExam($cid, $sid);
	removeStudentQuizTerm($cid, $sid);

	echo '<script language="javascript">
		      alert("Successfully Removed !!");
			  window.location="'.SERVER.'/studentlist?id='.$cid.'";
		  </script>';
} else {
	header('Location: '.SERVER.'');
}
