<?php 
 
 session_start();

?>

<!DOCTYPE html>
<html lang = "en" dir="ltr">
<head>
<meta charset="utf=8">
<title>Social Media Act 1</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div  class="container-fluid">
	
	<a class = "navbar-brand" href = "index.php"><img src="img/logo.png" width="50" height = "50">Social One</a>

	
	<ul class ="navbar-nav">
	<?php 
	if(isset($_SESSION["useruid"])){
	    echo "<li class='nav-link'><a href='signup.php'>Profile Page</a></li>";
	    echo "<li class='nav-link'><a href='logout.inc.php'>Log Out</a></li>";
	}
	
	else{
	    echo "<li class='nav-link'><a href='signup.php'>Sign Up</a></li>";
	    echo "<li class='nav-link'><a href='login.php'>Log In</a></li>";
	}
	
	?>
	
	<li class="nav-link"><a href="posts.php">Posts</a></li>
	<li class="nav-link"><a href="Search.php">Search Posts</a></li>
	
	</ul>


</div>
</nav>



