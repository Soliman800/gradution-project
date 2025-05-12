<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="Js/test.js">
    <title>Document</title>
</head>
<body>
<?php 
if(isset($_GET['msg'])) {
    if($_GET['msg'] === "Your account is successfully created") {
        echo '<div class="msg p-3 mb-2 bg-success text-white">'.$_GET['msg'].'</div>';
    } else {
        echo '<div class="msg p-3 mb-2 bg-danger text-white">'.$_GET['msg'].'</div>';
    }
}
?>



    <div class="d-flex justify-content-between log-div">
        <div class="img w-50">
            <img src="img/Rectangle 11.png" class="w-100" alt="">
        </div>
        <div class="login w-50 p-4  text-light ">

            <a href="index.php" class="home-link mb-3">
                <div class="logo text-center ">
                    <img src="img/logo.png" class="" alt="">
                    <p class="fw-bold m-0">Trip Trekker</p>
                </div>
            </a>

            <div class="mt-3 mb-5">
                <h3>Sign in</h3>
                <h5>If you don’t have an account you can <a href="register.php" class="text-warning"><strong>Register here.</strong></a></h5>
            </div>

            <form action="functions/login.php" method="post">

                <h5 class="my-2 ">Email</h5>
                <input type="text" name="email" placeholder="Enter your Email" required class="fields w-100 mb-3" >

                <h5 class="my-2">Password</h5>
                <input type="password" name="pass" placeholder="Enter your Password" required class="fields w-100" >

                <div class="my-3 w-100 d-flex justify-content-between">
                    <p>Remember Password</p>
                    <p>Forget Password ?</p>
                </div>

                <br>

                <input type="submit" value="Login" class="my-2 py-3 w-100 rounded-4 bg-warning fw-bolder text-light"></input>

            </form>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="Js/bootstrap.bundle.min.js"></script>
    <script src="Js/test.js"></script>
    <script src="Js/reg.js"></script>
</body>
</html>
