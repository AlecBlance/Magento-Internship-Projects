<?php

class Model extends Database
{
    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
        $this->query($query, $data);
    }
}
