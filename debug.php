<?php
/**
 * @author Birkás Tamás
 * @author Gulyás Róbert
 * Date: 10/18/2014
 * Time: 8:47 PM
 */

echo "<meta charset='UTF-8' />";

require_once("Question.php");
require_once("QuestionList.php");

$mysqli = new mysqli("localhost", "root", "", "mindenapicpp");
$qList = new Robert\QuestionList($mysqli);


$salt="vts";
echo md5($salt.'jelszo'.$salt);



/* read the questions from db */
$qList->populate();
$qArray = $qList->getQuestions();
/* var_dump($qArray); */

/* tablazat */
echo "<table border='1'>";
echo "<thead>";
echo "<th>Kérdés szövege</th><th>Válasz 1</th><th>Válasz 2</th><th>Válasz 3</th><th>Válasz 4</th><th>Helyes válasz</th>";
echo "</thead>";

/**@var Question $question */
foreach($qArray as $question){
    echo "<tr>";
    echo "<td>".$question->getQuestion()."</td><td>".$question->getAnswers()[0]."</td><td>".$question->getAnswers()[1]."</td>
          <td>".$question->getAnswers()[2]."</td><td>".$question->getAnswers()[3]."</td><td>".$question->getCorrectAnswer()."</td>";
    echo "</tr>";
}
