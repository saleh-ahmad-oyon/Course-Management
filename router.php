<?php
require_once 'controller/define.php';

class Router
{
    private $controller;
    private $action;
    private $param1 = false;
    private $param2 = false;

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

        if (isset($_GET['param1'])) {
            $this->param1 = $_GET['param1'];
        }
        if (isset($_GET['param2'])) {
            $this->param2 = $_GET['param2'];
        }

        return $this;
    }

    public function display()
    {
        if ($this->controller) {
            $action = $this->action;
            
            if (!$this->param1) {
                $this->controller->$action();
            } elseif(isset($this->param1) && !$this->param2) {
                $this->controller->$action($this->param1);
            } else {
                $this->controller->$action($this->param1, $this->param2);
            }
            
        }
    }
}