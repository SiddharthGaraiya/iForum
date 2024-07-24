<?php 

session_start();
require '__dbconnect.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iForum - Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       
    </style>
</head>

<body class="bg-light " style ="display:flex;flex-direction:column;justify-content:space-between; min-height: 100vh">
<nav class="navbar navbar-expand-lg bg-body-tertiary position-sticky top-0 z-3" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">iForum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="contact.php">Contact</a>
                </li>

            </ul>
            <form class="d-flex me-2" role="search" method="get" action="search.php">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <?php 
            
            if(isset($_SESSION['loggedIn']) AND $_SESSION['loggedIn'] == 'yes')
            {
                $name = $_SESSION['name'];
                echo '<div class="my-2 d-flex justify-content-start align-items-center">
                    <span class="text-light me-2">'.$name.'</span>
                    <a href="partials/__logout.php" class="btn btn-outline-danger text-light">Logout</a>
                    </div>';
            }
            else
            {
                echo '<div class="my-2">
                    <a href="login.php" class="btn btn-outline-primary text-light">Login</a>
                    <a href="signup.php" class="btn btn-outline-primary text-light">Signup</a>
                    </div>';
            }
            
            ?>

        </div>
    </div>
</nav>