<?php
require("connect.php");

$email = $_POST['email'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$country = $_POST['country'];
$hash = password_hash($pass, PASSWORD_DEFAULT);

if (!empty($email)) {
    $insert = $con->query("INSERT INTO `users`(`email`, `name`, `password`, `country`, `gender`, `bdate`) VALUES ('$email','$name','$hash','$country','$gender','$date')");

    if ($insert) {
        header("location: ../login.php?msg=Your account is successfully created");
    }
} else {
    header("location: ../login.php?msg=Email can't be empty");
}

?>
