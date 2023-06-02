<?php
#navbar for users to perform user account related actions, eg logout & modify details
#logo included at left side
$user = $_SESSION['user_name'];
echo "<script src='/js/navbar.js'></script>
      <link rel='stylesheet' href='/css/navbar.css' media='all'>"; 
if ($file = "customer") { ?>
   
<?php } elseif ($file = "technician") { ?>

<?php } else { ?>

<?php }; ?> 
<header class="navbar">
      <div class="logo"></div>
      <div class="quick btn"></div>
      <div class="support btn"></div>
      <div class="account btn"></div>
      <a href="/views/index.php?logout"><div class="logout btn"></div></a>
</header>
