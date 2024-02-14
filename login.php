<?php include_once'./header.php' ?>

    <main>
            
        <section>
            
            <div class="main_container">

                <header>
                    Realtime Chat App
                </header>

                <form action="#" class="form flex direction js_login_form">

                    <div class="error_message_div none js_error_text"></div>

                    <div class="flex input_div direction">
                        <label>Email Address</label>
                        <input type="email" placeholder="Enter your Email" name="email">
                    </div>

                    <div class="flex input_div direction position-relative">
                        <label>Password</label>
                        <input type="password" autocomplete="off" placeholder="Enter your password" class="js_input_password_field" name="password">
                        <i class="fas fa-eye position-absolute"></i>
                    </div>

                    <div class="signup_btn direction js_signup_btn">
                        <input type="submit" value="Continue to Chat">
                        <p>Don't have an account? <a href="index.php">Signup here</a></p>
                    </div>

                </form>

            </div>

        </section>

    </main>

    <script src="./js/showPassword.js"></script>
    <script src="./js/login.js"></script>

    </body>
</html>