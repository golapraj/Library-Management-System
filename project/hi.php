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
    <title>Admin | Rental Library | KUET</title>
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

<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(22.8993279,89.5014303);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"Rental Library,CSE,KUET!"
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
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
                <li> <a href="#"><i class="glyphicon glyphicon-book"></i> About Library </a> </li> 
                <li> <a href="#signIn" data-toggle="modal" data-target="#signIn" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-lock"></i> Sign In</a> </li> 
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="left_side">
            <ul>
                <li> <a href="index.php">  Library at Glance  </a> </li>
                <li> <a href=""> Library Committee </a> </li> 
                <li> <a href="location.php">  Location  </a> </li>
                <li> <a href=""> Credit </a> 
                <li> <a href=""> FAQ </a> </li> 
                <li> <a href=""> Contact Us </a> 
            </ul>
        </div>
       <div style="width:850px;float:left;padding-left:10px;padding-top:100px;">
             <div id="googleMap" style="width:800px;height:350px;"></div>

       </div>
    
        <div class="right_side" style="float:right;">
            <h2>Important links</h2><hr/>
            <ul>
               <li> <a href="http://kuet.ac.bd/" target="_blank"> <i class="glyphicon glyphicon-share-alt"></i> KUET</a></li>
                <li> <a href="http://library.kuet.ac.bd/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Central Library</a> </li> 
                <li> <a href="http://cse.kuet.ac.bd/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Dept. of CSE</a> 
                <li> <a href="http://www.kuet.ac.bd/index.php/welcome/dsw" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> DSW, KUET</a> </li>
                <li> <a href="http://portal.kuet.ac.bd/student/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Student Corner</a>
                <li> <a href="http://academic.kuet.ac.bd/index.php" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Academic System Automation</a> 
                <li> <a href="http://www2.kuet.ac.bd/CCC/" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> Central Computer Center</a> </li> 
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