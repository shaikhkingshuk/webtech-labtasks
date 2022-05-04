<?php
session_start();
$tt=$_GET["id"];
$_SESSION["iidd"]=$tt;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

		<?php 
		$conn = new mysqli('localhost', 'root', '', 'mydb');
		$rows=mysqli_query($conn,"SELECT * FROM productdata WHERE ID='$tt'");
		?>
		<?php 
		foreach($rows as $row) : ?>
		<fieldset style="width:300px;">
			<legend>DELETE PRODUCT</legend>
			Name: <?php echo $row["NAME"]; ?><br>
			Buying Price: <?php echo $row["Buying_Price"];?><br>
			Selling Price: <?php echo $row["Selling_Price"]; ?><br>
			Displayable: 
			<?php 
			if($row["Display"]==1)
			{
				echo "YES";
			} 
			else
			{
				echo "NO";
			}
			?>
			
			<hr><form method="post" action="dlt.php"><input type="submit" name="submit" value="Delete"/></form></hr>
		</fieldset>
		<?php endforeach; ?>
</body>
</html>