<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title></title>
</head>
<body>
<div id="top"><b>Mindennapi C++</b></div>
<?php
require_once("sessionfunctions.php");
checkSessionAndDisplay();
?>
<br/><br/>

<div id="center">
    <form name="question_form" method="get" action="uploadquestion.php">
        <div id="question">
            <label>Kérdés:
            <input type="text" name="question"/></label>
            <br/><br/>
        </div>

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
    <?php

    /* see if any statement was sent to this page through the GET method */
    if(isset($_GET['success'])){
        switch($_GET['success']){
            case 'true':
                echo "<div id='success'>A kérdésbevitel sikeres volt.</div>\n";
                break;

            case 'false:':
                echo "<div id='failure'>A kérdésbevitel sikertelen volt.</div>\n";
                break;
        }
    }

    ?>
</div>
</body>
</html>
