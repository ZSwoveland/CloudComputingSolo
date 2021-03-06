<?php 

function emptyInputSignup($name,$email,$username,$password,$pwdRepeat){
    $result;
    
    if(empty($name) || empty($email) || empty($username) || empty($password) || empty($pwdRepeat)){
        $result = true;
    }
    
    else{
        $result = false;
    }
    
    return $result;
}

function invalidUid($username){
    $result;
    
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
    
}

function invalidEmail($email){
    $result;
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
    
}

function pwdMatch($password,$pwdRepeat){
    $result;
    
    if($password !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
    
}

function uidExists($conn,$username){
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login.php?error=STMTfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$username,$pwd){
    
    $sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=STMTfailed");
        exit();
    }
    
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssss", $name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../signup.php?error=none");
    exit();
    
}


function emptyInputLogin($username,$password){
    $result;
    
    if( empty($username) || empty($password)){
        $result = true;
    }
    
    else{
        $result = false;
    }
    
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uIdExists = uidExists($conn,$username);
    
    if($uIdExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    
    $pwdHashed = $uIdExists["usersPwd"];
    
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        
        $_SESSION["userid"] =  $uIdExists["usersId"];
        $_SESSION["useruid"] =  $uIdExists["usersUid"];
        header("location: ../posts.php");
        exit();
        
    }
}

function createPosts($conn,$title,$caption,$img,$tags){
    
    $sql = "INSERT INTO posts (postTitle,postCaption,postImg,postTags) VALUES (?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../posts.php?error=STMTfailed");
        exit();
    }
    
    
  
    
    mysqli_stmt_bind_param($stmt, "ssss", $title,$caption,$img,$tags);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../posts.php?error=none");
    exit();
    
}

function emptyInputPost($title,$caption,$img){
    $result;
    
    if( empty($title) || empty($caption) || empty($img)){
        $result = true;
    }
    
    else{
        $result = false;
    }
    
    return $result;
}

function emptyInputLookup($title){
    $result;
    
    if( empty($title)){
        $result = true;
    }
    
    else{
        $result = false;
    }
    
    return $result;
}

function viewPosts($conn,$title){
    $sql = "SELECT * FROM posts WHERE postTitle = ?;";
    
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../view.php?error=STMTfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $title);
    mysqli_stmt_execute($stmt);
    
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}




?>