<?php

require 'db_functions.inc.php';

?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <script type="text/javascript">
$(document).ready(function(){
  $.ajax({
    url: '/finance/foo.php', // this returns an application/json response...
    cache: false
  }).done(function(data){ // ...jquery knows to automatically decode it for us
    console.log(data);
  });
});
  </script>

</head>
<body>
  <?php
  echo "Hello World!<br>";

$tab = get_full_table($db_config, 'test_table');
foreach($tab['headers'] as $head){
  echo $head;
}
echo '</br>';

foreach ($tab['data'] as $row) {
  print_r($row);
  print_r('</br>');
}

echo "</br>Bye World....";

?>
</body>
