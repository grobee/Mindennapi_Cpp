<?php

/**
 * @author Gulyás Róbert
 */

require_once("sessionfunctions.php");
checkSessionAndDisplay();

/* if no id is given */
if(!isset($_GET['id']) || empty($_GET['id']))
    header("Location:adminpanel.php");

$sql = new mysqli("localhost", "root", "", "mindenapicpp");
$id = $sql->escape_string($_GET['id']);

/* see if the given question exists */
$result = $sql->query("SELECT id_question FROM questions WHERE id_question = $id");

if($result->num_rows == 0)
    header("Location: adminpanel.php?success=false");

/* delete the question */
$sql->query("DELETE FROM questions WHERE id_question = $id");
$sql->close();

header("Location:adminpanel.php?success=siker");
