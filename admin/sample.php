<?php 
include_once "inc/header.php";
?>

<div class="portion">
	<h2>Admin - Dashboard</h2>
	<?php

		if (isset($_POST['submit'])) {
			$inserted = $su->insertName($_POST);
		}
		if (isset($inserted)) {
			echo $inserted;
		}

	?>
	
	<form action="" method="post">
		
		<input type="text" name="name" >
		<input type="submit" name="submit">

	</form>
	<h3>All entries</h3>

	<?php
		if (isset($_GET['delid']) && $_GET['delid'] != NULL) {
	    	$delid = $_GET['delid'];
	    	$delmsg = $su->deleteName($delid);
   	    }
   	    if (isset($delmsg)) {
   	    	echo $delmsg;
   	    }
	?>

	<table style="border:1px solid #ddd">
		<tr>
			<th>SL</th>
			<th>Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			$names = $su->getNames();
			if ($names) {
				$i = 0;
				while ($row = $names->fetch_assoc()) {
				$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['name'];?></td>
			<td style='color:green'><a href="sampleupdate.php?uid=<?php echo $row['id'];?>">Edit</a></td>
			<td ><a style="color:red" href="?delid=<?php echo $row['id'];?>">Remove</a></td>
		</tr>
		<?php
				}
			}else{
				echo "No entries found !";
			}
		?>
	</table>
</div>

	<button class="btn btn-primary">Bootstrap</button>
	<i class="fa fa-bell-o" aria-hidden="true"></i>

<?php 
include_once "inc/footer.php";
?>