<?php
Session::init();
if(Session::checkError()){
    echo '<p style="background-color:red;">Wrong username or password</p>';
}
unset($_SESSION["loginError"]);
?>

<h1>Login</h1>
<form method='post'>
    <div class="form-group">
        E-mail Address
        <input type="text" class="form-control" id="email" placeholder="Enter Your e-mail address" name="email">
        Password
        <input type="text" class="form-control" id="password" placeholder="Enter Your password" name="password">
    </div>
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
</form>