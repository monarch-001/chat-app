<?php

session_start();

if (isset($_SESSION['unique_id'])) {
    include_once './config.php';
    
    $outgoingId = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incomingId = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    

    if(!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                            VALUES ('$incomingId', '$outgoingId', '$message')") or die();
    }

} else {
    header('Location: ./login.php');
}

