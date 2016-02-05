<?php
require 'db_functions.inc.php';

header('Content-Type: application/json');

$tableName = $_GET[tableName];

$output = $tableConfig[$tableName]['sqlColumns'];

echo json_encode($output);
