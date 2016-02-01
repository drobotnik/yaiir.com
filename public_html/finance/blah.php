<html>
<head>
</head>
<body>
hi
<?php

  $thing = 1;

  echo "string";

  function f1($inp){
    return 'poo' . $inp;
  }

  function f2(){
    return f1();
  }




  echo f2($thing);
?>

</body>
</html>
