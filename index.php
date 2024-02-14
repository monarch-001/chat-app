<?php include_once './header.php' ?>
        
    <main>
        
        <section>
            
            <div class="main_container">

                <header>
                    Realtime Chat App
                </header>

                <form action="" class="form flex direction js_signup_form" enctype="multipart/form-data" autocomplete="off">

                    <div class="error_message_div none js_error_text"></div>

                    <div class="grid username_container">
                        <div class="flex input_div direction">
                            <label>First Name</label>
                            <input type="text" placeholder="First Name" name="fname" required>
                        </div>
                        <div class="flex input_div direction">
                            <label>Last Name</label>
                            <input type="text" placeholder="Last Name" name="lname" required>
                        </div>
                    </div>

                    <div class="flex input_div direction">
                        <label>Email Address</label>
                        <input type="email" placeholder="Enter your Email" name="email" required>
                    </div>

                    <div class="flex input_div direction position-relative">
                        <label>Password</label>
                        <input type="password" placeholder="Enter new password" class="js_input_password_field" autocomplete="off" name="password" required>
                        <i class="fas fa-eye position-absolute"></i>
                    </div>

                    <div class="flex direction" style="gap: 5px;">
                        <label>Select Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="signup_btn direction js_signup_btn">
                        <input type="submit" value="Continue to Chat">
                        <p>Already signed up? <a href="login.php">Login here</a></p>
                    </div>

                </form>

            </div>

        </section>

    </main>

    <script src="./js/showPassword.js"></script>
    <script src="./js/signup.js"></script>

    </body>
</html>