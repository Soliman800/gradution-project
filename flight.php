<?php 
session_start();
$from = $_POST['from'];
$to = $_POST['to'];
$membership = $_POST['membership'];
$date = $_POST['stdate'];
$adate = $_POST['enddate'];
header("location: ../ticket.php?takeoff=$from&land=$to&class=$membership&date=$date&adate=$adate");
?>