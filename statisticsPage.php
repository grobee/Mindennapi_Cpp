<?php require_once("sessionfunctions.php"); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Statisztika</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/statistics.css" />
    <?php checkSessionAndDisplay(); ?>
    <?php require('dbconfig.php'); ?>
    <?php require('statistics.php'); ?>
    <script src="scripts/canvasjs.min.js"></script>
    <script type="text/javascript" src="scripts/statistics.js"></script>
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
            <?php
            $statistics = new Statistics($mysqli);
            echo "<div class='hidden'>".$statistics->getCorrectPercentage()."</div>";
            echo "<div class='hidden'>".$statistics->getIncorrectPrecentage()."</div>";
            ?>

            <div id="chartContainer"></div>

            <div id="questions_table">
                <?php
                $i = 0;
                if(!sizeof($statistics->getFullList())) echo "<p>Még senki sem adott választ.</p>";
                else {
                    /* tablazat */
                    echo "<table cellpadding='10'>";
                    echo "<thead>
                        <th>Kérdés</th>
                        <th>Helyesség</th>
                        <th>Név</th>
                        <th>Dátum</th>
                        <th>Nehézség</th>
                     </thead>";

                    foreach ($statistics->getFullList() as $answer) {
                        if($i % 2 == 0)
                            echo "<tr id='even_table_row'>";
                        else
                            echo "<tr id='odd_table_row'>";

                        echo "<td>" . $answer['question'] . "</td><td>" . ($answer['correct'] == 1 ? "helyes" : "helytelen") . "</td><td>" . $answer['name'] . "</td>
                            <td>" . $answer['date'] . "</td><td>" . $answer['difficulty'] . "</td>";

                        echo "</tr>";
                        ++$i;
                    }

                    echo "</table>";
                    $mysqli->close();
                }
                ?>
            </div>
        </div>
    </div>

    <div id="footer"><div id="innerfooter">Copyright @ 2014<br /><i>Group 3 TEAM</i></div></div>
</body>
</html>
