<?php
    require 'partials/__header.php';
    require 'partials/__dbconnect.php';
    $thread_id = $_GET['thread_id'];
?>

<div class="container" id="mainContainer">
    <div class="container">
        <!-- Thread Details Section-->
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

        
    </div>
</div>

<?php
    require 'partials/__footer.php'
?>