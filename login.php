<?php
require "partials/__header.php";

if (isset($_SESSION['loggedIn'])){
    header('location:index.php');
    exit;
}

if (isset($_SESSION['alert']) && $_SESSION['alert']=='invalidPassword'){
    echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> The passwords you entered is not correct.
                            <a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
    unset($_SESSION['alert']);
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'emailnotfound') {
        echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> The Email you entered is not registered with us, Sign up.
                            <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
        unset($_SESSION['alert']);
    }
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'somethingwentwrong') {
        echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error |</strong> Something went wrong, Please try again later.
                            <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
        unset($_SESSION['alert']);
    }
}