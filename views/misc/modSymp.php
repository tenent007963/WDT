<link rel='stylesheet' href='./css/bootstrap.css' media='all'>
<form class="search" id="search-form" action="/views/misc/modSymp.php" method="get">
    Search for Symptom ID : <input type="text" name="sid" >
    <input type="submit" value="Search" name="btnSearch">
</form>

<?php

require_once("config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
    $sql = "SELECT * FROM symptoms WHERE symp_id ='$sid'";
    $raw_data = $db_connection->query($sql);

    if ($db_connection -> connect_errno) {
        echo "<script>alert('DB Server error:".$db_connection -> connect_error."');</script>";
        exit();
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_row($raw_data);
        ?>
        <form class="form-horizontal" method="post" action="/views/misc/modSymp.php" id="main-form">
        <fieldset>

        <!-- Form Name -->
        <legend>Symptoms</legend>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="symp_id">Symptom ID</label>
        <div class="col-md-4">
        <input id="symp_id" name="symp_id" type="text" value="<?=$row[0]?>" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="symp_name">Symptom Name</label>
        <div class="col-md-4">
        <input id="symp_name" name="symp_name" type="text" value="<?=$row[1]?>" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="symp_desc">Symptom Description</label>
        <div class="col-md-4">
            <textarea class="form-control" id="symp_desc" name="symp_desc"><?=$row[2]?>"</textarea>
        </div>
        </div>

        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="submit">Update?</label>
        <div class="col-md-4">
            <button id="submit" name="submit" class="btn btn-primary">Cfm de mah</button>
        </div>
        </div>

        </fieldset>
        </form>

        <?php
    }else {
        echo '<span class="msg">Multiple entries found, please specify symptom by searching the exact symptom ID.</span>';
    }
}
?>

