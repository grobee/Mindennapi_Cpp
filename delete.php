<?php

require_once("sessionfunctions.php");
require_once('dbconfig.php');
checkSessionAndDisplay();

/* if no id is given */
if(!isset($_GET['id']) || empty($_GET['id']))
    header("Location:adminpanel.php");

$id = $sql->escape_string($_GET['id']);

/* see if the given question exists */
$result = $sql->query("SELECT id_question FROM questions WHERE id_question = $id");

if($result->num_rows == 0)
    header("Location: adminpanel.php?success=false");

/* delete the question */
$sql->query("DELETE FROM questions WHERE id_question = $id");
$sql->close();


if(isset($_GET['bottom'])){
    header("Location:adminpanel.php?success=siker&bottom=".$_GET['bottom']);
    exit();
}

header("Location:adminpanel.php?success=siker");
