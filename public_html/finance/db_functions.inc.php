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

function addTestRows($opts, $info){
  $db = get_database($opts);
  $statement = $db->prepare("INSERT INTO test_table VALUES (:col_a, :col_b)");  // foreach ($info['csvFormData']['data'] as $row) {
  foreach ($info['csvFormData']['data'] as $row) {
     if(count($row) == 2){
     $statement->execute(array(
         "col_a"=> $row[0],
         "col_b"=> (int)($row[1])
       ));
     }
   }
}

function addRbsRows($opts, $info){
  $db = get_database($opts);
  $statement = $db->prepare("INSERT INTO rbs_current VALUES (null, :date_col, :type_col, :desc_col, :val_col)");
  foreach ($info['csvFormData']['data'] as $row) {
     if(count($row) == 4){
     $statement->execute(array(
         "date_col"=> $row[0],
         "type_col"=> $row[1],
         "desc_col"=> $row[2],
         "val_col"=> (float)($row[3])
       ));
     }
   }
}
