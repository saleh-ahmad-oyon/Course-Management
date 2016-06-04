<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if (!isset($_POST['addCot'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

$teacherInfo = explode(" ", $_POST['teacher']);
$tAiubId     = $teacherInfo[0];

if (isset($_POST['teacher'])) {
    $tid = getTId($tAiubId);
}

$course = $_POST['subject'];

if ($_POST['teacher'] == '' && $_POST['subject'] == '') {
    echo '<script language="javascript">
              alert("You\'ve to fill both teacher and course");
              window.location="'.SERVER.'/teacher/subject";
          </script>';
    return;
}

/** Checking if the Course is Assigned before to this Teacher */
if (!checkDuplicateCourse($tid, $course)) {
    echo '<script language="javascript">
              alert("The faculty member is already assigned in the course !!");
              window.location="'.SERVER.'/teacher/subject";
          </script>';
    return;
}

/** Checking if the Course is assigned before */
if (!checkCourse($course)) {
    echo '<script language="javascript">
              alert("Another Faculty member is already assigned in the course !!");
              window.location="'.SERVER.'/teacher/subject";
          </script>';
    return;
}

/** Assigning Course to the Teacher */
insertCourseTeacher($course, $tid);

echo '<script language="javascript">
          alert("Successfully Assigned !!");
          window.location="'.SERVER.'/teacher/subject";
      </script>';
