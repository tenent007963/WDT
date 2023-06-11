<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT * FROM symptoms" ;
$raw_data = $db_connection->query($sql);

if ($db_connection -> connect_errno) {
    echo "<script type='text/javascript'>alert('DB Server error:".$db_connection -> connect_error."');</script>";
    exit();
}

if (mysqli_num_rows($raw_data) > 0) {

    echo '<h2> All Symptoms Indexes </h2>';
    echo '<table id="symp_tab" border=1>
    <tr>
        <th>Symptom ID</th>
        <th>Symptom Name</th>
        <th>Symptom Description</th>
    </tr> ';

    while ($row = mysqli_fetch_row($raw_data)) {
        echo '<tr>';
        echo '<td>' .$row[0]. '</td>';
        echo '<td>' .$row[1]. '</td>';
        echo '<td>' .$row[2]. '</td>';
        echo '</tr>';
    }

} else {
    echo 'No records found';
}
mysqli_close($db_connection);
?>

     
</table>