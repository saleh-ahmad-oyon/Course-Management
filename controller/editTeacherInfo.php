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
    $phone         = $_POST['editPhone'];
    $email         = $_POST['editEmail'];
    $gender        = $_POST['sex'];
    $tid           = $_SESSION['tid'];
    $dob           = $_POST['dob'];
    $date          = date('Y-m-d', strtotime($dob));

    /**
     * @filesource
     */
    $target_dir    = '../assets/img/teacher/';
    $fn            = $_FILES["profilepic"]["name"];
    $target_file   = $target_dir . basename($fn);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (!empty($fn)) {
        $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
        
        if ($check !== false) {
            $image     = md5($tid) . '_' . $_FILES["profilepic"]['name'];
            $file_path = $target_dir.$image;
            
            move_uploaded_file($_FILES['profilepic']['tmp_name'], $file_path);
            
            editTeacherBasicInfo($fullName, $phone, $email, $tid, $image, $gender, $date);

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
        editTeacherBasicInfoWithoutPic($fullName, $phone, $email, $tid, $gender, $date);
        
        echo '<script language="javascript">
				  alert("Update Successful !!");
				  window.location="'.SERVER.'/profile";
			  </script>';
    }
} else {
    header('Location: '.SERVER.'');
}
