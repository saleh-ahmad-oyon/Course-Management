<?php

session_start();
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

if (!file_exists('../assets/docs/'.$_SESSION['teacher'])) {
    mkdir('../assets/docs/'.$_SESSION['teacher']);
}

if (!file_exists('../assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course'])) {
    mkdir('../assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course']);
}

$options = [
    'upload_dir' => $_SERVER['DOCUMENT_ROOT'].'/course/assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course'].'/',
    'upload_url' => $_SERVER['DOCUMENT_ROOT'].'/course/assets/docs/'.$_SESSION['teacher'].'/'.$_SESSION['course'].'/'
];

$upload_handler = new UploadHandler($options);
