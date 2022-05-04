<?php

session_start();
$tt=$_SESSION["iidd"];
$conn = new mysqli('localhost', 'root', '', 'mydb');
  $sql = "DELETE FROM productdata WHERE ID='$tt'";
  if (mysqli_query($conn, $sql)) {
  header("Location:http://localhost:8080/labtask5/Display.php");
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);

?>

