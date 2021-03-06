<?php
include_once'header.php'
?>
<body>

<section class="form-group">
	<h2>Create Posts</h2>
	<div class="form-group">
	<form action="includes/post.inc.php" method="post">
		<label class="form-label">Title: </label>
		<input class="form-control" type ="text" name ="title" placeholder="Title...">
		<label class="form-label">Caption: </label>
		<input class="form-control" type ="text" name ="caption" placeholder="Caption...">
		<label class="form-label">Image: </label>
		<input class="form-control" type ="text" name ="img" placeholder="Image...">
		<label class="form-label">Tags: </label>
		<input class="form-control" type ="tags" name ="tags" placeholder="Tags...">
	
		<button type="submit" name="submit" class="btn btn-dark">Post</button>
	
	</form>
	</div>
	<?php 
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p> Fill in all Tags are not required !<p>";
    }

    else if ($_GET["error"] == "STMTfailed"){
        echo "<p> Server Error !<p>";
    }
    else if ($_GET["error"] == "none"){
        echo "<p> Post has successfully been created!<p>";
    }
}

?>
</section>
</body>

<?php 
include_once'footer.php'
?>
