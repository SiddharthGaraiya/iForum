<?php
 
require('__dbconnect.php'); 

if (isset($_POST['username']) && !empty($_POST['username'])) { 
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $query    = "SELECT count(*) as usercount FROM `users` WHERE username = '".$username."'";
    $result   = mysqli_query($conn, $query); 
    $row      = mysqli_fetch_array($result);

    if ($row['usercount'] == 0) {
        $response = '<span class="text-success">Username <b>'.$username.'</b> is available!</span>';
    } else {
        $response = '<span class="text-danger">Username <b>'.$username.'</b> is already taken!</span>';
    }

    echo $response;
    die;
}

?>