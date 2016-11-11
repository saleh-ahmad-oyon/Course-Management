<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

if (!isset($_POST['dltTeacher'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

/** @var int $cid     Course ID */
$cid = $_POST['id'];

/**
 * Removing Teacher from a Course and all related records
 */
deleteTeacherCourse($cid);
deleteStudentCourse($cid);
deleteCourseStudentAttendence($cid);
removeCourseStudentExam($cid);
removeCourseStudentQuizTerm($cid);

echo '<script language="javascript">
          alert("Successfully Removed !!");
          window.location="'.SERVER.'/teacher/subject";
      </script>';
