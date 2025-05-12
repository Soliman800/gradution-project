<?php 
session_start();
require("connect.php");
$name = $_POST["name"];
$email = $_POST["email"];
$country = $_POST["country"];
$gender = $_POST["gender"];
$id = $_SESSION["user"];
$update = $con->query("UPDATE `users` SET `email`='$email', `name`='$name', `gender`='$gender', `country`='$country' WHERE id = '$id'");

if($update){
    header("location: ../settings.php");
}
?>