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
    <link rel="stylesheet" href="css/find.css">
   
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

    <div class="container my-5 p-5 text-center">
        <div class="preview">
            <i class="fa-solid fa-camera text-center text-light cam"></i>
            <img id="previewImage" src="img/Bitmap.png" alt="Preview Image">

        </div>

        <div class="custom-file my-5 bg-warning rounded-4">
            <span class="fs-4 w-75 fw-bolder">Insert a picture</span>
            <input type="file" id="fileInput" accept="image/*">
        </div>
        <div class="prediction text-light">

        </div>
    </div>

    </main>

    <script src="js/jquery.min.js"></script>
    <script>
   document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Get the selected file
    if (file) {
        const reader = new FileReader(); // Create a new FileReader object
        reader.onload = function(e) {
            // Set the src attribute of the image element to the data URL of the selected file
            document.getElementById('previewImage').src = e.target.result;
            $(".preview img").css("display","block");
            $(".preview i").css("display","none");

            // إرسال الصورة عبر POST باستخدام base64
            $.ajax({
                url: "http://127.0.0.1:5000/predict",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({ img: e.target.result }),
                success: function(response) {
                    $(".prediction").html(response.prediction);
                },
                error: function(error) {
                    $(".prediction").html(error);
                }
            });
        };
        reader.readAsDataURL(file); // Read the selected file as a data URL
    }
});

  </script>
<script src="js/main.js"></script>
</body>
</html>