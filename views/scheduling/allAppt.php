<h2> All Appointment Indexes </h2>
<table id="appt_tab" border="1">
    <tr>
        <th>ID</th>
        <th>By User</th>
        <th>To User</th>
        <th>Appointment Date</th>
        <th>Appointment Time</th>
        <th>Completion Date</th>
        <th>Completion Time</th>
        <th>Status</th>
        <th>Symptom ID</th>
    </tr>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT * FROM appointments WHERE is_deleted != 1 ORDER BY date1 DESC;";
$raw_data = $db_connection->query($sql);

if ($db_connection -> connect_errno) {
    echo "<script type='text/javascript'>alert('DB Server error:".$db_connection -> connect_error."');</script>";
    exit();
}

if ($raw_data->num_rows > 0) {
    while ($result_data = $raw_data->fetch_object()) {
        echo '<tr>';
        echo '<td>' .$result_data->sche_id. '</td>';
        echo '<td>' .$result_data->by_user. '</td>';
        echo '<td>' .$result_data->appoint_to. '</td>';
        echo '<td>' .$result_data->date1. '</td>';
        echo '<td>' .$result_data->time1. '</td>';
        echo '<td>' .$result_data->date2. '</td>';
        echo '<td>' .$result_data->time2. '</td>';
        echo '<td>' .$result_data->status. '</td>';
        echo '<td>' .$result_data->symp_id. '</td>';
        echo '</tr>';
      }
} else {
    echo "No records found.";
}

mysqli_close($db_connection);

?>
     
</table>