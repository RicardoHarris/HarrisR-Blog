<?php
    require_once(__DIR__ . "/../model/config.php");
    
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    $salt = "$5$" . "rounds=9001$" . uniqid(mt_rand(), true) . "$";
    
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
    
    if($query) {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }
    //Sets values of "email", "username", "password", and "salt"
    