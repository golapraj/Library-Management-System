<?php
  include "db_connect.php";
	    $query = "SELECT * FROM `thesis` WHERE `Thesis_No`='$_GET[q]'";
		$result = mysql_query($query);
		$id=mysql_fetch_array($result);
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/add_book&user_2.css">


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
	<body style="padding:20px">
		<div id="main">
		<h1></h1>
		<div id="login">
		<form action="edit_thesis_process(2).php" method="post">
		<fieldset>
		<legend>Update Thesis</legend>
		<label>Project No. :</label>
		<input type="hidden" name="id" value="<?php echo $_GET['q'] ; ?>" >
		<input id="pn" name="pn" value="<?php echo $id['Thesis_No']; ?>" type="text" required><br/>
		<label>Thesis tittle :</label>
		<input id="title" name="pt" value="<?php echo $id['Thesis_Tittle']; ?>" type="text" required><br/>
		<label>Roll No. :</label>
		<input id="roll1" name="roll1" value="<?php echo $id['Roll1']; ?>" maxlength="7" title="e.g 1207005" pattern="[0-9]*" type="text" required>
		<label>Name :</label>
		<input id="name1" name="name1" value="<?php echo $id['Name1']; ?>" type="text" required><br/>
		<label>Roll No. :</label>
		<input id="roll2" name="roll2" value="<?php echo $id['Roll2']; ?>" maxlength="7" title="e.g 1207005" pattern="[0-9]*" type="text" required>
		<label>Name :</label>
		<input id="name2" name="name2" value="<?php echo $id['Name2']; ?>" maxlength="7" type="text" required><br/>
		<label>Roll No. :</label>
		<input id="roll3" name="roll3" value="<?php if($id['Roll3']!=0)echo $id['Roll3']; ?>" type="text">
		<label>Name :</label>
		<input id="name3" name="name3" value="<?php echo $id['Name3']; ?>" type="text"><br/>
		<label>Roll No. :</label>
		<input id="roll4" name="roll4" value="<?php if($id['Roll3']!=0)echo $id['Roll4']; ?>" type="text">
		<label>Name :</label>
		<input id="name4" name="name4" value="<?php echo $id['Name4']; ?>" type="text"><br/>
		<label>Category :</label>
		<select id="select" name="thesiscategory">
			<option value="Thesis" <?php if ($id['Thesis_Category'] == "Thesis" ) echo 'selected'; ?> >Thesis</option>
	        <option value="Project" <?php if ($id['Thesis_Category'] == "Project" ) echo 'selected'; ?> >Project</option>
        	
		</select><br/>
		<label>Supervisor Name :</label>
		<input id="sn" name="sn" value="<?php echo $id['Supervisor_Name']; ?>" type="text"><br/>
		<label>Remarks :</label>
		<input id="rmk" name="rmk" value="<?php echo $id['Remarks']; ?>" type="text"><br/>
		<input name="submit" type="submit" value="Update">
		</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>