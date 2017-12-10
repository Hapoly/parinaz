<?php

$table_name = "users";
/*
  type:       VARCHAR, INT, text
  length:     a non-negative number
  default:    Null, None, as_defined(some vars), CURRENT_TIMESTAMP
  collation:  the standard collation text
  attributes: the standard attribute text
  null:       true/false
  index:      the standard index text
  AI:         true/false
  comment:    text
*/
$model = [
  "id" => [
    "type"        => "INT",
    "length"      => NULL,
    "default"     => "None",
    "collation"   => NULL,
    "attributes"  => NULL,
    "index"       => "PRIMARY",
    "AI"          => true,
    "null"        => false,
    "comment"     => "the primary id"
  ],
  "username" => [
    "type"        => "VARCHAR",
    "length"      => "32",
    "default"     => "None",
    "collation"   => NULL,
    "attributes"  => NULL,
    "index"       => NULL,
    "AI"          => false,
    "null"        => false,
    "comment"     => "username"
  ],
  "password" => [
    "type"        => "varchar",
    "length"      => "32",
    "default"     => "None",
    "collation"   => NULL,
    "attributes"  => NULL,
    "index"       => NULL,
    "AI"          => false,
    "null"        => false,
    "comment"     => "password"
  ],
  "status" => [
    "type"        => "int",
    "length"      => "1",
    "default"     => 1,
    "collation"   => NULL,
    "attributes"  => NULL,
    "index"       => NULL,
    "AI"          => false,
    "null"        => false,
    "comment"     => "1: active, 2: deactive"
  ]
];