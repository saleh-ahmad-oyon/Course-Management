<?php
session_start();
require '../model/db.php';
require 'define.php';

if(isset($_POST['editBtn'])){
    $fullName = $_POST['editFullName'];
    $phone = $_POST['editPhone'];
    $email= $_POST['editEmail'];
    $gender = $_POST['sex'];
    $tid = $_SESSION['tid'];
    $dob = $_POST['dob'];
    $date = date('Y-m-d', strtotime($dob));

    $target_dir = '../assets/img/teacher/';
    $fn = $_FILES["profilepic"]["name"];
    $target_file = $target_dir . basename($fn);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(!empty($fn)){
        $file = $_FILES['profilepic'];
        $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
        if($check !== false) {
            $file_path = $target_dir.$file['name'];
            move_uploaded_file($file['tmp_name'], $file_path);

            $pic = $file['name'];
            editTeacherBasicInfo($fullName, $phone, $email, $tid, $pic, $gender, $date);

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
    }
    else{
        editTeacherBasicInfoWithoutPic($fullName, $phone, $email, $tid, $gender, $date);
        echo '<script language="javascript">
							alert("Update Successful !!");
							window.location="'.SERVER.'/profile";
						  </script>';
    }
}
else{
    header('Location: '.SERVER.'');
}
?>