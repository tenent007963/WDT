<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
<link rel='stylesheet' href='./css/form.css' media='all'>

<!-- register form -->
<div class="container">
    <h1>Register as customer</h1>
    <form method="post" action="register.php" name="registerform">
        <!-- the user name input field uses a HTML5 pattern check -->
        <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
        <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" class="field" placeholder="vin1" required />

        <!-- the email input field uses a HTML5 email type check -->
        <label for="login_input_email">User's email</label>
        <input id="login_input_email" class="login_input" type="email" name="user_email" class="field" placeholder="vin_diesel@fast.x" required />

        <label for="login_input_password_new">Password (min. 6 characters)</label>
        <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" class="field" placeholder="family10" required  />

        <label for="login_input_password_repeat">Repeat password</label>
        <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" class="field" placeholder="family10" required  />
        <input type="submit"  name="register" value="Register" />
    </form>

    <!-- backlink -->
    <div class="reg">
        <a href="/login.php">Back to Login Page</a>
    </div>	
</div>

    




