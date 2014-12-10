<?php require_once("sessionfunctions.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Új kérdés bevitele</title>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/addquestion.css"/>
</head>
<body>
<?php checkSessionAndDisplay(); ?>
<div id="container">
    <!-- HEADER -->
    <div id="header">
        <div id="innerheader" class="sitecenter">
            <img src="images/logo_small.png" width="100" height="75" alt="logo"/>
            <a href="adminpanel.php"> Kérdések </a>
            <a href=""> Elérhetőség </a>
        </div>
    </div>

    <!-- BODY -->
    <div id="site_content">
        <p>
            Az alábbi oldal segítségével új kérdések tölthetőek fel az adatbázisba
        </p>

        <div id="question_form">
            <form name="question_form" method="get" action="uploadquestion.php">
                <table cellpadding="5" cellspacing="5">
                    <!-- FIRST ROW -->
                    <tr>
                        <td align="right"><label for="text_input1">Kérdés</label></td>
                        <td><input class="text_input" type="text" name="question"/></label></td>
                    </tr>
                    <!-- SECOND ROW -->
                    <tr>
                        <td align="right"><label for="text_input2">Első válasz</label></td>
                        <td><input class="text_input" type="text" name="answer1"/></td>
                    </tr>
                    <!-- THIRD ROW -->
                    <tr>
                        <td align="right"><label for="text_input3">Második válasz</label></td>
                        <td><input class="text_input" type="text" name="answer2"/></td>
                    </tr>
                    <!-- FOURTH ROW -->
                    <tr>
                        <td align="right"><label for="text_input4">Harmadik válasz</label></td>
                        <td><input class="text_input" type="text" name="answer3"/></td>
                    </tr>
                    <!-- FIFTH ROW -->
                    <tr>
                        <td align="right"><label for="text_input5">Negyedik válasz</label></td>
                        <td><input class="text_input" type="text" name="answer4"/></td>
                    </tr>
                    <!-- SIXTH ROW -->
                    <tr>
                        <td align="right"><label for="correct_answer">Helyes válasz</label></td>
                        <td align="center">
                            <div class="css_select">
                                <select id="correct_answer" name="correct_answer" size=”1”>
                                    <option value="v1">A</option>
                                    <option value="v2">B</option>
                                    <option value="v3">C</option>
                                    <option value="v4">D</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <!-- SEVENTH ROW -->
                    <tr>
                        <td align="right"><label>Nehezségi szint</label></td>
                        <td align="center">
                            <div id="diff_select_div" class="css_select">
                                <select id="difficulty" name="difficulty" size=”1”>
                                    <option value="easy">Könnyű</option>
                                    <option value="medium">Közepes</option>
                                    <option value="hard">Nehéz</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <!-- EIGHT ROW -->
                    <tr id="input_buttons_tr">
                        <td colspan="2" align="center">
                            <input class="input_button" type="submit" value="Elküldés"/>
                        </td>
                    </tr>
                </table>
            </form>
            <?php

            /* see if any statement was sent to this page through the GET method */
            if (isset($_GET['success'])) {
                switch ($_GET['success']) {
                    case "true":
                        echo "<div id='failure'>A kérdésbevitel sikeres volt.</div>\n";
                        break;

                    case "false":
                        echo "<div id='failure'>A kérdésbevitel sikertelen volt.</div>\n";
                        break;
                }
            }

            ?>
        </div>
    </div>
    <!-- SITE CONTENT END -->
</div>
<div id="footer">
    <div id="innerfooter">Copyright @ 2014<br/><i>Group 3 TEAM</i></div>
</div>
</body>
</html>


<!-- <div id="center">



        <label>Válasz 1: <input type="text" name="answer1"/></label>
        <br/><br/>
        <label>Válasz 2: <input type="text" name="answer2"/></label>
        <br/><br/>
        <label>Válasz 3: <input type="text" name="answer3"/></label>
        <br/><br/>
        <label>Válasz 4: <input type="text" name="answer4"/></label>
        <br/><br/>

        <div id="select">
            <span>Helyes válasz:</span>
            <select name="correct_answer" size=”1”>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select><br/><br/>
        </div>
        <div id="select2">
            <span>Nehézség:</span>
            <select name="difficulty" size=”1”>
                <option value="easy">Könnyű</option>
                <option value="medium">Közepes</option>
                <option value="hard">Nehéz</option>
            </select><br/><br/>
        </div>
        <input type="submit" name="send" value="Küldés"/>
    </form>
