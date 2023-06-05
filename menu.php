<div class="menu" id="menu">
    <a href="/views/scheduling/chkAppt.php">Check Appointment</a>
    <?php
        if ($file == "customer") { ?>
        <a href="/views/scheduling/setAppt.php">Book Appointment</a>
        <a href="/views/scheduling/modAppt.php">Modify Appointment</a>
    <?php } elseif ($file == "tech") { ?>
        <a href="/views/scheduling/uptAppt.php">Update Appointment</a>
    <?php } ?>
</div>