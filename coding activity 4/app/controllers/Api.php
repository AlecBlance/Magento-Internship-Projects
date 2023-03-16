<?php

class Api extends Controller
{
    public function index()
    {
        $this->view("api", ['response' => $this->result(false, "No valid API request found")]);
    }

    public function login()
    {
        $this->controllerMethod('api', 'Login');
    }

    public function register()
    {
        $this->controllerMethod('api', 'Register');
    }

    public function user($method = 'index')
    {
        $this->controllerMethod('api', 'User')->$method();
    }
}