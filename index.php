<?php
/*-- header section for html prerequisite --*/
$title = "Home";
$file = "index";
include_once "./head.php";
echo "<body>";
include_once "./navbar.php";

//echo "<span>This is a test page</span>"; //test line
?>
<!-- Body section -->
<div class="body-container" id="main">
    <div class="img-carousel" id="carousel">
        <img src="./images/carousel/cover1.png" alt="Cover Picture, feature showcase of InLine Scheduling System">
    </div>

    <div class="text-intro" id="intro">
        <h5>InLine Scheduling System, designed with elders in mind,
            is an online home repair appointment system
            connecting elders with technicians
            and get their home equipments repaired easily.
        </h5>
    </div>

    <div class="col-aboutus" id="aboutus">
        <div class="wdt">
            <img class="img-aboutus" src="./images/group.jpeg" alt="WDT Group Photo of 5 team members">
            <p class="text-aboutus">We are a team of five, consisting members from UCDF2111ICT and UCDF2111ICT(ITR).
                This topic was chosen as we have not seen any alternatives that are targeting the elders,
                and hence we thought "Why not?" and choose to take this topic as a challenge for ourselves.</p>
        </div>
    </div>


<?php
/*-- Footer section --*/
include_once "./footer.php" ;

echo "</body>
<script src='./js/{$file}.js'></script>
<link rel='stylesheet' href='./css/{$file}.css' media='all'> </html>";
?>
