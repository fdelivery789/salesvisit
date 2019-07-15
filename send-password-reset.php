<?php
include 'db.php';
$userID = $_POST["user_id"];
$email = $_POST["email"];
$results = $c->query("SELECT * FROM reset_passwords WHERE firebase_user_id='" . $userID . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    $id = $row["id"];
    mail($email, "Atur ulang kata sandi Sales Visit", "Mohon klik link di bawah untuk mengatur ulang kata sandi Anda:\n\nhttp://b71df21d.ngrok.io/salesvisit/forgot-password.html?id=" . $id . "\n");
    echo 1;
} else {
    $c->query("INSERT INTO reset_passwords (firebase_user_id) VALUES ('" . $email . "')");
    $id = mysqli_insert_id($c);
    mail($email, "Atur ulang kata sandi Sales Visit", "Mohon klik link di bawah untuk mengatur ulang kata sandi Anda:\n\nhttp://b71df21d.ngrok.io/salesvisit/forgot-password.html?id=" . $id . "\n");
    echo 2;
}