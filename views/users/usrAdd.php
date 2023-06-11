<link rel='stylesheet' href='/css/bootstraped.css' media='all'>
<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['user_name'])) {
  $user_role = $_POST['user_role'];
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $uph = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
  $query = "INSERT INTO `users` ('user_name','user_password_hash','user_email','user_role')
    VALUES ('$user_name','$uph','$user_email','$user_role');";
  $result = $db_connection->query($query);
  if ($db_connection -> connect_errno || $db_connection -> errno) {
    echo "<script>console.log('DB Server error:".$db_connection -> connect_error. $db_connection -> errno."');</script>";
  } else {
    echo "<script>alert('Created new user '$user_name' with role '$user_role' !');</script>";
  }
}

$db_connection -> close();
?>
<form class="form-horizontal" id="main-form" action="/views/users/usrAdd.php" method="post" onsubmit="return superFancy(event)" >
<fieldset>

<!-- Form Name -->
<legend>Add New User</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_name">Username</label>
  <div class="col-md-4">
  <input id="user_name" name="user_name" type="text" placeholder="johnwick" class="form-control input-md" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_email">Email Address</label>
  <div class="col-md-5">
  <input id="user_email" name="user_email" type="text" placeholder="john.wick@ruskaroma.com" class="form-control input-md" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_password">Password</label>
  <div class="col-md-5">
  <input id="user_password" name="user_password" type="text" placeholder="assassin" class="form-control input-md" required>
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="user_role">User Role</label>
  <div class="col-md-4">
    <select id="user_role" name="user_role" class="form-control">
      <option value="1">1 - Customer</option>
      <option value="2">2 - Technician</option>
      <option value="0">0 - Admin</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Create New Account?</label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">ofc</button>
  </div>
</div>

</fieldset>
</form>
