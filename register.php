<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 11/2/2014
 * Time: 6:57 PM
 */
require_once('dbconfig.php');

if (isset($_POST['register'])) {
    if (isset($_POST['surname']))
        $surname = $_POST['surname'];
    if (isset($_POST['forename']))
        $forename = $_POST['forename'];
    if (isset($_POST['index_number']))
        $index_number = $_POST['index_number'];
    if (isset($_POST['pass']))
        $pass = $_POST['pass'];

    /* enchance the password */
    $salt = "vts";
    $pass = md5($salt . $pass . $salt);

    /* insert the user into the DB */
    $sql->query("SET NAMES UTF8");
    /* user insertion */
    $sql->query("INSERT INTO members (username, forename, surname, passwd)" .
        "VALUES ('$index_number', '$forename', '$surname', '$pass')");

    $sql->query("INSERT INTO users (id_member, index_number) VALUES ((SELECT id_member FROM members WHERE username = '$index_number'), '$index_number')");

    /* see if the insertion was successful */
    if ($sql->query("SELECT id_member FROM members WHERE username = '$index_number' AND passwd = '$pass';")->num_rows > 0)
        echo "Sikeres regisztráció!<br><br>";
    else
        echo "Sikertelen regisztráció!<br><br>";
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post" action="register.php">
    <label>Vezetéknév: <input type="text" name="surname"></label><br><br>
    <label>Keresztnév: <input type="text" name="forename"></label><br><br>
    <label>Indexszám: <input type="text" name="index_number"></label><br><br>
    <label>Jelszó: <input type="password" name="pass"></label><br><br>
    <input type="submit" name="register" value="Regisztráció">
</form>
</body>
</html>
