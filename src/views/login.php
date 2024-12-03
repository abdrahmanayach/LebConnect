<?php
$title = 'Login';
$css = 'login.css';

include 'partials/header.php';
?>

<body>
    <div class="container">
        <div class="form-container">
            <h1></h1>
            <form method="post">
                <h1>Log in</h1>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" class="inputField" id="email" value="<?php if (isset($email)) echo $email ?>" required>
                </div>
                <div class="input-box">
                    <label for="pass">Password</label>
                    <span class="input-eye">
                        <input type="password" name="pass" class="inputField" id="pass">
                        <ion-icon name="eye" class="inputField" id="showPassIcon" onclick="showPassword()" required></ion-icon>

                    </span>
                </div>
                <div>
                    <a href="/register" class="register-link">Create a new account</a>
                </div>
                <input type="submit" value="Login" onclick="postLogin()">
            </form>
        </div>
    </div>
    <script src="js/register.js"></script>
</body>
<html>