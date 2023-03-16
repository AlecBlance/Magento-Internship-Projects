<?php

class Register extends Api
{
    private $required = [
        'username',
        'password',
        'name',
        'gender',
        'address',
        'birthdate',
        'email',
        'confirm_email',
        'confirm_password'
    ];

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
            || $this->checkPostFields($this->required)
            || $this->check(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL), false, 'Invalid email')
            || $this->check(!$this->isRealDate($_POST['birthdate']), false, 'Invalid birthdate')
            || $this->check($this->model('UserModel')->isUsernamePresent(), false, 'Username already taken')
            || $this->check(
                $_POST['email'] != $_POST['confirm_email'],
                false,
                'Confirmation email is not the same as email'
            )
            || $this->check(
                $_POST['password'] != $_POST['confirm_password'],
                false,
                'Confirmation password is not the same as password'
            );
    }

    private function queryModel()
    {
        $this->model('RegisterModel');
        $this->view('api', ['response' => $this->result(true, "Registered successfully!")]);
    }
}