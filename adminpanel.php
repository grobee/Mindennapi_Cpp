<?php
/**
 * @author Birkás Tamás
 * @author Gulyás Róbert
 * Date: 10/20/2014
 * Time: 10:13 PM
 */

/* see if logged in */
//require_once("sessionfunctions.php");
//checkSessionAndDisplay();

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div id="top"><b>Mindennapi C++</b></div>
<?php
require_once("sessionfunctions.php");
checkSessionAndDisplay();
?>
<br /><br />
<a href="addquestion.php">Új kérdés hozzáadása</a>
<br /><br />

<div id="center">
    <?php
    echo "<meta charset='UTF-8' />";


    require_once("Question.php");
    require_once("QuestionList.php");

    $mysqli = new mysqli("localhost", "root", "", "mindenapicpp");
    $qList = new Robert\QuestionList($mysqli);

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
    foreach ($qArray as $question) {
        echo "<tr>";
        echo "<td>" . $question->getQuestion() . "</td><td>" . $question->getAnswers()[0] . "</td><td>" . $question->getAnswers()[1] . "</td>
        <td>" . $question->getAnswers()[2] . "</td><td>" . $question->getAnswers()[3] . "</td><td>" . $question->getCorrectAnswer() . "</td>
        <td><a href='delete.php?id=".$question->getId()."'>X</a></td>
        <td><a href='editor.php?id=".$question->getId()."'>Módosítás</a>";
        echo "</tr>";
    }

    $mysqli->close();

    ?>
</div>
</body>
</html>
