<?php

trait Method
{
    public function result($result, $message)
    {
        $data = array(
            "success" => $result,
            "message" => $message
        );
        return json_encode($data);
        ;
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
}
