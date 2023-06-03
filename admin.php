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

require_once("head.php");

?>
<header class="topbar" id="topbar">
    <div class="logo">
        <a href="">
</header>
<div class="sidebar" id="sidebar">

</div>
<div class="container" id="main">

</div>

<?php
require_once("footer.php");
?>