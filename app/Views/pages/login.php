<p id="login_error"><?php
    if(isset($_SESSION['l_error'])) {
        echo $_SESSION['l_error'];
    } else {
        echo "Please enter your username and password.";
    } ?></p>
<div class="login_panel">
    <form onsubmit="return login_check()" method="POST" action="api.php?page=login">
        <input type="text" name="username" id="username" placeholder="Username"/>
        <input type="password" name="password" id="password" placeholder="Password"/>
        <button type="submit" name="signin" id="signin">SIGN IN</button>
    </form>
    <a href="index.php?page=register">Don't have an account? Click here to register...</a>
</div>
