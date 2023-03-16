<?php

trait Functions
{
    public function result($result, $message)
    {
        $data = array(
            "success" => $result,
            "message" => $message
        );
        return json_encode($data);
    }

    public function sanitize($data)
    {
        return trim(htmlspecialchars($data));
    }

    public function check($condition, $status, $message)
    {
        if (!$condition) {
            return false;
        }
        $this->view("api", ['response' => $this->result($status, $message)]);
        return true;
    }

    public function checkPostFields($required)
    {
        foreach ($required as $field) {
            if ($this->check(!isset($_POST[$field]) || empty($_POST[$field]), false, 'Missing ' . $field)) {
                return true;
            }
        }
    }

    public function isRealDate($date)
    {
        if (false === strtotime($date)) {
            return false;
        }
        list($year, $month, $day) = explode('-', $date);
        return checkdate($month, $day, $year);
    }

    public function getPostValues($arr)
    {
        foreach ($arr as $field => $value) {
            $arr[$value] = $_POST[$value];
            unset($arr[$field]);
        }
        return $arr;
    }
}