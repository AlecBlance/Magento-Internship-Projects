<?php

class Api extends Controller
{
    private $response;

    public function contact()
    {
        if (!$_POST) {
            $this->response = $this->result(false, "Api only accepts POST requests");
            $this->view("api", ['response' => $this->response]);
            return;
        }

        $name = $this->sanitize($_POST['name']);
        $email = $this->sanitize($_POST['email']);
        $message = $this->sanitize($_POST['message']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !$name || !$message) {
            $this->response = $this->result(false, "Fill all required fields");
            $this->view("api", ['response' => $this->response]);
            return;
        }

        $contact = $this->model('Contact');
        $contact->mail($name, $email, $message);
        $this->response = $this->result(true, "Successfully sent");
        $this->view("api", ['response' => $this->response]);
    }

    protected function sanitize($data)
    {
        return trim(htmlspecialchars($data));
    }
}
