<?php

session_start();
include_once './config.php';
$output ='';

if(isset($_SESSION['unique_id'])) {

    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    
    if (mysqli_num_rows($sql) == 1) {
        $output = 'No users are available';
    } else if (mysqli_num_rows($sql) > 0) {
        include_once './data.php';
    };

}

echo $output;