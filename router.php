<?php
require_once 'controller/define.php';

class Router
{
    public function route(){
        if($controller = $_GET['controller']) {
            if (file_exists('controller/'.$controller.'.php')) {
                include('controller/'.$controller.'.php');
            } else {
                throw new Exception('Invalid controller file : '.$controller);
            }
            $class  = 'Controller_'.$controller;
            $action = isset($_GET['action']) ? 'action_'.$_GET['action'] : 'action_index';
            (new $class())->$action();
        } else {
            header( 'location: '.SERVER );
        }
    }
}