<?php

session_start();
require "__dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $name = htmlspecialchars($name);
    $name = mysqli_real_escape_string($conn, $name);

    $email = htmlspecialchars($email);
    $email = mysqli_real_escape_string($conn, $email);

    $message = htmlspecialchars($message);
    $message = mysqli_real_escape_string($conn, $message);

    $sql_contact = "INSERT INTO `contact` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message')";
    $result = mysqli_query($conn, $sql_contact);

    if ($result) {
        $_SESSION['alert'] = 'success';
        header('location: ../contact.php');
        exit;

    } else {
        $_SESSION['alert'] = 'failed';
        header('location: ../contact.php');
        exit;
    }
} else {
    $_SESSION['alert'] = 'wrong';
    header('location: ../contact.php');
    exit;
}

?>