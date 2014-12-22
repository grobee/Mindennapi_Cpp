<?php

require('Question.php');
require_once("sessionfunctions.php");

if(!isset($_GET['id']))
    header("Location: adminpanel.php");

require_once('dbconfig.php');

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
    <link rel="shortcut icon" href="images/logo_tab.png" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/editor.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/submitcheck.js"></script>
</head>
<body>
<?php checkSessionAndDisplay(); ?>
<div id="container">
    <!-- HEADER -->
    <div id="header">
        <div id="innerheader" class="sitecenter">
            <img src="images/logo_small.png" width="100" height="75" alt="logo" />
            <a href="adminpanel.php"> Kérdések </a>
            <a href="statisticsPage.php"> Statisztika </a>
        </div>
    </div>

    <!-- BODY -->
    <div id="site_content">
        <p>
            Az alábbi oldal segítségével az adatbázisban már megtalálható kérdések módosíthatóak.
        </p>
        <?php

        /* see if any statement was sent to this page through the GET method */
        if(isset($_GET['success'])){
            switch($_GET['success']){
                case "true":
                    echo "<div id='failure' class='success'>A kérdésmódosítás sikeres volt.</div>\n";
                    break;

                case "false":
                    echo "<div id='failure' class='success'>A kérdésmódosítás sikertelen volt.</div>\n";
                    break;
            }
        }

        ?>

        <div id="editor_form">
            <form name="edit_form" action="edit.php">
                <table cellpadding="5" cellspacing="5">
                    <!-- FIRST ROW -->
                    <tr>
                        <td align="right"><label for="text_input1">Kérdés</label></td>
                        <td><textarea id="text_input1" class="text_input" type="text" name="mod_question"><?php echo $question->question ?></textarea></td>
                    </tr>
                    <!-- SECOND ROW -->
                    <tr>
                        <td align="right"><label for="text_input2">Első válasz</label></td>
                        <td><textarea id="text_input2" class="text_input" type="text" name="mod_answer1"><?php echo $question->answer1 ?></textarea></td>
                    </tr>
                    <!-- THIRD ROW -->
                    <tr>
                        <td align="right"><label for="text_input3">Második válasz</label></td>
                        <td><textarea id="text_input3" class="text_input" type="text" name="mod_answer2"><?php echo $question->answer2; ?></textarea></td>
                    </tr>
                    <!-- FOURTH ROW -->
                    <tr>
                        <td align="right"><label for="text_input4">Harmadik válasz</label></td>
                        <td><textarea id="text_input4" class="text_input" type="text" name="mod_answer3"><?php echo $question->answer3; ?></textarea></td>
                    </tr>
                    <!-- FIFTH ROW -->
                    <tr>
                        <td align="right"><label for="text_input5">Negyedik válasz</label></td>
                        <td><textarea id="text_input5" class="text_input" type="text" name="mod_answer4"><?php echo $question->answer4; ?></textarea></td>
                    </tr>
                    <!-- SIXTH ROW -->
                    <tr>
                        <td align="right"><label for="mod_correct_answer">Helyes válasz</label></td>
                        <td align="center">
                            <div class="css_select">
                                <?php
                                $select_a="<option value=\"A\">A</option>";
                                $select_b="<option value=\"B\">B</option>";
                                $select_c="<option value=\"C\">C</option>";
                                $select_d="<option value=\"D\">D</option>";
                                switch($question->correctAnswer){
                                    case $question->answer1:
                                        $select_a="<option selected=\"selected\" value=\"A\">A</option>";
                                        break;
                                    case $question->answer2:
                                        $select_b="<option selected=\"selected\" value=\"B\">B</option>";
                                        break;
                                    case $question->answer3:
                                        $select_c="<option selected=\"selected\" value=\"C\">C</option>";
                                        break;
                                    case $question->answer4:
                                        $select_d="<option selected=\"selected\" value=\"D\">D</option>";
                                        break;
                                }
                                ?>
                                <select id="mod_correct_answer" name="mod_correct_answer" size=”1”>
                                    <?php
                                    echo $select_a.$select_b.$select_c.$select_d;
                                    ?>
                                </select>
                            </div>

                        </td>
                    </tr>
                    <!-- SEVENTH ROW -->
                    <tr>
                        <td align="right"><label>Nehezségi szint</label></td>
                        <td align="center">
                            <div id="diff_select_div" class="css_select">
                                <?php
                                $select_easy="<option value=\"könnyű\">Könnyű</option>";
                                $select_medium="<option value=\"közepes\">Közepes</option>";
                                $select_hard="<option value=\"nehéz\">Nehéz</option>";
                                switch($question->difficulty){
                                    case 'könnyű':
                                        $select_easy="<option selected=\"selected\" value=\"könnyű\">Könnyű</option>";
                                        break;
                                    case 'közepes':
                                        $select_medium="<option selected=\"selected\" value=\"közepes\">Közepes</option>";
                                        break;
                                    case 'nehéz':
                                        $select_hard="<option  selected=\"selected\" value=\"nehéz\">Nehéz</option>";
                                        break;
                                }

                                ?>
                                <select id="mod_difficulty" name="mod_difficulty" size=”1”>
                                    <?php
                                    echo $select_easy.$select_medium.$select_hard;
                                    ?>
                                </select>
                            </div>

                        </td>
                    </tr>
                    <!-- EIGHT ROW -->
                    <tr id="input_buttons_tr">
                        <td colspan="2" align="center">
                            <input id="btn_submit" class="input_button" type="submit" value="Módosítás" />
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
