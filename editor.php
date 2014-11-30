<?php

require('Question.php');
require_once("sessionfunctions.php");

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
    <title>Kérdés módosítása</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/editor.css" />
</head>
<body>
<?php checkSessionAndDisplay(); ?>
<div id="container">
    <!-- HEADER -->
    <div id="header">
        <div id="innerheader" class="sitecenter">
            <img src="images/logo_small.png" width="100" height="75" alt="logo" />
            <a href="adminpanel.php"> Kérdések </a>
            <a href=""> Elérhetőség </a>
        </div>
    </div>

    <!-- BODY -->
    <div id="site_content">
        <p>
            Az alábbi oldal segítségével az adatbázisban már megtalálható kérdések módosíthatóak.
        </p>

        <div id="editor_form">
            <form name="edit_form" action="edit.php">
                <table cellpadding="5" cellspacing="5">
                    <!-- FIRST ROW -->
                    <tr>
                        <td align="right"><label for="text_input1">Kérdés</label></td>
                        <td><input id="text_input1" class="text_input" type="text" name="mod_question" value="<?php echo $question->question ?>" /></td>
                    </tr>
                    <!-- SECOND ROW -->
                    <tr>
                        <td align="right"><label for="text_input2">Első válasz</label></td>
                        <td><input id="text_input2" class="text_input" type="text" name="mod_answer1" value="<?php echo $question->answer1 ?>" /></td>
                    </tr>
                    <!-- THIRD ROW -->
                    <tr>
                        <td align="right"><label for="text_input3">Második válasz</label></td>
                        <td><input id="text_input3" class="text_input" type="text" name="mod_answer2" value="<?php echo $question->answer2; ?>" /></td>
                    </tr>
                    <!-- FOURTH ROW -->
                    <tr>
                        <td align="right"><label for="text_input4">Harmadik válasz</label></td>
                        <td><input id="text_input4" class="text_input" type="text" name="mod_answer3" value="<?php echo $question->answer3; ?>" /></td>
                    </tr>
                    <!-- FIFTH ROW -->
                    <tr>
                        <td align="right"><label for="text_input5">Negyedik válasz</label></td>
                        <td><input id="text_input5" class="text_input" type="text" name="mod_answer4" value="<?php echo $question->answer4; ?>" /></td>
                    </tr>
                    <!-- SIXTH ROW -->
                    <tr>
                        <td align="right"><label for="mod_correct_answer">Helyes válasz</label></td>
                        <td align="center">
                            <div class="css_select">
                                <select id="mod_correct_answer" name="mod_correct_answer" size=”1”>
                                    <option value="<?php echo $question->answer1; ?>">A</option>
                                    <option value="<?php echo $question->answer2; ?>">B</option>
                                    <option value="<?php echo $question->answer3; ?>">C</option>
                                    <option value="<?php echo $question->answer4; ?>">D</option>
                                </select>
                            </div>
                            <?php

                            switch($question->correctAnswer){
                                case $question->answer1:
                                    echo "A";
                                    break;
                                case $question->answer2:
                                    echo "B";
                                    break;
                                case $question->answer3:
                                    echo "C";
                                    break;
                                case $question->answer4:
                                    echo "D";
                                    break;
                            }

                            ?>
                        </td>
                    </tr>
                    <!-- SEVENTH ROW -->
                    <tr>
                        <td align="right"><label>Nehezségi szint</label></td>
                        <td align="center">
                            <div id="diff_select_div" class="css_select">
                                <select id="mod_difficulty" name="mod_difficulty" size=”1”>
                                    <option value="easy">Könnyű</option>
                                    <option value="medium">Közepes</option>
                                    <option value="hard">Nehéz</option>
                                </select>
                            </div>
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
                        </td>
                    </tr>
                    <!-- EIGHT ROW -->
                    <tr id="input_buttons_tr">
                        <td colspan="2" align="center">
                            <input class="input_button" type="submit" value="Módosítás" />
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="mod" value="<?php echo $question->id ?>" />
            </form>
        </div>
    </div>
    <!-- SITE CONTENT END -->
</div>
<div id="footer">
    <div id="innerfooter">Copyright @ 2014<br /><i>Group 3 TEAM</i></div>
</div>
</body>
</html>
