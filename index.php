
    <?php
        require_once(__DIR__ . "/controller/login-verify.php");
        require_once(__DIR__ . "/view/header.php");
        if(authenticateUser()){
        require_once(__DIR__ . "/view/navagation.php");
        require_once(__DIR__ . "/controller/create-db.php");
        }
        //Makes the navigation and create-db pages inaccessable to anyone not logged in
        require_once(__DIR__ . "/controller/read-posts.php");
        require_once(__DIR__ . "/view/footer.php");
    ?>