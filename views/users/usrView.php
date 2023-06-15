<link rel='stylesheet' href='/css/bootstraped.css' media='all'>
<form class="search" id="search-form" action="/views/users/usrView.php" method="post" onsubmit="return superFancy(event)">
    Search for User ID or username : <input type="text" name="sid" >
    <input type="submit" value="search" name="btnSearch">
</form>

<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['sid'])) {
  $sid = $_POST['sid'];
  $query = "SELECT user_id, user_name, user_email, user_role FROM users WHERE user_id = '$sid' OR user_name='$sid' ;";
  echo $query; //delete this
  $raw_data= $db_connection->query($query);
  if ($db_connection -> connect_errno || $db_connection -> errno) {
    echo "<script type='text/javascript'>console.log('DB Server error:".$db_connection -> connect_error. $db_connection -> errno."');</script>";
    echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
    echo "<h4>Error query:". $db_connection -> errno ."</h4>";
    echo "<h3>System error, please try again later.</h3>";
    exit();
  }
  
  if (mysqli_num_rows($raw_data) == 1) {
    $data = $result->fetch_array(MYSQLI_ASSOC); ?>
    <form class="form-horizontal" id="main-form" action="/views/users/usrMgmt.php" method="post" onsubmit="return superFancy(event)">
    <fieldset>

    <legend>View User Details</legend>

    <div class="form-group">
    <label class="col-md-4 control-label" for="user_name">User ID</label>
    <div class="col-md-4">
    <input id="user_name" name="user_name" type="text" value="<?=$data['user_id']?>" class="form-control input-md" readonly>
        
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4 control-label" for="user_name">Username</label>
    <div class="col-md-4">
    <input id="user_name" name="user_name" type="text" value="<?=$data['user_name']?>" class="form-control input-md" readonly>
        
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4 control-label" for="user_email">Email Address</label>
    <div class="col-md-5">
    <input id="user_email" name="user_email" type="text" value="<?=$data['user_email']?>" class="form-control input-md" readonly>
        
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4 control-label" for="user_role">User Role</label>
    <div class="col-md-4">
    <input id="user_role" name="user_role" type="text" value="<?=$data['user_role']?>" class="form-control input-md" readonly>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4 control-label" for="submit">Want to modify?</label>
    <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-primary" >Bring me there</button>
    </div>
    </div>

    </fieldset>
    </form>

  <?php }


}

?>
