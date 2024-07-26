<?php

session_start();
require '__dbconnect.php';
if (!(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')) {
    header('location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $thread_id = $_POST['thread_id'];

    $comment = $_POST['comment'];
    $comment = str_replace('<', '&lt', $comment);
    $comment = str_replace('>', '&gt', $comment);
    $comment = mysqli_real_escape_string($conn, $comment);
    $comment = trim($comment);

    $userid = $_SESSION['userid'];

    $sql_create_comment = "INSERT INTO `comments` (`comment_content`, `user_id`, `thread_id`) VALUES ('$comment' , '$userid', '$thread_id' )";
    $result = mysqli_query($conn, $sql_create_comment);

    if ($result) {
        $_SESSION['alert'] = 'success';
        header('location: ../thread_comments.php?thread_id=' . $thread_id);
        exit;
    } else {
        $_SESSION['alert'] = 'failed';
        header('location: ../thread_comments.php?thread_id=' . $thread_id);
        exit;
    }

} else {
    $_SESSION['alert'] = 'wrong';
    header('location: ../thread_comments.php?thread_id=' . $thread_id);
    exit;
}

?>