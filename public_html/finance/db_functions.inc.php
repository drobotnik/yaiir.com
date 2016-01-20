<?php

$db_config = array(
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
  $db = new PDO($conn_str, $opts['username'], $opts['password']);
  $statement = $db->query('SELECT * FROM '.$table_name);
  return array(
    'headers' => get_columns($statement),
    'data' => $statement->fetchAll( PDO::FETCH_ASSOC )
  );
}
