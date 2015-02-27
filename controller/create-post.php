<?php

    require_once(__DIR__ . "/../model/config.php");
    require_once(__DIR__ . "/../controller/login-verify.php");
    //Requires the login-verify and config pages
    
    if(!authenticateUser()){
        header("Location: " . $path . "index.php");
        die();
    }
    //Kills program if user is not logged in

$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
//Filters the title and the post for no code modifycations/hackings by users

$query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post'");
//Puts the title of the post into the xampp post table

if ($query) {
    echo "<p>Successfully inserted post: $title</p>";
} else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}
//Notifies the user the post was successfully put into the posts page

$query = $_SESSION["connection"]->error . "</p>";
//States that there is an error if the connection is invalid
