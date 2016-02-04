<?php
	session_start();
	require_once 'define.php';
	session_unset();
	session_destroy();
	header('Location: '.SERVER.'');
?>