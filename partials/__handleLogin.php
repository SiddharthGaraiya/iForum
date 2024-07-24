<?php

session_start();
require '__dbconnect.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){

    $email = $_POST['email'];
    $email = str_replace('<', '&lt', $email);
    $email = str_replace('>', '&gt', $email);
    $email = mysqli_real_escape_string($conn, $email);
    $email = trim($email);

    $password = $_POST['password'];
    $password = str_replace('<', '&lt', $password);
    $password = str_replace('>', '&gt', $password);
    $password = mysqli_real_escape_string($conn, $password);
    $password = trim($password);

    $sql_check_user = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql_check_user);

    if ($result) {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $userid = $row['user_id'];
                    $name = $row['name'];
                    $_SESSION['userid'] = $userid;
                    $_SESSION['name'] = $name;
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedIn'] = 'yes';
                    header('location: ../index.php');
                    exit;
                } else
                    $_SESSION['alert'] = 'invalidPassword';
                    header('location: ../login.php');
                exit;
            }
        } else {
            $_SESSION['alert'] = 'emailnotfound';
            header('location: ../login.php');
            exit;
        }
    }
    $_SESSION['alert'] = 'somethingwentwrong';
    header('location: ../login.php');
    exit;

}

$_SESSION['alert'] = 'somethingwentwrong';
header('location: ../login.php');
exit;

?>
