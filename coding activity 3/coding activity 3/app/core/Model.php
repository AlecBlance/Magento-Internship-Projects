<?php

class Model extends Database
{
    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO $table (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";
        $this->query($query, $data);
    }

    public function select($table, $data)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM $table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        $query = trim($query, " && ");
        return $this->query($query, $data);
    }

    public function update($table, $dataSet, $dataWhere)
    {
        $keySet = array_keys($dataSet);
        $keysWhere = array_keys($dataWhere);
        $query = "UPDATE $table SET ";

        foreach ($keySet as $key) {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " WHERE ";

        foreach ($keysWhere as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        $query = trim($query, " && ");
        $data = array_merge($dataSet, $dataWhere);
        $this->query($query, $data);
    }
}
