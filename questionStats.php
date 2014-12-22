<?php require_once("sessionfunctions.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Statisztika</title>
    <link rel="shortcut icon" href="images/logo_tab.png" />
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/qstats.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="scripts/canvasjs.min.js"></script>
    <script src="scripts/qstats.js"></script>
    <script type="text/javascript" src="scripts/chart.js"></script>
    <?php require('dbconfig.php'); ?>
    <?php require('QuestionList.php'); ?>
    <?php require('statistics.php'); ?>
</head>
<body>
    <?php checkSessionAndDisplay(); ?>
    <div id="container">
        <!-- HEADER -->
        <div id="header">
            <div id="innerheader" class="sitecenter">
                <img src="images/logo_small.png" width="100" height="75" alt="logo"/>
                <a href="adminpanel.php"> Kérdések </a>
                <a href="logpage.php"> Naplózás </a>
            </div>
        </div>

        <div id="site_content">
            <p>
                Ezen az oldalon a kiválasztott kérdés statisztikái láthatóak.
            </p>

            <div id="chartContainer"></div>

            <div id="listButtons">
                <button class="listButton">Előző</button>
                <button class="listButton">Következő</button>
            </div>

            <div id="loading_div"><img id="question_table_img" width="32" height="32" alt="loading..." src="images/loading.gif" /></div>
            <div id="questions_table2"></div>

            <?php

            if(isset($_GET['id'])) $q_id = $mysqli->escape_string($_GET['id']);
            else {
                echo "<p>Hiányzó vagy helytelen ID.</p>\n";
                exit();
            }

            $statistics = new Statistics($mysqli);
            $correctCount = $statistics->getQuestionCorrectPercentage($q_id);
            $incorrectCount = $statistics->getQuestionIncorrectPercentage($q_id);

            echo "<div class='hidden'>$correctCount</div>";
            echo "<div class='hidden'>$incorrectCount</div>";
            echo "<div id='valamid' class='hidden'>$q_id</div>"

            ?>
        </div>
    </div>

        <div id="footer">
        <div id="innerfooter">Copyright @ 2014<br/><i>Group 3 TEAM</i></div>
    </div>
</body>
</html>
