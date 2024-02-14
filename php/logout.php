<?php

session_start();

if (isset($_SESSION['unique_id'])) {
    include_once './config.php';
    $logoutId = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logoutId)) {
        $status = 'Offline now';
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logoutId} ");
        if ($sql) {
            session_unset();
            session_destroy();
            header('Location: ../login.php');
        }
    } else {
        header('Location: ../users.php');    
    }
    
} else {
    header('Location: ../login.php');    
}