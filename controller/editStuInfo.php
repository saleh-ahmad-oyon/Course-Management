<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Session Starts */
session_start();

/** Required Files */
require '../model/db.php';
require 'define.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

if (!isset($_POST['editBtn'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

$fullName = $_POST['editFullName'];
$dept     = $_POST['editDept'];
$phone    = $_POST['editPhone'];
$email    = $_POST['editEmail'];
$gender   = $_POST['sex'];
$sid      = $_SESSION['sid'];
$dob      = $_POST['dob'];
$date     = date('Y-m-d', strtotime($dob));

/**
 * @filesource
 */
$target_dir    = '../assets/img/student/';
$fn            = $_FILES["profilepic"]["name"];

$target_file   = $target_dir . basename($fn);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check         = false;
    
if (empty($fn)) {
    editBasicInfoWithoutPic($fullName, $dept, $phone, $email, $sid, $gender, $date);
} else {
    if (!empty($_FILES["profilepic"]["tmp_name"])) {
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
                  alert("Image Type is not a gif/jpeg/png !!");
                  window.location="'.SERVER.'/profile";
              </script>';
        return;
    }

    $filename = pathinfo($_FILES['profilepic']['name'], PATHINFO_FILENAME);
    $fileext  = pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION);
    
    $image        = uniqid('') . md5($filename).'.'.$fileext;
    $file_path    = $target_dir.$image;
    $fileTmpLoc   = $_FILES['profilepic']['tmp_name'];
    $fileContents = hash_file('md5', $fileTmpLoc);
    $oldContent   = getFileContent($sid);

    if ($fileContents == $oldContent) {
        echo '<script language="javascript">
                  alert("You try to upload the same previous file !!");
                  window.location="'.SERVER.'/profile";
              </script>';
        return;
    }

    if ($check[2] == IMAGETYPE_JPEG) {
        $src = imagecreatefromjpeg($fileTmpLoc);
    } elseif ($check[2] == IMAGETYPE_PNG) {
        $src = imagecreatefrompng($fileTmpLoc);
    } else {
        $src = imagecreatefromgif($fileTmpLoc);
    }

    list($width,$height)=getimagesize($fileTmpLoc);

    $newwidth1  = 17;
    $newheight1 = 18;
    $tmp1=imagecreatetruecolor($newwidth1, $newheight1);

    imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,
        $width,$height);

    if (!move_uploaded_file($fileTmpLoc, $file_path)) {
        echo '<script language="javascript">
                  alert("ERROR: File not uploaded. Try again !!");
                  window.location="'.SERVER.'/profile";
              </script>';
        /** Remove the uploaded file from the PHP temp folder */
        unlink($fileTmpLoc);
        return;
    }

    $newIco   = uniqid('') . md5($filename).'_s.'.$fileext;
    $icoImage = $target_dir."ico/". $newIco;

    imagejpeg($tmp1,$icoImage,100);

    imagedestroy($tmp1);

    editBasicInfo($fullName, $dept, $phone, $email, $sid, $image, $gender, $date, $newIco, $fileContents);
}
echo '<script language="javascript">
          alert("Update Successful !!");
          window.location="'.SERVER.'/profile";
      </script>';
