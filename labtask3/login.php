<?php
$a=-1;
$message="";
$error="";
$oerror = "";
$nerror = "";
$cerror = "";
if(isset($_POST["submit"]))  
 {  
          if(empty($_POST["uname"]))  
           {  
                $oerror = "Enter user name"; 
           }
           else
           {
               if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["uname"])) 
               {
                    $oerror = "Enter correctly.";
               }
               else
               {
                    $oerror="";
               }
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
      if(empty($oerror) && empty($nerror))
      {
      if(file_exists('passwrd.json'))  
           {  
                $current_data = file_get_contents('passwrd.json');  
                //echo $current_data;
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['uname'],  
                     'pass'          =>     $_POST["newpass"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                //echo $final_data;
                if(file_put_contents('passwrd.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }
      }
      else
      {

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
          <legend>Login</legend>
          User name : <input type='text' name='uname' ><span class="error">*<?php echo $oerror ?></span><br><br>

          Password: <input type='password' name='newpass' ><span class="error">*<?php echo $nerror ?></span><br><br>

          <input type="checkbox" name="reme" value="me" id="mme">
               <label for="mme">Remember me</label><br>
     </fieldset>
     <br><input type="submit" name="submit" value="Submit"><br><br>
</form>
</body>
</html>