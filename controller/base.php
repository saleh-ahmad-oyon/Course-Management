<?php

class Base
{
    protected $data  = array();

    public function __set($var, $value)
    {
        $this->data[$var] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __get($var)
    {
        if (array_key_exists($var, $this->data)) {
            return $this->data[$var];
        }
    }

    public function render($view, $array=[])
    {
        if (!file_exists($view.'.php')) {
            throw new Exception('View file not found :'.$view);
        }

        $array = empty($array) ? $this->data : array_merge($this->data, $array);
        extract($array);
        ob_start();
        include $view . '.php';

        $renderedView = ob_get_clean();
        echo $renderedView;
    }
}
