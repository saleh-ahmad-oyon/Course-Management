<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/**
 * Establish a connection with the Database.
 *
 * mysqli is used for the Database Connection
 *
 * @return String    Database Connectivity
 */
function db_conn()
{
    $SERVER = 'localhost';
    $user   = 'root';
    $pass   = '';
    $db     = 'course_management';
    $conn   = mysqli_connect($SERVER, $user, $pass, $db) or die(mysqli_connect_error());

    return $conn;
}