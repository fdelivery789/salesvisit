<?php
$to      = 'danaoscompany@gmail.com';
$subject = 'Atur ulang kata sandi';
$message = 'This is message 2';
$headers = 'From: fdelivery789@gmail.com' . "\r\n" .
    'Reply-To: danaoscompany@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
?> 