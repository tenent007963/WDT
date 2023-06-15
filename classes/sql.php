<?php
// Not in use due to no time for code rebase

class Role
{
    private $db_connection = null;
    private $result_data = null;
    public $errors = array();
    public $messages = array();
    public $xml = array();
    private $sql = null;

    //construct function
    public function __construct()
    {
        // create/read session, is it necessary now?
        session_start();
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (isset($_GET["getRole"])) {
            $this->getRole();
        }
        elseif (isset($_POST["addData"])) {
            $this->addData();
        }
        elseif (isset($_POST["editData"])) {
            $this->editData();
        }
        elseif (isset($_GET["getData"])) {
            $this->getData();
        }
        elseif (isset($_GET["deleteData"])) {
            $this->deleteData();
        } else {
            $this->errors[] = "No action specified";
        }
    }

    /*-- to determine which interface to redirect to --*/
    public function getRole() {
        if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
            $this->sql = "SELECT user_role FROM users
            WHERE user_name = '" . $user_name . "' OR user_id = '" . $user_id . "';";
            $raw_data = $this->db_connection->query($this->sql);
        } else {
            $this->errors[] = "Restricted area. Please login before access.";
        }

        if (!$this->db_connection->connect_errno) {
            if ($raw_data->num_rows == 1) {
                $result_data = $raw_data->fetch_object();
                if ($result_data->user_role != null ) {
                    return $result_data->user_role;
                } else {
                    $this->errors[] = "An error occurred. Please login again.";
                }
            }
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

    /*-- get all appointment data from db, require user_name --*/
    public function getData() {
        if ( ($_GET["getData"] != "") &&  is_numeric($_GET["getData"]) ) {
            $this->sql = "SELECT sche_id, appoint_to, date1, date2, time1, time2, status, comments
            FROM appointment WHERE user_id = '" . $user_name . "'LIMIT " . $_GET["getData"] .";";
            $raw_data = $this->db_connection->query($sql);
        } else {
            $this->sql = "SELECT sche_id, appoint_to, date1, date2, time1, time2, status, comments
            FROM appointment WHERE user_id = '" . $user_name . "'LIMIT 20;";
        }
        if ( $this->sql != null ) {
            $raw_data = $this->db_connection->query($this->sql);
            // convert result data to xml and feed to the query page, js frontend
        }
    }

    // initiating redirect after login
    public function postLogin() {
        if ($this->getRole() != null) {
            redirecting();
            return 0;
        }
    }

    // send header to redirect to specific interface
    private function redirecting() {
        switch ($result_data->user_role) {
            case 0:
                header("LocationL admin.php");
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
    }
}


