<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if (!isset($_POST['dltBtn'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

/**
 * @var int $cid     Course ID
 * @var int $sid     Student ID
 */
$cid = $_GET['id1'];
$sid = $_GET['id2'];

/**
 * Removing Students from all the Records
 */
deleteStudent($cid, $sid);
deleteStudentAttendence($cid, $sid);
removeStudentExam($cid, $sid);
removeStudentQuizTerm($cid, $sid);

echo '<script language="javascript">
          alert("Successfully Removed !!");
          window.location="'.SERVER.'/course/'.$cid.'/students";
      </script>';
