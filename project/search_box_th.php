<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("rental_library",$con);
    $query=mysql_query("SELECT * FROM `thesis` WHERE `Thesis_No` LIKE '{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['Thesis_No'];
    }
    echo json_encode($array);
?>
