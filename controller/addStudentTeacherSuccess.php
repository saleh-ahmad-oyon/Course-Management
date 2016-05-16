<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/*===== Session Starts =====*/
session_start();

/*=====  Required Fies =====*/
require '../model/db.php';
require 'define.php';

/**
 * Adding Teacher or Student by Authority
 */
if (isset($_POST['addTeacher'])) {
    $name          = $_POST['tname'];
    $designation   = $_POST['desg'];
    $email         = $_POST['temail'];
    $phone         = $_POST['tphone'];
    $gender        = $_POST['sex'];
    $dob           = $_POST['dob'];
    $ID            = $_POST['aiubID'];
    $date          = str_replace('/', '-', $dob);
    $date          = date('Y-m-d', strtotime($date));

    /**
     * @filesource
     */
    $target_dir    = '../assets/img/teacher/';
    $fn            = $_FILES["teacherpic"]["name"];
    $target_file   = $target_dir . basename($fn);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (!empty($fn)) {
        $file  = $_FILES['teacherpic'];
        $check = getimagesize($_FILES["teacherpic"]["tmp_name"]);

        if ($check !== false) {
            $file_path = $target_dir . $file['name'];
            move_uploaded_file($file['tmp_name'], $file_path);
            $pic = $file['name'];

            if (returnTeacherAiubID($ID)) {
                insertTeacher($ID, $name, $phone, $email, $pic, $gender, $date, $designation);

                echo '<script language="javascript">
                          alert("Successfully Added !!");
                          window.location="' . SERVER . '";
                      </script>';
            } else {
                echo '<script language="javascript">
                          alert("AIUB ID already exist. Failed to add !!");
                          window.location="' . SERVER . '";
                      </script>';
            }
        } else {
            echo '<script language="javascript">
                      alert("Uploaded File is not an image !!");
                      window.location="' . SERVER . '";
                  </script>';
        }
    } else {
        $pic = "default-user.png";
        insertTeacher($ID, $name, $phone, $email, $pic, $gender, $date);
        echo '<script language="javascript">
                            alert("Successfully Added !!");
                            window.location="' . SERVER . '";
                          </script>';
    }
} elseif (isset($_POST['addStudent'])) {
    $name          = $_POST['fullname'];
    $dept          = $_POST['editDept'];
    $email         = $_POST['email'];
    $phone         = $_POST['phone'];
    $gender        = $_POST['sex'];
    $dob           = $_POST['dob'];
    $ID            = $_POST['aiubID'];
    $cgpa          = $_POST['cgpa'];
    $date          = str_replace('/', '-', $dob);
    $date          = date('Y-m-d', strtotime($date));

    $target_dir    = '../assets/img/student/';
    $fn            = $_FILES["stupic"]["name"];

    $target_file   = $target_dir . basename($fn);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (!empty($fn)) {
        $file  = $_FILES['stupic'];
        $check = getimagesize($_FILES["stupic"]["tmp_name"]);

        if ($check !== false) {
            $file_path = $target_dir . $file['name'];
            move_uploaded_file($file['tmp_name'], $file_path);
            $pic = $file['name'];
            if (returnStuAiubID($ID)) {
                insertStudent($ID, $name, $cgpa, $phone, $email, $dept, $pic, $gender, $date);

                echo '<script language="javascript">
                          alert("Successfully Added !!");
                          window.location="' . SERVER . '";
                      </script>';
            } else {
                echo '<script language="javascript">
                          alert("AIUB ID already exist. Failed to add !!");
                          window.location="' . SERVER . '";
                      </script>';
            }
        } else {
            echo '<script language="javascript">
                      alert("Uploaded File is not an image !!");
                      window.location="' . SERVER . '";
                  </script>';
        }
    } else {
        $pic = "default-user.png";
        insertStudent($ID, $name, $cgpa, $phone, $email, $dept, $pic, $gender, $date);

        echo '<script language="javascript">
                  alert("Successfully Added !!");
                  window.location="' . SERVER . '";
              </script>';
    }
}
