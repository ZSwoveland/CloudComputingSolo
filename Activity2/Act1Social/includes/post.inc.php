<?php 


if(isset($_POST["submit"])){
    
    $title = $_POST["title"];
    $caption = $_POST["caption"];
    $img = $_POST["img"];
    $tags = $_POST["tags"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(emptyInputPost($title,$caption,$img) !== false){
        header("location: ../posts.php?error=emptyinput");
        exit();
    }
    
    createPosts($conn, $title, $caption, $img, $tags);
    viewPosts($conn,$title);
}

else{
    header("location: ../posts.php");
    exit();
    
}

?>