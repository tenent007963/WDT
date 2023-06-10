<?php
$user = $_SESSION['user_name'];
$hello = null;

if ($file == "customer") {
      $hello == "Hello user, " . $user;
}
if ($file == "tech") {
      $hello = "Hello tech, " . $user;
}
?>

<link rel='stylesheet' href='/css/2in1.css' media='all'>
<header class="navbar">
      <div class="logo"><img src="/images/icon-small.png" alt="logo"></div>
      <a href="/login.php?logout"><img class="logout" src="https://icons-for-free.com/iconfiles/png/512/simple+and+minimal+line+icons+logout-1324450547511202535.png" alt="logout"></a>
      <a href="/view/account/accView.php"><img class="account" src="https://cdn2.iconfinder.com/data/icons/minimal-set-three/32/minimal-58-512.png" alt="account"></a>
      <a href="/view/misc/support.php"><img class="support" src="https://cdn.icon-icons.com/icons2/3106/PNG/512/question_help_icon_191660.png" alt="support"></a>
      <!-- <a onclick="quickAccess()"><div class="quick"></div></a> -->
      <div class="hello"><h3><?=$hello?></h3></div>
</header>
<script src='/js/navbar.js'></script>
