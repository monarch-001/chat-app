<?php
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header('location: ./login.php');
    };
    
?>

<?php include_once './header.php' ?>
        
    <main>

        <section>

            <div class="chat_area_container">

                <header>

                <?php
                    include_once './php/config.php';
                    $user_id = mysqli_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id} ");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    };
                ?>

                    <div class="flex" style="gap: 10px; align-items: center;">

                        <a href="users.php"><i class="fa-solid fa-arrow-left"></i></a>

                        <div class="grid">
                            <img src="./php/images/<?= $row['img'] ?>" alt="User profile">
                        </div>

                        <div>
                            <h1><?= $row['fname'] . ' ' . $row['lname'] ?></h1>
                            <p><?= $row['status'] ?></p>
                        </div>
                    </div>

                </header>
                
                <div class="chat_area js_chat_area"></div>

                <form action="#" method="post" class="typing_area position-relative js_chat_app_form">
                    <input type="hidden" name="outgoing_id" value="<?= $_SESSION['unique_id'] ?>">
                    <input type="hidden" name="incoming_id" value="<?= $user_id ?>">
                    <input type="text" name="message" placeholder="Type a message here..." class="messaging_input">
                    <button class="position-absolute">
                        <i class="bx bxl-telegram"></i>
                    </button>
                </form>

            </div>

        </section>

    </main>

    <script src="./js/chat.js"></script>

    </body>
</html>