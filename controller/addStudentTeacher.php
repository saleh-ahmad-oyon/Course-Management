<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Session Starts */
session_start();

/**  Required Fies */
require '../model/db.php';
require 'define.php';

if ((!isset($_POST['addTeacher'])) && (!isset($_POST['addStudent']))) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

/**
 * Adding Teacher or Student by Authority
 */
if (isset($_POST['addTeacher'])) {
    $name          = $_POST['tname'];
    $designation   = $_POST['desg'];
    $email         = $_POST['temail'];
    $phone         = $_POST['tphone'];
    $gender = '';
    if (isset($_POST['sex'])) {
        $gender = $_POST['sex'];
    }
    $dob           = $_POST['dob'];
    $ID            = $_POST['aiubID'];
    $date          = str_replace('/', '-', $dob);
    $date          = date('Y-m-d', strtotime($date));

    /**
     * @filesource
     */
    $target_dir    = '../assets/img/teacher/';
    $fn            = $_FILES['teacherpic']['name'];

    $target_file   = $target_dir . basename($fn);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check         = false;

    if (!returnTeacherAiubID($ID)) {
        echo '<script language="javascript">
                      alert("AIUB ID already exist. Failed to add !!");
                      window.location="' . SERVER . '";
                  </script>';
        return;
    }

    if (empty($fn)) {
        $pic = "default-user.png";
        insertTeacher($ID, $name, $phone, $email, $pic, $gender, $date, $designation);
    } else {
        if (!empty($_FILES['teacherpic']['tmp_name'])) {
            $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
        }

        if (!$check) {
            echo '<script language="javascript">
                  alert("Unable to determine image type of uploaded file !!");
                  window.location="'.SERVER.'/profile";
              </script>';
            return;
        }

        if (($check[2] !== IMAGETYPE_GIF) && ($check[2] !== IMAGETYPE_JPEG) && ($check[2] !== IMAGETYPE_PNG)) {
            echo '<script language="javascript">
                  alert("Not a gif/jpeg/png !!");
                  window.location="'.SERVER.'/profile";
              </script>';
            return;
        }

        $image     = md5($ID) . '_' .$_FILES['teacherpic']['name'];
        $file_path = $target_dir . $image;

        move_uploaded_file($_FILES['teacherpic']['tmp_name'], $file_path);
        insertTeacher($ID, $name, $phone, $email, $image, $gender, $date, $designation);
    }
} elseif (isset($_POST['addStudent'])) {
    $name  = $_POST['fullname'];
    $dept  = $_POST['editDept'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $gender = '';
    if (isset($_POST['sex'])) {
        $gender = $_POST['sex'];
    }
    
    $dob  = $_POST['dob'];
    $date = str_replace('/', '-', $dob);
    $date = date('Y-m-d', strtotime($date));
    $ID   = $_POST['aiubID'];

    $cgpa = 0.0;
    if ($_POST['cgpa'] != null) {
        $cgpa = $_POST['cgpa'];
    }

    $target_dir    = '../assets/img/student/';
    $fn            = $_FILES["stupic"]["name"];

    $target_file   = $target_dir . basename($fn);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check         = false;

    if (!returnStuAiubID($ID)) {
        echo '<script language="javascript">
                      alert("AIUB ID already exist. Failed to add !!");
                      window.location="' . SERVER . '";
                  </script>';
        return;
    }

    if (empty($fn)) {
        $pic = "default-user.png";
        insertStudent($ID, $name, $cgpa, $phone, $email, $dept, $pic, $gender, $date);
    } else {
        if (!empty($_FILES['teacherpic']['tmp_name'])) {
            $check = getimagesize($_FILES["stupic"]["tmp_name"]);
        }

        if (!$check) {
            echo '<script language="javascript">
                  alert("Unable to determine image type of uploaded file !!");
                  window.location="'.SERVER.'/profile";
              </script>';
            return;
        }

        if (($check[2] !== IMAGETYPE_GIF) && ($check[2] !== IMAGETYPE_JPEG) && ($check[2] !== IMAGETYPE_PNG)) {
            echo '<script language="javascript">
                  alert("Not a gif/jpeg/png !!");
                  window.location="'.SERVER.'/profile";
              </script>';
            return;
        }

        $image     = md5($ID) . '_' . $_FILES['stupic']['name'];
        $file_path = $target_dir . $image;

        move_uploaded_file($_FILES['stupic']['tmp_name'], $file_path);
        insertStudent($ID, $name, $cgpa, $phone, $email, $dept, $image, $gender, $date);
    }
}

echo '<script language="javascript">
          alert("Successfully Added !!");
          window.location="' . SERVER . '";
      </script>';