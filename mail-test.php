<?php
$email = $_POST["email"];
$to      = $email;
$subject = 'Atur ulang kata sandi';
$message = 'This is message 2';
$headers = 'From: fdelivery789@gmail.com' . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
?> 