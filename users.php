<?php
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header('Location: ./login.php');
    };
    
?>

<?php include_once './header.php' ?>

    <main>

        <section>

            <div class="users_container">

                <header class="flex">

                <?php
                    include_once './php/config.php';
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']} ");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    };
                ?>

                    <div class="flex alignment" style="gap: 10px;">
                        <div>
                            <img src="./php/images/<?= $row['img'] ?>" alt="">
                        </div>

                        <div>
                            <h1><?= $row['fname'] . ' ' . $row['lname'] ?></h1>
                            <p><?= $row['status'] ?></p>
                        </div>
                    </div>

                    <div>
                        <a class="logout-btn" href="./php/logout.php?logout_id=<?= $row['unique_id'] ?>">Logout</a>
                    </div>

                </header>

                <div class="search_input_div flex position-relative">
                    <span class="text">Select a user to start chat</span>
                    <input type="search" placeholder="Enter name to search" class="js_search_input position-absolute">
                    <button class="position-absolute"><i class="fas fa-search"></i></button>
                </div>

                <div class="user_lists_container">

                    <ul class="flex direction"></ul>

                </div>
                
            </div>

        </section>

    </main>

    <script src="./js/users.js"></script>

    </body>
</html>