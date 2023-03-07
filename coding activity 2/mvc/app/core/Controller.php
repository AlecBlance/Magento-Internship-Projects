<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.view.php';
    }

    public function result($result, $message)
    {
        $data = array(
            "success" => $result,
            "message" => $message
        );
        return json_encode($data);
        ;
    }
}
