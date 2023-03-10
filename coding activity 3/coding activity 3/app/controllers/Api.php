<?php

class Api extends Controller
{
    public function warranty($order_id = '', $sku = '')
    {
        if ($this->check(!$_POST, false, "Api only accepts POST requests")) {
            return;
        }
        if ($this->check(!$order_id, false, "Missing order number")) {
            return;
        }
        if ($this->check(!$sku, false, "Missing product SKU")) {
            return;
        }

        $name = $this->sanitize($_POST['name']);
        $email = $this->sanitize($_POST['email']);
        $message = $this->sanitize($_POST['message']);
        $order_id = $this->sanitize($order_id);
        $sku = $this->sanitize($sku);

        if ($this->check(!filter_var($email, FILTER_VALIDATE_EMAIL), false, "Enter a valid email")) {
            return;
        }
        if ($this->check(!$name, false, "Please enter a name")) {
            return;
        }
        if ($this->check(!$message, false, "Please enter a message")) {
            return;
        }

        $contact = $this->model('Warranty');

        if ($this->check(!$contact->select("orders", ["order_id" => $order_id]), false, "Order number cannot be found")) {
            return;
        }
        if ($this->check(!$contact->select("product", ["product_sku" => $sku]), false, "Product SKU cannot be found")) {
            return;
        }
        if ($this->check(!$contact->select("order_item", ["product_sku" => $sku, "order_id" => $order_id]), false, "Product is not in the order")) {
            return;
        }
        if ($this->check(!$contact->mail($order_id, $sku, $name, $email, $message), false, "Warranty already present in this Product")) {
            return;
        }

        $this->view("api", ['response' => $this->result(true, "Successfully sent")]);
    }

    public function index()
    {
        $this->view("api", ['response' => $this->result(false, "No api request found")]);
    }
}
