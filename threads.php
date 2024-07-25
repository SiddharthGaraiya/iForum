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
