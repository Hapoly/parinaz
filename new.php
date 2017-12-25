<?php
  require_once('config.php');
  require_once('model.php');
  require_once('columns.php');
  require_once('./libs/model_sync.php');

  sync_model($conn, $model);
  require_once('./header.php');
?>
<div class="container" style="margin-top:50px;">
  <div class="panel panel-default text-center">
    <div class="panel-heading">
      new record
    </div>
    <div class="panel-body">
      <form method="POST">
        <?php
          foreach($model as $field_title => $field_config){
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
        <button type="submit" name="save" value="do_save" class="btn btn-primary">save</button>
      </form>
    </div>
  </div>
</div>

<?php
if(isset($_POST['save'])){
  foreach($model as $field_title=>$field_config){
    $value = $_POST[$field_title];
    
  }
}
/*
  ================================
              footer
  ================================
*/
  require_once('./footer.php');
  $conn = null;
?>