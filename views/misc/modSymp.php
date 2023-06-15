<link rel='stylesheet' href='./css/bootstraped.css' media='all'>
<form class="search" id="search-form" action="/views/misc/modSymp.php" method="post" onsubmit="return superFancy(event)">
    Search for Symptom ID : <input type="text" name="sid" >
    <input type="submit" value="Search" name="btnSearch" >
</form>

<?php

require_once($_SERVER['DOCUMENT_ROOT']."/config/db.php");
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['symp_id'])) {
    $sql = 'UPDATE symptoms SET symp_name="'.$_POST["symp_name"].'", symp_desc="'.$_POST["symp_desc"].'" WHERE symp_id="'.$_POST['symp_id'].'";';
    $raw_data = $db_connection->query($sql);
    if ($db_connection -> connect_errno || $db_connection -> errno) {
        echo "<h3 class='alert'>DB Server error:".$db_connection -> connect_error. $db_connection -> errno."</h3>";
        echo "<h4>Error db:". $db_connection -> connect_error ."</h4>";
        echo "<h4>Error query:". $db_connection -> errno ."</h4>";
        echo "<h3>System error, please try again later.</h3>";
        exit();
    } else {
        echo "<h3 class='alert'>Data updated.</h3>";
    }
}

if (isset($_POST['sid']) || isset($_POST['symp_id'])) {
    $sid = isset($_POST['sid']) ? $_POST['sid'] : $_POST['symp_id'];
    $sql = "SELECT * FROM symptoms WHERE symp_id ='$sid'";
    $raw_data = $db_connection->query($sql);

    if ($db_connection -> connect_errno) {
        echo "<h3 class='alert'>DB Server error:".$db_connection -> connect_error."</h3>";
        exit();
    }

    if (mysqli_num_rows($raw_data) == 1) {
        $row = mysqli_fetch_row($raw_data);
        ?>
        <form class="form-horizontal" method="post" onsubmit="return superFancy(event)" action="/views/misc/modSymp.php" id="main-form">
        <fieldset>

        <!-- Form Name -->
        <legend>Modify Symptoms</legend>

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
            <textarea class="form-control" id="symp_desc" name="symp_desc"><?=$row[2]?></textarea>
        </div>
        </div>

        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="submit">Update?</label>
        <div class="col-md-4">
            <button id="submit" name="submit" class="btn btn-primary" >Cfm de mah</button>
        </div>
        </div>

        </fieldset>
        </form>

        <?php
    }else {
        echo '<span class="msg">Multiple entries found, please specify symptom by searching the exact symptom ID.</span>';
    }
}
mysqli_close($db_connection);
?>

