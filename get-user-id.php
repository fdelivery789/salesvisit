<?php
include 'db.php';
$id = intval($_POST["id"]);
$results = $c->query("SELECT * FROM reset_passwords WHERE id=" . $id);
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    echo $row["firebase_user_id"];
} else {
    echo "";
}