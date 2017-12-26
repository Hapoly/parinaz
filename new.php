<?php
  require_once('config.php');
  require_once('model.php');
  require_once('./libs/model_sync.php');

  sync_model($conn, $model);
  require_once('./header.php');
?>
<div class="container" style="margin-top:50px;">
  <?php
    if(sizeof($_POST)){
      $column_names = [];
      $values = [];
      foreach($_POST as $key => $value){
        array_push($column_names, $key);
        array_push($values, "'$value'");
      }
      $sql = "INSERT INTO $table_name (". implode(', ', $column_names) .") VALUES (". implode(', ', $values) .")";
      $conn->query($sql);
      echo '<div class="alert alert-success" role="alert">item added successfully!</div>';
    }
  ?>
  <div class="panel panel-default text-center">
    <div class="panel-heading">
      new record
    </div>
    <div class="panel-body">
      <form method="POST">
        <?php
          foreach($model as $field_title => $field_config){
            if($field_config['AI'])
              continue;

            switch($field_config['input_type']){
              case 'email':
              case 'text':
              case 'password':
              case 'number':
                echo '
                  <div class="form-group left-align">
                    <label for="'. $field_title .'">'. $field_config['title'] .'</label>
                    <input type="'. $field_config['input_type'] .'" class="form-control" id="'. $field_title .'" name="'. $field_title .'" aria-describedby="emailHelp" placeholder="'. $field_config['placeholder'] .'">
                  </div>
                ';
                break;
              case 'select':
                echo '
                  <div class="form-group left-align">
                    <label for="'. $field_title .'">'. $field_config['title'] .'</label>
                    <select class="form-control" id="'. $field_title .'" name="'. $field_title .'">';
                foreach($field_config['options'] as $option){
                  echo '<option value="'. $option['value'] .'">'. $option['title'] .'</option>';
                }
                echo '
                    </select>
                  </div>
                ';
                break;
            }
          }
        ?>
        <button type="submit" class="btn btn-primary">save</button>
      </form>
    </div>
  </div>
</div>

<?php
/*
  ================================
              footer
  ================================
*/
  require_once('./footer.php');
  $conn = null;
?>