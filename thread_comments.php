<?php
    require 'partials/__header.php';
    require 'partials/__dbconnect.php';
    $thread_id = $_GET['thread_id'];
   
    // alert for sucess
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'success') {
        echo '<div class="container"><div class="container"><div class="alert alert-success alert-dismissible fade show container mx-auto mt-5 rounded-3" role="alert">
                <strong>Success!</strong> Comment was added successfully.
                <a href="thread_comments.php?thread_id=' . $thread_id . '"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div></div></div>';

        unset($_SESSION['alert']);
    }
    // alert for failed
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'failed') {
        echo '<div class="container"><div class="container"><div class="alert alert-danger alert-dismissible fade show container mx-auto mt-5 rounded-3" role="alert">
                <strong>Error!</strong> Comment was not added, please try again later.
                <a href="thread_comments.php?thread_id=' . $thread_id . '"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div></div></div>';

        unset($_SESSION['alert']);
    }
    // alert for something went wrong
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'wrong') {
        echo '<div class="container"><div class="container"><div class="alert alert-danger alert-dismissible fade show container mx-auto mt-5 rounded-3" role="alert">
        <strong>Error!</strong> Something went wrong, please try again later.
        <a href="thread_comments.php?thread_id=' . $thread_id . '"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
        </div></div></div>';

        unset($_SESSION['alert']);
    }
     
?>

<div class="container" id="mainContainer">
    <div class="container">
        <!-- Thread Details  -->
        <?php
            $sql_thread_detail = "SELECT * FROM `threads` WHERE `thread_id` = '$thread_id'";
            $result = mysqli_query($conn, $sql_thread_detail);

            if (mysqli_num_rows($result) == 0) {
                header('location: not_found.php');
                exit;
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $thread_user_id = $row['user_id'];
                $sql_get_user = "SELECT * FROM `users` WHERE `user_id` = '$thread_user_id'";
                $result_user = mysqli_query($conn, $sql_get_user);
                if ($result_user) {
                    if (mysqli_num_rows($result_user)) {
                        while ($row_user = mysqli_fetch_assoc($result_user)) {
                            $thread_username = $row_user['username'];
                            $timestamp = $row['timestamp'];
                            $timestamp = date("h:i a | d-m-Y", strtotime($timestamp));

                            echo '<div class="p-4 my-5 bg-body-tertiary rounded-4 border shadow">
                        <div class="container-fluid my-4">
                            <h1 class="display-5">' . $row['thread_title'] . '</h1>
                            <p class="col-md-8 fs-4 my-4">- ' . $row['thread_description'] . '</p>
                            <p class="text-end fw-semibold fs-5">- ' . $thread_username . '</p>
                        </div>

                    </div>';

                        }
                    }
                }

            }

        ?>

        <!-- Write A Comment Section -->
        <div class="p-4 my-5 bg-body-tertiary rounded-4 border shadow">
            <div class="container-fluid my-4">

                <h2 class="display-6 fw-semibold">Write a comment - </h2>
                <form action="partials/__handleComment.php" method="post" class="my-4">
                    <?php

                        echo '<input type="hidden" name="thread_id" id="thread_id" value="' . $thread_id . '">';

                        if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes') {
                            echo ' <div class="mb-3">
                            <textarea class="form-control" id="comment" name="comment" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>';

                        } else {
                            echo '<p class="fs-5">Please Login to Write a Comment.</p>';
                        }
                        ?>
                </form>
            </div>
        </div>

        <!-- Browse Comments Section -->
        <div class="p-4 my-5 bg-body-tertiary rounded-4 border shadow">
            <div class="container-fluid my-4">
                <h2 class="display-6 fw-semibold pb-3">Browse Comments -</h2>

                <?php
                    $sql_get_threads = "SELECT * FROM `comments` WHERE `thread_id` = '$thread_id'";
                    $result = mysqli_query($conn, $sql_get_threads);

                    if ($result) {
                        if (mysqli_num_rows($result)) {

                            while ($row = mysqli_fetch_assoc($result)) {

                                $comment_content = $row['comment_content'];
                                $comment_user_id = $row['user_id'];
                                $sql_get_user = "SELECT * FROM `users` WHERE `user_id` = '$comment_user_id'";
                                $result_user = mysqli_query($conn, $sql_get_user);
                                if ($result_user) {
                                    if (mysqli_num_rows($result_user)) {
                                        while ($row_user = mysqli_fetch_assoc($result_user)) {
                                            $thread_username = $row_user['username'];
                                            $timestamp_comments = $row['timestamp'];
                                            $timestamp_comments = date("h:i a | d-m-Y", strtotime($timestamp_comments));

                                            echo '<div class="d-flex align-items-center my-3">
                                            <div class="flex-shrink-0" style="width: 7vw">
                                            <img src="img/forum_user_default.png" alt="" class="img-fluid">
                                            </div>
                                            <div class="flex-grow-1 ms-3"><p class="mt-2 fs-5 fw-semibold m-0">' . $thread_username . ' at ' . $timestamp_comments . '</p>
                                            <p class="fs-5">' . $comment_content . '</p>
                                            </div>
                                            </div>
                                            <p class="text-center m-0 opacity-50">────</p>';

                                        }
                                    }
                                }
                            }
                        } else {
                            echo '<p class="fs-4 my-4"> - No Comments Found, Be the first one to comment on this thread.</p>';
                        }
                    }

                    ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.title="iForum | Thread"
</script>
<?php
    require 'partials/__footer.php'
?>