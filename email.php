<?php
$email_to = "info@nexasoft.my,sufian@nexasoft.my";
$email_subject = "Programming test";

$email_message = "Form details below.\n\n";

function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
}

$email_message .= "First Name: ".clean_string($first_name)."\n";
$email_message .= "Last Name: ".clean_string($last_name)."\n";
$email_message .= "Email: ".clean_string($email)."\n";
$email_message .= "Comments: ".clean_string($comment)."\n";

$headers = "From: syafiqnasir@gmail.com" . "\r\n" .
    "CC: extra@example.com";


if (mail($email_to, $email_subject, $email_message, $headers)){
    include "success.html";
}
else
    include "fail.html";
    $error_count++;

?>