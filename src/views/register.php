<?php
$title = 'Register';
$css = 'register.css';
include 'partials/header.php';
?>

<body>
    <div class="container">
        <form method="post" class="registerform">
            <h1>Create a new account</h1>
            <div>
                <label>First Name</label>
                <input type="text" name="fname" class="inputField" id="fn" required>
            </div>
            <div>
                <label>Last Name</label>
                <input type="text" name="lname" class="inputField" id="ln" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" class="inputField" id="email" required>
            </div>
            <div class="input-box">
                <label for="pass">Password</label>
                <span class="input-eye">
                    <input type="password" name="pass" class="inputField" id="pass">
                    <ion-icon name="eye" class="inputField" onclick="showPassword()" required></ion-icon>

                </span>
            </div>
            <div class="input-box">
                <label for="cpass">Confirm Password</label>
                <span class="input-eye">
                    <input type="password" name="pass" class="inputField" id="cpass">
                    <ion-icon name="eye" onclick="showConfirmPassword()" required></ion-icon>
                </span>
                <div id="passwordError" style="color: red;"></div>
            </div>

            <div>
                Already registered? <a href="/login" class="login-link">Login</a> here
            </div>
            <input type="submit" value="Register" onclick="comparePassword()">
        </form>
    </div>
    <script src="js/register.js"></script>
</body>

</html>