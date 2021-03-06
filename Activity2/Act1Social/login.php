<?php 
include_once'header.php'
?>


<body>
	<div class ="container">
	<h2>Log In</h2>
	
	<form class="" action="includes/login.inc.php" method="post">
	<div class="form-group">
		<input class="form-control" type ="text" name ="uid" placeholder="Username/Email...">
		</div>
		<div class="form-group">
		<input class="form-control" type ="password" name ="pwd" placeholder="Password...">
		</div>
		<div class="form-group">
		<button type="submit" name="submit" class="btn btn-dark"> Log In</button>
	</div>
	</form>

		<?php 
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p> Fill in all fields !<p>";
    }
    else if ($_GET["error"] == "wronglogin"){
        echo "<p> Username/Password is wrong !<p>";
    }
  
}

?>

</div>
</body>
<?php 
include_once'footer.php'
?>
