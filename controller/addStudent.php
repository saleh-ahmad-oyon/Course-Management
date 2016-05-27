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

if (!isset($_POST['addStud'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

/**
 * @var int $stuId     Student ID
 * @var int $cid     Course ID
 */
$stuId = $_POST['studId'];
$cid   = $_POST['courseId'];

/**
 * Check the Student ID is valid or not
 */
if (!checkStudentId($stuId)) {
    echo '<script language="javascript">
              alert("Student ID is Invalid !!");
              window.location="'.SERVER.'/course/'.$cid.'/addstudent";
          </script>';
    return;
}

/**
 * Check if the no. of students is forty or not
 */
if(!checkFourtyStud($cid)) {
    echo '<script language="javascript">
              alert("You cannot enter more than 40 students !!");
              window.location="'.SERVER.'/teacher/course/'.$cid.'";
          </script>';
    return;
}

/** @var int $tid     Teacher ID */
$tid = $_SESSION['tid'];

/**
 * Check the student has already added or not
 */
if (!checkUniqueId($tid, $stuId, $cid)) {
    echo '<script language="javascript">
              alert("ID has already inserted !!");
              window.location="'.SERVER.'/course/'.$cid.'/addstudent";
          </script>';
    return;
}

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
