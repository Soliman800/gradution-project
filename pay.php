<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php?msg=You must login first");
    exit();
}
if(!isset($_GET['cost'])){
    header("location: hotels.php");
    exit();
}
$id = $_SESSION['user'];
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
    <link rel="stylesheet" href="css/pay.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
    <script src="https://kit.fontawesome.com/a9471c5b9a.js" crossorigin="anonymous"></script>
    <script src="mail/mail.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

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
<section class="pay">

    <div class="form mt-3">
            <form action="functions/pay.php" method="post">
                
            <?php
            if(isset($_GET['fdate']) && isset($_GET['adate'])) {
                echo '<input id="fdate" type="hidden" value="' . $_GET['fdate'] . '">';
                echo '<input id="adate" type="hidden" value="' . $_GET['adate'] . '">';
            }
?>

                <input id="type" type="hidden" name="type" value="<?php echo $_GET['type'] ;?>">
                <input class="idinput" type="hidden" name="id" value="<?php echo $_GET['id'] ;?>">
            <div class="sty">
                    <h6>Email</h6>
                    <input id="email" type="email" required name="email" placeholder="Email" class="border-warning">
                </div>
                <div class="sty">
                    <h6>Phone</h6>
                    <input id="phone" type="tel" maxlength="11" required placeholder="Phone" class="border-warning">
                </div>
                <div class="sty">
                <h6>Card Name</h6>
                <input type="text" name="name" placeholder="Card Name" required class="border-warning">
                </div>
                <div class="sty">
                <h6>Card Number</h6>
                <input id="cardnum" type="text" maxlength="16" name="card" placeholder="Card Number" required class="border-warning">
                </div>
                <div class="sty">
                <h6>Exp:date</h6>
                <input id="ex" type="text" name="name" placeholder="MM/YY" maxlength="5" required class="border-warning">
                </div>
                <div class="sty">
                    <h6>CVV</h6>
                    <input id="zip" name="date" type="text" placeholder="CVV" maxlength="3" class="border-warning">
                </div>
                
                
                <div class="sub">
                    <input id="kind" type="hidden" value="<?php echo $_GET['type'];?>">
                    <input class="btn btn-hover btn-warning" type="submit" value="Pay Now !">
                </div>
            </form>
        </div>
        <p class="text-warning text-center">Total payment is <span class="cost"><?php  echo $_GET['cost']; ?></span> $</p>

</section>
</main>


<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/pay.js"></script>
</body>
</html>