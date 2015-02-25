<?php
    require_once(__DIR__ . "/../model/config.php");
    require_once(__DIR__ . "/../controller/login-verify.php");
    
    if(!authenticateUser()){
        header("Location: " . $path . "index.php");
        die();
    }
?>


<h1>Create Blog Post</h1>

<form method="post" action="<?php echo $path . "controller/create-post.php"; ?>">
    <div>
        <label for="title">Title: </label>
        <input type="text" name="title" />
    </div>
    <div>
        <label for="post">Post: </label>
        <textarea name="post"></textarea>
    </div>
    <div>
        <button class="btn btn-success btn-lg" type="submit">Submit</button>
    </div>
</form>
