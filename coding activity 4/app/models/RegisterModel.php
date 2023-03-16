<?php

class RegisterModel extends Model
{
    private $sanitation = ['username', 'name', 'gender', 'address', 'birthdate'];
    private $loginTb = ['username', 'password'];
    private $userTb = ['name', 'gender', 'address', 'birthdate', 'email'];

    public function __construct()
    {
        $this->prepareFields();
        $this->queryDb();
    }

    private function prepareFields()
    {
        foreach ($this->sanitation as $field) {
            $_POST[$field] = $this->sanitize($_POST[$field]);
        }
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $this->userTb = $this->getPostValues($this->userTb);
        $this->loginTb = $this->getPostValues($this->loginTb);
    }

    private function queryDb()
    {
        $this->insert('user', $this->userTb);
        $this->loginTb['user_id'] = $this->lastInsertId();
        $this->insert('login', $this->loginTb);
    }
}