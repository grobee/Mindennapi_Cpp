<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 11/26/2014
 * Time: 8:40 PM
 */


// EXAMPLE submitanswer.php?index=14415166&id_question=3&correct=1

if (isset($_GET['index']))
    $index = $_GET['index'];
if (isset($_GET['correct']))
    $correct = $_GET['correct'];
if (isset($_GET['id_question']))
    $id_question = $_GET['id_question'];

require_once('dbconfig.php');
$sql->query("SET NAMES utf8");
$result = $sql->query("SELECT id_member FROM users WHERE index_number='$index'");
$row = $result->fetch_assoc();


$id_member = $row['id_member'];

// Checking the correct answer
$sql->query("SET NAMES utf8");
$result = $sql->query("SELECT * FROM questions WHERE id_question='$id_question'");
$row = $result->fetch_assoc();

$real_correct_num=0;
switch ($row['correct_answer']) {
    case $row['answer_1'] :
        $real_correct_num=1;
    break;
    case $row['answer_2'] :
        $real_correct_num=2;
        break;
    case $row['answer_3'] :
        $real_correct_num=3;
        break;
    case $row['answer_4'] :
        $real_correct_num=4;
        break;
}


if (!empty($correct)) {
    if ($correct == $real_correct_num)
        $bool_correct=1;
    else
        $bool_correct=0;
}

//var_dump($bool_correct);


// Inserting the answer to the answers table
$mysql_date_now = date("Y-m-d");
//echo("INSERT INTO answers (id_question, correct, date, id_member)" . "VALUES ('$id_question', '$bool_correct', '$mysql_date_now', '$id_member');");

$sql->query("SET NAMES UTF8");
$sql->query("INSERT INTO answers (id_question, correct, date, id_member)" . "VALUES ('$id_question', '$bool_correct', '$mysql_date_now', '$id_member');");