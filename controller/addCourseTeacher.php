<?php

/*===== Required Files =====*/
require '../model/db.php';
require 'define.php';

/**
 * Authority Assigns Course to the Teacher
 */
if (isset($_POST['addCot'])) {
    $id          = $_POST['id2'];
    $teacherInfo = explode(" ", $_POST['teacher']);
    $tAiubId     =  $teacherInfo[0];

    if (isset($_POST['teacher'])) {
        $tid = getTId($tAiubId);
    }

    $course = $_POST['subject'];

    if ($_POST['teacher'] != '' && $_POST['subject'] != '') {
        if (!checkDuplicateCourse($tid, $course)) {  //===== Checking if the Course is Assigned before to this Teacher =====
            if (!checkCourse($course)) {  //===== Checking if the Course is assigned before =====
                insertCourseTeacher($course, $tid);  //===== Assigning Course to the Teacher =====
                echo '<script language="javascript">
                          alert("Successfully Assigned !!");
                          window.location="'.SERVER.'/addSubject?id='.$id.'";
                      </script>';
            } else {
                echo '<script language="javascript">
                          alert("A teacher already assigned in this course !!");
                          window.location="'.SERVER.'/addSubject?id='.$id.'";
                      </script>';
            }
        } else {
            echo '<script language="javascript">
                      alert("Duplicate Data !! Can\'t insert !!");
                      window.location="'.SERVER.'/addSubject?id='.$id.'";
                  </script>';
        }
    } else {
        echo '<script language="javascript">
                  alert("You\'ve to fill both teacher and course");
                  window.location="'.SERVER.'/addSubject?id='.$id.'";
              </script>';
    }
}
