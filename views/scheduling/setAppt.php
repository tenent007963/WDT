<?php session_start(); ?>
<link rel='stylesheet' href='/css/bootstraped.css' media='all'>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT * FROM symptoms" ;

if (isset($_POST["submit"])) {
    $symp_id = $_POST['symp_id'];
    $date1 = $_POST['date1'];
    $time1 = $_POST['time1'];
    $cust_cmt = isset($_POST['cust_cmt']) ? $_POST['cust_cmt'] : "";
    $by_user = $_SESSION['user_name'];
    $status = "created";
    $query ="INSERT INTO `appointments`(`by_user`, `date1`, `time1`, `status`, `cust_cmt`, `symp_id`)
        VALUES ('$by_user','$date1','$time1','$status','$cust_cmt','$symp_id')";
    $result = $db_connection->query($query);
    if ($db_connection -> connect_errno || $db_connection -> errno) {
        echo "<script>console.log('DB Server error:".$db_connection -> connect_error. $db_connection -> errno."');</script>";
        echo "<h3>An error occurred. Please try again later.</h3>";
        exit();
    } else {
        echo "<script>alert('Appointment created!');</script>";
    }
}

$raw_data = $db_connection->query($sql);
if ($raw_data->num_rows> 0){
    $options= mysqli_fetch_all($raw_data, MYSQLI_ASSOC);
}

?>

<form class="form-horizontal" id="main-form" action="/views/scheduling/setAppt.php" method="post" onsubmit="return superFancy(event)">
<fieldset>

<legend>Create new appointment</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="symp_id">Symptom</label>
  <div class="col-md-4">
    <select id="symp_id" name="symp_id" class="form-control">
        <?php
        foreach ($options as $option) { ?>
            <option value="<?=$option['symp_id']?>"><?=$option['symp_name']?></option>
        <?php } ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="date1">Appointment Date</label>
  <div class="col-md-4">
  <input id="date1" name="date1" type="date" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="time1">Preferred Time Slot</label>
  <div class="col-md-4">
  <input id="time1" name="time1" type="time" list="slots" class="form-control input-md" required>
  <datalist id="slots">
      <option value="08:00">
      <option value="09:00">
      <option value="10:00">
      <option value="11:00">
      <option value="12:00">
      <option value="13:00">
      <option value="14:00">
      <option value="15:00">
      <option value="16:00">
      <option value="17:00">
      <option value="18:00">
      <option value="19:00">
      <option value="20:00">
  </datalist>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="cust_cmt">Customer Comment</label>
  <div class="col-md-4">
    <textarea class="form-control" placeholder="Describe the issue or symptom" id="cust_cmt" name="cust_cmt"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Confirm Appointment?</label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary" >Yes</button>
  </div>
</div>

</fieldset>
</form>

<?php
 $db_connection -> close();
?>