<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (isset($_POST['sche_id'])){
    $sche_id = $_POST['sche_id'];
    $sql = "UPDATE `appointments` SET `is_deleted`=1 where sche_id = '$sche_id';";
    $result = $db_connection->query($query);
    if ($db_connection -> connect_errno) {
        echo "<script>console.log('DB Server error:".$db_connection -> connect_error."');</script>";
    } else {
        echo "<script>alert('Appointment deleted!');</script>";
    }
    }


?>
<link rel='stylesheet' href='./css/bootstrap.css' media='all'>
<form class="main" id="main" action="/views/scheduling/delAppt.php" method="post">
    Schedule ID for delete : <input type="text" name="sche_id" >
    <input type="submit" value="Search" name="btnSearch">
</form>