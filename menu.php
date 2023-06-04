<?php
/*-- redundant login check before loading anything --*/
require_once("config/db.php");
require_once("classes/Login.php");
$login = new Login();
if ($login->isUserLoggedIn() == false) {
    header("Location: https://wdt.svrcd.xyz/login.php");
    exit();
}

?>
<div class="menu" id="menu">
    <a href="/views/scheduling/chkAppt.php">Check Appointment</a>
    <?php
        if ($file == "customer") { ?>
        <a href="/views/scheduling/setAppt.php">Book Appointment</a>
        <a href="/views/scheduling/modAppt.php">Modify Appointment</a>
    <?php } elseif ($file == "tech") { ?>
        <a href="/views/scheduling/uptAppt.php">Update Appointment</a>
    <?php } ?>
<div>