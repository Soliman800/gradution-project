<?php 
require("connect.php");
$id = $_GET['id'];
$unfavourite = $con -> query("DELETE FROM favorite WHERE id = '$id'");
if($unfavourite){
    header("location: ../favorite.php");
}
?>