<?php
/*-- do login check before loading anything --*/
require_once("config/db.php");
require_once("classes/Login.php");
$login = new Login();
if ($login->isUserLoggedIn() == false) {
    header("Location: https://wdt.svrcd.xyz/login.php");
    exit();
} 

/*-- header section for html prerequisite --*/
$title = "Technician Portal";
$file = "tech";
require_once "./head.php";
?>
<!-- body section -->
<body>
<?php require_once "./navbar.php"; require_once "./menu.php";?>

<div class="main" id="main">
    <!-- default greeting page, to be replaced after user interact with navbar/menu -->
    <span class="greeting" id="greeting-main">
        <h2>Welcome<?=$_SESSION['user_name']?></h2>
        <h3>You are logged in.</h3>


