<?php
require_once($_SERVER['DOCUMENT_ROOT']."/../../config/db.php");
if(isset($_POST["btnRegister"])){
    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $query ="INSERT INTO `tblstudents`(`firstname`, `lastname`, `email`, `password`, `country`) VALUES ('$firstname','$secondname','$email','$password','$country')";
    if (mysqli_query($connection,$query)) ;
        echo 'ur mom thanks u';
} else {
    echo 'no, ur mom said u did it wrong';
    

}

if ( ($_GET["getData"] != "") &&  is_numeric($_GET["getData"]) ) {
    $this->sql = "SELECT sche_id, appoint_to, date1, date2, time1, time2, status, comments
    FROM appointment WHERE by_user = '" . $user_name . "'LIMIT " . $_GET["getData"] .";";
    $raw_data = $this->db_connection->query($sql);
} else {
    $this->sql = "SELECT sche_id, appoint_to, date1, date2, time1, time2, status, comments
    FROM appointment WHERE by_user = '" . $user_name . "'LIMIT 20;";
}
if ( $this->sql != null ) {
    $raw_data = $this->db_connection->query($this->sql);
    // convert result data to xml and feed to the query page, js frontend
}

mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration </h1>
    <form action="" method="post">
        First Name = <input type="text" name="firstname"> <br>
        Last Name = <input type="text" name="secondname"> <br>
        Email = <input type="text" name="email"> <br>
        Password = <input type="text" name="password"> <br>
        <label for="country">Country</label><span style="color: red !important; display: inline; float: none;">*</span>
        
            <select id="country" name="countryc" class="form-control">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
            </select>
        
        <input type="submit" value="Register" name="btnRegister">
    </form>
    <br>
    <br>
    <p> If u already have an account click <a href="Here"></a>

    <table>
        <th> YOUR MOM </th>
            <td>
    </table>
</body>
</html>