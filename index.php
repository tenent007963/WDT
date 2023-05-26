<?php
/*-- header section for html prerequisite --*/
$title = "Home";
$file = "index";
require_once "./head.php";
?>

<!-- Body section -->
<body>
 <header id="nav-wrapper">
    <nav id="nav">
      <div class="nav left">
        <span class="gradient skew"><h1 class="logo un-skew"><a href="#main"><img class="logo-img" src="./images/icon-small.png" alt="InLine Logo"></a></h1></span>
        <button id="menu" class="btn-nav"><span class="fas fa-bars"></span></button>
      </div>
      <div class="nav right">
        <a href="#main" class="nav-link active"><span class="nav-link-span"><span class="u-nav">Home</span></span></a>
        <a href="#carousel" class="nav-link"><span class="nav-link-span"><span class="u-nav">Features</span></span></a>
        <a href="#intro" class="nav-link"><span class="nav-link-span"><span class="u-nav">Introduction</span></span></a>
        <a href="#aboutus" class="nav-link"><span class="nav-link-span"><span class="u-nav">About Us</span></span></a>
      </div>
    </nav>
  </header>

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
?>
