<?php
  require 'db_functions.inc.php';

  header('Content-Type: application/json');

  $posted_csv = $_POST;
  addCSVRows($db_config, $posted_csv);

  $table = get_full_table($db_config, $posted_csv['tableName']);

  echo json_encode($table);
