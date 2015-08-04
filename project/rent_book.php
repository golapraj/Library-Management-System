<html>
  <head>
    <title></title>
    <script src="js/ajax.js"></script>
    <script src="js/typeahead.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/search_box.css">
    <script>
    $(document).ready(function(){
    $('input.gi').typeahead({
        name: 'gi',
        remote:'search_box_gi.php?key=%QUERY',
        limit : 10
    });
     $('input.bn').typeahead({
        name: 'bn',
        remote:'search_box_bn.php?key=%QUERY',
        limit : 10
    });
});
    </script>
  </head>
  <body>
    <?php if (isset($_GET['sts'])) echo "Rent Successful Pay Tk. ". $_GET['sts'];?>
        <form method="post" action="rent_book_process.php">  
        <fieldset>
      <legend style="background:#00803E">Rent Book</legend>
      <strong>Enter Group ID:</strong><br/>  <input type="text" name="gi" class="gi" required autocomplete="off" spellcheck="false" placeholder="Enter Group ID"><br/>
        <strong>  Enter Book Name:</strong><br/>  <input type="text" name="bn" class="bn" required autocomplete="off" spellcheck="false" placeholder="Enter Book Name"><br/>
        <select name="snofb" required>
          <option value="1" selected>Select No of Copies</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select><br/>
        <input style="background:#3AA949;width:100px;height:30px;margin-top:20px;" type="submit" name="ok" value="Rent">
        </fieldset>
        </form>
  </body>
</html>
