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

//var_dump($row['id_member']);
$id_member = $row['id_member'];
$mysql_date_now = date("Y-m-d");

$sql->query("SET NAMES UTF8");
$sql->query("INSERT INTO answers (id_question, correct, date, id_member)" . "VALUES ('$id_question', '$correct', '$mysql_date_now', '$id_member');");