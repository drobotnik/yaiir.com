<?php
  require 'db_functions.inc.php';

  header('Content-Type: application/json');

  $posted_csv = $_POST;
  
  addRows($db_config, $tableConfig, $posted_csv);

  $table = get_full_table($db_config, $posted_csv['tableName'], $posted_csv['profileId']);

  echo json_encode($table);
