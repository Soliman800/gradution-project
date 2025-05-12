<?php
session_start();
require("connect.php");

$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$id = $_SESSION['user'];

$result = $con->query("SELECT `password` FROM `users` WHERE `id` = '$id'");
if ($result) {
    $row = $result->fetch_assoc();
    $hash = $row['password'];

    if (password_verify($oldpass, $hash)) {

        $newhash = password_hash($newpass, PASSWORD_DEFAULT);

        $update = $con->query("UPDATE `users` SET `password` = '$newhash' WHERE `id` = '$id'");
        if ($update) {
            echo "Password has been changed";
        }
    }else{
        echo "Old password is wrong";
    }
} 
?>
