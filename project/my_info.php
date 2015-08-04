<?php
        session_start();
		if ( !isset($_SESSION['login_user'])) 
        {
			header("Location:index.php");
			die();
		}
?>
<?php
	//session_start();
	include "db_connect.php";


	if (isset($_POST['change'])) 
	{
		$nname=$_POST['nname'];
		$nmobile=$_POST['nmobile'];
		$nemail=$_POST['nemail'];
		$naddress=$_POST['useraddress'];
		$roll=$_SESSION['login_user'];

	   if(mysql_query("UPDATE `student` SET `Name`='$nname',`Mobile`='$nmobile',`Email`='$nemail',`Address`='$naddress' WHERE Roll='$roll'"))
	   //echo "Updated";
	   	  echo '<script type="text/javascript">
          window.onload = function () { alert("Profile Updated!!"); }
           </script>';
	}


	$query = "SELECT * FROM `student`";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{ 
	  if ($row['Roll']==$_SESSION['login_user']) 
	  {
	  	$name=$row['Name'];
	  	$mobile=$row['Mobile'];
	  	$address=$row['Address'];
	  	$email=$row['Email'];
	  }
	}
?>
<html>
	<head>
		
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">
	</head>
	<body style="padding:20px;">
		<div class="form-group" style="padding-left:100px;padding-right:100px;">
     	<form action="my_info.php" method="post">
			  <fieldset>
				    <legend style="background:#3AA949;text-align:center;color:#fff;">My Profile:</legend>
				    Name: <input class="form-control" name="nname" type="text" value="<?php echo $name ?>"></br>
				    Roll: <input class="form-control" name="roll" type="text" size="7" value="<?php echo $_SESSION['login_user'] ?>" readonly="readonly"></br>
			        Mobile: <input class="form-control" name="nmobile" type="text" maxlength="11" value="<?php echo $mobile ?>" pattern="[0-9]{11}" title="Number Only"></br>
				    E-mail: <input class="form-control" name="nemail" type="text" size="11" value="<?php echo $email ?>"></br>
				    Address:
				        <select class="form-control" id="select" name="useraddress">
				       		<option  <?php if ($address == "Lalan Shah" ) echo 'selected'; ?> >Lalan Shah</option>
				        	<option <?php if ($address == "Begum Rokeya" ) echo 'selected'; ?> >Begum Rokeya</option>
				        	<option <?php if ($address == "Amar Ekushy" ) echo 'selected'; ?> >Amar Ekushy</option>
				        	<option <?php if ($address == "Khan Jahan Ali" ) echo 'selected'; ?> >Khan Jahan Ali</option>
				        	<option <?php if ($address == "Bangobondhu Sheikh Mujibur Rahman" ) echo 'selected'; ?>>Bangobondhu Sheikh Mujibur Rahman</option>
				        	<option <?php if ($address == "Dr. M.A Rashid" ) echo 'selected'; ?>>Dr. M.A Rashid</option>
				        	<option <?php if ($address == "A.K Fazlul Haque" ) echo 'selected'; ?>>A.K Fazlul Haque</option>
						</select><br/>	
				    <input style="margin-left:350px;width:120px;" class="btn btn-success btn-lg" name="change" type="submit" value="Update">
			  </fieldset>
			</form>
	    </div>
	</body>
</html>
