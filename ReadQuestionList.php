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

if(!$qList->getQuestions()->count()){
    echo "<p>Még egy kérdés sem található meg az adatbázisban.</p>";
    echo "<table>
            <tfoot id='add_new_question_row'>
                <td colspan='9'>
                    <a href='addquestion.php'>+ új kérdés hozzáadása</a>
                </td>
            </tfoot>
         </table>";

    exit();
}

/* tablazat */
echo "<table cellpadding='6'>";
echo "<thead>
        <th>Sr.</th><th>Kérdés szövege</th><th>A</th><th>B</th><th>C</th><th>D</th><th>Helyes</th><th>Nehézség</th><th colspan='3'></th>
      </thead>";

$i = 0;

foreach ($qList->getQuestions() as $question) {
    if($i % 2 == 0)
        echo "<tr id='even_table_row'>";
    else
        echo "<tr id='odd_table_row'>";
        
$answer1 = $question->answer1;
$answer2 = $question->answer2;
$answer3 = $question->answer3;
$answer4 = $question->answer4;
$real_correct_num="";
switch ($question->correctAnswer) {
    case $answer1 :
        $real_correct_num="A";
    break;
    case $answer2 :
        $real_correct_num="B";
        break;
    case $answer3 :
        $real_correct_num="C";
        break;
    case $answer4 :
        $real_correct_num="D";
        break;

}
    echo "<td id='centeredTd'>".$question->number."</td><td>" . $question->question . "</td><td id='centeredTd'>" . $answer1 . "</td><td id='centeredTd'>" . $answer2 . "</td>
                    <td id='centeredTd'>" .$answer3. "</td><td id='centeredTd'>" .$answer4. "</td><td id='centeredTd'>" . $real_correct_num . "</td><td id='centeredTd'>" . $question->difficulty . "</td>";

    if($i % 2 == 0){
        echo "
            <td><a title='statisztikák' href='questionStats.php?id=".$question->id."'>
                <img alt='questionStat icon' width='32' height='32' src='images/adminpanel/statistics_light.png' />
            </a></td>
            <td><a title='szerkesztés' href='editor.php?id=".$question->id."'>
                <img alt='edit icon' width='32' height='32' src='images/adminpanel/edit_icon_dark.png' />
            </a></td>
            <td><a class='delete_btn' title='törlés' href='delete.php?id=".$question->id."'>
                <img alt='delete icon' width='32' height='32' src='images/adminpanel/delete_icon_light.png' />
            </a></td>";
    }
    else {
        echo "
            <td><a title='statisztikák' href='questionStats.php?id=".$question->id."'>
                <img alt='questionStat icon' width='32' height='32' src='images/adminpanel/statistics_dark.png' />
            </a></td>
            <td><a title='szerkesztés' href='editor.php?id=".$question->id."'>
                <img alt='edit icon' width='32' height='32' src='images/adminpanel/edit_icon_light.png' />
            </a></td>
            <td><a class='delete_btn' title='törlés' href='delete.php?id=".$question->id."'>
                <img alt='delete icon' width='32' height='32' src='images/adminpanel/delete_icon_dark.png' />
            </a></td>";
    }

    echo "</tr>";
    ++$i;
}

echo "
                    <tfoot id='add_new_question_row'>
                        <td colspan='11'>
                            <a href='addquestion.php'>+ új kérdés hozzáadása</a>
                        </td>
                    </tfoot>";
echo "</table>";

$mysqli->close();
