<?php

/* Needed for logout */
if (isset($_GET['logout'])) {
    logoutFromSession();
}

/* Check does the user logged in. If not then return the user to the login page*/
function checkSessionAndDisplay()
{
    session_start();
    if (isset($_SESSION["session_use"])) {
        if ($_SESSION["session_use"] == 1)
            echo "
            <div id='div_logininfo'>Bejelentkezve, mint <i>" . $_SESSION["username"] . "
                </i><br />
                <div>
                    <img alt='avatar_picture' src='images/avatar_unknown.png' />
                    <a href='sessionfunctions.php?logout'>Kijelentkezés</a>
               </div>
            </div>";
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
