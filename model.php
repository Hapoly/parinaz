<?php

$table_name = "users";
/*
  type:       VARCHAR, INT, TEXT
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
    "comment"     => "the primary id",

    // inputs in edit and new page
    "title"       => "the primary id",
    "placeholder" => "you can left this field null",
    "input_type"  => "number",
    
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
    "comment"     => "username",
    
    // inputs in edit and new page
    "title"       => "Username",
    "placeholder" => "admin",
    "input_type"  => "number"
  ],
  "password" => [
    "type"        => "VARCHAR",
    "length"      => "32",
    "default"     => "None",
    "collation"   => NULL,
    "attributes"  => NULL,
    "index"       => NULL,
    "AI"          => false,
    "null"        => false,
    "comment"     => "password",
    
    // inputs in edit and new page
    "title"       => "Password",
    "placeholder" => "passwrod",
    "input_type"  => "password"
  ],
  "status" => [
    "type"        => "INT",
    "length"      => "1",
    "default"     => 1,
    "collation"   => NULL,
    "attributes"  => NULL,
    "index"       => NULL,
    "AI"          => false,
    "null"        => false,
    "comment"     => "1: active, 2: deactive",
    
    // inputs in edit and new page
    "title"       => "Status",
    "input_type"  => "select",
    "options"     => [
      [ "value" => 1, "title" => "active"],
      [ "value" => 2, "title" => "inactive"],
    ]
  ]
];