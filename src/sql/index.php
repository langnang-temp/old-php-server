<?php

$_SQL = [];

$_SQL['$'] = [
  "select_list" => function () {
  },
  "select_count" => function ($sql) {
    $sql = trim($sql);
    $sql = substr($sql, -1) == ";" ? substr($sql, 0, -1) : $sql;
    return "SELECT COUNT(*) AS `COUNT` FROM (" . ($sql) . ") AS T_COUNT";
  },
  "select_exist" => function () {
  }
];
$_SQL['api'] = [];
require_once __DIR__ . "/api/sql.php";
