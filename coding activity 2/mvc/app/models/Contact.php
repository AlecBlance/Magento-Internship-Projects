<?php

class Contact extends Model
{
    protected $table = 'contact_us';
    private $adminEmail = 'blancealec1@gmail.com';
    private $headers = "Alec Blance\r\nContent-type:text/html;charset=UTF-8\r\n";
    private $thankTemplate = "../app/views/thank.view.php";
    private $copyTemplate = "../app/views/copy.view.php";
    private $name;
    private $email;
    private $message;

    public function mail($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->thankTemplate = $this->getTemplate($this->thankTemplate);
        $this->copyTemplate = $this->getTemplate($this->copyTemplate);
        mail($email, "Re: Contact Us", $this->thankTemplate, "From: {$this->adminEmail} \r\n {$this->headers} ");
        mail($this->adminEmail, "Re: Contact Us", $this->copyTemplate, "From: {$email} \r\n {$this->headers}");

        $result = $this->insert(['name' => $name, 'email' => $email, 'message' => $message]);
        return $result;
    }

    private function getTemplate($template)
    {
        ob_start();
        include($template);
        $template = ob_get_contents();
        ob_end_clean();
        return $template;
    }
}
