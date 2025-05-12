<?php
require("connect.php");
$email = $_POST['email'];
$select = $con -> query("SELECT * FROM users WHERE email = '$email'");
$exist = $select->num_rows;
if($exist > 0){
    echo "Exist email";
}else{
    echo "Correct email";
}



?>