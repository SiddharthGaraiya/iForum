<?php

session_start();
require "__dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $name = str_replace('<', '&lt', $name);
    $name = str_replace('>', '&gt', $name);
    $name = mysqli_real_escape_string($conn, $name);
    $name = trim($name);

    $username = $_POST['username'];
    $username = str_replace('<', '&lt', $username);
    $username = str_replace('>', '&gt', $username);
    $username = mysqli_real_escape_string($conn, $username);
    $username = trim($username);

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

    $cpassword = $_POST['cpassword'];
    $cpassword = str_replace('<', '&lt', $cpassword);
    $cpassword = str_replace('>', '&gt', $cpassword);
    $cpassword = mysqli_real_escape_string($conn, $cpassword);
    $cpassword = trim($cpassword);

    if ($password != $cpassword) {
        $_SESSION['alert'] = 'pnotsame';
        header('location: ../signup.php');
        exit;
    }

    $sql_email_check = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql_email_check);
    if($result)
    {
        if(mysqli_num_rows($result) != 0)
        {
            $_SESSION['alert'] = 'email';
            header('location: ../signup.php');
            exit;
        }
    }

    $sql_username_check = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql_username_check);
    if($result)
    {
        if(mysqli_num_rows($result) != 0)
        {
            $_SESSION['alert'] = 'username';
            header('location: ../signup.php');
            exit;
        }
    }
    

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql_add_user = "INSERT INTO `users` (`name`, `username`, `email`, `password`) VALUES ('$name', '$username', '$email', '$hashPassword')";
    $result = mysqli_query($conn, $sql_add_user);

    if ($result) {
        $_SESSION['alert'] = 'success';
        header('location: ../signup.php');
        exit;
    } else {
        $_SESSION['alert'] = 'somethingwentwrong';
        header('location: ../signup.php');
        exit;
    }

} else {
    $_SESSION['alert'] = 'somethingwentwrong';
    header('location: ../signup.php');
    exit;
}

?>