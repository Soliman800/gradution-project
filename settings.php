<?php
require("functions/connect.php");
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php?msg=You must login first");
    exit();
}else{
    $id = $_SESSION['user'];
    $select = $con -> query("SELECT * FROM users WHERE id = '$id'");
    $new = $select ->fetch_assoc();
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
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="path/to/your/jsPDF/file/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
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
<div class="hold">
    <div class="menu">
    <h4>Settings</h4>
    <div class="options">
        <p class="account"><i class="fa-solid fa-user"></i> Manage my account  <span>></span></p>
        <p class="pass"><i class="fa-solid fa-plane-lock"></i> Privacy and Safety  <span>></span></p>
        <p class="tr"><i class="fa-solid fa-ticket"></i>Tickets and Reservations <span>></span></p>
        <div class="dropdown">
        <p class="tik"><i class="fa-solid fa-plane fa-rotate-270" style="color: #FFD43B;"></i>Tickets <span>></span></p>
        <p class="hot"><i class="fa-solid fa-hotel" style="color: #FFD43B;"></i>Reservations <span>></span></p>
        </div>
        <p class="out"><i class="fa-solid fa-right-from-bracket"></i> Sign out</p>
    </div>
    </div>
    <div class="set">
        <div class="person">
            <h4>Personal Details</h4>
            <form action="functions/edit.php" method="post">
                <div class="inp">
                    <img src="img/logo.png" alt="">
                    
                </div>
                <div class="inp">
                    Name <input class="border-warning" name="name" value="<?php echo $new['name'] ;?>" type="text">
                </div>
                <div class="inp">
                    Email<input class="border-warning" name="email" value="<?php echo $new['email'] ;?>" type="email">
                </div>

                <div class="inp">
                    Nationality
                    <select class="border-warning" name="country">
                        <option <?php if($new['country']==0){echo "selected";} ?> value="0">Cairo</option>
                        <option <?php if($new['country']==1){echo "selected";} ?> value="1">Riyadh </option>
                        <option <?php if($new['country']==2){echo "selected";} ?> value="2">Abu Dhabi</option>
                        <option <?php if($new['country']==3){echo "selected";} ?> value="3">New York</option>
                        <option <?php if($new['country']==4){echo "selected";} ?> value="4">Beirut</option>
                    </select>
                </div>
                <div class="inp">
                    Gender
                    <select name="gender" class="border-warning">
                        <option <?php if($new['gender']==0){echo "selected";} ?> value="0">Male</option>
                        <option <?php if($new['gender']==1){echo "selected";} ?> value="1">Female</option>
                    </select>
                </div>
                <div class="sub">
                    <input class="border-warning" class="btn" type="submit" value="Edit">
                </div>
            </form>
        </div>
        <div class="password">
            <h4>Security</h4>
            <p style="color: white !important;">Change your security settings, set up secure authentication, or delete your account.</p>
            <div class="inp">
                Password <button class="btn res">Reset</button>
            </div>
            <div class="inp">
                Delete account 
                <button class="btn dele">Delete account </button>
            </div>
            <div class="sure">
                <div class="reset">
                    <i class="fa-solid fa-x"></i>
                    <input class="oldP border-warning" type="password" placeholder="Old Password">
                    <input class="newP border-warning" type="password" placeholder="New password">
                    <input class="conP border-warning" type="password" placeholder="Confirm Password">
                    <button class="chang btn btn-hover resetPass">Change Password</button>
                </div>
                <div class="logout">

                </div>
                <div class="delete">
                    <i class="fa-solid fa-x"></i>
                    <h5 class="mt-5">Are you sure to delete your account ?</h5>
                    <span>
                    <button class="btn btn-primary">Cancel</button>
                    <a class="btn btn-danger" href="functions/delete.php">Delete</a>
                    </span>
                    
                </div>
            </div>
            
        </div>
        <div class="ticket">
            <?php
            $myhotels = $con->query("SELECT * FROM checked WHERE user_id = '$id'");
            
            $exist = $myhotels ->num_rows;
            ?>
        <div class="flight" style="<?php if($exist > 0) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
        <?php 
        foreach($myhotels as $hotel):
            $ticket = $con -> query("SELECT * FROM flight WHERE id = '$hotel[ticket_id]'");
            $card = $hotel['card'];
            $nCard = substr((string)$card, -4);
            foreach($ticket as $flight):
                $cityleave = $con -> query("SELECT name FROM countries WHERE val = '$flight[takeoff]'");
                $cityarrive = $con -> query("SELECT name FROM countries WHERE val = '$flight[land]'");
                $leave = $cityleave -> fetch_assoc();
                $land = $cityarrive -> fetch_assoc();
                
        ?> 
            <div class="tick">
            <div class="time">
                <h6><?php echo $flight['timeoff']; ?>:00 pm</h6>
                <p class="orig"><?php echo $leave['name']; ?></p>
                <i class="fa-solid fa-plane"></i>
                <h6><?php echo $flight['timearrive']; ?>:00 pm</h6>
                <p class="disti"><?php echo $land['name']; ?></p>
            </div>
            <div class="detail">
                <div class="dethold">
                    <div class="name">
                        <!-- <h5>Name</h5> -->
                    <p class="tickname"><?php echo $new['name']; ?></p>
                    </div>
                    
                    <div class="cla"><p class="class"><?php if($flight['class'] == 0){echo "Business";}elseif($flight['class'] == 1){echo "Vip";}else{echo "Member";} ?></p></div>
                </div>
                <div class="data">
                    <div class="da">
                        <i class="fa-solid fa-briefcase"></i>
                        <div class="date1">
                            <p class="no">Date </p>
                            <p class="tickdate"><?php echo $hotel['leavedate']; ?></p>
                        </div>
                    </div>

                    <div class="da">
                        <i class="fa-solid fa-door-closed"></i>
                        <div class="date1">
                            <p>Gate</p>
                            <p><?php echo $flight['gate']; ?></p>
                        </div>
                    </div>
                    <div class="da">
                        <i class="fa-solid fa-wheelchair"></i>
                        <div class="date1">
                            <p>seat</p>
                            <p><?php echo $flight['seat']; ?></p>
                        </div>
                    </div>
                    <p style="display: none;" class="card"><?php echo $nCard ?></p>
                    <p style="display: none;" class="ldate"><?php echo $hotel['adate']; ?></p>
                    <p style="display: none;" class="cost"><?php echo $hotel['cost']; ?></p>
                    <p class="mt-3 print" style="font-size: 20px; cursor: pointer;" title="Print"><i class="fa-solid fa-print" style="color: #198754;"></i></p>
                    
                </div>
                
            </div>
            </div>
            <?php
            endforeach;
            endforeach;
            ?>
        </div>
        
        </div>
        <div class="reserv">
    <?php 
    $res = $con->query("SELECT * FROM reservation WHERE user_id = '$id'");
    foreach($res as $reservation):
        // Fetching hotel data directly from the database
        $hotel_id = $reservation['hotel_id'];
        $hotelres = $con->query("SELECT * FROM hotels WHERE id = '$hotel_id'")->fetch_assoc();
        $cardd = $reservation['card'];
        $nCard = substr((string)$cardd, -4);
    ?>
    <div class="rese bg-warning">
        <img src="<?php echo $hotelres['img']; ?>" alt="">
        <p class="name"><?php echo $hotelres['name']; ?></p>
        <p>Reserved</p>
        <p class="ldate" style="display: none;"><?php echo $reservation['leavedate'] ?></p>
        <p class="uname" style="display: none;"><?php echo $new['name'] ?></p>
        <p class="fdate" style="display: none;"><?php echo $reservation['adate'] ?></p>
        <p class="card" style="display: none;"><?php echo $nCard ?></p>
        <p class="cost" style="display: none;"><?php echo $reservation['cost'] ?></p>
        <p class="mt-3 printH" style="font-size: 20px; cursor: pointer;" title="Print"><i class="fa-solid fa-print" style="color: #198754;"></i></p>
    </div>
    <?php endforeach; ?>
</div>

        <div class="logout">
            <h5>Are you sure to logout?</h5>
            <a class="btn btn-warning" href="functions/logout.php">logout</a>
        </div>
        
    </div>
    
    
</div>

</main>

<script src="js/jquery.min.js"></script>
<script>
$(".print").click(function(){
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Find the closest ancestor with class .tick
    var tickContainer = $(this).closest('.tick');

    var fdate = new Date(tickContainer.find(".tickdate").html());
    var ldate = new Date(tickContainer.find(".ldate").html());
    var ndate = new Date(fdate);
    var adate = new Date(ldate);

    var card = tickContainer.find(".card").html();
    var from = tickContainer.find(".orig").html();
    var cost = tickContainer.find(".cost").html();
    var to = tickContainer.find(".disti").html();
    var name = tickContainer.find(".tickname").html();
    var classs = tickContainer.find(".class").html();

    // Format dates into strings
    var ndateStr = ndate.toLocaleDateString();
    var ldateStr = ldate.toLocaleDateString();
    var adateStr = adate.toLocaleDateString(); // Format adate into a string

    const data = [
        ["WK 2200", from, to, "333", classs],
        ["WK 2495", ndateStr, adateStr, "321", classs],
    ];

    const passengerInfo = [
        ["Passenger Name", "Ticket Number", "Frequent Flyer Number", "Special Needs"],
        [ name, "012-3456-789012", "000-123-456", "Meal: VGML"],
    ];

    const purchaseDescription = [
        ["Purchase Description", "Price"],
        ["Fare (LLXSOAR, LLXGSOAR)", "CAD 558.00"],
        ["Canada - Airport Improvement Fee", "15.00"],
        ["Canada - Security Duty", "17.00"],
        ["Canada - GST #1234-5678", "1.05"],
        ["Canada - QST #12345-678-901", "1.20"],
        ["Germany - Airport Security Tax", "18.38"],
        ["Germany - Airport Service Fees", "37.76"],
        ["Fuel Surcharge", "161.00"],
        ["Total Base Fare (per passenger)", "+cost,"],
        ["Number of Passengers", "1"],
        ["TOTAL FARE", "CAD "+cost],
        ["Paid by Credit Card XXXX-XXXX-XXXX-"+card],
    ];

    doc.autoTable({
        head: [['Flight', 'From', 'To', 'Aircraft', 'Class/Status']],
        body: data,
    });

    doc.autoTable({
        head: [],
        body: passengerInfo,
        startY: doc.lastAutoTable.finalY + 10,
    });

    doc.autoTable({
        head: [],
        body: purchaseDescription,
        startY: doc.lastAutoTable.finalY + 10,
    });

    doc.save('ticket.pdf');
});
$(".printH").click(function(){
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Find the closest ancestor with class .reserv
    var tickContainer = $(this).closest('.reserv');

    var fdate = new Date(tickContainer.find(".tickdate").html());
    var ldate = new Date(tickContainer.find(".ldate").html());
    var ndate = new Date(fdate);
    var adate = new Date(ldate);

    var card = tickContainer.find(".card").html();
    var cost = tickContainer.find(".cost").html();
    var name = tickContainer.find(".name").html();
    var uname = tickContainer.find(".uname").html();

    // Format dates into strings
    var ndateStr = ndate.toLocaleDateString();
    var ldateStr = ldate.toLocaleDateString();
    var adateStr = adate.toLocaleDateString(); // Format adate into a string


    const data = [
        [name, ldateStr, adateStr],
    ];

    const passengerInfo = [
        ["Name", "Room Number"],
        [uname, "912"],
    ];

    const purchaseDescription = [
        ["TOTAL FARE", "CAD " + cost],
        ["Paid by Credit Card XXXX-XXXX-XXXX-" + card],
    ];

    doc.autoTable({
        head: [['Hotel', 'From', 'To']],
        body: data,
    });

    doc.autoTable({
        head: [],
        body: passengerInfo,
        startY: doc.lastAutoTable.finalY + 10,
    });

    doc.autoTable({
        head: [],
        body: purchaseDescription,
        startY: doc.lastAutoTable.finalY + 10,
    });

    doc.save('ticket.pdf');
});


</script>
<script src="js/main.js"></script>
<script src="js/settings.js"></script>
</body>
</html>