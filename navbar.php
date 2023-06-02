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

</header>
