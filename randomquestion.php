<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 11/26/2014
 * Time: 6:32 PM
 */
require_once('dbconfig.php');
$sql->query("SET NAMES utf8");
$result = $sql->query("SELECT * FROM questions ORDER BY RAND() LIMIT 1");
$row = $result->fetch_assoc();

$pack=array();

$pack[] = array( 'id_question' =>$row['id_question'],
                 'question'=> $row['question'],
                 'answer_1'=> $row['answer_1'],
                 'answer_2'=> $row['answer_2'],
                 'answer_3'=> $row['answer_3'],
                 'answer_4'=> $row['answer_4'],
                 'correct_answer' => $row['correct_answer'],
                 'difficulty'=> $row['difficulty']);

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($pack));
fclose($fp);