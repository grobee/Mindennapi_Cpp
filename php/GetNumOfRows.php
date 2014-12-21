<?php

require_once('../dbconfig.php');

$type = $mysqli->real_escape_string($_GET['type']);
$bottom = $mysqli->real_escape_string($_GET['bottom']);
$number = $mysqli->real_escape_string($_GET['number']);

if($type == 'questions'){
    $query = "SELECT * FROM questions LIMIT $bottom, $number";
    echo $mysqli->query($query)->num_rows;
}
else if($type == 'answers'){
    $query = "SELECT * FROM answers LIMIT $bottom, $number";
    echo $mysqli->query($query)->num_rows;
}
