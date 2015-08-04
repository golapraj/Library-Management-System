<?php
        session_start();
        if ( !isset($_SESSION['login_admin'])) {
            header("Location:index.php");
            die();
        }
?>
<html>
<head>
    <title>Admin | Rental Library | KUET</title>
    <link rel="icon" href="images/cse-logo.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    
    <link rel="stylesheet" type="text/css" href="css/admin.css">

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
            <h1>Rental Library Management System</h1><h5>Dept. of Computer Science & Engineering</h5>
            <h3 id="demo" style="float:right;color:#F90F48;font-weight:bold;"></h3>
        </div>
        <div id="menu" class="menubar">
            <ul>
                <li> <a href="admin.php"> <i class="glyphicon glyphicon-home"></i> Home  </a> </li>
                <li> <a><i class="glyphicon glyphicon-blackboard"></i> View </a> 
                        <ul>
                                <li> <a href="all_students.php" target="container"> All Student  </a> </li>
                                <li> <a href="all_books.php" target="container">  All Books </a> </li>
                                <li> <a href="all_thesis.php" target="container"> All Thesis </a> </li>
                                <li> <a href="all_group.php" target="container"> All Group </a> </li>
                                <li> <a href="d.php" target="container"> e-Resource </a> </li>
                        </ul>
                </li>
                 <li> <a><i class="glyphicon glyphicon-plus"></i>  Add  </a>
                            <ul>
                                <li> <a href="add_user.php" target="container"><i class="glyphicon glyphicon-plus"></i> Student  </a> </li>
                                <li> <a href="add_book.php" target="container"><i class="glyphicon glyphicon-plus"></i> Book  </a> </li>
                                <li> <a href="add_thesis.php" target="container"><i class="glyphicon glyphicon-plus"></i> Thesis  </a> </li>
                                <li> <a href="add_group.php" target="container"> <i class="glyphicon glyphicon-plus"></i> Group  </a> </li>
                                <li> <a href="u.php" target="container"><i class="glyphicon glyphicon-plus"></i> e-Resource  </a> </li>
                            </ul>
                </li>
                 <li> <a><i class="glyphicon glyphicon-pencil"></i>  Update  </a>
                            <ul>
                                <li> <a href="edit_user.php" target="container"><i class="glyphicon glyphicon-pencil"></i> Student  </a> </li>
                                <li> <a href="edit_books.php" target="container"><i class="glyphicon glyphicon-pencil"></i>  Book  </a> </li>
                                <li> <a href="edit_thesis.php" target="container"><i class="glyphicon glyphicon-pencil"></i>  Thesis  </a> </li>
                            </ul>
                </li> 
                 <li> <a> <i class="glyphicon glyphicon-trash"></i> Delete  </a>
                            <ul>
                                <li> <a href="delete_user.php" target="container"><i class="glyphicon glyphicon-trash"></i> Student  </a> </li>
                                <li> <a href="delete_thesis.php" target="container"><i class="glyphicon glyphicon-trash"></i>  Thesis  </a> </li>
                                <li> <a href="delete_book.php" target="container"> <i class="glyphicon glyphicon-trash"></i> Book </a> </li>
                                <li> <a href="delete_group.php" target="container"><i class="glyphicon glyphicon-trash"></i>  Group </a> </li>
                            </ul>
                </li>
                <li> <a> <i class="glyphicon glyphicon-transfer"></i> Book  </a>
                            <ul>
                                <li> <a href="rent_book.php" target="container"><i class="glyphicon glyphicon-arrow-left"></i> Rent </a> </li>
                                <li> <a href="return_book.php" target="container"><i class="glyphicon glyphicon-arrow-right"></i> Return </a> </li>
                            </ul>
                </li>
                
                <li> <a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout </a> </li> 
            </ul>
        </div>
    </div>
    <div class="contentt">
       <iframe name="container" src="admin_home_page.php" width="100%" height="100%" scrolling="auto"></iframe> 
    </div>
        
    <div class="footer">
        </br><p> Copyright &copy; Dept. of Computer Science & Engineering, Khulna University
                    of Engineering & Technology</p>
                    <p>Developed by: Md. Asaf-Uddowla Golap&reg;</p>
    </div>
</body>
</html>