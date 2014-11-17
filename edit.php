<?php
/**
 * User: Róbert
 * Date: 2014-10-31
 * Time: 20:00
 */

/* see if logged in */
require_once("sessionfunctions.php");
require_once('dbconfig.php');
checkSessionAndDisplay();

$id = null;
/* check if the getters are set */
if(isset($_GET['mod_question']))
    $mod_question = $sql->escape_string($_GET['mod_question']);
if(isset($_GET['mod_answer1']))
    $mod_answer1 = $sql->escape_string($_GET['mod_answer1']);
if(isset($_GET['mod_answer2']))
    $mod_answer2 = $sql->escape_string($_GET['mod_answer2']);
if(isset($_GET['mod_answer3']))
    $mod_answer3 = $sql->escape_string($_GET['mod_answer3']);
if(isset($_GET['mod_answer4']))
    $mod_answer4 = $sql->escape_string($_GET['mod_answer4']);
if(isset($_GET['mod_correct_answer']))
    $mod_correct_answer = $sql->escape_string($_GET['mod_correct_answer']);
if(isset($_GET['mod_correct_answer']))
    $mod_difficulty = $sql->escape_string($_GET['mod_difficulty']);
if(isset($_GET['mod']))
    $id = $sql->escape_string($_GET['mod']);

$sql->query("SET NAMES utf8");
/* modify the values */
if(!empty($mod_question)){
    $sql->query("UPDATE questions SET question = '$mod_question' WHERE id_question = $id");

    if($sql->affected_rows == 0)
        header("Location: editor.php?id=$id&success=false");
}


if(!empty($mod_answer1)){
    $sql->query("UPDATE questions SET answer_1 = '$mod_answer1' WHERE id_question = $id");
    if($sql->affected_rows == 0)
        header("Location: editor.php?id=$id&success=false");
}


if(!empty($mod_answer2)){
    $sql->query("UPDATE questions SET answer_2 = '$mod_answer2' WHERE id_question = $id");
    if($sql->affected_rows == 0)
        header("Location: editor.php?id=$id&success=false");
}


if(!empty($mod_answer3)){
    $sql->query("UPDATE questions SET answer_3 = '$mod_answer3' WHERE id_question = $id");
    if($sql->affected_rows == 0)
        header("Location: editor.php?id=$id&success=false");
}


if(!empty($mod_answer4)){
    $sql->query("UPDATE questions SET answer_4 = '$mod_answer4' WHERE id_question = $id");
    if($sql->affected_rows == 0)
        header("Location: editor.php?id=$id&success=false");
}


if(!empty($mod_correct_answer)){
    $sql->query("UPDATE questions SET correct_answer = '$mod_correct_answer' WHERE id_question = $id");
    if($sql->affected_rows == 0)
        header("Location: editor.php?id=$id&success=false");
}

$sql->close();

header("Location: editor.php?id=$id&success=true");
