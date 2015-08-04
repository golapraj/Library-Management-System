<?php
        session_start();
		if ( !isset($_SESSION['login_user'])) 
        {
			header("Location:index.php");
			die();
		}
?>
<html>
<head>
     <title><?php echo $_SESSION['login_user']; ?> | Rental Library | KUET</title>
    <link rel="icon" href="images/cse-logo.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    
    <link rel="stylesheet" type="text/css" href="css/student.css">

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
            <h3 id="demo" style="float:right;color:#F90F48;font-weight:bold;"></h3>
            <h1>Rental Library Management System</h1><h5>Dept. of Computer Science & Engineering</h5>
        </div>
        <div class="menu">
            <ul>
                <li> <a href="index.php"><i class="glyphicon glyphicon-home"></i>  Home  </a> </li>
                <li> <a href="all_books.php" target="container"><i class="glyphicon glyphicon-book"></i> Available Books </a> </li> 
                <li> <a href="d.php" target="container"><i class="glyphicon glyphicon-print"></i> e-Resource </a> </li> 
                <li> <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout </a> </li> 
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="left_side">
            <ul>
                <li> <a href="my_info.php" target="container"><i class="glyphicon glyphicon-user"></i>  My Profile  </a> </li>
                <li> <a href="my_group_info.php" target="container"><i class="glyphicon glyphicon-education"></i> My Group Info</a> </li> 
                <li> <a href="change_password.php" target="container"><i class="glyphicon glyphicon-pencil"></i> Change Password </a> </li> 
            </ul>
        </div>
        <iframe class="main_content" name="container" src="user_home.php" scrolling="auto">Hi</iframe>
    </div>
    <div class="footer">
        </br><p> Copyright &copy; Dept. of Computer Science & Engineering, Khulna University
                    of Engineering & Technology</p>
                    <p>Developed by: Md. Asaf-Uddowla Golap&reg;</p>
    </div>

</body>
</html>