<?php
session_start();
require("functions/connect.php");
if(!isset($_SESSION['user'])){
    header("location: login.php?msg=You must login first");
}
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
    <link rel="stylesheet" href="css/hotels.css">
    <link rel="stylesheet" href="css/home.css">
   
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
<section>
<div class="hotel">
    <div class="hold">
        <form class="form">
            <h4>Search</h4>
            <label for="">Destination</label>
            <p>
                <input class="hDestination border-warning" placeholder="Cairo" type="text">
            </p>
            <label for="">Check in date</label>
            <p>
                <input required class="hInDate border-warning" type="date">
            </p>
            <label for="">Check out date</label>
            <p>
                <input required class="hOutDate border-warning" type="date">
            </p>
            <div class="counter">
                <p>
                    <i class="fa-solid fa-user" style="color: #FFD43B;"></i>Adult<div class="count"><p><span class="dicr1">-</span><input class="hAdultMember" value="1" type="number"> <span class="incr">+</span></p></div>
                </p>
                <p>
                    <i class="fa-solid fa-user" style="color: #FFD43B;"></i>Children<div class="count"><p><span class="dicr">-</span><input class="hKidsMember" value="0" type="number"><span class="incr">+</span></p></div>
                </p>
            </div>
            <div class="submit">
                <input style="background-color: orange;" class="btn" type="submit" value="Search">
            </div>
        </form>
    </div>
    <div class="row">
    <?php 
    $hotels = $con->query("SELECT * FROM hotels");
    foreach($hotels as $hotel):
    ?>
    <div id="<?php echo $hotel['id']; ?>" class="date col-md-4">
        <div class="card">
            <img src="<?php echo $hotel['img']; ?>"  alt="">
            <div class="card-body">
                <p class="card-title bg-warning"><?php echo $hotel['name']; ?></p>
                <p></p>
            </div>
            <div class="price">
                <p><?php echo $hotel['price']; ?> <i class="fa-solid fa-dollar-sign fa-flip" style="color: #FFD43B;"></i></p>
                <p>per day</p>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>

    </div>


</section>
</main>


<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/hotels.js"></script>
</body>
</html>