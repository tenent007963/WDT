<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (isset($_POST['sche_id'])){
    $sche_id = $_POST['sche_id'];
    $sql = "UPDATE `appointments` SET `is_deleted` = 1 where sche_id = '$sche_id';";
    $result = $db_connection->query($query);
    if ($db_connection -> connect_errno || $db_connection -> errno) {
        echo "<h3 class='alert'>DB Server error:".$db_connection -> connect_error. $db_connection -> errno."</h3>";
        echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
        echo "<h4>Error query:". $db_connection -> errno ."</h4>";
        echo "<h3>System error, please try again later.</h3>";
        exit();
    } else {
        echo "<h3 class='alert'>Appointment deleted!</h3>";
    }
    }


?>
<link rel='stylesheet' href='./css/bootstraped.css' media='all'>

<form class="form-horizontal" id="main-form" action="/views/scheduling/delAppt.php" method="post" onsubmit="return confirm('Double confirm to delete appointment?');">
    <fieldset>
    <legend>Delete Appointment (Warning: proceed with caution}</legend>

    <div class="form-group">
        <label class="col-md-4 control-label" for="sche_id">Schedule ID for delete : </label>
        <div class="col-md-4">
            <input id="sche_id" name="sche_id" type="text" class="form-control input-md" required="">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="submit">Confirm to delete?</label>
        <div class="col-md-4">
            <button id="submit" name="submit" class="btn btn-primary" >Very confirm</button>
            <input type="submit" value="delete" name="btnNuclear" >
        </div>
        </div>

    </fieldset>
</form>
