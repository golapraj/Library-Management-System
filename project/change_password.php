<?php
  session_start();
  if ((isset($_POST['change'])) )
  {
        if (($_POST['new_password'] == $_POST['confirm_password'])) 
        {
          $username=$_SESSION['login_user'];
          $password=$_POST['cur_password'];
          $newpass=$_POST['new_password'];

          $connection = mysql_connect("localhost", "root", "");

          $username = stripslashes($username);
          $password = stripslashes($password);
          $newpass = stripslashes($newpass);
          $password = mysql_real_escape_string($password);
          

          $db = mysql_select_db("rental_library", $connection);
          $query = mysql_query("select * from student where Roll='$username' AND Password='$password'", $connection);
          $rows = mysql_num_rows($query);

          if ($rows == 1) 
          {
            if(mysql_query("UPDATE `student` SET `Password`='$newpass' WHERE Roll='$username'"))
            //echo "Password Changed";
          echo '<script type="text/javascript">
          window.onload = function () { alert("Password Changed!!"); }
           </script>';
          }

          else 
          {
           //echo "DataBase error";
            echo '<script type="text/javascript">
          window.onload = function () { alert("Password incorrect!!"); }
           </script>';
          }
          mysql_close($connection);
        }
        else
        {
          //echo "Password does not Match";
          echo '<script type="text/javascript">
          window.onload = function () { alert("Password does not Match!!"); }
           </script>';
        }  
  }
?>




<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/add_book&user.css">

   <STYLE TYPE="text/css">
       
input:focus{
         background:#fff;
        border:2px solid #330066;
    background-repeat:no-repeat;
     }
  
   
 
 input:focus:invalid {
         background-image: url('images/redx.png');
         background-position:right;
         background-repeat:no-repeat;
         -moz-box-shadow:none;
     }
  
    
      input:required:valid {
        background-image: url('images/greenx.png');
        background-position:right;
        background-repeat:no-repeat;
        -moz-box-shadow:none;
     }
   
    
   .help {
    display:none;
    font-size:90%;
}
    
  input:focus + .help {
    display:inline-block;
}

   
</STYLE>

	</head>
	<body>
		<div>
     	<form action="change_password.php" method="post">
			  <fieldset>
				    <legend style="background:#3AA949;color:white"><b>Manage Password:</b></legend>
				    User ID: <input name="" type="number" size="7" value="<?php echo $_SESSION['login_user'] ?>" readonly="readonly"/></br>
				    Password: <input name="cur_password" type="password" maxlength="4" pattern=".{4,}" required></br>
				    New Password: <input name="new_password" type="password" maxlength="4" pattern=".{4,}" required></br>
				    Confirm Password: <input name="confirm_password" type="password" maxlength="4" pattern=".{4,}" required></br>
				    <input name="change" type="submit" value="Update" ><input name="cancel" type="submit" value="Cancel">
			  </fieldset>
			</form>
	    </div>
	</body>
</html>