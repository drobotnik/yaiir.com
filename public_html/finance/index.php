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
    echo "<br>Bye World....<br>";
  ?>
  <div class="db-box">
      User: <input id='loginBox' type="password" value="1"></input>
  </div>

<br><br>

  <div id='DBInterface'>
    <form id='displayForm' class='db-box'>
      <input type="radio" value="rbs_current" name='radioTable' checked> RBS Current<br>
      <input type="radio" value="homeBudgetExpense" name='radioTable'> Home Budget Expense<br>
      <input type="radio" value="homeBudgetIncome" name='radioTable'> Home Budget Income<br>
      <input type="submit" value="Display table">
    </form>

    <form id='submitForm' class="db-box">
      CSV string:<br>
      Dates in format 'yyyy-mm-dd'
      <div id='tableSchema'>Selected table input columns here</div>

      <textarea id='csv_row'></textarea><br>
      <input type="submit" value="Send rows">
    </form>
  </div>


  <div id='tableBox'></div>

</body>
