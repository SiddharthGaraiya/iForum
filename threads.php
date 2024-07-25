<?php
    include 'partials/__header.php';
    require 'partials/__dbconnect.php';
    $category_id = $_GET['category_id'];

    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'success') {
        echo '<div class="container"><div class="container"><div class="alert alert-success alert-dismissible fade show container mx-auto mt-5 rounded-3" role="alert">
        <strong>Success!</strong> Thread was added successfully.
        <a href="threads.php?category_id=' . $category_id . '"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
        </div></div></div>';
        unset($_SESSION['alert']);
    }
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'failed') {
        echo '<div class="container"><div class="container"><div class="alert alert-danger alert-dismissible fade show container mx-auto mt-5 rounded-3" role="alert">
                <strong>Error!</strong> Thread was not added, please try again later.
                <a href="threads.php?category_id=' . $category_id . '"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div></div></div>';

        unset($_SESSION['alert']);
    }
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'wrong') {
        echo '<div class="container"><div class="container"><div class="alert alert-danger alert-dismissible fade show container mx-auto mt-5 rounded-3" role="alert">
                <strong>Error!</strong> Something went wrong, please try again later.
                <a href="threads.php?category_id=' . $category_id . '"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div></div></div>';

        unset($_SESSION['alert']);
    }
?>

<div class="container" id="mainContainer">
    <div class="container">

        <?php
        $sql_category_detail = "SELECT * FROM `categories` WHERE `category_id` = '$category_id'";
        $result = mysqli_query($conn, $sql_category_detail);

        if (mysqli_num_rows($result) == 0) {
            header('location: not_found.php');
            exit;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="p-4 my-5 bg-body-tertiary rounded-4 border shadow">
                    <div class="container-fluid my-4">
                        <h1 class="display-5 fw-semibold">Hello, Welcome to ' . $row['category_name'] . ' Forum!</h1>
                        <p class="fs-4 my-4">- ' . $row['category_description'] . '</p>
                        <hr>
                        <p class="fs-5 my-4">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums. Do not post “offensive” threads, comments or links. Remain respectful of other members at all times.</p>
                    </div>

                </div>';
        }
        ?>
