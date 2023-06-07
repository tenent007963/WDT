<?php
$user = $_SESSION['user_name'];
$hello = null;

if ($file == "customer") {
      $hello == "Hello user, " . $user;
}
if ($file == "technician") {
      $hello = "Hello tech, " . $user;
}
?>

<link rel='stylesheet' href='/css/2in1.css' media='all'>
<header class="navbar">
      <div class="logo"></div>
      <a href="/login.php?logout"><div class="logout"></div></a>
      <a onclick="loadPage('/view/account/accView.php')"><div class="account"></div></a>
      <a onclick="loadPage('/view/misc/support.php')"><div class="support"></div></a>
      <!-- <a onclick="quickAccess()"><div class="quick"></div></a> -->
      <div class="hello"><h3><?=$hello?></h3></div>
</header>
<script src='/js/navbar.js'></script>
