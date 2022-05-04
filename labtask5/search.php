<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post"><input type="text" name="search" value="">
		<input type="submit" name="submit" value="Search"><br><hr><br></form>

</body>
</html>


<?php
$ttt="";
$conn = new mysqli('localhost', 'root', '', 'mydb');

if(isset($_POST["submit"]))
{
	$uuu=$_POST["search"];
	$conn = new mysqli('localhost', 'root', '', 'mydb');
	$data=mysqli_query($conn,"SELECT * FROM productdata WHERE NAME LIKE '%$uuu%'"); 
	$total=mysqli_num_rows($data);

	echo "<table style='width:50%' border = 5>
		<tr>
			<td>Product Name</td>
			<td>Profit</td>
			<td></td>
			<td></td>
		</tr>";



	if($total!=0)
	{
		while($result=mysqli_fetch_assoc($data))
		{
			echo "
			<tr>
			<td>".$result['NAME']."</td>
			<td>".$result['Selling_Price']-$result['Buying_Price']."</td>
			<td><a href='delete.php'>edit</a></td>
			<td><a href='delete.php'>delete</a></td>
			</tr>
			";
		}
	}
	echo "</table>";
}
?>