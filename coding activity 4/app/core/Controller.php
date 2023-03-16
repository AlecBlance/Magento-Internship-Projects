<?php

class Controller
{
    use Functions;

    public function model($model, $data = [])
    {
        require_once '../app/models/' . $model . '.php';
        return new $model($data);
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.view.php';
    }

    public function controllerMethod($folder, $controller)
    {
        require_once '../app/controllers/' . $folder . '/' . $controller . '.php';
        return new $controller();
    }
}