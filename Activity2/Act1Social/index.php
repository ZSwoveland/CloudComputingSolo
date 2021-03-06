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
</body>

<?php 
include_once'footer.php'
?>


