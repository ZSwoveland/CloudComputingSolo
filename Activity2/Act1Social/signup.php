<?php 
include_once'header.php'
?>
<body>

<section class="form-group">
	<h2>Sign Up</h2>
	<div class="from-group">
	<form action="includes/signup.inc.php" method="post">
		<label class="form-label">Full Name: </label>
		<input class="form-control" type ="text" name ="name" placeholder="Full Name...">
		<label class="form-label">Email: </label>
		<input class="form-control" type ="text" name ="email" placeholder="Email...">
		<label class="form-label">Username: </label>
		<input class="form-control" type ="text" name ="uid" placeholder="Username...">
		<label class="form-label">Password: </label>
		<input class="form-control" type ="password" name ="pwd" placeholder="Password...">
		<label class="form-label">Verify Password: </label>
		<input class="form-control" type ="password" name ="pwdrepeat" placeholder="Repeat Password...">
		<button type="submit" name="submit" class="btn btn-dark"> Sign Up</button>
	
	</form>
	</div>
	<?php 
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p> Fill in all fields !<p>";
    }
    else if ($_GET["error"] == "invalidUid"){
        echo "<p> Choose a proper username !<p>";
    }
    else if ($_GET["error"] == "invalidEmail"){
        echo "<p> Use a proper email !<p>";
    }
    else if ($_GET["error"] == "PWDNOTMATCH"){
        echo "<p> Password does not match !<p>";
    }else if ($_GET["error"] == "USERNAMEEXISTS"){
        echo "<p> Username already exists !<p>";
    }
    else if ($_GET["error"] == "STMTfailed"){
        echo "<p> Server Error !<p>";
    }
    else if ($_GET["error"] == "none"){
        echo "<p> User has successfully been signed up!<p>";
    }
}

?>
</section>
</body>

<?php 
include_once'footer.php'
?>
