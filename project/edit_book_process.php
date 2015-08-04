<?php
    include "db_connect.php";
	    $query = "SELECT * FROM `book` WHERE `Book_ID`='$_GET[q]'";
		$result = mysql_query($query);
		$id=mysql_fetch_array($result);
?>


<html>
	<head>
		<title></title>
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
		<form action="edit_book_process(2).php" method="post">
		<fieldset>
		<legend>Edit Book</legend>
		<label>Book Tittle :</label>
		<input type="hidden" name="id" value="<?php echo $_GET['q'] ; ?>" >
		<input id="tittle" name="booktittle" value="<?php echo $id['Tittle']; ?>" type="text" required><br/>
		<label>Author Name :</label>
		<input id="author" name="bookauthor" value="<?php echo $id['Author']; ?>" type="text" required><br/>
		<label>Category :</label><br/>
		<select id="select" name="bookcategory">
        	<option value="CSE" <?php if ($id['Category'] == "CSE" ) echo 'selected'; ?> >CSE</option>
        	<option value="EEE" <?php if ($id['Category'] == "EEE" ) echo 'selected'; ?> >EEE</option>
        	<option value="Math" <?php if ($id['Category'] == "Math" ) echo 'selected'; ?> >Math</option>
        	<option value="Humanities" <?php if ($id['Category'] == "Humanities" ) echo 'selected'; ?> >Humanities</option>
		</select><br/>	
		<label>Price :</label>
		<input id="price" name="bookprice" value="<?php echo $id['Price']; ?>" type="text" pattern="\d+(\.\d{2})?" required><br/>
		<input name="submit" type="submit" value="Update">
		</fieldset>
		</form>
	</body>
</html>