<?php
/**
 * @author Gulyás Róbert
 * Date: 10/24/2014
 * Time: 6:40 PM
 */

echo "<meta charset='UTF-8' />";

/* MySQL connection */
$sql = new mysqli("localhost", "root", "", "mindenapicpp");

/* define the variables and initialize */
$question = null;
$ans1 = null;
$ans2 = null;
$ans3 = null;
$ans4 = null;
$corrans = null;

/* get the values from the GET method */
if (isset($_GET["question"]))
    $question = $sql->escape_string($_GET["question"]);
if (isset($_GET["answer1"]))
    $ans1 = $sql->escape_string($_GET["answer1"]);
if (isset($_GET["answer2"]))
    $ans2 = $sql->escape_string($_GET["answer2"]);
if (isset($_GET["answer3"]))
    $ans3 = $sql->escape_string($_GET["answer3"]);
if (isset($_GET["answer4"]))
    $ans4 = $sql->escape_string($_GET["answer4"]);
if (isset($_GET["correct_answer"]))
    $corrans = $sql->escape_string($_GET["correct_answer"]);

/* determine the correct answer */
switch($corrans){
    case 1:
        $corrans = $ans1;
        break;
    case 2:
        $corrans = $ans2;
        break;
    case 3:
        $corrans = $ans3;
        break;
    case 4:
        $corrans = $ans4;
        break;
}

/* insert the question into the DB */
$sql->query("SET NAMES UTF8");
$sql->query("INSERT INTO questions (question, answer_1, answer_2, answer_3, answer_4, correct_answer)".
    "VALUES ('$question', '$ans1', '$ans2', '$ans3', '$ans4', '$corrans');");

/* see if the insertion was successful */
if($sql->query("SELECT id_question FROM questions WHERE question = '$question' AND correct_answer = '$corrans';")->num_rows > 0)
    header("Location: addquestion.php?success=true");
else
    header("Location: addquestion.php?success=false");

/* close the connection */
$sql->close();
