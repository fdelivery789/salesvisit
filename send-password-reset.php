<?php
include 'db.php';
$userID = $_POST["user_id"];
$email = $_POST["email"];
$results = $c->query("SELECT * FROM reset_passwords WHERE firebase_user_id='" . $userID . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    $id = $row["id"];
    sendMail($email, $id);
    echo 1;
} else {
    $c->query("INSERT INTO reset_passwords (firebase_user_id) VALUES ('" . $userID . "')");
    $id = mysqli_insert_id($c);
    sendMail($email, $id);
    echo 2;
}

function sendMail($email, $id) {
    $to      = $email;
    $subject = 'Atur ulang kata sandi Sales Visit';
    $message = "Mohon klik link di bawah untuk mengatur ulang kata sandi Anda:\n\nhttps://fdelivery.xyz/salesvisit/forgot-password.html?id=" . $id . "\n";
    $headers = 'From: fdelivery789@gmail.com' . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    //$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to, $subject, $message, $headers);
}