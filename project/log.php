<?php
  session_start();
if(isset($_COOKIE['admin'])) 
{
          $_SESSION['login_admin']=$_COOKIE['admin'];
          
              header('Location: admin.php');
} 
    if (isset($_SESSION['login_admin'])) 
    {
       
              header('Location: admin.php'); 
    }

    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) 
    {
              $_SESSION['login_user']=$_COOKIE['username'];
              $_SESSION['login_password']=$_COOKIE['password'];
              header('Location: user.php');   
    } 
    
    if (isset($_SESSION['login_user'])) 
    {
          header('Location: user.php');   
    }

   
    $_SESSION['error']="";
    if (isset($_POST['submit']))
    {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $connection = mysql_connect("localhost", "root", "");
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysql_real_escape_string($username);
            $password = mysql_real_escape_string($password);

            $db = mysql_select_db("rental_library", $connection);
            $query = mysql_query("select * from student where Password='$password' AND Roll='$username'", $connection);
            $rows = mysql_num_rows($query);

            if ($rows == 1) 
            {
                $_SESSION['login_user']=$username;
                $_SESSION['login_password']=$password;
                $_SESSION['username']=$rows['Name'];

                        if (isset($_POST['remember'])) 
                        {
                            setcookie('username', $username, time()+3600);
                            setcookie('password', $password, time()+3600);
                         } 
             
                header("location:user.php");
            }
            
            elseif ($username=="admin" && $password=='abc123') 
            {
                $_SESSION['login_admin']=$username;
                 if (isset($_POST['remember'])) 
                        {
                            setcookie('admin', $username, time()+3600);
                        } 
                header("location:admin.php");
            }

            else 
            {
                //$_SESSION['error']="Error";
                //header("location:index.php");
                echo '<script type="text/javascript">
          window.onload = function () { alert("Username or password is incorrect!!"); }
          </script>';
            }
            mysql_close($connection);
    }
?>

<html>
<head>
    <title>Home | Rental Library | KUET</title>
    <link rel="icon" href="images/cse-logo.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script>
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("clock").innerHTML = d.toLocaleTimeString();
}
</script>


<link rel="stylesheet" type="text/css" href="slider/themes/bar/bar.css"/>
        <link rel="stylesheet" type="text/css" href="slider/themes/dark/dark.css"/>
        <link rel="stylesheet" type="text/css" href="slider/themes/default/default.css"/>
        <link rel="stylesheet" type="text/css" href="slider/themes/light/light.css"/>
        <link rel="stylesheet" type="text/css" href="slider/themes/nivo-slider.css"/>
</head>
<body>
    <div class="header">
        <div class="banar">
            <img id="cse" src="images/cse-logo.png"></img><img id="kuet" src="images/kuet-logo.png"></img>
             <h3 id="clock" style="float:right;color:#F90F48;font-weight:bold;"></h3>
            <h1>Rental Library Management System</h1><h5>Dept. of Computer Science & Engineering</h5>
        </div>
        <div class="menu">
            <ul>
                <li> <a href="index.php"> <i class="glyphicon glyphicon-home"></i>  Home </a> </li>
                <li> <a href="about_library.php"><i class="glyphicon glyphicon-book"></i> About Library </a> </li> 
                <li> <a href="#signIn" data-toggle="modal" data-target="#signIn"> <i class="glyphicon glyphicon-lock"></i> Sign In</a> </li> 
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="left_side">
            <ul>
                <li> <a href="glance.php">  Library at Glance  </a> </li>
                <li> <a href="library_com.php"> Library Committee </a> </li> 
                <li> <a href="location.php">  Location  </a> </li>
                <li> <a href="credit.php"> Credit </a> 
                <li> <a href="faq.php"> FAQ </a> </li> 
                <li> <a href="contact.php"> Contact Us </a> 
            </ul>
        </div>
        <div class="main_content" width="70%" height="100%">
      
        </div>
        <div class="right_side">
            <h2>Important links</h2><hr/>
            <ul style="padding-top:-20px;margin-top:-20px;">
               <li> <a href="http://kuet.ac.bd/" target="_blank"> <i class="glyphicon glyphicon-share-alt"></i> KUET</a></li>
                <li> <a href="http://library.kuet.ac.bd/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Central Library</a> </li> 
                <li> <a href="http://cse.kuet.ac.bd/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Dept. of CSE</a> 
                <li> <a href="http://www.kuet.ac.bd/index.php/welcome/dsw" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> DSW, KUET</a> </li>
                <li> <a href="http://portal.kuet.ac.bd/student/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Student Corner</a>
                <li> <a href="http://academic.kuet.ac.bd/index.php" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Academic Automation</a> 
                <li> <a href="http://www2.kuet.ac.bd/CCC/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i>Computer Center</a> </li> 
                <li> <a href="http://www.kuet.ac.bd/index.php/welcome/transportation" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Bus Schedule</a>
                <li> <a href="http://admission.kuet.ac.bd/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Admission</a>
            </ul>
        </div>
    </div>
    <div class="footer">
        </br><p> Copyright &copy; Dept. of Computer Science & Engineering, Khulna University
                    of Engineering & Technology</p>
                    <p>Developed by: Md. Asaf-Uddowla Golap&reg;</p>
    </div>

    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>