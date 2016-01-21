<?php
require 'db_functions.inc.php';
?>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel='stylesheet' type='text/css' href='styles.css'>

</head>
<body>
  <?php
    echo "Hello World!<br>";
    $tab = get_full_table($db_config, 'test_table');
    echo "</br>Bye World....";

  ?>

  <form id="frm1">
    Table name: <input type="text" value="test_table" id="tname"><br>
    <input type="submit" value="Display table">
  </form>
  <div id='tableBox'></div>

  <script type="text/javascript">

$(document).ready(function() {

  $('#frm1').on('submit', function(e) {
    console.log(e);
    $.ajax({
      url: '/finance/foo.php', // this returns an application/json response...
      cache: false,
      data: {
        tableName: $('#tname').val()
      }
    }).done(drawTable);

    return false;
  });

});

    function drawTable(table) {
      var
        headers = table['headers'],
        rows = table['data'],
        cols = '';

      for (var header of headers){
        cols += '<th>'+ header + '</th>';
      }
      var emptyTable = "<table id='transData'><thead><tr>" + cols + "</tr></thead><tbody></tbody></table>"
      $('#tableBox').empty();
      $('#tableBox').append(emptyTable);

      for (var row of rows){
        var rowHTML = '';
        for (var col of headers){
          rowHTML += "<td>" + row[col] + "</td>";
        }
        console.log(rowHTML);
        $("#transData tbody").append('<tr>' + rowHTML + '</tr>'); //this will append tr element to table... keep its reference for a while since we will add cels into it
      }
    }


  </script>
</body>
