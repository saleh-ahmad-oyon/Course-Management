<?php
require_once 'controller/define.php';

class Router
{
    private $controller;
    private $action;

    public function route()
    {
        if (!isset($_GET['controller'])) {
            header( 'location: '.SERVER );
            return;
        }

        $controller = $_GET['controller'];

        if (!file_exists('controller/'.$controller.'.php')) {
            throw new Exception('Invalid controller file : '.$controller);
            return;
        }

        include('controller/'.$controller.'.php');
        
        $class  = 'Controller_'.$controller;
        $this->controller = new $class();
        $this->action = isset($_GET['action']) ? 'action_'.$_GET['action'] : 'action_index';

        return $this;
    }

    public function display()
    {
        if ($this->controller) {
            $action = $this->action;
            $this->controller->$action();
        }
    }
}