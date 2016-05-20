<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if (isset($_POST['dltTeacher'])) {
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
}
