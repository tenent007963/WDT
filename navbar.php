<?php
$user = $_SESSION['user_name'];
$welcome = null;
echo "<script src='/js/navbar.js'></script>
      <link rel='stylesheet' href='/css/navbar.css' media='all'>"; 
if ($file = "customer") { 
      $welcome = "Welcome user, " . $user;
} elseif ($file = "technician") { 
      $welcome = "Welcome tech, " . $user;
} else { 
      header("Location: login.php");
      die();
}; ?> 
<header class="navbar">
      <div class="logo"></div>
      <a href="/login.php?logout"><div class="logout"></div></a>
      <a onclick="accountbtn()"><div class="account"></div></a>
      <a onclick="supportbtn()"><div class="support"></div></a>
      <a onclick="quickbtn()"><div class="quick"></div></a>
</header>
