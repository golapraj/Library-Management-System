<?php
        session_start();
        if ( !isset($_SESSION['login_admin'])) {
            header("Location:index.php");
            die();
        }
?>
<?php
include "db_connect.php";
	if (isset($_POST['submit'])) {
		$roll=$_POST['userroll'];
	$name=$_POST['username'];
	$mobile=$_POST['usermobile'];
	$email=$_POST['useremail'];
	$address=$_POST['useraddress'];
	$password="1234";
	
	add_user($roll,$name,$mobile,$email,$address,$password);
	}

	

	function add_user($roll,$name,$mobile,$email,$address,$password)
	{
		$sql = "INSERT INTO `student`(`Roll`,`Name`,`Mobile`,`Email`,`Address`,`Password`)VALUES ('$roll', '$name', '$mobile', '$email', '$address', '$password')";
	    if(mysql_query($sql))
	    {
	    	
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Student Added!!"); }
           </script>';
	    	
	    }
	    else
	    {
	    	$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo $errx;
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Failed!!\nStudent already Added!!"); }
           </script>';
	    }
		
	}

	function generate_password( $length = 4 )
	 {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	 }

?>




<html>
	<head>
		<title>add student</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">


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
		<div id="main">
		<div id="login" class="form-group" style="padding-left:100px;padding-right:100px;">
		<h2></h2>
		<form action="add_user.php" method="post">
		<fieldset>
		<legend style="background:#3AA949;text-align:center;color:#fff;">Add Students</legend>
		<label class="label label-default">Roll :</label>
		<input id="roll" class="form-control" name="userroll" placeholder="Enter Roll" type="text" maxlength="7" title="e.g 1207005" pattern="[0-9]{7}" required><br/>
		<label class="label label-default">Name :</label>
		<input id="name" class="form-control" name="username" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required><br/>
		<label class="label label-default">Mobile :</label>
		<input id="mobile" class="form-control" name="usermobile" placeholder="Enter Mobile no" type="text" maxlength="11" pattern="[0-9]{11}" tittle="e.g 01735507902" required><br/>


		<label class="label label-default">Address :</label>
        <select id="select" class="form-control" name="useraddress" required><br/>
            <option value="" disabled>Select Hall</option>
        	<option>Lalan Shah</option>
        	<option>Begum Rokeya</option>
        	<option>Amar Ekushy</option>
        	<option>Khan Jahan Ali</option>
        	<option>Bangobondhu Sheikh Mujibur Rahman</option>
        	<option>Dr. M.A Rashid</option>
        	<option>A.K Fazlul Haque</option>
        	<option></option>
		</select><br/>	

		
		<label class="label label-default">E-mail :</label>
		<input id="email" class="form-control" name="useremail" placeholder="golapraj@yahoo.com" title="e.g golap.cse.kuet@gmail.com" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required><br/>
		<input style="margin-left:450px;width:150px;" class="btn btn-success btn-lg" name="submit" type="submit" value=" Add ">

		</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>