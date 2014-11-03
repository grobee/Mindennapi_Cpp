<?php
/**
 * User: Róbert
 * Date: 2014-10-31
 * Time: 19:23
 */


if(!isset($_GET['id']))
    header("Location: adminpanel.php");

$sql = new mysqli("localhost", "root", "", "mindenapicpp");

$id = $sql->escape_string($_GET['id']);
$sql->query("SET NAMES utf8");
$result = $sql->query("SELECT * FROM questions WHERE id_question=$id");

$row = $result->fetch_assoc()

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
            <input type="text" name="mod_question" />
            <?php echo " ". $row['question']; ?>
        </label>
        <br /><br />
        <label>Első válasz:
            <input type="text" name="mod_answer1" />
            <?php echo " ". $row['answer_1']; ?>
        </label>
        <br /><br />
        <label>Második válasz:
            <input type="text" name="mod_answer2"/>
            <?php echo " ". $row['answer_2']; ?>
        </label>
        <br /><br />
        <label>Harmadik válasz:
            <input type="text" name="mod_answer3"/>
            <?php echo " ". $row['answer_3']; ?>
        </label>
        <br /><br />
        <label>Negyedik válasz:
            <input type="text" name="mod_answer4"/>
            <?php echo " ". $row['answer_4']; ?>
        </label>
        <br /><br />
        <label>Helyes válasz:
            <select name="mod_correct_answer" size=”1”>
                <option value="<?php echo $row['answer_1']; ?>">A</option>
                <option value="<?php echo $row['answer_2']; ?>">B</option>
                <option value="<?php echo $row['answer_3']; ?>">C</option>
                <option value="<?php echo $row['answer_4']; ?>">D</option>
            </select>
            <?php

            switch($row['correct_answer']){
                case $row['answer_1']:
                    echo " A";
                    break;
                case $row['answer_2']:
                    echo " B";
                    break;
                case $row['answer_3']:
                    echo " C";
                    break;
                case $row['answer_4']:
                    echo " D";
                    break;
            }

            ?>
        </label>
        <br /><br />
        <input type="hidden" name="mod" value="<?php echo $row['id_question'] ?>" />
        <input type="submit" value="Módosítás" />
        <input type="reset" value="Visszaállítás" />
    </form>
</div>

</body>
</html>
