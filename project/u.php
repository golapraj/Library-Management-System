<?php 
if  (!isset($_POST['submit']))  
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body style="padding-left:200px;padding-right:600px;padding-top:20px;">
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<fieldset>
<legend style="background:#3AA949;text-align:center;color:#fff;">Upload e-Resource</legend>
<input type="hidden" name="MAX_FILE_SIZE" value="8000000" />

<label>Content Name:</label><input class="form-control" id="exampleInputEmail1" name="name" type="text" placeholder="Content Name" required>
<label>Content Type:</label><br/>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Question"> Question
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Thesis"> Thesis
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Book"> Book
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Other"> Other
</label>

<input type="file" name="data"  style="padding:8px;" />

<input class="btn btn-primary" type="submit" name="submit" value="Upload" />
</fieldset>
</form>
</body>
</html>
<?php

}  
else
{
$name = $_POST['name'];
$type = $_POST['inlineRadioOptions'];

//  check  uploaded  file  size

if  ($_FILES['data']['size']  ==  0)
{

die("ERROR:  Zero  byte  file  upload");

}

//  check  if  file  type  is  allowed  (optional)

/*$allowedFileTypes  =  array("image/gif",  "image/jpeg",  "image/pjpeg", "text/pdf", "application/pdf", "text/plain", "application/msword");

if  (!in_array($_FILES['data']['type'],  $allowedFileTypes)) 
{

die("ERROR:  File  type  not  permitted");

} //  check  if  this  is  a  valid  upload*/

if  (!is_uploaded_file($_FILES['data']['tmp_name']))
{

die("ERROR:  Not  a  valid  file  upload"); 

} //  set  the  name  of  the  target  directory

$uploadDir  =  "./uploads/"; //  copy  the  uploaded  file  to  the  directory
move_uploaded_file($_FILES['data']['tmp_name'],  $uploadDir  .  $_FILES['data']['name'])  or  die("Cannot  copy  uploaded  file"); //  display  success  message
echo  "File  successfully  uploaded  to  "  .  $uploadDir  .$_FILES['data']['name'];  

$link = "uploads/".$_FILES["data"]["name"];

include "db_connect.php";
$sql= "INSERT INTO `uploads` VALUES('','$name','$type','$link')";
 mysql_query($sql);

}
?>