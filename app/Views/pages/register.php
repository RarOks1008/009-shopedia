<p id="register_error"><?php
    if(isset($_SESSION['r_error'])) {
        echo $_SESSION['r_error'];
    } else {
        echo "Please provide the information to create an account.";
    } ?></p>
<div class="register_panel">
    <form onsubmit="return register_check()" method="POST" action="api.php?page=register">
        <input type="text" name="username" id="username" placeholder="Username"/>
        <input type="password" name="password" id="password" placeholder="Password"/>
        <input type="email" name="email" id="email" placeholder="Email"/>
        <button type="submit" name="register" id="register">REGISTER</button>
    </form>
    <a href="index.php?page=login">Already have an account? Click here to sign in...</a>
</div>
