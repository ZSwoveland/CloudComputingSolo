<?php

if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $password = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    
    if(emptyInputSignup($name,$email,$username,$password,$pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invalidUid");
        exit();
    }
    
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    
    if(pwdMatch($password,$pwdRepeat) !== false){
        header("location: ../signup.php?error=PWDNOTMATCH");
        exit();
    }
    
    
    if(uidExists($conn,$username, $email) !== false){
        header("location: ../signup.php?error=USERNAMEEXISTS");
        exit();
    }
    
    createUser($conn,$name,$email,$username,$pwd);
}

else{
    header("location: ../signup.php");
    exit();
}