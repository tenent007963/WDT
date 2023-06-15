<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (isset($_POST['sche_id'])){
    $sche_id = $_POST['sche_id'];
    $sql = "UPDATE `appointments` SET `is_deleted`=1 where sche_id = '$sche_id';";
    echo $sql;
    $result = $db_connection->query($query);
    if ($db_connection -> connect_errno || $db_connection -> errno) {
        echo "<script type='text/javascript'>console.log('DB Server error:".$db_connection -> connect_error. $db_connection -> errno."');</script>";
        echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
        echo "<h4>Error query:". $db_connection -> errno ."</h4>";
        echo "<h3>System error, please try again later.</h3>";
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Appointment deleted!');</script>";
    }
    }


?>
<link rel='stylesheet' href='./css/bootstraped.css' media='all'>
<form class="main" id="main-form" action="/views/scheduling/delAppt.php" method="post" onsubmit="return superFancy(event)">
    Schedule ID for delete : <input type="text" name="sche_id" >
    <input type="submit" value="search" name="btnSearch" onsubmit="(confirm('Sure to delete appointment?')) ? return superFancy(event) : return false" >
</form>
