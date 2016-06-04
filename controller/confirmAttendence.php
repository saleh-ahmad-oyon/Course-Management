<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if (!isset($_POST['attend'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

/** @var int $cid     Course ID */
$cid = $_GET['id'];

if (!empty($_POST['check_att'])) {
    foreach ($_POST['check_att'] as $sid) {
        insertAttendence($sid, $cid);
    }
}

echo '<script language="javascript">
          alert("Attendance Confirmed !!");
          window.location="'.SERVER.'/teacher/course/'.$cid.'";
      </script>';
