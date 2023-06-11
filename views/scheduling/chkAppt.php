<?php session_start(); ?>
<h2> Your Appointment(s) </h2>
<table id="appt_tab" border="1">
    <tr>
        <th>Appointment</th>
        <th>Technician</th>
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
$sql = "SELECT sche_id, appoint_to, date1, date2, time1, time2, status, symp_id
    FROM appointments WHERE by_user = '" . $_SESSION['user_name'] . "' AND is_deleted != 1 ORDER BY date1 DESC LIMIT 20;";
$raw_data = $db_connection->query($sql);

if ((!$db_connection->connect_errno) && (!$db_connection->errno)) {
    if ($raw_data->num_rows > 0) {
        $result_data = $raw_data->fetch_object();
        echo '<tr>';
        echo '<td>' .$result_data->sche_id. '</td>';
        echo '<td>' .$result_data->appoint_to. '</td>';
        echo '<td>' .$result_data->date1. '</td>';
        echo '<td>' .$result_data->time1. '</td>';
        echo '<td>' .$result_data->date2. '</td>';
        echo '<td>' .$result_data->time2. '</td>';
        echo '<td>' .$result_data->status. '</td>';
        echo '<td>' .$result_data->symp_id. '</td>';
        echo '</tr>';
    } else {
        echo "No appointment found for current user.";
    }
} else {
    echo "Database connection problem.";
}

mysqli_close($db_connection);

?>
     
</table>
<span>Note: Results are limited to the latest 20 appointments.</span>