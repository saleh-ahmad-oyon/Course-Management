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

if (!isset($_POST['changePassword'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

/** @var String $oldPass            Old Password
 *  @var String $newpass            New Password
 *  @var String $confirmNewPass     Confirm New Password
 */
$oldPass        = $_POST['oldPass'];
$newpass        = $_POST['newPass'];
$confirmNewPass = $_POST['confirmNewPass'];

if ($newpass != $confirmNewPass) {
    echo '<script language="javascript">
		      alert("Donot Match !!");
			  window.location="'.SERVER.'";
		  </script>';
    return;
}

if ($_POST['user'] == '00') {
    /** @var int $aid     Authority ID */
    $aid = $_SESSION['aid'];

    if (!checkAuthorOldPass($aid, $oldPass)) {
        echo '<script language="javascript">
                  alert("Old Password did not match !!");
                  window.location="'.SERVER.'/changepassword?id=00";
              </script>';
        return;
    }

    /** Update Authority Password */
    updateAuthorityPass($aid, $newpass);
} elseif ($_POST['user'] == '11') {
    /** @var int $tid     Teacher ID */
    $tid     = $_SESSION['tid'];

    if (!checkTeacherOldPass($tid, $oldPass)) {
        echo '<script language="javascript">
                  alert("Old Password did not match !!");
                  window.location="'.SERVER.'/changepassword?id=11";
              </script>';
        return;
    }

    /** Update Teacher Password */
    updateTeacherPass($tid, $newpass);

} elseif ($_POST['user'] == '22') {
    $sid     = $_SESSION['sid'];

    if (!checkStudentOldPass($sid, $oldPass)) {
        echo '<script language="javascript">
                  alert("Old Password did not match !!");
                  window.location="'.SERVER.'/changepassword?id=22";
              </script>';
        return;
    }

    /** Update Student Password */
    updateStudentPass($sid, $newpass);
}

echo '<script language="javascript">
		  alert("Update Successful !!");
		  window.location="'.SERVER.'";
	  </script>';
