<?php

session_start();

include_once './config.php';

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT email FROM users WHERE email = '{$email}'";
        $sql = mysqli_query($conn, $query);

        if(mysqli_num_rows($sql) > 0) {
            echo "$email - This email already exists!";
        } else {
            if (isset($_FILES['image'])) {
                $imgName = $_FILES['image']['name'];
                $imgType = $_FILES['image']['type'];
                $tmpName = $_FILES['image']['tmp_name'];

                $imgExplode = explode('.', $imgName);
                $imgExt = end($imgExplode);
                
                $extensions = ['png', 'jpeg', 'jpg'];

                if (in_array($imgExt, $extensions) === true ){
                    $time = time();
                    $newImgName = $time.$imgName;

                    if (move_uploaded_file($tmpName, "images/".$newImgName)) {
                        $status = 'Active now';
                        $randomId = rand(time(), 100000000);

                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ('$randomId', '$fname', '$lname', '$email', '$password', '$newImgName', '$status')");

                        if ($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo 'success';
                            }
                        } else {
                            echo  'Something went wrong';
                        }            

                    }

                } else {
                    echo 'Please select an Image file - jpeg, jpg, png!';
                }

            } else {
                echo 'Please select an Image file!';
            }
        }
    } else {
        echo "$email - This is not a valid email!";
    }

} else {
    echo 'All input field are required!';
}