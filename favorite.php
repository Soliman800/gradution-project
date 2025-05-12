<?php
session_start();
$id = $_SESSION['user'];
if(!isset($_SESSION['user'])){
    header("location: login.php?msg=You must login first");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>favorite</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/favorite.css">
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="css/all.min.css">
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
<div class="holder">
<?php
    require("functions/connect.php");
    $fav = $con->query("SELECT * FROM favorite WHERE user_id = '$id'");
    while ($new = $fav->fetch_assoc()) {
        $hotel_id = $new['hotel_id'];
        $hotel = $con->query("SELECT * FROM hotels WHERE id = '$hotel_id'")->fetch_assoc();
?>
    <div class="fav bg-warning">
        <img src="<?php echo $hotel['img']; ?>">
        <div class="text">
            <h5><?php echo $hotel['name']; ?></h5>
        </div>
        <a href="functions/unfavorite.php?id=<?php echo $new['id']; ?>"><i class="fa-solid fa-trash"></i></a>
    </div>
<?php
    }
?>

</div>





</main>
</body>