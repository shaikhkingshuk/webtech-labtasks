<?php
$conn = new mysqli('localhost', 'root', '', 'mydb');

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
		$i=1;
		$result=mysqli_query($conn,"SELECT * FROM productdata");
		if(mysqli_num_rows($result)>0) {
		?>
	<table style="width:50%" border = 5>
		<tr>
			<td>#</td>
			<td>Product Name</td>
			<td>Buying Price</td>
			<td>Selling Price</td>
			<td>Profit</td>
			<td></td>
			<td></td>
		</tr>

		<?php 
		while($row=mysqli_fetch_assoc($result)){
		if($row["Display"]==1){ 
		?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row["NAME"]; ?></td>
			<td><?php echo $row["Buying_Price"]; ?></td>
			<td><?php echo $row["Selling_Price"];?></td>
			<td><?php echo $row["Selling_Price"]-$row["Buying_Price"]; ?></td>
			<td><a href='edit.php?id=<?php echo $row['ID']; ?>'>edit</a></td>
			<td><a href='delete.php?id=<?php echo $row['ID']; ?>'>delete</a></td>



		</tr>
	<?php } } ?>
</table>
<?php } ?>
</body>
</html>