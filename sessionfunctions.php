<?php
/**
* Created by PhpStorm.
 * @author Birkás Tamás
* Date: 10/30/2014
* Time: 9:49 PM
*/


/* Needed for logout */
if(isset($_GET['logout'])){
    logoutFromSession();
}

/* Check does the user logged in. If not then return the user to the login page*/
function checkSessionAndDisplay()
{
    session_start();
    if (isset($_SESSION["session_use"])) {
        if ($_SESSION["session_use"] == 1)
            echo "<br><br>Bejelentkezve: " . $_SESSION["username"] . " <a href='sessionfunctions.php?logout'>(Kijelentkezés)</a>";
        else
            header("location:login.php");
    } else  header("location:login.php");

}


/* The logout function which called when the GET paramenter is 'logout' */
function logoutFromSession()
{
    session_start();
    session_destroy();

    unset($_SESSION['session_use']);
    unset($_SESSION['username']);
    unset($_SESSION['pass']);

    header("Location:login.php");
}
