<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>PROFILE PICTURE</legend>
  <img src="picture.png" alt="Trulli" width="100" height="100">
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>