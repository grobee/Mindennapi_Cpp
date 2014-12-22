<?php

echo "<meta charset='UTF-8' />";

/* MySQL connection */
require_once('dbconfig.php');
require('Question.php');

/* define the variables and initialize */
$question = new Question();
$corrAnsNumber = null;

/* check does the upload conains empty parameters */
if (trim($_GET["question"]) == "" OR trim($_GET["answer1"]) == "" OR trim($_GET["answer2"]) == "" OR
    trim($_GET["answer3"]) == "" OR trim($_GET["answer4"]) == "" OR trim($_GET["correct_answer"]) == "" OR trim($_GET["difficulty"]) == ""
) {
    header("Location: addquestion.php?success=false");
} else {
    /* get the values from the GET method */
    if (isset($_GET["question"]))
        $question->question = $sql->escape_string($_GET["question"]);
    if (isset($_GET["answer1"]))
        $question->answer1 = $sql->escape_string($_GET["answer1"]);
    if (isset($_GET["answer2"]))
        $question->answer2 = $sql->escape_string($_GET["answer2"]);
    if (isset($_GET["answer3"]))
        $question->answer3 = $sql->escape_string($_GET["answer3"]);
    if (isset($_GET["answer4"]))
        $question->answer4 = $sql->escape_string($_GET["answer4"]);
    if (isset($_GET["correct_answer"]))
        $corrAnsNumber = $sql->escape_string($_GET["correct_answer"]);
    if (isset($_GET["difficulty"]))
        $question->difficulty = $sql->escape_string($_GET["difficulty"]);

    /* determine the correct answer */
    switch ($corrAnsNumber) {
        case 1:
            $question->correctAnswer = $question->answer1;
            break;
        case 2:
            $question->correctAnswer = $question->answer2;
            break;
        case 3:
            $question->correctAnswer = $question->answer3;
            break;
        case 4:
            $question->correctAnswer = $question->answer4;
            break;
    }

    /* insert the question into the DB */
    $sql->query("SET NAMES UTF8");
    $sql->query("INSERT INTO questions (question, answer_1, answer_2, answer_3, answer_4, correct_answer, difficulty)" .
        "VALUES ('$question->question', '$question->answer1', '$question->answer2', '$question->answer3', '$question->answer4', '$question->correctAnswer', '$question->difficulty');");

    /* see if the insertion was successful */
    if ($sql->query("SELECT id_question FROM questions WHERE question = '$question->question' AND correct_answer = '$question->correctAnswer';")->num_rows > 0)
        header("Location: addquestion.php?success=true");
    else
        header("Location: addquestion.php?success=false");

    /* close the connection */
    $sql->close();
}
