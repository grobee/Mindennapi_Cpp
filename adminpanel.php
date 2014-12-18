<?php
/* see if logged in */
require_once("sessionfunctions.php");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Adminpanel</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/adminpanel.css" />
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
                <a href=""> Elérhetőség </a>
            </div>
        </div>

        <!-- BODY -->
        <div id="site_content">
            <p>Ezen oldal segítségével kilistázhatóak a már adatbázisban lévő kérdések, törölhetőek és módosíthatóak.
                Ezenkívül még lehetőség van új kérdése hozzáadására, ezáltal bővítve a már meglévő feladatok számát.</p>

            <div id="questions_table">
                <?php
                echo "<meta charset='UTF-8' />";

                require_once("Question.php");
                require_once("QuestionList.php");
                require_once("dbconfig.php");

                $qList = new Robert\QuestionList($mysqli);

                /* read the questions from db */
                $qList->populate();
                /* var_dump($qArray); */

                /* tablazat */
                echo "<table cellpadding='6'>";
                echo "<thead>
                        <th>Kérdés szövege</th><th>Válasz 1</th><th>Válasz 2</th><th>Válasz 3</th><th>Válasz 4</th><th>Helyes</th><th>Nehézség</th><th colspan='2'></th>
                      </thead>";

                /**@var Question $question */
                $i = 0;
                foreach ($qList->getQuestions() as $question) {
                    if($i % 2 == 0)
                        echo "<tr id='even_table_row'>";
                    else
                        echo "<tr id='odd_table_row'>";

                    echo "<td>" . $question->question . "</td><td>" . $question->answer1 . "</td><td>" . $question->answer2 . "</td>
                    <td>" . $question->answer3 . "</td><td>" . $question->answer4 . "</td><td>" . $question->correctAnswer . "</td><td>" . $question->difficulty . "</td>";

                    if($i % 2 == 0){
                        echo "
                            <td><a href='editor.php?id=".$question->id."'>
                                <img alt='edit icon' width='32' height='32' src='images/adminpanel/edit_icon_dark.png' />
                            </a></td>
                            <td><a href='delete.php?id=".$question->id."'>
                                    <img alt='delete icon' width='32' height='32' src='images/adminpanel/delete_icon_light.png' />
                                </a></td>";
                    }
                    else {
                        echo "
                            <td><a href='editor.php?id=".$question->id."'>
                                <img alt='edit icon' width='32' height='32' src='images/adminpanel/edit_icon_light.png' />
                            </a></td>
                            <td><a href='delete.php?id=".$question->id."'>
                                    <img alt='delete icon' width='32' height='32' src='images/adminpanel/delete_icon_dark.png' />
                                </a></td>";
                    }

                    echo "</tr>";
                    ++$i;
                }

                echo "
                    <tfoot id='add_new_question_row'>
                        <td colspan='9'>
                            <a href='addquestion.php'>+ új kérdés hozzáadása</a>
                        </td>
                    </tfoot>";
                echo "</table>";

                $mysqli->close();

                ?>
            </div>
            <!-- TABLE END -->
        </div>
        <!-- SITE CONTENT END -->
    </div>
    <div id="footer">
        <div id="innerfooter">Copyright @ 2014<br /><i>Group 3 TEAM</i></div>
    </div>
</body>
</html>
