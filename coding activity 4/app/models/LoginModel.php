<?php

class LoginModel extends Model
{
    private $tableRow;
    private $result;

    public function __construct(
        private $loginTb
    )
    {
        $this->prepareFields();
        $this->queryDb();
        $this->createSession();
    }

    private function prepareFields()
    {
        $_POST['username'] = $this->sanitize($_POST['username']);
        $this->loginTb = $this->getPostValues($this->loginTb);
    }

    private function queryDb()
    {
        $this->tableRow = $this->select('login', ['username' => $this->loginTb['username']]);
        if (!$this->tableRow) {
            $this->result = false;
            return;
        }
        $this->result = password_verify($this->loginTb['password'], $this->tableRow[0]->password);
    }

    private function createSession()
    {
        if (!$this->result) {
            return;
        }
        $_SESSION['loggedIn'] = true;
        $_SESSION['user'] = $this->tableRow[0];
    }

    public function getResult()
    {
        return $this->result;
    }
}