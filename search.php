<?php

    require "partials/__header.php";
    require "partials/__dbconnect.php";

    $search = $_GET['search'];
    $search1 = mysqli_real_escape_string($conn, $search);
?>

<div class="container" id="mainContainer">
    <div class="container shadow my-5 rounded-4 p-5">
        <?php
            $sql_search = "Select * from threads where match(`thread_title`, `thread_description`) against ('$search1')";
            $result = mysqli_query($conn, $sql_search);

            $search = str_replace('<', '&lt', $search);
            $search = str_replace('>', '&gt', $search);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<h1 class="mb-5">Results for \'<em class="fw-normal">' . $search . '</em>\' -</h1>';
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

                                    echo '<div class="d-flex align-items-center my-4">
                                        <div class="flex-shrink-0" style="width: 7vw">
                                        <img src="img/forum_user_default.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                        <p class="mt-2 fs-5 fw-semibold m-0"><a href="thread_comments.php?thread_id=' . $row['thread_id'] . '" class="text-decoration-none">' . $row['thread_title'] . '</a> - ' . $thread_username . ' at ' . $timestamp . '
                                        </p>
                                        <p class="fs-5">' . $thread_description . '</p>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                    }
                } else {
                    echo '<h1 class="mb-5">No results found for \'<em class="fw-normal">' . $search . '</em>\'.</h1>';
                }
            }

            ?>
    </div>
</div>

<?php
    require "partials/__footer.php";
?>