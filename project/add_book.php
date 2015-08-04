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
		$tittle=$_POST['booktittle'];
	$author=$_POST['bookauthor'];
	$category=$_POST['bookcategory'];
	$price= $_POST['bookprice'];

	add_book($tittle,$author,$category,$price);
	}

	

	function add_book($tittle,$author,$category,$price)
	{
		$sql = "INSERT INTO `book`(`Tittle`, `Author`, `Category`, `Price`) VALUES ('$tittle', '$author', '$category', '$price')";
	    if(mysql_query($sql))
	    {
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Book Added!!"); }
          </script>';
	    }
	    else
	    {
	    	$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo $errx;
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Failed!!"); }
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
		<div id="login" class="form-group">
		<h2></h2>
		<form action="add_book.php" method="post">
        <fieldset>
		<legend style="background:#3AA949;text-align:center;color:#fff">Add Students</legend>

		<label class="label label-default">Book Tittle :</label>
		<input class="form-control" id="tittle" name="booktittle" placeholder="Enter Book Name" title="e.g Let Us C" type="text" required><br/>
		<label class="label label-default">Author Name :</label>
		<input class="form-control" id="author" name="bookauthor" placeholder="Enter Author Name" title="e.g R.N Shill" type="text" required><br/>
		<label class="label label-default">Category :</label><br/>
		<select class="form-control" id="select" name="bookcategory" required>
		    <option value="" disabled>Select Category</option>
        	<option>CSE</option>
        	<option>EEE</option>
        	<option>Math</option>
        	<option>Humanities</option>
		</select><br/>	
		<label class="label label-default">Price :</label>
		<input class="form-control" id="price" name="bookprice" placeholder="Enter Price" type="text" pattern="\d+(\.\d{2})?" title="e.g 100 or 100.00" required><br/>
		<input style="margin-left:450px;width:150px;" class="btn btn-success btn-lg" name="submit" type="submit" value="Add">
		 </fieldset>
		</form>
		</div>
		</div>
	</body>
</html>