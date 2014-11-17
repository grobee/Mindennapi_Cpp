<?php
/**
 * @author Birkás Tamás
 * @author Gulyás Róbert
 * Date: 10/26/2014
 * Time: 8:42 PM

 */

/* This login page returns the login request to itself */

/* Check does the user already logged in */

require_once("dbconfig.php");



session_start();
if (isset($_SESSION["session_use"]))
    if ($_SESSION["session_use"] == 1)
        header("Location:adminpanel.php");

/* This part gets the username and password from its form */
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['pass'])) {
    $pass = $_POST['pass'];
}

/* Check does the username password combo exist, and átírányít to the adminpanel page */
if (isset($username) && isset($pass)) {
    $salt = "vts";

    $username = $mysqli->escape_string($username);
    $pass = $mysqli->escape_string($pass);
    $result = $mysqli->query("SELECT passwd FROM members m INNER JOIN administrators a ON m.id_member = a.id_member WHERE m.username = '$username'");
    /* see if there is a match */
    if($result->num_rows > 0) {
        $name = $result->fetch_assoc();
        if (md5($salt . $pass . $salt) == $name['passwd']) {

            session_start();
            $_SESSION['username'] = $username;

            $_SESSION['pass'] = md5($salt . $pass . $salt);
            $_SESSION['session_use'] = 1;

            header("Location:adminpanel.php");

        } else {
            echo "Hibás felhasználónév vagy jelszó\n\n\n";
            echo "<br><br>";
        }
    }
    else {
        echo "Hibás felhasználónév vagy jelszó\n\n\n";
        echo "<br><br>";
    }
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post" action="login.php">
    <label>Felhasználónév: <input type="text" name="username"></label><br><br>
    <label>Jelszó: <input type="password" name="pass"></label><br><br>
    <input type="submit" name="login" value="Bejelentkezés">
</form>
</body>
</html>
