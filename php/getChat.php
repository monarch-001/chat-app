<?php

session_start();

if (isset($_SESSION['unique_id'])) {
    include_once './config.php';
    
    $outgoingId = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incomingId = mysqli_real_escape_string($conn, $_POST['incoming_id']);    

    $output = '';

    $sql = "SELECT * FROM messages 
            LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
            WHERE (outgoing_msg_id = '$outgoingId' AND incoming_msg_id = '$incomingId')
            OR (outgoing_msg_id = '$incomingId' AND incoming_msg_id = '$outgoingId')  ORDER BY msg_id";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoingId) {
                $output .= '
                
                    <div class="chat_outgoing">
                        <p>'.$row['msg'].'</p>
                    </div>

                ';
            } else {

                $output .= '
                
                    <div class="chat_incoming flex">

                        <div>
                            <img src="../php/images/'.$row['img'].'" alt="Img">
                        </div>

                        <div class="details">
                            <p>'.$row['msg'].'</p>
                        </div>

                    </div>

                ';

            }
        }
    }
    
    echo $output;

} else {
    header('Location: ./login.php');
}