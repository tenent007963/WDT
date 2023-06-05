<?php
// login and stuffs all-in-one
// work as a core PoC for everything else after login

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
$title = "Admin Portal";
$file = "admin";
$footer = "footer1";
$user = $_SESSION['user_name'];
$hello = "Bonjour, ". $user;
require_once "./head.php";
?>
<!-- body section -->
<body>
    <link rel='stylesheet' href='./css/2in1.css' media='all'>
    <link rel='stylesheet' href='./css/<?=$file?>.css' media='all'>
    <header class="navbar">
      <div class="logo"></div>
      <a href="/login.php?logout"><div class="logout"></div></a>
      <a onclick="loadPage('/view/account/accView.php')"><div class="account"></div></a>
      <a onclick="loadPage('/view/misc/support.php')"><div class="support"></div></a>
      <!-- <a onclick="quickAccess()"><div class="quick"></div></a> -->
      <div class="hello"><h3><?=$hello?></h3></div>
    </header>
    <div class="menu" id="menu">
        <span class="parent" id="appt">Appointment</span>
        <a href="/views/scheduling/chkAppt.php">Check Appointment</a>
        <a href="/views/scheduling/uptAppt.php">Update Appointment</a>
        <a href="/views/scheduling/delAppt.php">Delete Appointment</a>
        <span class="parent" id="usrs">Users</span>
        <a href="/views/users/usrView.php">View Users</a>
        <a href="/views/users/usrAdd.php">Add User</a>
        <a href="/views/users/usrMgmt.php">Manage Users</a>
        <span class="parent" id="symp">Symptoms</span>
        <a href="/views/misc/addSymp.php">Add New Symptom</a>
        <a href="/views/misc/chkSymp.php">View All Symptomp</a>
        <a href="/views/misc/modSymp.php">Modify Symptom</a>
    </div>

    <div class="main" id="main">
        <!-- default greeting page, to be replaced after user interact with navbar/menu -->
        <span class="greeting" id="greeting-main">
            <h2>Welcome admin, <?=$_SESSION['user_name']?></h2>
            <h3>Select your action.</h3>
        </span>
    </div>

    <script src='/js/navbar.js'></script>
<?php
require_once("footer.php");
?>