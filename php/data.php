<?php

    while($row = mysqli_fetch_assoc($sql)) {
        
        // $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
        //             OR outgoing_msg_id = {$row['unique_id']} AND(outgoing_msg_id = {$outgoing_id}) OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
        } else {
            $result = 'No message available';
        }


        (strlen($result) > 28) ? $msg = substr($result, 0, 24).'...' : $msg = $result;
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = 'You: ': $you = '';

        ($row['status'] == 'Offline now') ? $offline = 'offline' : $offline = '';

        $output .= '

            <li>
                <a href="chat.php?user_id='.$row['unique_id'].'">
                    
                    <div class="flex" style="justify-content: space-between;
                    align-items: center;">

                        <div class="flex alignment" style="gap: 10px;">
                            <div>
                                <img src="./php/images/'.$row['img'].'" alt="">
                            </div>

                            <div>
                                <h1>' . $row['fname'] . ' ' . $row['lname'] . '</h1>
                                <p>'. $you . $msg.'</p>
                            </div>
                        </div>

                        <div class="status_dot '.$offline.'"></div>

                    </div>

                </a>
            </li>

        ';
    }
