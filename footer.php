<?php
$bentleyig = "//www.bentleymotors.com/content/dam/bentley/Master/Icons/new%20social%20icons/instagram-80x80.png/_jcr_content/renditions/original.image_file.80.80.file/instagram-80x80.png";
if ($title = "index") {
    echo '
    <footer class="footer">
        <div class="footer-container">
        <div class="row">
            <div class="footer-col">
            <h4>Navigation</h4>
            <ul>
                <li><a href="//wdt.svrcd.xyz/">Home</a></li>
                <li><a href="./register.php">Register</a></li>
                <li><a href="./customer.php">Customer Portal</a></li>
                <li><a href="./technician.php">Technician Dashboard</a></li>
            </ul>
            </div>
            <div class="footer-col">
            <h4>About US</h4>
            <span>This website is build by Group 2 for WDT assignment.</span>
            <p>032023-MFD. All right reserved.</p>
            </div>
            <div class="footer-col">
            <h4>Social Links</h4>
            <div class="social-links">
                <a href="//instagram.com/_florenceciel/">Florence Ku Xin Yee<img src="'{$bentleyig}'" alt="instagram-80x80.png" class="ig-icon"></a>
                <a href="//instagram.com/jeslyn_koeh/">Jeslyn Koeh Xin Wen<img src="'{$bentleyig}' alt="instagram-80x80.png" class="ig-icon"></a>
                <a href="//instagram.com/kenny_loww/">Low Jia Heng Kenny<img src="'{$bentleyig}' alt="instagram-80x80.png" class="ig-icon"></a>
                <a href="//instagram.com/cambridge_xu">Tai Eason<img src="'{$bentleyig}' alt="instagram-80x80.png" class="ig-icon"></a>
                <a href="//instagram.com/desmonddd_yong/">Yong Hou Yan (Desmond)<img src="'{$bentleyig}' alt="instagram-80x80.png" class="ig-icon"></a>
            </div>
            </div>
        </div>
        </div>
    </footer>
    <link rel="stylesheet" href="./css/footer.css" media="all">
    ';
} else {
    echo '
        <footer class="footer">
            <p>032023-MFD. All right reserved.</p>
        </footer>
        <link rel="stylesheet" href="./css/footer1.css" media="all">
    ';
}
