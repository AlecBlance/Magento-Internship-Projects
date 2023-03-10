<?php

class Warranty extends Model
{
    private $adminEmail = 'blancealec1@gmail.com';
    private $headers = "Warranty Announcer\r\nContent-type:text/html;charset=UTF-8\r\n";
    private $thankTemplate = "../app/views/thank.view.php";
    private $copyTemplate = "../app/views/copy.view.php";
    private $name;
    private $order_id;
    private $email;
    private $product;
    private $message;


    public function mail($order_id, $sku, $name, $email, $message)
    {
        $this->name = $name;
        $this->order_id = $order_id;
        $this->message = $message;
        $this->email = $email;
        $this->product = $this->select("product", ["product_sku" => $sku]);
        $this->thankTemplate = $this->getTemplate($this->thankTemplate);
        $this->copyTemplate = $this->getTemplate($this->copyTemplate);

        $customerSubject = "Warranty for your " . $this->product[0]->name . " in Order #$order_id";
        $customerHeaders = "From: {$this->adminEmail} \r\n {$this->headers} ";
        $adminSubject = "Warranty Info of $name for Order #$order_id - $sku product";
        $adminHeaders = "From: {$email} \r\n {$this->headers}";

        $warranty = $this->select("order_item", ["order_id" => $order_id, "product_sku" => $sku])[0]->warranty_id;
        if ($warranty) {
            return false;
        }

        $this->insert("warranty", ['message' => $message]);
        $this->update("order_item", ["warranty_id" => $this->lastInsertId()], ["order_id" => $order_id, "product_sku" => $sku]);

        mail($email, $customerSubject, $this->thankTemplate, $customerHeaders);
        mail($this->adminEmail, $adminSubject, $this->copyTemplate, $adminHeaders);
        return true;
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
