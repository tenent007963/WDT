<?php
// login and stuffs all-in-one
// work as a core PoC for everything else after login

require_once("config/db.php");
require_once("classes/Login.php");
require_once("classes/sql.php");
$login = new Login();
if ($login->isUserLoggedIn() == false) {
    header("Location: https://wdt.svrcd.xyz/login.php");
    exit();
}

/*-- show error messages --*/ //todo
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}

/*-- header section for html prerequisite --*/
$title = "Admin Portal";
$file = "admin";
$footer = "footer1";
require_once "./head.php";
?>
<!-- body section -->
<body>
    <link rel='stylesheet' href='./css/<?=$file?>.css' media='all'>
    <header class="topbar" id="topbar">
        <div class="logo">
            <a href="">
    </header>
    <div class="sidebar" id="sidebar">
        <span class="parent" id="appt">Appointment</span>
        <a href="/views/scheduling/chkAppt.php">Check Appointment</a>
        <a href="/views/scheduling/uptAppt.php">Update Appointment</a>
        <a href="/views/scheduling/delAppt.php">Delete Appointment</a>
        <span class="parent" id="usrs">Users</span>
        <a href="/views/users/usrView.php">View Users</a>
        <a href="/views/users/usrAdd.php">Add User</a>
        <a href="/views/users/usrMgmt.php">Manage Users</a>
    </div>

    <div class="container" id="main">
        <!-- default greeting page, to be replaced after user interact with navbar/menu -->
        <span class="greeting" id="greeting-main">
            <h2>Welcome admin, <?=$_SESSION['user_name']?></h2>
            <h3>Select your action.</h3>
        </span>
    </div>

<?php
require_once("footer.php");
?>