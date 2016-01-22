<?php

require 'db_functions.inc.php';

$table = get_full_table($db_config, $_GET['tableName']);

header('Content-Type: application/json'); // Tell the browser that we are sending it JSON data and not HTML (the default for php)
echo json_encode($table);
