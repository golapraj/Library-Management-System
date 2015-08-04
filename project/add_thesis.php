<?php
        session_start();
        if ( !isset($_SESSION['login_admin'])) 
        {
            header("Location:index.php");
            die();
        }
?>

<?php
include "db_connect.php";
	if (isset($_POST['submit'])) 
	{
		$pn=$_POST['pn'];
		$pt=$_POST['pt'];
	    $roll1=$_POST['roll1'];
		$name1=$_POST['name1'];
		$roll2=$_POST['roll2'];
		$name2=$_POST['name2'];
		$roll3=$_POST['roll3'];
		$name3=$_POST['name3'];
		$roll4=$_POST['roll4'];
		$name4=$_POST['name4'];
		$category=$_POST['thesiscategory'];
		$sn= $_POST['sn'];
		$rmk= $_POST['rmk'];

	add_thesis($pn,$pt,$roll1,$name1,$roll2,$name2,$roll3,$name3,$roll4,$name4,$category,$sn,$rmk);

	}

	

	function add_thesis($pn,$pt,$roll1,$name1,$roll2,$name2,$roll3,$name3,$roll4,$name4,$category,$sn,$rmk)
	{
		$sql = "INSERT INTO `thesis`(`Thesis_No`, `Thesis_Tittle`, `Roll1`, `Name1`, `Roll2`, `Name2`, `Roll3`, `Name3`, `Roll4`, `Name4`, `Thesis_Category`, `Supervisor_Name`, `Remarks`) VALUES ('$pn', '$pt', '$roll1', '$name1', '$roll2', '$name2', '$roll3', '$name3', '$roll4', '$name4', '$category', '$sn', '$rmk')";
	    if(mysql_query($sql))
	    {
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Thesis Added!!!"); }
            </script>';
	    }
	    else
	    {
	    	$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo "Error".$errx;
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Mission Failed!!!"); }
            </script>';
	    }
	}
?>

<html>
	<head>
		<title></title>
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
	<body style="padding:20px;">
		<div id="main">
		<div id="login" class="form-group" style="padding-left:100px;padding-right:100px;">
		<form action="add_thesis.php" method="post">
		<fieldset>
		<legend style="background:#3AA949;text-align:center;color:#fff">Add Thesis</legend>
		<label class="label label-default">Project No. :</label>
		<input class="form-control" id="pn" name="pn" placeholder="Enter Thesis no" type="text" title="CSER-03-01" required><br/>
		<label class="label label-default">Thesis tittle :</label>
		<input class="form-control" id="title" name="pt" placeholder="Enter Thesis Tittle" type="text" title="Rental Library Automation" required><br/>
		<label class="label label-default">Roll No. :</label>
		<input class="form-control" id="roll1" name="roll1" placeholder="Enter Roll" type="text" title="e.g 1207005"  required><br/>
		<label class="label label-default">Name :</label>
		<input class="form-control" id="name1" name="name1" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required><br/>
		<label class="label label-default">Roll No. :</label>
		<input class="form-control" id="roll2" name="roll2" placeholder="Enter Roll" type="text" title="e.g 1207005" required><br/>
		<label class="label label-default">Name :</label>
		<input class="form-control" id="name2" name="name2" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required><br/>
		<label class="label label-default">Roll No. :</label>
		<input class="form-control" id="roll3" name="roll3" placeholder="Enter Roll" type="text" title="e.g 1207005"><br/>
		<label class="label label-default">Name :</label>
		<input class="form-control" id="name3" name="name3" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap"><br/>
		<label class="label label-default">Roll No. :</label>
		<input class="form-control" id="roll4" name="roll4" placeholder="Enter Roll" type="text" title="e.g 1207005"><br/>
		<label class="label label-default">Name :</label>
		<input class="form-control" id="name4" name="name4" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap"><br/>
		<label class="label label-default">Category :</label>
		<select class="form-control" id="select" name="thesiscategory" required>
        	<option>Thesis</option>
        	<option>Project</option>
        	
		</select><br/>
		<label class="label label-default">Supervisor Name :</label>
		<input class="form-control" id="sn" name="sn" placeholder="Enter supervisor name" type="text"><br/>
		<label class="label label-default">Remarks :</label>
		<input class="form-control" id="rmk" name="rmk" placeholder="Enter remarks if any" type="text"><br/>
		<input style="margin-left:450px;width:150px;" class="btn btn-success btn-lg" name="submit" type="submit" value="Add">
		</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>