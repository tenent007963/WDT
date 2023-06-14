<?php session_start(); ?>
<link rel='stylesheet' href='/css/bootstraped.css' media='all'>
<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = 'SELECT user_id, user_name, user_email FROM users WHERE user_name="'.$_SESSION['user_name'].'";';

if (isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $uph = (isset($_POST['user_name'])) ? password_hash($_POST['user_password'], PASSWORD_DEFAULT) : null;
  $query = "UPDATE `users` SET
  `user_name`= '$user_name',
  `user_email`= '$user_email'".
  ($uph != null) ? ",`user_password_hash`= '$uph'" : "".
  "WHERE user_id = '$user_id';";
  echo $query;
  $result = $db_connection->query($query);
  if ($db_connection -> connect_errno || $db_connection -> errno) {
    echo "<script type='text/javascript'>console.log('DB Server error:".$db_connection -> connect_error. $db_connection -> errno."');</script>";
    echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
    echo "<h4>Error query:". $db_connection -> errno ."</h4>";
    echo "<h3>System error, please try again later.</h3>";
    exit();
  } else {
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_email'] = $user_email;
    echo "<script type='text/javascript'>alert('Updated account details!');</script>";
  }
}


$raw_data = $db_connection->query($sql);
if ($db_connection -> connect_errno || $db_connection -> errno) {
    echo "<script type='text/javascript'>console.log('DB Server error:".$db_connection -> connect_error. $db_connection -> errno."');</script>";
    echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
    echo "<h4>Error query:". $db_connection -> errno ."</h4>";
    echo "<h3>System error, please try again later.</h3>";
    exit();
} else {
    $row = mysqli_fetch_array($raw_data, MYSQLI_ASSOC);
}
?>
<form class="form-horizontal" id="main-form" action="/views/account/accMgmt.php" method="post" onsubmit="return superFancy(event)">
<fieldset>

<!-- Form Name -->
<legend>Account Details</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="user_id">User ID</label>
  <div class="col-md-4">
  <input id="user_id" name="user_id" type="text" value="<?=$row['user_id']?>" class="form-control input-md" disabled>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_name">Username</label>
  <div class="col-md-4">
  <input id="user_name" name="user_name" type="text" value="<?=$row['user_name']?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_email">Email Address</label>
  <div class="col-md-5">
  <input id="user_email" name="user_email" type="text" value="<?=$row['user_email']?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_password">Password</label>
  <div class="col-md-5">
  <input id="user_password" name="user_password" type="text" placeholder="[leave blank if no change]]" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Confirm account details?</label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Correct</button>
  </div>
</div>

</fieldset>
</form>
