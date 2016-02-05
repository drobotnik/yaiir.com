<?php

$db_config = array(
  'hostname'=>"localhost",
  'username'=>"yahia_dba",
  'password'=>"password",
  'dbname'=>"yahiabase"
);

$tableConfig = array(
  'rbs_current'=> array(
    'rowCount'=>4,
    'sqlColumns'=> array("date_col", "type_col", "desc_col", "val_col", "profile_id")
  ),
  'homeBudgetExpense'=> array(
    'rowCount'=>7,
    'sqlColumns'=>array("date", "category", "subcategory", "value", "account", "payee", "notes", "profile_id")
  ),
  'homeBudgetIncome'=> array(
    'rowCount'=>5,
    'sqlColumns'=>array("date", "category", "value", "account", "notes", "profile_id")
  )
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

function get_full_table($opts, $table_name, $profileId){
  $db = get_database($opts);
  $statement = $db->query("SELECT * FROM $table_name WHERE profile_id=$profileId");
  return array(
    'headers' => get_columns($statement),
    'data' => $statement->fetchAll( PDO::FETCH_ASSOC )
  );
}

function addRows($opts, $tableInfo, $info){
  $tableName = $info['tableName'];
  $csvData = $info['csvFormData']['data'];
  $tableInfo = $tableInfo[$tableName];
  $db = get_database($opts);
  $statement = $db->prepare("INSERT INTO ".$tableName." VALUES (null, ".prepareColumnNames($tableInfo['sqlColumns']).")");
  foreach ($csvData as $row) {
    if(count($row) == $tableInfo['rowCount']){
      $prepedStatement = prepareInsertStatement($row, $tableInfo['sqlColumns'], $info['profileId']);
      $statement->execute($prepedStatement);
    }
  }
}

function prepareColumnNames($sqlColumnArray){
  $prepColumns = array();
  $sqlColumnString = '';
  $format = ':%s';
  foreach ($sqlColumnArray as $col) {
    array_push($prepColumns, sprintf($format, $col));
  }
  return implode(', ', $prepColumns);
}

function prepareInsertStatement($row, $sqlColumns, $profileId){
  $output = array();
  for ($i=0; $i < count($row); $i++) {
    $output[$sqlColumns[$i]] = $row[$i];
  }
  $output['profile_id'] = $profileId;
  return $output;

}
