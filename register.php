<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/all.min.css">
    <link rel="stylesheet" href="Css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/register.css">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_GET['msg']) && $_GET['msg']=="Your account is successfully craeted"){
        echo '<div class="msg p-3 mb-2 bg-success text-white">'.$_GET['msg'].'</div>';
    }elseif(isset($_GET['msg'])){
        echo '<div class="msg p-3 mb-2 bg-danger text-white">'.$_GET['msg'].'</div>';
    } 
    ?>
    <div class="d-flex justify-content-between">
        <div class="img w-50">
            <img src="img/Rectangle 11.png">
        </div>
        <div class="login w-50 p-4  text-light ">

            <a href="index.php" class="home-link">
                <div class="logo text-center ">
                    <img src="img/logo.png" class="" alt="">
                    <p class="fw-bold m-0">Trip Trekker</p>
                </div>
            </a>

            <div>
                <h3>Sign up</h3>
                <h5>If you already have an account register you can <a href="login.php" class="text-warning"><strong>Login here.</strong></a></h5>
            </div>

            <form class="form1">

                <h5 class="mt-5 ">Email</h5>
                <input id="email" type="email" name="email" placeholder="Enter your Email" required class="w-100 border-warning mt-2" >
                <button class="check py-3 mt-4 w-100 rounded-4 bg-warning fw-bolder text-light">Create Account</button>

            </form>
        </div>
        <div class="create">
            <div class="img1">
                <img src="img/logo.png" alt="">
            </div>
            <div class="form mt-3">
            <form class="reg" action="functions/reg.php" method="post">
                <input id="hidden" type="hidden" name="email">
                <div class="sty">
                <h6>Name</h6>
                <input type="text" name="name" placeholder="User Name" required class="border-warning">
                </div>
                <div class="sty">
                <h6>Country</h6>
                <select required name="country" class="to border-warning">
                <?php
                require("functions/connect.php");
                $selcountry = $con->query("SELECT * FROM countries");
                foreach ($selcountry as $country) :
                ?>
                <option class="border-warning" value="<?php echo $country['val']; ?>"><?php echo $country['name']; ?></option>
                <?php endforeach ?>
                </select>
                </div>
                <div class="sty">
                <h6>Gender</h6>
                <select name="gender" class="border-warning">
                    <option value="0">Male</option>
                    <option value="0">FeMale</option>
                </select>
                </div>
                <div class="sty">
                    <h6>Date of birth</h6>
                    <input name="date" type="date" class="border-warning">
                </div>
                <div class="sty">
                    <h6>Password</h6>
                    <input type="Password" placeholder="Password" class="pass border-warning">
                </div>
                <div class="sty">
                    <h6>Confirm Password</h6>
                    <input type="Password" name="pass" placeholder="Confirm Password" class="pass1 border-warning">
                </div>
                <div class="sub">
                    <input class="btn btn-hover btn-warning" type="submit"  value="Create Now!">
                </div>
            </form>
            </div>
            
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="Js/bootstrap.bundle.min.js"></script>
    <script src="js/reg.js"></script>
</body>
</html>
