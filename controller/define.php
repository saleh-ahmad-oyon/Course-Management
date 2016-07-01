<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Define Constants */

/** Define Protocol */
define('PROTOCOL', ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
    $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");

/** Define Server Name */
define('SERVER', PROTOCOL.$_SERVER['SERVER_NAME'].'/course');
define('STUDENTPP', SERVER.'/assets/img/student');
define('STUDENTPPICO', SERVER.'/assets/img/student/ico');
define('TEACHERPP', SERVER.'/assets/img/teacher');
define('TEACHERPPICO', SERVER.'/assets/img/teacher/ico');
