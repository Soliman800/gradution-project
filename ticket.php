<?php
session_start();
require("functions/connect.php");   
if(!isset($_SESSION['user'])){
    header("location: login.php?msg=You must login first");
}
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
    <link rel="stylesheet" href="css/ticket.css">
   
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
<div class="ticket">
    <div class="hold">
        <form class="form" method="post" action="functions/flight.php">
            <h4>Search</h4>
            <label for="">From</label>
<p>
    <select id="fromSelect" name="from" class="from border-warning">
        <?php
        $selcountry = $con->query("SELECT * FROM countries");
        foreach ($selcountry as $country) :
        ?>
            <option value="<?php echo $country['val']; ?>"><?php echo $country['name']; ?></option>
        <?php endforeach ?>
    </select>
</p>
<label for="">To</label>
<p>
    <select id="toSelect" name="to" class="to border-warning">
        <?php
        $selcountry = $con->query("SELECT * FROM countries");
        foreach ($selcountry as $country) :
        ?>
            <option value="<?php echo $country['val']; ?>"><?php echo $country['name']; ?></option>
        <?php endforeach ?>
    </select>
</p>

            <label for="">Arrive Date</label>
            <p>
                <input required name="stdate" class="stdate border-warning" type="date">
            </p>
            <label for="">Leave Date</label>
            <p>
                <input name="enddate" required class="enddate border-warning" type="date">
            </p>
            <label for="">Ticket Type</label>
            <p>
            <select name="membership" class="border-warning membership">
                    <option value="0">Business</option>
                    <option value="1">Vip</option>
                    <option value="2">Member</option>
                </select>
            </p>
            <div class="counter">
                <p>
                    <i class="fa-solid fa-user" style="color: #FFD43B;"></i>Adult<div class="count"><p><span class="dicr1">-</span><input value="1" type="tel"> <span class="incr">+</span></p></div>
                </p>
                <p>
                    <i class="fa-solid fa-user" style="color: #FFD43B;"></i>Children<div class="count"><p><span class="dicr">-</span><input value="0" type="tel"><span class="incr">+</span></p></div>
                </p>
            </div>
            
            <div class="ticket-search">
                <input id="tics" style="background-color: orange;" class="btn" type="submit" value="Search">
            </div>
        </form>
    </div>
    <div class="row">
        <div class="wid col-sm-12">
        <?php
if (isset($_GET['class'])) {
    $tickets = $con->query("SELECT * FROM flight WHERE takeoff = '$_GET[takeoff]' AND land = '$_GET[land]' AND class = '$_GET[class]'");
    foreach ($tickets as $ticket) {
        $leaveval = $ticket['takeoff'];
        $landval = $ticket['land'];
        $leaveQuery = $con->query("SELECT name FROM countries WHERE val = '$leaveval'");
        $landQuery = $con->query("SELECT name FROM countries WHERE val = '$landval'");
        $leave = $leaveQuery->fetch_assoc();
        $land = $landQuery->fetch_assoc();
        $date = htmlspecialchars($_GET['date'], ENT_QUOTES, 'UTF-8');
        // Output your HTML code here with the ticket details
        ?>
        <div class="tick custom-div">
            <div class="time">
                <h5><?php echo $ticket['timeoff']; ?>:00 pm</h5>
                <p class="orig"><?php echo $leave['name']; ?></p>
                <i class="fa-solid fa-plane fa-rotate-90"></i>
                <h5><?php echo $ticket['timearrive']; ?>:00 pm</h5>
                <p class="disti"><?php echo $land['name']; ?></p>
            </div>
            <div class="detail">
                <div class="dethold">
                    <div class="name">
                        <h5>Name</h5>
                        <p class="tickname">Name</p>
                    </div>
                    <div class="cla">
                        <p class="class">
                            <?php if ($ticket['class'] == 0) {
                                echo "Business";
                            } elseif ($ticket['class'] == 1) {
                                echo "Vip";
                            } else {
                                echo "Member";
                            } ?>
                        
                        </p>
                    </div>
                </div>
                <div class="data">
                    <div class="da">
                        
                        <i class="fa-solid fa-briefcase"></i>
                        <div class="date1">
                            <p>Date</p>
                            <p class="tickdate"><?php echo $date; ?></p>
                        </div>
                    </div>
                    <div class="da">
                        <i class="fa-solid fa-door-closed"></i>
                        <div class="date1">
                            <p>Gate</p>
                            <p>A1</p>
                        </div>
                    </div>
                    <div class="da">
                        <i class="fa-solid fa-wheelchair"></i>
                        <div class="date1">
                            <p>seat</p>
                            <p>8</p>
                        </div>
                    </div>
                </div>
                <div class="sub">
                <a href="pay.php?type=flight&id=<?php echo $ticket['id'].'&fdate='.$_GET['date'].'&adate='.$_GET['adate']?>&cost=<?php echo $ticket['price']; ?>" class="btn btn-success">Book Flight</a>


                </div>
            </div>
        </div>
        <?php
    }
}
?>

        
        </div>
      </div>
</div>
</main>


<script src="js/jquery.min.js"></script>
<script src="js/hotels.js"></script>
<script src="js/main.js"></script>
</body>
</html>