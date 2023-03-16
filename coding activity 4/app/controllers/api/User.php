<?php

class User extends Api
{
    private $required = [
        'username',
        'name',
        'gender',
        'address',
        'birthdate',
        'email'
    ];

    public function username()
    {
        if ($this->check(!isset($_POST['username']), false, 'Username parameter missing.')) {
            return;
        }
        $usernamePresent = $this->model('UserModel')->isUsernamePresent();
        if ($this->check($usernamePresent, false, 'Username already used')) {
            return;
        }
        $this->view("api", ['response' => $this->result(true, "Username available")]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . BASE);
    }

    public function index()
    {
        if (!isset($_SESSION['loggedIn'])) {
            $this->view('api', ['response' => $this->result(false, "Please log in.")]);
            return;
        }
        $userModel = $this->model('UserModel');
        $request = $_SERVER['REQUEST_METHOD'];
        if ($request === "POST" && $this->checkError()) {
            return;
        }
        $result = $userModel->$request();
        $this->view('api', ['response' => $this->result(true, $result)]);
    }

    private function checkError()
    {
        return $this->check(!$_POST, false, 'Missing POST data')
            || $this->checkPostFields($this->required)
            || $this->check(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL), false, 'Invalid email')
            || $this->check(!$this->isRealDate($_POST['birthdate']), false, 'Invalid birthdate')
            || $this->check(
                $this->model('UserModel')->isUsernamePresent() &&
                $this->model('UserModel')->isUsernamePresent()[0]->user_id != $_SESSION['user']->user_id,
                false,
                'Username already taken'
            )
            || $this->check(
                ($_POST['email'] != $_POST['confirm_email']) && !empty($_POST['confirm_email']),
                false,
                'Confirmation email is not the same as email'
            )
            || $this->check(
                ($_POST['password'] != $_POST['confirm_password']) &&
                (!empty($_POST['password']) && empty($_POST['confirm_password'])),
                false,
                'Confirmation password is not the same as password'
            );
    }
}