<?php
// checkpoint after login, must be redirected to here after every login
// can also perform security check later?
require_once("config/db.php");
require_once("classes/Login.php");
//require_once("classes/sql.php"); // future improvement for minimizing

$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
    $sql = "SELECT user_role FROM users
    WHERE user_name = '" . $_SESSION['user_name'] . "' OR user_id = '" . $_SESSION['user_id'] . "';";
    $raw_data = $db_connection->query($sql);
} else {
    echo "Restricted area. Please login before access.";
    exit();
}

if (!$db_connection->connect_errno) {
    if ($raw_data->num_rows == 1) {
        $result_data = $raw_data->fetch_object();
        if ($result_data->user_role != null ) {
            switch ($result_data->user_role) {
                case 0:
                    header("Location: admin.php");
                    exit();
                    break;
                case 1:
                    header("Location: customer.php");
                    exit();
                    break;
                case 2:
                    header("Location: technician.php");
                    exit();
                    break;
                default:
                    header("Location: index.php");
                    exit();
                    break;
            }
        } else {
            echo "An error occurred. Please login again.";
        }
    }
} else {
    echo "Database connection problem.";
    exit();
}
