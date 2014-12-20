<?php require_once("sessionfunctions.php");?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Statisztika</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="images/logo_tab.png" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/statistics.css" />
    <?php checkSessionAndDisplay(); ?>
    <script src="scripts/canvasjs.min.js"></script>
    <script type="text/javascript" src="scripts/chart.js"></script>
    <script type="text/javascript" src="scripts/statistics.js"></script>
    <?php require('dbconfig.php');  ?>
    <?php require('statistics.php') ?>
</head>
<body>
    <!-- BODY -->
    <div id="container">
        <!-- HEADER -->
        <div id="header">
            <div id="innerheader" class="sitecenter">
                <img src="images/logo_small.png" width="100" height="75" alt="logo"/>
                <a href="adminpanel.php"> Kérdések </a>
                <a href="#"> Statisztika </a>
            </div>
        </div>

        <div id="site_content">
            <p>Ezen az oldalon találhatóak meg a megadott válaszokkal kapcsolatos statisztikák. Az alábbi ábrán látható a
                helyesen és helytelenül megadott válaszok aránya.</p>

            <div id="chartContainer"></div>

            <div id="listButtons">
                <button class="listButton">Következő</button>
                <button class="listButton">Előző</button>
            </div>

            <div id="questions_table"></div>

            <?php

            $statistics = new Statistics($mysqli);
            echo "<div class='hidden'>".$statistics->getCorrectPercentage()."</div>";
            echo "<div class='hidden'>".$statistics->getIncorrectPrecentage()."</div>";

            ?>
        </div>
    </div>

    <div id="footer"><div id="innerfooter">Copyright @ 2014<br /><i>Group 3 TEAM</i></div></div>
</body>
</html>
