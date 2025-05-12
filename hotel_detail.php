<?php
session_start();
require("functions/connect.php");
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
            <a href="">Flights</a>
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
            <a href="#" class="sidea">Flights</a>
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

    <!-- Hotels -->
<?php
$hotelid = $_GET['id']; 
$hoteldata = $con -> query("SELECT * FROM hotels WHERE id = '$hotelid'");
$hotel = $hoteldata ->fetch_assoc();
$fav = $con ->query("SELECT * FROM favorite WHERE user_id = '$id' AND hotel_id = '$hotelid'");
$favChick = $fav->num_rows;
?>
    <div class=" hotel-detail p-4 mx-auto mt-3">

        <div class="img w-25">
            <img src="<?php echo $hotel['img'] ?>" class="w-100 rounded-3" alt="">
        </div>

        <div class="detail p-3">
            <h1 class="text-light mb-3"><?php echo $hotel['name'] ;?></h1>
            <h4 class="text-light mb-3 ">Lacola de Sara</h4>
            <?php
if (isset($_GET['days']) && is_numeric($_GET['days'])) {
    // Convert $hotel['price'] to float to ensure it's a numeric value
    $pricePerNight = floatval($hotel['price']);
    // Convert $_GET['days'] to integer to ensure it's a numeric value
    $numberOfDays = intval($_GET['days']);
    
    // Perform the multiplication operation
    $totalPrice = $pricePerNight * $numberOfDays;
    
    echo '<h4 class="text-warning mb-3 fw-bold">' . $totalPrice . '$ Per ' . $numberOfDays . ' days</h4>';
} else {
    echo '<h4 class="text-warning mb-3 fw-bold">' . $hotel['price'] . '$ Per Night</h4>';
}
?>


            <p class="fw-bold fs-5 m-0 w-75">
            <?php echo $hotel['contant'] ;?>
            </p>

            <div class="rating mt-5">
                <div class="">
                    <i class="fa-solid fa-star fs-4  text-warning"></i>
                    <i class="fa-solid fa-star fs-4 text-warning"></i>
                    <i class="fa-solid fa-star fs-4 text-warning"></i>
                    <i class="fa-solid fa-star fs-4 text-warning"></i>
                    <i class="fa-regular fa-star fs-4 text-warning"></i>
                </div>

                <p class="m-0 fs-6 fw-bolder">(84) reviews</p>
                <span class="favorite"><i class="fa-regular <?php if($favChick > 0){echo "fa-solid";}else{echo "fa-heart";} ?> fa-heart"></i></span>
                <a href="pay.php?type=hotel&id=<?php echo $_GET['id'] . '&fdate='.$_GET['indate']. '&adate='.$_GET['outdate'].'&cost=' . ($_GET['days'] !== 'NaN' ? $totalPrice : floatval($hotel['price'])); ?>" class="btn py-1 bg-warning fw-bolder">Reserve</a>


            </div>

        </div>

    </div>

    </main>


<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
<script>
    $(".favorite").click(function(){
    var queryString = window.location.search;
    var params = new URLSearchParams(queryString);
    var id = params.get('id');
    $.post("functions/favorite.php", { hotId: id}, function(data){
        $("span").load(location.href + ' .favorite');
    });
});

</script>
</body>
</html>