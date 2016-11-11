<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Session Starts */
session_start();

/** Error Reporting */
error_reporting(E_ALL | E_STRICT);

/** Required Files */
require('UploadHandler.php');
require_once 'define.php';

if (!file_exists('../assets/docs/'.$_SESSION['teacher'])) {
    mkdir('../assets/docs/'.$_SESSION['teacher']);
}

if (!file_exists('../assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course'])) {
    mkdir('../assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course']);
}

$options = [
    'upload_dir' => UPLOADDIR . '/assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course'].'/',
    'upload_url' => UPLOADDIR . '/assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course'].'/'
];

$upload_handler = new UploadHandler($options);
