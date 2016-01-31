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
    <form id='displayForm' class='db-box'>
      <input type="radio" value="test_table" name='radioTable'> Test table<br>
      <input type="radio" value="rbs_current" name='radioTable' checked> RBS Current<br>
      <input type="submit" value="Display table">
    </form>

    <form id='submitForm' class="db-box">
      CSV string: </br>
      <textarea id='csv_row' > </textarea></br>
      <input type="submit" value="Send rows">
    </form>
  </div>

  <div id='tableBox'></div>

</body>
