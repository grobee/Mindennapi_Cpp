<?php

require('Question.php');

if(!isset($_GET['id']))
    header("Location: adminpanel.php");

$sql = new mysqli("localhost", "root", "", "mindenapicpp");

$id = $sql->escape_string($_GET['id']);
$sql->query("SET NAMES utf8");
$result = $sql->query("SELECT * FROM questions WHERE id_question=$id");

$row = $result->fetch_assoc();
$question = new Question($row['id_question'], $row['question'], $row['answer_1'], $row['answer_2'], $row['answer_3'], $row['answer_4'], $row['correct_answer'], $row['difficulty']);

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

<div id="center">
    <form name="edit_form" action="edit.php">
        <label>Kérdés:
            <input type="text" name="mod_question" value="<?php echo $question->question ?>" />
        </label>
        <br /><br />
        <label>Első válasz:
            <input type="text" name="mod_answer1" value="<?php echo $question->answer1 ?>" />
        </label>
        <br /><br />
        <label>Második válasz:
            <input type="text" name="mod_answer2" value="<?php echo $question->answer2; ?>" />
        </label>
        <br /><br />
        <label>Harmadik válasz:
            <input type="text" name="mod_answer3" value="<?php echo $question->answer3; ?>" />
        </label>
        <br /><br />
        <label>Negyedik válasz:
            <input type="text" name="mod_answer4" value="<?php echo $question->answer4; ?>" />
        </label>
        <br /><br />
        <label>Helyes válasz:
            <select name="mod_correct_answer" size=”1”>
                <option value="<?php echo $question->answer1; ?>">A</option>
                <option value="<?php echo $question->answer2; ?>">B</option>
                <option value="<?php echo $question->answer3; ?>">C</option>
                <option value="<?php echo $question->answer4; ?>">D</option>
            </select>
            <?php

            switch($question->correctAnswer){
                case $question->answer1:
                    echo " A";
                    break;
                case $question->answer2:
                    echo " B";
                    break;
                case $question->answer3:
                    echo " C";
                    break;
                case $question->answer4:
                    echo " D";
                    break;
            }

            ?>
        </label>
        <br /><br />
        <label>Nehezségi szint:
            <select name="mod_difficulty" size=”1”>
                <option value="easy">Könnyű</option>
                <option value="medium">Közepes</option>
                <option value="hard">Nehéz</option>
            </select>
            <?php

            switch($question->difficulty){
                case 'easy':
                    echo "Könnyű";
                    break;
                case 'medium':
                    echo "Közepes";
                    break;
                case 'hard':
                    echo "Nehéz";
                    break;
            }

            ?>
        </label>

        <input type="hidden" name="mod" value="<?php echo $question->id ?>" />
        <input type="submit" value="Módosítás" />
        <input type="reset" value="Visszaállítás" />
    </form>
</div>

</body>
</html>
