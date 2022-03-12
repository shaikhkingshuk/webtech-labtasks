<?php
$ss="";
$a=-1;
$oerror = "";
$nerror = "";
$cerror = "";
if(isset($_POST["submit"]))  
 {  
	  if(empty($_POST["oldpass"]))  
	      {  
	           $oerror = "Enter old password"; 
	      }
      if(empty($_POST["newpass"]))  
      {  
           $nerror = "Enter new password"; 
      }
      else
      {
      	$a=preg_match("/[@#$%]/i",$_POST["newpass"]);

      		if($a==1)
		      {
		       	if(strlen($_POST["newpass"])<8)
		      	{
		      		$nerror = "New password length must be greater than 7";
		     	 }
		      }
		      else
		      {
		      $nerror = "New password must contain special character";
		      }
		      
      }
      if(empty($_POST["cfpass"]))
      {
      	$cerror="Retype new password";
      }
      else
      {
      	if(strcmp($_POST["newpass"],$_POST["cfpass"])!=0)
      	{
      		$cerror="Not matched with new password. Please rewrite";
      	}
      }
      $ss=$_POST["newpass"];
      if(empty($oerror) && empty($nerror) && empty($cerror))
      {
      			$data = file_get_contents('passwrd.json');  
                $json_arr = json_decode($data, true);
                foreach ($json_arr as $key => $value) 
                {
 		   					if ($value['pass'] == $_POST['oldpass']) 
    						{
      	  					$json_arr[$key]['pass'] = $ss;
    						}
                }
                file_put_contents('passwrd.json', json_encode($json_arr));




      		
      }
  }

?>

<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
.grn {color: #00FF00;}
.blu {color: #0000FF;}
</style>
</head>
<body>
     
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

	<fieldset>
		<legend>CHANGE PASSWORD</legend>
		Current Password: <input type='password' name='oldpass' ><span class="error">*<?php echo $oerror ?></span><br><br>

		<span class="grn">New Password: </span><input type='password' name='newpass' ><span class="error">*<?php echo $nerror ?></span><br><br>

		<span class="error">Retype New Password: </span><input type='password' name='cfpass' ><span class="error">*<?php echo $cerror ?></span><br><br>
	</fieldset>
	<br><input type="submit" name="submit" value="Submit"><br><br>
</form>
</body>
</html>