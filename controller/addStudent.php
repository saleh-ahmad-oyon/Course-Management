<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Session Starts */
session_start();

/** Required Files */
require '../model/db.php';
require 'define.php';

if (isset($_POST['addStud'])) {
	$stuId = $_POST['studId'];
	$cid   = $_POST['courseId'];
	
	if (checkStudentId($stuId)) {  //===== Check the Student ID is valid or not
		$tid = $_SESSION['tid'];

        if(checkFourtyStud($cid)) {  //===== Check if the no. of students is fourty or not =====
            if (checkUniqueId($tid, $stuId, $cid)) {  //===== Check the student has already added or not =====
                /**
                 * Adding Student in the Course
                 */
				addStudent($tid, $stuId, $cid);
				attendence($stuId, $cid);
				addMarks($stuId, $cid);
				
				echo '<script language="javascript">
					      alert("Successfully Added");
						  window.location="'.SERVER.'/teacher/course/'.$cid.'";
					  </script>';
			} else {
                echo '<script language="javascript">
                          alert("ID has already inserted !!");
						  window.location="'.SERVER.'/course/'.$cid.'/addstudent";
					  </script>';
			}
		} else {
            echo '<script language="javascript">
				      alert("You cannot enter more than 40 students !!");
					  window.location="'.SERVER.'/teacher/course/'.$cid.'";
				  </script>';
		}
	} else {
		echo '<script language="javascript">
			      alert("Student ID is Invalid !!");
				  window.location="'.SERVER.'/course/'.$cid.'/addstudent";
			  </script>';
	}
} else {
	header('Location: '.SERVER.'');
}
