<?php
require 'db_functions.inc.php';
?>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src='scripts.js'></script>
  <link rel='stylesheet' type='text/css' href='styles.css'>
</head>
<body>
  <?php
    echo "Hello World!<br>";
    echo "</br>Bye World....";
  ?>
  <div id='DBInterface'>
    <form id="frm1" class='db-box'>
      Table name: </br><input type="text" value="test_table" id="tname"><br>
      <input type="submit" value="Display table">
    </form>
    <form id='frm2' class="db-box">
      Input string and int: </br><input type='text' id='strCol'><input type='text' id='intCol'><br>
      <input type="submit" value="Send rows">
    </form>
  </div>

<<<<<<< HEAD
  <div id='tableBox'></div>

=======
  <form id="frm1" action="form_action.asp">
    Table name: <input type="text" value="test_table" name="tname"><br>
    <input type="button" onclick="drawTable()" value="Display table">
  </form>
  <div id='tableBox'></div>
  <script type="text/javascript">

    function getTable(){
      $.ajax({
        url: '/finance/foo.php', // this returns an application/json response...
        cache: false
      }).done(function(data){ // ...jquery knows to automatically decode it for us
        console.log(data);
        for (var item of data) {
          console.log(item);
        }
      });
    }

    function drawTable() {
      $(document.body).append('<div> click </div>');
      getTable();
    }



  </script>
>>>>>>> parent of 6ab527d... implemented search and draw table
</body>
