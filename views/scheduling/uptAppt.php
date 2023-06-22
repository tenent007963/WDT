<link rel='stylesheet' href='/css/bootstraped.css' media='all'>
<form class="search" id="search-form" action="/views/scheduling/uptAppt.php" method="post" onsubmit="return superFancy(event)">
    Search for Appointment ID or username : <input type="text" name="sid" >
    <input type="submit" value="search" name="btnSearch" >
</form>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST["sche_id"])) {
    $sche_id = $_POST['sche_id'];
    $date2 = $_POST['date2'];
    $time2 = $_POST['time2'];
    $tech_cmt = ($_POST['tech_cmt'] != "") ? $_POST['tech_cmt'] : "";
    $appoint_to = $_POST['appoint_to'];
    $status = $_POST['status'];
    $query = "UPDATE `appointments` SET
        `appoint_to`= '$appoint_to',
        `date2`= '$date2',
        `time2`= '$time2',
        `tech_cmt`= '$tech_cmt',
        `status`= '$status'
        WHERE sche_id = '$sche_id';";
    $result = $db_connection->query($query);
    if ($db_connection -> connect_errno || $db_connection -> errno) {
        echo "<h3 class='alert'>DB Server error:".$db_connection -> connect_error. $db_connection -> errno."</h3>";
        echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
        echo "<h4>Error query:". $db_connection -> errno ."</h4>";
        echo "<h3>System error, possible issue: Empty columns, system maintenance. </h3>";
        exit();
    } else {
        echo "<h3 class='alert'>Updated appointment.</h3>";
    }
}
if (isset($_POST["sid"])) {
    $sql = 'SELECT * FROM appointments WHERE (user_id="'.$_POST["sid"].'" OR sche_id="'.$_POST["sid"].'") AND (is_deleted <> 1 OR is_deleted IS NULL) ORDER BY date1 DESC LIMIT 1;';
    $sql1 = 'SELECT user_id, user_name FROM users WHERE user_role=2;';
    $raw_data = $db_connection->query($sql);
    $raw_data1 = $db_connection->query($sql1);
    if ($raw_data->num_rows == 1) {
        if ($raw_data1->num_rows > 1) {
            $row = mysqli_fetch_array($raw_data);
            ?>
            <form class="form-horizontal" id="main-form" action="/views/scheduling/uptAppt.php" method="post" onsubmit="return superFancy(event)">
            <fieldset>

            <legend>Update Appointment</legend>

            <div class="form-group">
            <label class="col-md-4 control-label" for="sche_id">Schedule ID</label>
            <div class="col-md-4">
            <input id="sche_id" name="sche_id" type="text" value="<?=$row['sche_id']?>" class="form-control input-md" readonly>
                
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="symp_id">Symptom</label>
            <div class="col-md-4">
            <input id="symp_id" name="symp_id" type="text" value="<?=$row['symp_id']?>" class="form-control input-md" disabled>
                
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="date1">Appointment Date</label>
            <div class="col-md-4">
            <input id="date1" name="date1" type="date" class="form-control input-md" disabled value='<?=$row['date1']?>'>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="time1">Preferred Time Slot</label>
            <div class="col-md-4">
            <input id="time1" name="time1" type="time" value="<?=$row['time1']?>" class="form-control input-md" disabled>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="cust_cmt">Customer Comment</label>
            <div class="col-md-4">
                <textarea class="form-control" id="cust_cmt" name="cust_cmt" disabled><?=$row['cust_cmt']?></textarea>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="appoint_to">Technician</label>
            <div class="col-md-4">
            <select id="appoint_to" name="appoint_to" class="form-control input-md">
                <?php
                while ($usr = mysqli_fetch_array($raw_data1)) { ?>
                    <option value="<?=$usr['user_id']?>"><?=$usr['user_name']?></option>
                <?php } ?>
            </select>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="date2">Completion Date</label>
            <div class="col-md-4">
            <input id="date2" name="date2" type="date" class="form-control input-md">
                
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="time2">Completed Time</label>
            <div class="col-md-4">
            <input id="time2" name="time2" type="time" min="08:00" max="20:00" list="slots" class="form-control input-md">
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
            <label class="col-md-4 control-label" for="tech_cmt">Technician Comment</label>
            <div class="col-md-4">
                <textarea class="form-control" id="tech_cmt" name="tech_cmt" placeholder="Technician's comment"></textarea>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="status">Status Update</label>
            <div class="col-md-4">
                <select id="status" name="status" class="form-control input-md">
                    <option value="pending">Pending</option>
                    <option value="ongoing">In Progress</option>
                    <option value="solved">Solved</option>
                    <option value="repeat">Repeat Case</option>
                    <option value="closed">Case Closed</option>
                    <option value="transferred">Transfer to other technician</option>
                </select>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="submit">Confirm Update?</label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-primary" >Yes</button>
            </div>
            </div>

            </fieldset>
            </form>

        <?php } else {
            echo "<h4> No available technician. Please contact admin. </h4>";
        }
    } else {
        echo "<h4> Appointment not found, please check your search query.</h4>";
    }
}
$db_connection -> close();
?>