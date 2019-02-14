<?php 
include_once "inc/header.php";
?>
	<?php 
		//catch name from url using get method
		if (isset($_GET['uid']) && $_GET['uid'] != NULL) {
	    	$uid = $_GET['uid'];
   	    }else{
   	    	echo "<script> window.location='sample.php'</script>";
   	    }
	?>

	<?php 
		//update name
		if (isset($_POST['submit'])) {
			$name  = $_POST['name'];
			$update = $su->updateNameById($name,$uid);
		}
		if (isset($update)) {
			echo $update;
		}

	?>
	
	<form action="" method="post">
		<?php 
			$names = $su->getNameById($uid);
			while ($row = $names->fetch_assoc()) {
		?>
		<input type="text" name="name" value="<?php echo $row['name'];?>">
		<?php } ?>
		<input type="submit" name="submit">

	</form>
	<a href="sample.php">Back Previous</a>


<?php 
include_once "inc/footer.php";
?>