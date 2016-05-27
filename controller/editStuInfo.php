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
 
if (isset($_POST['editBtn'])) {
    $fullName      = $_POST['editFullName'];
    $dept          = $_POST['editDept'];
    $phone         = $_POST['editPhone'];
    $email         = $_POST['editEmail'];
    $gender        = $_POST['sex'];
    $sid           = $_SESSION['sid'];
    $dob           = $_POST['dob'];
    $date          = date('Y-m-d', strtotime($dob));

    /**
     * @filesource
     */
    $target_dir    = '../assets/img/student/';
    $fn            = $_FILES["profilepic"]["name"];

    $target_file   = $target_dir . basename($fn);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if (!empty($fn)) {
        $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
        
        if ($check !== false) {
            $image     = md5($sid) . '_' . $_FILES['profilepic']['name'];
            $file_path = $target_dir.$image;

            move_uploaded_file($_FILES['profilepic']['tmp_name'], $file_path);

            editBasicInfo($fullName, $dept, $phone, $email, $sid, $image, $gender, $date);
            
            echo '<script language="javascript">
                      alert("Update Successful !!");
                      window.location="'.SERVER.'/profile";
                  </script>';
            
        } else {
            echo '<script language="javascript">
                      alert("Uploaded File is not an image !!");
                      window.location="'.SERVER.'/profile";
                  </script>';
        }
    } else {
        editBasicInfoWithoutPic($fullName, $dept, $phone, $email, $sid, $gender, $date);
        
        echo '<script language="javascript">
                  alert("Update Successful !!");
                  window.location="'.SERVER.'/profile";
              </script>';
    }
} else {
    header('Location: '.SERVER.'');
}
