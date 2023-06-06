<link rel='stylesheet' href='/css/bootstrap.css' media='all'>
<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = 'SELECT user_name, user_email FROM users WHERE user_name="'.$_SESSION['user_name'].'";';

$raw_data = $db_connection->query($sql);
if ($db_connection -> connect_errno) {
    echo "<script>console.log('DB Server error:".$db_connection -> connect_error."');</script>";
} else {
    $row = mysqli_fetch_array($raw_data, MYSQLI_ASSOC);
}

//do update
?>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Account Details</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_name">Username</label>  
  <div class="col-md-4">
  <input id="user_name" name="user_name" type="text" placeholder="johnwick" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_email">Email Address</label>  
  <div class="col-md-5">
  <input id="user_email" name="user_email" type="text" placeholder="john@gsc.com" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_password">Password</label>  
  <div class="col-md-5">
  <input id="user_password" name="user_password" type="text" placeholder="passwordhere" class="form-control input-md">
    
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
