<?php
require_once($_SERVER['DOCUMENT_ROOT']."/../../config/db.php");
if(isset($_POST["submit"])){
    $db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql ="INSERT INTO `symptoms`(`symp_id`, `symp_name`, `symp_desc`)
            VALUES ('". $_POST['symp_id'] . "', '" . $_POST["symp_name"] . "','" . $_POST["symp_desc"] ."')";
    $raw_data = $db_connection->query($sql);
    if (!$db_connection->connect_errno) {
        echo "<script>alert('Task completed successfully');</script>";
    } else {
        echo "<script>alert('Action failed');</script>";
    }
}

mysqli_close($db_connection);

?>
<link rel='stylesheet' href='/css/bootstrap.css' media='all'>
<form class="form-horizontal" method="post" id="main-form" action="/views/misc/modSymp.php">
<fieldset>

<!-- Form Name -->
<legend>Symptoms</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="symp_id">Symptom ID</label>
  <div class="col-md-4">
  <input id="symp_id" name="symp_id" type="text" placeholder="samp01" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="symp_name">Symptom Name</label>
  <div class="col-md-4">
  <input id="symp_name" name="symp_name" type="text" placeholder="Sample Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="symp_desc">Symptom Description</label>
  <div class="col-md-4">
    <textarea class="form-control" id="symp_desc" name="symp_desc">Sample description</textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Save?</label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Ya wor</button>
  </div>
</div>

</fieldset>
</form>
