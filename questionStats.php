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
            <div id="questions_table">
                <?php

                if(isset($_GET['id'])) $q_id = $mysqli->escape_string($_GET['id']);
                else {
                    echo "<p>Hiányzó vagy helytelen ID.</p>\n";
                    exit();
                }

                $qList = new \Robert\QuestionList($mysqli);
                $qList->populate();

                $data = $qList->getQuestion($q_id);
                if($data == null) {
                    echo "<p>Nem létező kérdés.</p>";
                    exit();
                }

                echo "<table>\n";
                echo "\t\t<thead>
                        \t<th>Kérdés szövege</th>\n \t\t\t<th>Helyes válasz</th>\n \t\t\t<th>Nehézség</th>
                      </thead>";
                echo "\n \t\t<tr>
                        <td>".$data->question."</td>\n \t\t<td>".$data->correctAnswer."</td>\n \t\t<td>".$data->difficulty."</td>\n
                      </tr>\n";
                echo "\t</table>\n";

                ?>
            </div>

            <?php

            $statistics = new Statistics($mysqli);
            $correctCount = $statistics->getQuestionCorrectPercentage($q_id);
            $incorrectCount = $statistics->getQuestionIncorrectPercentage($q_id);

            echo "<div class='hidden'>$correctCount</div>";
            echo "<div class='hidden'>$incorrectCount</div>";

            ?>
        </div>
    </div>

        <div id="footer">
        <div id="innerfooter">Copyright @ 2014<br/><i>Group 3 TEAM</i></div>
    </div>
</body>
</html>
