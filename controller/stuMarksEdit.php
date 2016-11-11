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

if (!isset($_POST['editMarks'])) {
	/** @Link 404 Page */
	header('Location: '.SERVER.'/404');
	return;
}

$id = $_POST['id'];
$m  = $_POST['marks'];
$j  = 0;

for ($i = 0; $i < count($_POST['id']); $i++) {
    for ($j; $j < $i+1 ; $j++) {
        updateMarks($id[$i], $m[$j]);
    }
}
$cid    = $_GET['id1'];
$studid = $_GET['id2'];

echo '<script language="javascript">
          alert("Successfully Edited !!");
          window.location="'.SERVER.'/course/'.$cid.'/marks/'.$studid.'";
      </script>';
