<?php
session_start();
require '__dbconnect.php';
if (!(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')) {
    header('location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $category_id = $_POST['category_id'];

    $title = $_POST['title'];
    $title = str_replace('<', '&lt', $title);
    $title = str_replace('>', '&gt', $title);
    $title = mysqli_real_escape_string($conn, $title);
    $title = trim($title);

    $description = $_POST['description'];
    $description = str_replace('<', '&lt', $description);
    $description = str_replace('>', '&gt', $description);
    $description = mysqli_real_escape_string($conn, $description);
    $description = trim($description);

    $userid = $_SESSION['userid'];

    $sql_create_thread = "INSERT INTO `threads` (`thread_title`, `thread_description`, `user_id`, `category_id`) VALUES ('$title', '$description', '$userid', '$category_id' )";
    $result = mysqli_query($conn, $sql_create_thread);

    if ($result) {
        $_SESSION['alert'] = 'success';
        header('location: ../threads.php?category_id=' . $category_id);
        exit;
    } else {
        $_SESSION['alert'] = 'failed';
        header('location: ../threads.php?category_id=' . $category_id);
        exit;
    }

} else {
    $_SESSION['alert'] = 'wrong';
    header('location: ../threads.php?category_id=' . $category_id);
    exit;
}
?>