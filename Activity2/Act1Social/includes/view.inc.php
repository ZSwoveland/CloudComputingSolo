<?php 
if(isset($_POST["submit"])){
    
    $title = $_POST["look"];
   
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(emptyInputLookUp($title) !== false){
        header("location: ../Search.php?error=emptyinput");
        exit();
    }
    
    
    viewPosts($conn,$title);
}

else{
    header("location: ../Search.php");
    exit();
    
}
?>