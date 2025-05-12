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
    <link rel="stylesheet" href="css/contact.css">
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

    <!-- Contact -->
    <div class="qr">
    <img style="width: 300px;" src="img/qr-code.png" alt="">
    </div>
    <div class="con">
    <a target="_blank" href="https://web.facebook.com/profile.php?id=61558186820073&mibextid=ZbWKwL&_rdc=1&_rdr"><i class="fa-brands fa-facebook"></i></a>
    <a target="_blank" href="https://www.instagram.com/trip_trikker?utm_source=qr&igsh=MW0ybWE0eW5rZHBvZA%3D%3D"><i class="fa-brands fa-instagram"></i></a>
    <a target="_blank" href="https://t.me/"><i class="fa-brands fa-telegram"></i></a>
    <a target="_blank" href="http://wa.me/+201097068212"><i class="fa-brands fa-whatsapp"></i></a>
    <a target="_blank" href="https://x.com/triptrikker?t=7QUNYePFRON"><i class="fa-brands fa-x-twitter"></i></a>
    
    </div>

    </main>


<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>