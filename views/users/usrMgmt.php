<link rel='stylesheet' href='/css/bootstraped.css' media='all'>
<form class="search" id="search-form" action="/views/users/usrMgmt.php" method="post">
    Search for User ID or username : <input type="text" name="sid" >
    <input type="submit" value="Search" name="btnSearch">
</form>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['user_id'])) { //for update
  $user_role = $_POST['user_role'];
  $user_name = $_POST('user_name');
  $user_email = $_POST('user_email');
  $uph = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
  $query = "UPDATE `users` SET
  `user_name`= '$user_name',
  `user_email`= '$user_email',
  `user_password_hash` = '$uph',
  `user_role`= '$user_role'
  WHERE user_id = '$user_id';";
  $result = $db_connection->query($query);
  if ($db_connection -> connect_errno) {
    echo "<script>console.log('DB Server error:".$db_connection -> connect_error."');</script>";
  } else {
    echo "<script>alert('Updated details for user '$user_name' !');</script>";
  }
}

if (isset($_POST['sid'])) {
    $sid = $_POST['sid'];
    $query = "SELECT user_id, user_name, user_email, user_role FROM users WHERE user_id = '$sid' OR user_name='$sid' ;";
    $result = $db_connection->query($query);
    if ($db_connection -> connect_errno) {
      echo "<script>console.log('DB Server error:".$db_connection -> connect_error."');</script>";
    }
    
    if (mysqli_num_rows($raw_data) == 1) {
      $data = $result->fetch_array(MYSQLI_ASSOC); ?>
      <form class="form-horizontal" id="main-form" action="/views/users/usrMgmt.php" method="post">
      <fieldset>
  
      <legend>View User Details</legend>
  
      <div class="form-group">
      <label class="col-md-4 control-label" for="user_name">User ID</label>
      <div class="col-md-4">
      <input id="user_name" name="user_name" type="text" value="<?=$data['user_id']?>" class="form-control input-md" disabled>
          
      </div>
      </div>
  
      <div class="form-group">
      <label class="col-md-4 control-label" for="user_name">Username</label>
      <div class="col-md-4">
      <input id="user_name" name="user_name" type="text" value="<?=$data['user_name']?>" class="form-control input-md" required>
          
      </div>
      </div>
  
      <div class="form-group">
      <label class="col-md-4 control-label" for="user_email">Email Address</label>
      <div class="col-md-5">
      <input id="user_email" name="user_email" type="text" value="<?=$data['user_email']?>" class="form-control input-md" required>
          
      </div>
      </div>
  
      <div class="form-group">
      <label class="col-md-4 control-label" for="user_password">Password</label>
      <div class="col-md-5">
      <input id="user_password" name="user_password" type="text" placeholder="assassin" class="form-control input-md" required>
            
      </div>
      </div>

      <div class="form-group">
      <label class="col-md-4 control-label" for="user_role">User Role</label>
      <div class="col-md-4">
          <select id="user_role" name="user_role" class="form-control" required>
          <option value="1">1 - Customer</option>
          <option value="2">2 - Technician</option>
          <option value="0">0 - Admin</option>
          </select>
      </div>
      </div>
  
      <div class="form-group">
      <label class="col-md-4 control-label" for="submit">Everything correct?</label>
      <div class="col-md-4">
          <button id="submit" name="submit" class="btn btn-primary">Yep</button>
      </div>
      </div>
  
      </fieldset>
      </form>
  
    <?php }
}
?>
