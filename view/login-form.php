<?php

require_once(__DIR__ . "/../model/config.php")
?>

<h1>Log In!</h1>

<form method="post" action="<?php echo $path . "controller/login-user.php"?>">
    
    <div>
        <label for="username">Username: </label>
        <input text="text" name="username" />
    </div>
    
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password"/>
    </div>
    
    <div>
        <button class="btn btn-success btn-lg" type="submit">Submit</button>
    </div>
    
</form>

