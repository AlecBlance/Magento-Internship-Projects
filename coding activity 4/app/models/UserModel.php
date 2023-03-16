<?php

class UserModel extends Model
{
    private $sanitation = ['username', 'name', 'gender', 'address', 'birthdate'];
    private $loginTb = ['username', 'password'];
    private $userTb = ['name', 'gender', 'address', 'birthdate', 'email'];

    public function isUsernamePresent()
    {
        return $this->select('login', ['username' => $this->sanitize($_POST['username'])]);
    }

    public function get()
    {
        $tableRow = $this->select('user', ['user_id' => $_SESSION['user']->user_id]);
        $username = $this->select('login', ['user_id' => $_SESSION['user']->user_id])[0]->username;
        $tableRow[0]->username = $username;
        return $tableRow[0];
    }

    public function post()
    {
        $this->prepareFields();
        $this->queryDb();
        return 'Successfully Updated';
    }

    private function prepareFields()
    {
        foreach ($this->sanitation as $field) {
            $_POST[$field] = $this->sanitize($_POST[$field]);
        }
        if (!empty($_POST['password'])) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            unset($this->loginTb[1]);
        }
        $this->userTb = $this->getPostValues($this->userTb);
        $this->loginTb = $this->getPostValues($this->loginTb);
    }

    private function queryDb()
    {
        $where = ["user_id" => $_SESSION['user']->user_id];
        $this->update('login', $this->loginTb, $where);
        $this->update('user', $this->userTb, $where);
    }
}