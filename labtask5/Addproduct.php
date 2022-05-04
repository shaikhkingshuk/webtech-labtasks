<?php 

if(isset($_POST["submit"]))
{
	$disp="";
	$uname="";
	$ssell="";
	$bbuy=$_POST["bprice"];
	if(empty($_POST["name"]))  
           {  
                echo "<script> alert('Please enter the name'); </script>"; 
           }
           else
           {
           	    $uname=$_POST["name"];
           }

    if(empty($_POST["bprice"]))  
           {  
                echo "<script> alert('Please enter the buying price'); </script>"; 
           }

    if(empty($_POST["sprice"]))  
           {  
                echo "<script> alert('Please enter the selling price'); </script>"; 
           }
           else
           {
           		$ssell=$_POST["sprice"];
           }
    if(empty($_POST["display"]))  
           {  
                $disp=0;
           }
           else
           {
               $disp=1;
           }
    if(!empty($_POST["name"]) && !empty($_POST["bprice"]) && !empty($_POST["sprice"]))
    {
    	  $servername = "localhost";
          $username = "root";
          $password = "";               
          $dbname = "mydb";

          
               // Create connection
               $conn = mysqli_connect($servername, $username, $password, $dbname);
               // Check connection
               if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
               }
               else
               {
               }

               // Create database
               $sql ="INSERT INTO productdata (Name, Buying_Price, Selling_Price, Display)
               VALUES ('$uname', '$bbuy', '$ssell', '$disp')"; 


               if (mysqli_query($conn, $sql)) {
                 mysqli_close($conn);
               } else {
                 echo "Error creating database: " . mysqli_error($conn);
               }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post" >
	<fieldset style="width:300px;">
		<legend>ADD PRODUCT</legend>
		<label>Name</label><br>
		<input type="text" name="name"><br>
		<label>Buying Price</label><br>
		<input type="text" name="bprice"><br>
		<label>Selling Price</label><br>
		<input type="text" name="sprice"><br>
		<hr><input type="checkbox" name="display">
		<label>Display</label><br></hr>
		<hr><input type="submit" name="submit" value="SAVE"></hr>
	</fieldset>
</form>
</body>
</html>