<?php
echo "<meta charset='UTF-8' />";

require_once("Question.php");
require_once("QuestionList.php");
require_once("dbconfig.php");

$qList = new Robert\QuestionList($mysqli);

/* bottom and top */
$bottom = $mysqli->real_escape_string($_GET['bottom']);
$number = $mysqli->real_escape_string($_GET['number']);

/* read the questions from db */
$qList->populate($bottom, $number);
/* var_dump($qArray); */

/* tablazat */
echo "<table cellpadding='6'>";
echo "<thead>
        <th>Kérdés szövege</th><th>Helyes</th><th>Nehézség</th><th colspan='2'></th>
      </thead>";

/**@var Question $question */
$i = 0;
foreach ($qList->getQuestions() as $question) {
    if($i % 2 == 0)
        echo "<tr id='even_table_row'>";
    else
        echo "<tr id='odd_table_row'>";

    echo "<td>" . $question->question . "</td><td>" . $question->correctAnswer . "</td><td>" . $question->difficulty . "</td>";

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
