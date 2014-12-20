<?php
/* see if logged in */
require_once("sessionfunctions.php");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Adminpanel</title>
    <link rel="shortcut icon" href="images/logo_tab.png" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/adminpanel.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="scripts/adminpanel.js"></script>
</head>
<body>
    <?php checkSessionAndDisplay(); ?>
    <div id="container">
        <!-- HEADER -->
        <div id="header">
            <div id="innerheader" class="sitecenter">
                <img src="images/logo_small.png" width="100" height="75" alt="logo"/>
                <a href="#"> Kérdések </a>
                <a href="statisticsPage.php"> Statisztika </a>
            </div>
        </div>

        <!-- BODY -->
        <div id="site_content">
            <p>Ezen oldal segítségével kilistázhatóak a már adatbázisban lévő kérdések, törölhetőek és módosíthatóak.
                Ezenkívül még lehetőség van új kérdése hozzáadására, ezáltal bővítve a már meglévő feladatok számát.</p>

            <div id="listButtons">
                <button class="listButton">Következő</button>
                <button class="listButton">Előző</button>
            </div>

            <div id="loading_div"><img width="32" height="32" alt="loading..." src="images/loading.gif" /></div>
            <div id="questions_table"></div>
        </div>
    </div>
    <div id="footer">
        <div id="innerfooter">Copyright @ 2014<br /><i>Group 3 TEAM</i></div>
    </div>
</body>
</html>
