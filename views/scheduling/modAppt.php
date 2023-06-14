<?php session_start(); ?>
<link rel='stylesheet' href='/css/bootstraped.css' media='all'>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT * FROM symptoms;" ;
$sql1 = 'SELECT * FROM appointments WHERE user_name="'.$_SESSION['user_name'].'" AND is_deleted IS NULL OR is_deleted <> "1" ORDER BY date1 DESC LIMIT 1;';

if (isset($_POST["sche_id"])) {
    $sche_id = $_POST['sche_id'];
    $symp_id = $_POST['symp_id'];
    $date1 = $_POST['date1'];
    $time1 = $_POST['time1'];
    $cust_cmt = isset($_POST['cust_cmt']) ? $_POST['cust_cmt'] : "";
    $query = "UPDATE `appointments` SET
        `date1`= '$date1',
        `time1`= '$time1',
        `cust_cmt`= '$cust_cmt',
        `symp_id=`= '$symp_id'
        WHERE sche_id = '$sche_id';";
    echo $query; //delete this
    $result = $db_connection->query($query);
    if ($db_connection -> connect_errno || $db_connection -> errno) {
        echo "<script type='text/javascript'>console.log('DB Server error:".$db_connection -> connect_error. $db_connection -> errno."');</script>";
        echo "<h3>An error occurred. Please try again later.</h3>";
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Appointment successfully modified!');</script>";
    }
}

$raw_data = $db_connection->query($sql);
$raw_data1 = $db_connection->query($sql1);
if ($raw_data->num_rows > 0) {
    if ($raw_data1->num_rows == 1) {
        $options = mysqli_fetch_all($raw_data, MYSQLI_ASSOC);
        $data = mysqli_fetch_all($raw_data1, MYSQLI_ASSOC);
?>

<form class="form-horizontal" id="main-form" action="/views/scheduling/modAppt.php" method="post" onsubmit="return superFancy(event)">
<fieldset>

    <!-- Form Name -->
    <legend>Modify Appointment</legend>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="sche_id">Appointment ID</label>
        <div class="col-md-4">
            <input id="sche_id" name="sche_id" type="text" value="<?=$data['sche_id']?>" class="form-control input-md" readonly>
                
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="symp_is">Symptom</label>
    <div class="col-md-4">
        <select id="symp_is" name="symp_is" class="form-control">
            <?php
            foreach ($options as $option) { ?>
                <option value="<?=$option['symp_id']?>" <?=($option['symp_id']==$data['symp_id']) ? "selected" : ''?> ><?=$option['symp_name']?></option>
            <?php } ?>
        </select>
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="date1">Appointment Date</label>
    <div class="col-md-4">
    <input id="date1" name="date1" type="date" class="form-control input-md" required value='<?=$data['date1']?>'>
        
    </div>
    </div>

    <!-- Text input-->
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
        <textarea class="form-control" id="cust_cmt" name="cust_cmt"><?=$data['cust_cmt']?></textarea>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4 control-label" for="submit">Update Details?</label>
    <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-primary" >Yes</button>
    </div>
    </div>

    </fieldset>
    </form>
<?php
    } else {
        echo "<h2>Something went wrong, please contact support</h2>";
    }
} else {
    echo "<h2>System under maintenance, please try again later.</h2>";
}

 $db_connection -> close();
?>