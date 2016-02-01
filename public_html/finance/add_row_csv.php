<?php
  require 'db_functions.inc.php';

  header('Content-Type: application/json');

  $posted_csv = $_POST;

  switch($posted_csv['tableName']){
    case 'test_table':
      addTestRows($db_config, $posted_csv);
      break;
     case 'rbs_current':
      addRbsRows($db_config, $posted_csv);
      break;
    case 'homeBudgetExpense':
      addHBExpense($db_config, $posted_csv);
      break;
    case 'homeBudgetIncome':
      addHBIncome($db_config, $posted_csv);
      break;
  }

  $table = get_full_table($db_config, $posted_csv['tableName']);

  echo json_encode($table);
