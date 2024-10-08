<?php
function strip_crlf($string) {
    return str_replace("\r\n", "", $string);
}

if (!empty($_POST["send"])) {
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $toEmail = "admin@phppot_samples.com";
    $name = strip_crlf($name);
    $email = strip_crlf($email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        $mailHeaders = "From: " . $name . " <" . $email . ">\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "Your contact information is received successfully.";
            $type = "success";
        } else {
            $message = "Failed to send your message.";
            $type = "error";
        }
    }
}
require_once "contact-view.php";
?>
