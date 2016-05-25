<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Session Started */
session_start();

/** Required Files */
require 'model/db.php';
require 'controller/define.php';

if (isset($_POST['loginbtn'])) {

    /**
     * @var string     $user    AIUB ID
     * @var string     $pass    Password
     */
	$user = $_POST['user'];
	$pass = $_POST['pass'];

    /**
     * Check if the AIUB ID pattern is matching with XX-XXXXX-X or XXXX-XXXX-X
     */
	if (preg_match('/^\d{2}\-\d{5}\-\d{1}$|^\d{4}\-\d{3,4}\-\d{1}$/',$user)) {

        /** Check if the AIUB ID pattern is matching with XXXX-XXXX-1 for Authority */
		if (preg_match('/^\d{4}\-\d{4}\-1$/',$user)) {
			$authority = check_authority_login($user, $pass);
			if ($authority) {

                /**
                 * @var string     $_SESSION['authority']    Saving Authority's AIUB ID
                 * @var int        $_SESSION['aid']          Saving Authority's ID
                 */
				$_SESSION['authority'] = $user;
				$_SESSION['aid'] = authority_id($user);
				header('Location: '.SERVER.'');
			} else {
				header('Location: '.SERVER.'?err=1');
			}		
		} elseif (preg_match('/^\d{4}\-\d{3,4}\-2$/',$user)) { /** Check if the AIUB ID pattern is matching with XXXX-XXXX-2 or XXXX-XXX-2 for Teacher */
			$teacher = check_teacher_login($user, $pass);
			if ($teacher) {

                /**
                 * @var string     $_SESSION['teacher']    Saving Teacher's AIUB ID
                 * @var int        $_SESSION['tid']        Saving Teacher's ID
                 */
                $_SESSION['teacher'] = $user;
				$_SESSION['tid'] = teacher_id($user);
				header('Location: '.SERVER.'');
			} else {
				header('Location: '.SERVER.'?err=1');
			}		
		} elseif (preg_match('/^\d{2}\-\d{5}\-\d{1}$/',$user)) {  /** Check if the AIUB ID pattern is matching with XX-XXXXX-1 for Student */
			$student = check_stud_login($user, $pass);
			if ($student) {

                /**
                 * @var string     $_SESSION['stud']    Saving Student's AIUB ID
                 * @var int        $_SESSION['sid']     Saving Student's ID
                 */
                $_SESSION['stud'] = $user;
				$_SESSION['sid'] = student_id($user);
				header('Location: '.SERVER.'');
			} else {
				header('Location: '.SERVER.'?err=1');
			}
		} else {
			header('Location: '.SERVER.'?err=2');
		}
	} else {
		header('Location: '.SERVER.'');
	}
}
