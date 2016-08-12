<?php

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

if (!file_exists('docs')) {
    mkdir('docs');
}
$options = [
    'upload_dir' => $_SERVER['DOCUMENT_ROOT'].'/course/assets/docs/',
    'upload_url' => $_SERVER['DOCUMENT_ROOT'].'/course/assets/docs/'
];


$upload_handler = new UploadHandler($options);
