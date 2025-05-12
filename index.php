<?php
session_start();
// $id = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/find.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/hotel.css"> 
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
    <script src="https://kit.fontawesome.com/a9471c5b9a.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
    <header <?php if(isset($_SESSION['user'])){echo "style='padding-right:5%;'";} ?>>
        <a href="index.php"><img src="img/logo.png" alt="">Trip Trekker</a>
        <div class="links">
            <a href="index.php">Home</a>
            <a href="hotels.php">Hotels</a>
            <!-- <a href="">Ships</a> -->
            <a href="ticket.php">Flights</a>
            <a href="find.php">Find Place</a>
            <div class="settings">
            <a href="settings.php"><i class="fa-solid fa-user fa-flip" style="color: #FFD43B;"></i></a>
            <a href="favorite.php"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
            </div>
        </div>
        <?php 
if (!isset($_SESSION['user'])) {
    echo '<div class="logg">
        <a class="btn" href="register.php">Register</a>
        <a class="btn" style="background-color: rgba(255, 166, 0, 0.779);" href="login.php">Login</a>
    </div>';
}
?>
        
        
        <button class="btn btn-dark toggle" ><i class="fa-solid fa-bars"></i></button>
    </header>
    <div class="side">
        <div class="sided">
            <a href="index.php" class="sidea">Home</a>
            <a href="hotels.php" class="sidea">Hotels</a>
            <!-- <a href="#" class="sidea">Ships</a> -->
            <a href="ticket.php" class="sidea">Flights</a>
            <a href="find.php" class="sidea">Find Place</a>
            <div class="settings">
                <a href="settings.php"><i class="fa-solid fa-user fa-flip" style="color: #FFD43B;"></i></a>
                <a href="favorite.php"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
            </div>
            <?php 
if (!isset($_SESSION['user'])) {
    echo '<div class="logg sid">
    <a class="btn"  href="register.php">Register</a>
    <a class="btn" style="background-color: rgba(255, 166, 0, 0.779);" href="login.php">Login</a>
</div>';
}
?>
        </div>
    </div>

    <!-- Home -->

    <div class=" d-flex p-3 text-light justify-content-around all ">

        <div class="hold w-50">
            <h5 class="my-4 text-warning">The best deals on the world's best destinations.</h5>
            <h1 class="my-4">Best travel and destinations</h1>
            <h3 class="my-4 w-75">With travala you can experience new travel and the best tourist destinations that we have to offer</h3>

            <div class="butn d-flex w-75 p  justify-content-around">
                <a href="">
                    <div class=" bg-warning text-dark text-center fs-4 fw-bolder my-3 me-3 my-1 buttons">
                        Our Offers 
                    </div>
                </a>
                <a href="Contact.php">
                    <div class=" text-light text-center fs-4 fw-bolder ms-3 my-3 my-1 buttons d-flex justify-content-between align-items-center px-3">
                        <img src="img/Vector.png" alt="">
                        <p class="m-0 w-75 ">Our Contact</p> 
                    </div>
                </a>
            </div>
            
            <a href="About.php" class="about-button">
                <div class="btn1 text-dark w-75 fs-4 fw-bolder bg-warning  my-4">
                    About Us
                </div>
            </a>
            
        </div>

        <div class="w-50 img">

            <img src="img/traveller1.png" class="w-100  d-flex justify-content-center" alt="">
        </div>
    </div>

    </main>


<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>






