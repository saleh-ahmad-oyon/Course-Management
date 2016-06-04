<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Session Starts */
session_start();

/** Required File */
require_once 'define.php';

/** Destroy Session */
session_unset();
session_destroy();

/** Redirect to Home Page */
header('Location: '.SERVER.'');
