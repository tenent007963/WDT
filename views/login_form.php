<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<!-- css styling -->
<link rel='stylesheet' href='./css/form.css' media='all'>

<!-- login form box -->
<div class="container">
    <h1>Login</h1>
    <form method="post" action="login.php" name="loginform">
        <label for="login_input_username">Username</label>
        <input id="login_input_username" class="login_input" type="text" name="user_name" class="field" placeholder="johnwick" required />

        <label for="login_input_password">Password</label>
        <input id="login_input_password" class="login_input" type="password" name="user_password" class="field" placeholder="7million" required />

        <input type="submit"  name="login" value="Log in" class="btn" />
    </form>

    <div class="reg">
        <a href="register.php">Register new account</a>
    </div>	
</div>