<!DOCTYPE html>
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

<?php
session_start();
if (isset($_GET['q'])) 
{
$q = intval($_GET['q']);
$_SESSION['q']=$q;
include "db_connect.php";
$sql="SELECT * FROM student WHERE Roll = '".$q."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
    { 
      if ($row['Roll']==$q) 
      {
        $name=$row['Name'];
        $mobile=$row['Mobile'];
        $address=$row['Address'];
        $email=$row['Email'];
      }
    }
}
?>
</select>
           <form action="edit_user_process(2).php" method="post">
            <fieldset>
            <legend>Profile:</legend>
            Name: <input name="nname" type="text" value="<?php echo $name ?>" required></br>
            Mobile: <input name="nmobile" type="text" maxlength="11" value="<?php echo $mobile ?>" pattern="[0-9]{11}" title="e.g 01521453003" required></br>
            E-mail: <input name="nemail" type="text" size="11" value="<?php echo $email ?>" required></br>
            Address:
                <select id="select" name="useraddress" required>
                  <option  <?php if ($address == "Lalan Shah" ) echo 'selected'; ?> >Lalan Shah</option>
                  <option <?php if ($address == "Begum Rokeya" ) echo 'selected'; ?> >Begum Rokeya</option>
                  <option <?php if ($address == "Amar Ekushy" ) echo 'selected'; ?> >Amar Ekushy</option>
                  <option <?php if ($address == "Khan Jahan Ali" ) echo 'selected'; ?> >Khan Jahan Ali</option>
                  <option <?php if ($address == "Bangobondhu Sheikh Mujibur Rahman" ) echo 'selected'; ?>>Bangobondhu Sheikh Mujibur Rahman</option>
                  <option <?php if ($address == "Dr. M.A Rashid" ) echo 'selected'; ?>>Dr. M.A Rashid</option>
                  <option <?php if ($address == "A.K Fazlul Haque" ) echo 'selected'; ?>>A.K Fazlul Haque</option>
            </select><br/>  
            <input name="change" type="submit" value="Update"> <input style="width:200px;" type="submit" name="reset" value="reset password" onClick="return confirm('Are you sure you want to reset password?');">
        </fieldset>
      </form>
</body>
</html>