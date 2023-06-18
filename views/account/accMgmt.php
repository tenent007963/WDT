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
  $uph = (($_POST['user_password'] != "") || ($_POST['user_password'] != null)) ? password_hash($_POST['user_password'], PASSWORD_DEFAULT) : null;
  $gotuph = ($uph != null) ? ",`user_password_hash`= '$uph'" : "";
  $query = "UPDATE `users` SET
  `user_name`= '$user_name',
  `user_email`= '$user_email'".
  $gotuph .
  " WHERE user_id = '$user_id';";
  $result = $db_connection->query($query);
  if ($db_connection -> connect_errno || $db_connection -> errno) {
    echo "<h3 class='alert'>DB Server error:".$db_connection -> connect_error. $db_connection -> errno."</h3>";
    echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
    echo "<h4>Error query:". $db_connection -> errno ."</h4>";
    echo "<h3>System error, please try again later.</h3>";
    exit();
  } else {
    $_SESSION['user_name'] = $user_name;
    echo "<h3 class='alert'>Updated account details!</h3>";
  }
}


$raw_data = $db_connection->query($sql);
if ($db_connection -> connect_errno || $db_connection -> errno) {
    echo "<h3 class='alert'>DB Server error:".$db_connection -> connect_error. $db_connection -> errno."</h3>";
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
<legend>Manage Account Details</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="user_id">User ID</label>
  <div class="col-md-4">
  <input id="user_id" name="user_id" type="text" value="<?=$row['user_id']?>" class="form-control input-md" readonly>
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="user_name">Username</label>
  <div class="col-md-4">
  <input id="user_name" name="user_name" type="text" value="<?=$row['user_name']?>" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="user_email">Email Address</label>
  <div class="col-md-5">
  <input id="user_email" name="user_email" type="text" value="<?=$row['user_email']?>" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="user_password">Password</label>
  <div class="col-md-5">
  <input id="user_password" name="user_password" type="text" placeholder="[leave blank if no change]]" class="form-control input-md">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Confirm account details?</label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Correct</button>
  </div>
</div>

</fieldset>
</form>
