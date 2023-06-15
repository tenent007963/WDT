<?php
/*-- header section for html prerequisite --*/
$title = "Home";
$file = "index";
$footer = "footer";
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
    <button class="slide-arrow" id="slide-arrow-prev">
      &#8249;
    </button>
    <button class="slide-arrow" id="slide-arrow-next">
      &#8250;
    </button>
      <ul class="slides-container" id="slides-container">
        <li class="slide" id="1"><img src="./images/carousel/cust-layout.png" alt="Screenshot feature customer interface showcase of InLine Scheduling System"></li>
        <li class="slide" id="2"><img src="./images/carousel/tech-layout.png" alt="Screenshot feature technician interface showcase of InLine Scheduling System"></li>
        <li class="slide" id="99"><img src="./images/carousel/cover1.png" alt="Placeholder Picture, feature showcase of InLine Scheduling System"></li>
      </ul>
      </div>

    <div class="text-intro" id="intro">
        <h5>The InLine Scheduling System is an innovative online home repair appointment system ,specifically designed to cater to the needs of the elderly population, who may have limited experience with technology. Our primary goal is to provide a user-friendly interface that enables easy connection between elders and skilled technicians, facilitating convenient repairs for their home equipment. The name "InLine" signifies our commitment to being available 24/7, as we are ready to assist the elderly with any issues they may encounter, ranging from minor concerns to urgent emergencies.
        </h5>
    </div>

    <div class="col-aboutus" id="aboutus">
        <div class="wdt">
            <img class="img-aboutus" src="./images/group.jpeg" alt="WDT Group Photo of 5 team members">
            <p class="text-aboutus">We are a group of passionate students originally from Asia Pacific University (APU) and is composed of five members from UCDF2111ICT and UCDF2111ICT(ITR). 
              Upon forming the team, we have one vision and mission in mind, which is to smallen the gap between the elderly and technology whilst using technology to help them solve daily matters. 
              We noticed that many elders struggle with basic tasks like making appointments or shopping online due to their limited familiarity with technology. 
              Motivated by the desire to make a positive impact, we enthusiastically accepted the challenge. Our primary objectives are not only to enhance our own skills and create a valuable portfolio for our future careers but, more importantly, to provide practical solutions for the elderly, helping them overcome their technological barriers. 
              As for this case, we find out that most elderly would stay at home often and will need someone
              to fix their home appliances if needed. By leveraging technology, we aim to simplify and streamline the process for the elderly, enabling them to perform daily tasks independently. Our ultimate goal is to empower them with the necessary tools and knowledge to navigate the digital world with confidence. 
              Through this InLine Scheduling System project, we hope to make a meaningful difference in the lives of the elderly community and contribute to a more inclusive society.</p>
        </div>
    </div>


<?php
/*-- Footer section --*/
include_once "./footer.php" ;
?>
