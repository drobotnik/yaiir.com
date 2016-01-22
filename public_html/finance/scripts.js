$(document).ready(function() {

  $('#frm1').submit(function() {
    $.get({
      url: '/finance/get_table.php', // this returns an application/json response...
      cache: false,
      data: {
        tableName: $('#tname').val()
      }

    }).done(drawTable);
    return false;
  });

  $('#frm2').submit(function(){
    console.log('click');
    $.post({
      url: "/finance/add_row.php",
      data: {
        'col_a': $('#strCol').val(),
        'col_b': $('#intCol').val(),
        'tableName': $('#tname').val()
      }
    }).done(function(post_resp){
      console.log('click2');
      drawTable(post_resp);
    });
    return false;
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

});
