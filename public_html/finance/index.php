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
    <form id='frm3' class="db-box">
      CSV string: </br><input type='text' id='csv_row'><br>
      <input type="submit" value="Send rows">
    </form>
  </div>

  <div id='tableBox'></div>

</body>
