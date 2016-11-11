<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require '../model/db.php';
require 'define.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

if (!isset($_POST['dltMarks'])) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

$cid    = $_GET['id1'];
$studid = $_GET['id2'];

if (!empty($_POST['check_dlt'])) {
    foreach ($_POST['check_dlt'] as $eid) {
        deleteExamMarks($eid);
    }
}

echo '<script language="javascript">
          alert("Successfully Deleted !!");
          window.location="'.SERVER.'/course/'.$cid.'/marks/'.$studid.'";
      </script>';
