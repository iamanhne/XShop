<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73a0f52767.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/Css/user/login.css">
    <title>XShop</title>
</head>
<body>
    <!-- <h2 style="color:#fff">Sign in/up Form</h2> -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="./logic/sign_up_logic.php" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-telegram"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="fullname" placeholder="Full Name" />
                <input type="text" name="username" placeholder="User Name (0-9 characters)" />
                <input type="email" name="email" placeholder="Email" />
                <div class="show-hide">
                    <input type="password" placeholder="Password" name="password" id="password-up"/>
                    <i class="fa-solid fa-eye-slash check-show-signup"></i>
                    <i class="fa-solid fa-eye check-hide-signup" style="display: none;"></i>
                </div>
                <input type="text" placeholder="Address" name="address" />
                <input type="text" placeholder="Phone" name="phone" />

                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="./logic/sign_in_logic.php" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-telegram"></i></i></a>
                </div>
                <span>or use your account</span>
                <input type="text" name="username" placeholder="User Name" />
                <div class="show-hide">
                    <input type="password" name="password" placeholder="Password" id="password-in"/>
                    <i class="fa-solid fa-eye-slash check-show-signin"></i>
                    <i class="fa-solid fa-eye check-hide-signin" style="display: none;"></i>
                </div>
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/Js/user/login.js"></script>
</body>
</html>