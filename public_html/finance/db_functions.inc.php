<?php

$db_config = array(
  'hostname'=>"localhost",
  'username'=>"yahia_dba",
  'password'=>"password",
  'dbname'=>"yahiabase"
);

function get_database($opts){
  $conn_str = 'mysql:host='.$opts['hostname'].';dbname='.$opts['dbname'].';charset=utf8';
  $db = new PDO($conn_str, $opts['username'], $opts['password']);
  return $db;
}

function get_columns($table){
  $columns =  array();
  $rs = $table;
  for ($i = 0; $i < $rs->columnCount(); $i++) {
    $col = $rs->getColumnMeta($i);
    array_push($columns, $col['name']);
  }
  return $columns;
}

function get_full_table($opts, $table_name){
  $db = get_database($opts);
  $statement = $db->query('SELECT * FROM '.$table_name);
  return array(
    'headers' => get_columns($statement),
    'data' => $statement->fetchAll( PDO::FETCH_ASSOC )
  );
}

function addRow($opts, $info){
  $db = get_database($opts);
  $statement = $db->prepare("INSERT INTO test_table(col_a, col_b)
    values(:colA, :colB)");
  $statement->execute(array(
    "colA"=> $info['col_a'],
    "colB"=> (int)$info['col_b']
  ));
}

function addCSVRow($opts, $info){
  $search_string = "INSERT INTO ". $info['tableName']." (col_a, col_b) values(:colA, :colB)";
  $db = get_database($opts);
  $statement = $db->prepare($search_string);
  $statement->execute(array(
    "colA"=> $info['csvFormData'][0],
    "colB"=> (int)($info['csvFormData'][1])
  ));
}
