<?php
require_once('config.php');
require_once('model.php');
require_once('./libs/model_sync.php');

sync_model($conn, $model);
$page = 0;
if(isset($_GET['page']))
  $page = $_GET['page'];

$select_query = "SELECT * FROM `$table_name` WHERE 1 LIMIT 10 OFFSET " . ($page*10);
$stmt = $conn->prepare($select_query); 
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
require_once('./header.php');
?>
<div class="container" style="margin-top:50px;">
  <div class="panel panel-default text-center">
    <div class="panel-body">
      <table class="table table-striped">
          <thead>
          <tr>
            <?php
              foreach($model as $field_title => $field_config)
                if($field_config['visible_in_list'])
                  echo '<th>'. $field_config['title'] .'</th>';
            ?>
            <th>operations</th>
          </tr>
          </thead>
          <tbody>
          <?php
            foreach($stmt->fetchAll() as $row) { 
              echo "<tr>";
              foreach($model as $field_title => $field_config){
                if($field_config['visible_in_list']){
                  if($field_config['input_type'] == 'select'){
                    $value = $row[$field_title];
                    foreach($field_config['options'] as $option)
                      if($option['value'] = $value)
                        $value = $option['title'];
                    
                        echo '<td>'. $value .'</td>';
                  }else{
                    echo '<td>'. $row[$field_title] .'</td>';
                  }
                }
              }
              echo "
                  <td>
                    <a href='http://localhost/test/edit.php?id=". $row['id'] ."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                    <a href='http://localhost/test/remove.php?id=". $row['id'] ."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                  </td>  
                </tr>
              ";
            }
          ?>
          </tbody>
      </table>
    </div>
  </div>
<?php
$count_query = 'SELECT COUNT(*) FROM `users` WHERE 1';
$stmt = $conn->prepare($count_query); 
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
$count = 0;
foreach($stmt->fetchAll() as $row) { 
  $count = $row['COUNT(*)'];
}
if($count > 10){
  echo '
    <div class="row" style="text-align: center" >
      <ul class="pagination">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
      </ul>
    </div>
  ';
}
?>
</div>
<?php
require_once('./footer.php');
$conn = null;
?>