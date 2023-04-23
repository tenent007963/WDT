<!DOCTYPE html>
<html>
    <head>
        <title><?=$title?> - InLine Scheduling System</title>
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
        <meta property="og:title" content="InLine Scheduling System" />
        <meta property="og:type" content="website, scheduling, queue, system" />
        <meta property="og:url" content="//wdt.svrcd.xyz" />
        <meta property="og:image" content="//wdt.svrcd.xyz/images/logo.png" />
        <meta property="og:description" content="InLine Scheduling System is an online platform for scheduling appointments easily." />
        <meta name="theme-color" content="#656565">
        <meta name="twitter:card" content="summary_large_image">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if ($title = "home") {
            echo "<script src='./js/navbar.js'></script>
            <link rel='stylesheet' href='./css/navbar.css' media='all'>";
        };
        ?>
    </head>

