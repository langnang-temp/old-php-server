<?php

$_SQLL[pathinfo(__DIR__)['filename']][pathinfo(__FILE__)['filename']] = [
  "select_table_list" => function ($conn) {
    return "SELECT * FROM `INFORMATION_SCHEMA`.`TABLES` 
    WHERE `TABLE_SCHEMA` = '{$conn->getParams()['dbname']}'
      AND `TABLE_TYPE` = 'BASE TABLE'
    ;";
  },
  "select_table_info" => function ($conn) {
    return "SELECT * FROM `INFORMATION_SCHEMA`.`TABLES` 
      WHERE `TABLE_SCHEMA` = '{$conn->getParams()['dbname']}'
        AND `TABLE_NAME` = '{$_GET['table_name']}'
    ;";
  },
  "select_column_list" => function ($conn) {
    return "SELECT * FROM `INFORMATION_SCHEMA`.`COLUMNS` 
    WHERE `TABLE_SCHEMA` = '{$conn->getParams()['dbname']}'
      AND `TABLE_NAME` = '{$_GET['table_name']}'
    ;";
  },
  "select_column_info" => function ($conn) {
    return "SELECT * FROM `INFORMATION_SCHEMA`.`COLUMNS` 
    WHERE `TABLE_SCHEMA` = '{$conn->getParams()['dbname']}'
      AND `TABLE_NAME` = '{$_GET['table_name']}'
      AND `COLUMN_NAME` = '{$_GET['column_name']}'
    ;";
  },
];
