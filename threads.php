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
            $category_name = $row['category_name'];
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

        <div class="p-4 my-5 bg-body-tertiary rounded-4 border shadow">
            <div class="container-fluid my-4">

                <h2 class="display-6 fw-semibold">Start a Thread - </h2>
                <form action="partials/__handleThread.php" method="post" class="my-4">

                    <?php
                    echo '<input type="hidden" name="category_id" id="category_id" value="' . $category_id . '">';

                    if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')
                    {

                        echo '<div class="mb-3">
                        <label for="title" class="form-label fs-5">Title -</label>
                        <input type="text" class="form-control" id="title" name="title" required maxlength="255">
                        </div>
                        <div class="mb-3">
                        <label for="description" class="form-label fs-5">Description -</label>
                        <textarea class="form-control" id="description" name="description" rows="5"
                        required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>';
                        }
                        else
                        {
                            echo '<p class="fs-5">Please Login to Start a Thread.</p>';
                        }

                        ?>
                </form>
            </div>
        </div>

        <div class="p-4 my-5 bg-body-tertiary rounded-4 border shadow">
            <div class="container-fluid my-4">

                <h2 class="display-6 fw-semibold pb-3">Browse Threads -</h2>
                <?php

                $sql_get_threads = "SELECT * FROM `threads` WHERE `category_id` = '$category_id'";
                $result = mysqli_query($conn, $sql_get_threads);

                if ($result) {
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $thread_description = $row['thread_description'];
                            if (strlen($thread_description) > 100) {
                                $thread_description = substr($thread_description, 0, 100);
                                $thread_description .= '...';
                            }
                            $thread_user_id = $row['user_id'];
                            $sql_get_user = "SELECT * FROM `users` WHERE `user_id` = '$thread_user_id'";
                            $result_user = mysqli_query($conn, $sql_get_user);
                            if ($result_user) {
                                if (mysqli_num_rows($result_user)) {
                                    while ($row_user = mysqli_fetch_assoc($result_user)) {
                                        $thread_username = $row_user['username'];
                                        $timestamp = $row['timestamp'];
                                        $timestamp = date("h:i a | d-m-Y", strtotime($timestamp));

                                        echo '<div class="d-flex align-items-center my-3">
                                        <div class="flex-shrink-0" style="width: 7vw">
                                        <img src="img/forum_user_default.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                        <p class="my-2 fs-5 fw-semibold m-0"><a href="thread_comments.php?thread_id=' . $row['thread_id'] . '" class="text-decoration-none">' . $row['thread_title'] . '</a> - ' . $thread_username . ' at ' . $timestamp . '
                                        </p>
                                        <p class="fs-5">' . $thread_description . '</p>
                                        </div>
                                        </div>
                                        <p class="text-center m-0 opacity-50">────</p>';
                                    }
                                }
                            }

                        }
                    } else {
                        echo '<p class="fs-4 my-4"> - No Thread Found, Be the first one to start a thread for this category.</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.title="iForum | <?=$category_name?>"
</script>
<?php
    require 'partials/__footer.php'
?>