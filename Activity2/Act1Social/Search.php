<?php 
include_once'header.php'
?>
<body>
<?php 
if(isset($_SESSION["useruid"])){
    echo "<p> Hello there " . $_SESSION["useruid"] . "</p>";
}
?>

<div class="container">Welcome to Social One</div>


<form action="includes/post.inc.php" method="post">
		<label class="form-label">Title: </label>
		<input class="form-control" type ="text" name ="look" placeholder="Title...">
		<button type="submit" name="submit" class="btn btn-dark">Post</button>
		</form>

<?php 
require_once'includes/view.inc.php';

?>
</body>

<?php 
include_once'footer.php'
?>