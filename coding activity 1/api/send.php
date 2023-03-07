<?php
    include "conn.php";
    header('Content-Type: application/json');

    function result($result) {
        $data = array(
            "success" => $result  
        );
        echo json_encode($data);
    }

    if(!$_POST) {
        result(false);
        return;
    }

    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $message = trim(htmlspecialchars($_POST['message']));
    $adminEmail = "blancealec1@gmail.com";
    $headers = "Alec Blance" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !$name || !$message) {
        result(false);
        return;
    }
    
    ob_start();
    include("./../template/thankyou.php");
    $thankTemplate = ob_get_contents();
    ob_end_clean();

    ob_start();
    include("./../template/copy.php");
    $copyTemplate = ob_get_contents();
    ob_end_clean();
    
    mail($email,"Re: Contact Us", $thankTemplate, "From: {$adminEmail} \r\n {$headers} ");
    mail($adminEmail, "Re: Contact Us", $copyTemplate, "From: {$email} \r\n {$headers}");
    
    $conn->execute_query("INSERT INTO contact_us (name, email, message) VALUES (?,?,?)", [$name, $email, $message]);
    result(true);
?>