<?php
/*-- do login check before loading anything --*/
require_once("config/db.php");
require_once("classes/Login.php");
$login = new Login();
if ($login->isUserLoggedIn() == false) {
    header("Location: https://wdt.svrcd.xyz/login.php");
    exit();
}

/*-- show error messages --*/ //todo
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo "<script>console.log('Error msg: " . $error . "' );</script>";
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo "<div class='msg'>". $message . "</div>";
        }
    }
}

/*-- header section for html prerequisite --*/
$title = "Customer Portal";
$file = "customer";
$footer = "footer1";
require_once "./head.php";
?>
<!-- body section -->
<body>
    <?php require_once "./navbar.php"; require_once "./menu.php";?>

<div class="main" id="main">
    <!-- default greeting page, to be replaced after user interact with navbar/menu -->
    <span class="greeting" id="greeting-main">
        <h2>Welcome customer, <?=$_SESSION['user_name']?></h2>
        <h3>Schedule an appointment by pressing <a href="./views/schedule/setAppt.php">here</a> or select "Schedule" from the left panel.</h3>
    </span>
</div>

<?php
require_once "./footer.php";
?>


