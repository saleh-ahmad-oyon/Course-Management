<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if (isset($_POST['attend'])) {
	$cid = $_GET['id'];
    
	if (!empty($_POST['check_att'])) {
		foreach ($_POST['check_att'] as $sid) {
			insertAttendence($sid, $cid);
		}
	}
	echo '<script language="javascript">
			  alert("Attendance Confirmed !!");
			  window.location="'.SERVER.'/teacher/course/'.$cid.'";
		  </script>';
} else {
	header('Location: '.SERVER.'');
}
