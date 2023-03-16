<?php

class Login extends Api
{
    private $required = ['username', 'password'];

    public function __construct()
    {
        if ($this->checkError()) {
            return;
        }
        $this->queryModel();
    }

    private function checkError()
    {
        return $this->check($_SERVER['REQUEST_METHOD'] !== 'POST', false, "POST requests only")
            || $this->check(!$_POST, false, 'Missing POST data')
            || $this->checkPostFields($this->required);
    }

    private function queryModel()
    {
        $loginModel = $this->model('LoginModel', $this->required);
        $this->check(!$loginModel->getResult(), false, 'Username or Password is incorrect');
        $this->view('api', ['response' => $this->result(true, 'Logged in!')]);
    }
}