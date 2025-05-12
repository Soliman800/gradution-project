<?php
session_start();
require("connect.php");
$id = $_SESSION['user'];
$delete = $con->query("DELETE FROM users WHERE id = '$id'");
if ($delete){
    session_unset();
    session_destroy();
    header("location: ../index.php");
}
?>