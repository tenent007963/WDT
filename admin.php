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
            echo "<script type='text/javascript'>console.log('Error msg: " . $error . "' );</script>";
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
    <link rel='stylesheet' href='./css/<?=$file?>.css' media='all'>
    <header class="navbar" id="navbar">
    <div onclick="window.location='/index.php';" class="logo"><img src="/images/icon-small.png" alt="logo"></div>
      <div onclick="window.location='/login.php?logout';"><img class="logout" src="https://icons-for-free.com/iconfiles/png/512/simple+and+minimal+line+icons+logout-1324450547511202535.png" alt="logout"></div>
      <a href="/views/account/accView.php"><img class="account" src="https://cdn2.iconfinder.com/data/icons/minimal-set-three/32/minimal-58-512.png" alt="account"></a>
      <a href="/views/misc/support.php"><img class="support" src="https://cdn.icon-icons.com/icons2/3106/PNG/512/question_help_icon_191660.png" alt="support"></a>
      <!-- <a onclick="quickAccess()"><div class="quick"></div></a> -->
      <div class="hello"><h3><?=$hello?></h3></div>
    </header>
    <div class="menu" id="menu">
        <span class="parent" id="appt">Appointment</span>
        <a href="/views/scheduling/allAppt.php">All Appointments</a>
        <a href="/views/scheduling/uptAppt.php">Update Appointment</a>
        <a href="/views/scheduling/delAppt.php">Delete Appointment</a>
        <span class="parent" id="usrs">Users</span>
        <a href="/views/users/usrAll.php">All Users</a>
        <a href="/views/users/usrView.php">View User</a>
        <a href="/views/users/usrAdd.php">Add User</a>
        <a href="/views/users/usrMgmt.php">Manage Users</a>
        <span class="parent" id="symp">Symptoms</span>
        <a href="/views/misc/addSymp.php">Add New Symptom</a>
        <a href="/views/misc/chkSymp.php">View All Symptom</a>
        <a href="/views/misc/modSymp.php">Modify Symptom</a>
    </div>

    <div class="main" id="main">
        <!-- default greeting page, to be replaced after user interact with navbar/menu -->
        <span class="greeting" id="greeting-main">
            <h2>Welcome admin, <?=$_SESSION['user_name']?></h2>
            <h3>Select your action.</h3>
        </span>
    </div>

    <footer class='footer'>
        <p>Admin Panel @ InLine Scheduling System. 032023-MFD. All right reserved.</p>
        <span class="sid"><?=htmlspecialchars(session_id());?></span>
    </footer>
    </body>
    <script src='/js/allin.js'></script>
</html>