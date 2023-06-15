<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT * FROM users;";
$raw_data = $db_connection->query($sql);

if ($db_connection -> connect_errno) {
    echo "<h3 class='alert'>DB Server error:".$db_connection -> connect_error."</h3>";
    exit();
}

if (mysqli_num_rows($raw_data) > 0) {

    echo '<h2> All Users </h2>';
    echo '<table id="usrs_tab" border=1>
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Role</th>
    </tr> ';

    while ($row = mysqli_fetch_row($raw_data)) {
        echo '<tr>';
        echo '<td>' .$row[0]. '</td>';
        echo '<td>' .$row[1]. '</td>';
        echo '<td>' .$row[3]. '</td>';
        echo '<td>' .$row[4]. '</td>';
        echo '</tr>';
    }

} else {
    echo 'No records found';
}
mysqli_close($db_connection);
?>

     
</table>