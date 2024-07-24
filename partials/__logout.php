<?php

session_start();
if (!(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')) {
    header('location: ../index.php');
    exit;
}
session_unset();
session_destroy();

header('location: ../index.php');
exit;

?>