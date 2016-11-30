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

if (!array_key_exists('addMarks', $_POST)) {
    /** @Link 404 Page */
    header('Location: '.SERVER.'/404');
    return;
}

$sid      = $_POST['sid'];
$cid      = $_POST['cid'];
$marks    = $_POST['mark'];
$dateTime = $_POST['date'];
$name     = $_GET['name'];

if ($name == 'mid' || $name == 'final') {
    if (checkMid($name, $sid, $cid)) {
        header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'&err=1');
    } else {
        addQuiz1Marks($sid, $cid, $marks, $dateTime, $name);
        header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'');
    }
} else {
    addQuiz1Marks($sid, $cid, $marks, $dateTime, $name);
    header('Location: '.SERVER.'/course/'.$cid.'/marks/'.$sid.'');
}
