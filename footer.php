<!-- minified footer v4 -->
<footer class='footer'>
    <?php
    $bentleyig = "//www.bentleymotors.com/content/dam/bentley/Master/Icons/new%20social%20icons/instagram-80x80.png/_jcr_content/renditions/original.image_file.80.80.file/instagram-80x80.png";
    if ($file == "index") { ?>
            <div class='footer-container'>
            <div class='row'>
                <div class='footer-col'>
                <h4>Navigation</h4>
                <ul>
                    <li><a href='//wdt.svrcd.xyz/'>Home</a></li>
                    <li><a href='./register.php'>Register</a></li>
                    <li><a href='./customer.php'>Customer Portal</a></li>
                    <li><a href='./technician.php'>Technician Dashboard</a></li>
                </ul>
                </div>
                <div class='footer-col'>
                <h4>About US</h4>
                <span>This website is build by Group 2 for WDT assignment.</span>
                <p>032023-MFD. All right reserved.</p>
                </div>
                <div class='footer-col'>
                <h4>Social Links</h4>
                <div class='social-links'>
                    <a href='//instagram.com/_florenceciel/'><img src='<?=$bentleyig?>' alt='instagram-80x80.png' class='ig-icon'><h5 class='nametag'>Florence Ku Xin Yee</h5></a>
                    <a href='//instagram.com/jeslyn_koeh/'><img src='<?=$bentleyig?>' alt='instagram-80x80.png' class='ig-icon'><h5 class='nametag'>Jeslyn Koeh Xin Wen</h5></a>
                    <a href='//instagram.com/kenny_loww/'><img src='<?=$bentleyig?>' alt='instagram-80x80.png' class='ig-icon'><h5 class='nametag'>Low Jia Heng Kenny</h5></a>
                    <a href='//instagram.com/cambridge_xu'><img src='<?=$bentleyig?>' alt='instagram-80x80.png' class='ig-icon'><h5 class='nametag'>Tai Eason</h5></a>
                    <a href='//instagram.com/desmonddd_yong/'><img src='<?=$bentleyig?>' alt='instagram-80x80.png' class='ig-icon'><h5 class='nametag'>Yong Hou Yan</h5></a>
                </div>
                </div>
            </div>
            </div>
            <script src='/js/index.js'></script>
        <?php } elseif ($file == "customer") { ?>
            <p>Customer Portal @ InLine Scheduling System. 032023-MFD. All right reserved.</p>
            <span class="sid"><?=htmlspecialchars(session_id());?></span>
            <script src='/js/allin.js'></script>
        <?php }
            if ($file == "tech") { ?>
            <p>Technician Dashboard @ InLine Scheduling System. 032023-MFD. All right reserved.</p>
            <span class="sid"><?=htmlspecialchars(session_id());?></span>
            <script src='/js/allin.js'></script>
    <?php } ?>
    </footer>
    </body>
</html>