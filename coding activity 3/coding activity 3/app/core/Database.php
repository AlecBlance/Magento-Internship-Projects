<?php

class Database
{
    private $connection;

    private function connect()
    {
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $data = [])
    {
        $this->connection = $this->connect();
        $stm = $this->connection->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }

        return false;
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
