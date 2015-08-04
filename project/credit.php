<?php
  session_start();

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) 
{
    
          $_SESSION['login_user']=$_COOKIE['username'];

          $_SESSION['login_password']=$_COOKIE['password'];
          header('Location: user.php');   
} 
    if (isset($_SESSION['login_user'])) {
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
            
            elseif ($username=="admin" && $password=='1') {
                $_SESSION['login_user']=$username; 
                header("location:admin.php");
            }

            else 
            {
                $_SESSION['error']="Error";
                header("location:login.php");
            }
            mysql_close($connection);
    }
?>

<html>
<head>
    <title>about library | Rental Library | KUET</title>
    <link rel="icon" href="images/cse-logo.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>
</head>
<body>
    <div class="header">
        <div class="banar">
            <img id="cse" src="images/cse-logo.png"></img><img id="kuet" src="images/kuet-logo.png"></img>
             <h4 id="demo" style="float:right"></h4>
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
       <div style="width:850px;float:left;padding-left:10px;padding-top:10px;">
            <div style="float:left;padding-left:360px;padding-right:280px;">
                             <h4 style="float:left;">Developed by:</h4><br/>
                             <p style="float:left;">Md:Asaf-Uddowla Golap</p><br/>
                              <p style="float:left;"><b>Roll:</b>1207005</p><br/>
                              <p style="float:left;"><b><i class="glyphicon glyphicon-envelope"></i> : </b><a href="mailto:golap.cse.kuet@gmail.com">  golap.cse.kuet@gmail.com</a></p><br/>
                              <p style="float:left;"><b><i class="glyphicon glyphicon-earphone"></i> : </b><a href="tel:+8801521453003">  +880-1521-453003</a></p><br/>
                                   
             </div>

             <div style="border-bottom:5px solid #F5F5F5">
                 <h4>Supervised by:</h4>
             </div>
              
              <div style="float:left;padding-left:10px;">
                            
                             <p style="float:left;"><a href="http://cse.kuet.ac.bd/mehnumatabassumomar" target="_blank">Mehnuma Tabassum Omar</a></p><br/>
                              <p style="text-align:left;float:left;">Lecturer,<br/>Dept. of Computer Science & Engineering<br/>Khulna University of Engineering and Technology</p>
              </div>
              <div style="float:right;">
                                <p style="float:left;"><a href="http://cse.kuet.ac.bd/smahmud07" target="_blank">Saifuddin Mahmud</a></p><br/>
                              <p style="text-align:left;float:left;">Lecturer,<br/>Dept. of Computer Science & Engineering<br/>Khulna University of Engineering and Technology</p><br/>
                
             </div>

       </div>
    
        <div class="right_side" style="float:right;">
            <h2>Important links</h2><hr/>
            <ul>
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

   <!-- Sign in Modal -->
        <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" value="1"> Remember me
                            </label>
                        </div>

                        <div class="form-group ">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" style="margin-left: 10px" value="Sign in">
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>               
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </div>

    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>