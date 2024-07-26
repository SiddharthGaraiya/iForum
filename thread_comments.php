<?php
    require 'partials/__header.php';
    require 'partials/__dbconnect.php';
    $thread_id = $_GET['thread_id'];
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

       
    </div>
</div>

<?php
    require 'partials/__footer.php'
?>