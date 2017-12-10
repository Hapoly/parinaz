<?php

function generate_columns (){
  global $model;
  $columns = [];
  foreach($model as $key=>$value){
    $col = [];
    array_push($col, "`$key`");

    if($value['length'])
      array_push($col, $value['type'] . "(" . $value['length'] . ")");
    else
      array_push($col, $value['type']);

    if(!$value['null'])
      array_push($col, 'NOT NULL');
    
    if($value['default'] != 'None'){
      if($value['default'] == "CURRENT_TIMESTAMP")
        array_push($col, 'default CURRENT_TIMESTAMP');
      else if($value['default'] == 'NULL')
        array_push($col, 'default NULL');
      else
        array_push($col, "default '". $value['default'] ."'");
    }

    if($value['collation']){
      $char_set = explode('_', $value['collation'])[0];
      $collat = $value['collation'];
      array_push($col, "CHARACTER SET $char_set COLLATE $collat");
    }

    if($value['attributes']){
      $attributes = $value['attributes'];
      array_push($col, $attributes);
    }
    
    if($value['AI']){
      array_push($col, "AUTO_INCREMENT");
    }

    if($value['comment']){
      $comment = $value['comment'];
      array_push($col, "COMMENT '$comment'");
    }

    if($value['index']){
      $index = $value['index'];
      if($index == 'PRIMARY')
        array_push($columns, "PRIMARY KEY (`$key`)");
      else if($index == 'UNIQUE')
        array_push($columns, "UNIQUE `unique_$table_name_$key` (`$key`)");
      else if($index == 'INDEX')
        array_push($columns, "INDEX `index_$table_name_$key` (`$key`)");
      else if($index == 'FULLTEXT')
        array_push($columns, "FULLTEXT `fulltext_$table_name_$key` (`$key`)");
      else if($index == 'SPATIAL')
        array_push($columns, "SPATIAL `spatial_$table_name_$key` (`$key`)");
    }
    array_push($columns, implode(' ', $col));
  }
  return implode(',', $columns);
}

function sync_model(){
  global $model;
  global $table_name;
  global $conn;
  global $dbname;

  $columns = generate_columns();
  $query = "CREATE TABLE IF NOT EXISTS `$dbname`.`$table_name` ( $columns ) ENGINE = InnoDB;";

  return $query;
}