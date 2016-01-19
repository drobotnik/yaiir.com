<head>
</head>
<body>
  <?php
  echo "Hello World!<br>";

$config = array(
'hostname'=>"localhost",
'username'=>"yahia_dba",
'password'=>"password",
'dbname'=>"yahiabase",
'table_name'=>'test_table'
);

function get_columns($database){
  $columns =  array();
  $rs = $database;
  for ($i = 0; $i < $rs->columnCount(); $i++) {
      $col = $rs->getColumnMeta($i);
      array_push($columns, $col['name']);
  }
  return $columns;

}

function get_full_table($opts, $table_name){
  $conn_str = 'mysql:host='.$opts['hostname'].';dbname='.$opts['dbname'].';charset=utf8';
  $db = new PDO($conn_str,
  $opts['username'],
  $opts['password']);
  $result = $db -> query('SELECT * FROM '.$table_name);
  return array(get_columns($result), $result);
}

$tab = get_full_table($config, 'test_table');
foreach($tab[0] as $head){
  echo $head;
}
echo '</br>';

foreach ($tab[1] as $row) {
  print_r($row);
  print_r('</br>');
}

echo "</br>Bye World....";

?>
</body>
