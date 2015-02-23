<?php
    require_once(__DIR__ . "/../model/config.php");
    
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    //Adds an input for the username and password on the login page
    
    $query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE BINARY username = '$username'");
    //Selects the salt and password from the useres table within my database where username is equal to the usename variable
    
    if($query->num_rows == 1 ){
        $row = $query->fetch_array();
        
        if($row["password"] === crypt($password, $row["salt"])) {
            $_SESSION["authenticated"] = true;
            header("Location: " . $path . "index.php");
        }
        else {
            echo "<p>Invalid username/password(1)</p>";
        }
    }
    else {
       echo "<p>Invalid username/password(2)</p>";
    }
    //Checks if something is stored in the query