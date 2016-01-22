<?php

$db_config = array(
  'hostname'=>"localhost",
  'username'=>"yahia_dba",
  'password'=>"password",
  'dbname'=>"yahiabase"
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
  $db = new PDO($conn_str, $opts['username'], $opts['password']);
  $statement = $db->query('SELECT * FROM '.$table_name);
  return array(
    'headers' => get_columns($statement),
    'data' => $statement->fetchAll( PDO::FETCH_ASSOC )
  );
}

function addRow($opts, $info){
  $conn_str = 'mysql:host='.$opts['hostname'].';dbname='.$opts['dbname'].';charset=utf8';
  $db = new PDO($conn_str, $opts['username'], $opts['password']);
  $statement = $db->prepare("INSERT INTO test_table(col_a, col_b)
    values(:colA, :colB)");
  $statement->execute(array(
    "colA"=> $info['col_a'],
    "colB"=> (int)$info['col_b']
  ));
}
