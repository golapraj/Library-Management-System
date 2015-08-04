<?php //  display  file  upload  form
if  (!isset($_POST['submit']))  
{ 
?>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="8000000" /> Select file:
<input type="file" name="data" />
<input type="submit" name="submit" value="Upload  File" /></form>
<?php

}  
else
{

//  check  uploaded  file  size

if  ($_FILES['data']['size']  ==  0)
{

die("ERROR:  Zero  byte  file  upload");

}

//  check  if  file  type  is  allowed  (optional)

$allowedFileTypes  =  array("image/gif",  "image/jpeg",  "image/pjpeg", "text/pdf", "application/pdf", "text/plain", "application/msword");

if  (!in_array($_FILES['data']['type'],  $allowedFileTypes)) 
{

die("ERROR:  File  type  not  permitted");

} //  check  if  this  is  a  valid  upload

if  (!is_uploaded_file($_FILES['data']['tmp_name']))
{

die("ERROR:  Not  a  valid  file  upload"); 

} //  set  the  name  of  the  target  directory

$uploadDir  =  "./uploads/"; //  copy  the  uploaded  file  to  the  directory
move_uploaded_file($_FILES['data']['tmp_name'],  $uploadDir  .  $_FILES['data']['name'])  or  die("Cannot  copy  uploaded  file"); //  display  success  message
echo  "File  successfully  uploaded  to  "  .  $uploadDir  .$_FILES['data']['name']; } 
?>