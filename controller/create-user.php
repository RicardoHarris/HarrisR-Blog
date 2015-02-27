<?php
    require_once(__DIR__ . "/../model/config.php");
    //Requires the config
    
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    //Cleanses the email, username, and password to prevent hacking
    
    $salt = "$5$" . "rounds=9001$" . uniqid(mt_rand(), true) . "$";
    //Sets  the rounds of salts to 9001
   
    $hashedPassword = crypt($password, $salt);
    //Encrypts user password
    
   $query = $_SESSION["connection"]->query("SELECT username FROM users WHERE BINARY username = '$username'");
   //Selects username from users table
    
    if($query->num_rows == 0){
        echo "Successfully created user '$username'!";
         $query2 = $_SESSION["connection"]->query("INSERT INTO users SET "
            . "email = '$email',"
            . "username = '$username',"
            . "password = '$hashedPassword',"
            . "salt = '$salt'");
         //Inserts user data
    }
    else {
        echo "Username already exists!";
    }
    //Tellsabcdefghijklmnopqstuvwxz hi ricardo
    
    if($query) {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }
    //Sets values of "email", "username", "password", and "salt"
    