<?php
require_once('config.php');
require_once('model.php');
require_once('columns.php');
require_once('./libs/model_sync.php');

sync_model($conn, $model);

$count_query = 'SELECT COUNT(*) FROM `users` WHERE 1';
$stmt = $conn->prepare($count_query); 
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
$count = 0;
foreach($stmt->fetchAll() as $row) { 
  $count = $row['COUNT(*)'];
}

$select_query = "SELECT * FROM `$table_name` WHERE 1";
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
              foreach($columns_definition as $column_def)
                echo '<th>'. $column_def['title'] .'</th>';
            ?>
            <th>operations</th>
          </tr>
          </thead>
          <tbody>
          <?php
            foreach($stmt->fetchAll() as $row) { 
              echo "<tr>";
              for($i=0; $i<sizeof($columns_definition); $i++){
                $column_def = $columns_definition[$i];
                $value = $row[$column_def['column']];
                if($column_def['enum']){
                  echo '<td>'. $column_def['enum'][$value] .'</td>';
                }else{
                  echo '<td>'. $value .'</td>';
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
</div>
<div class="container" style="text-align:center;margin-top:40px;">
    <ul class="pagination">
      <?php
        if($count > 10){
          echo '
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          ';
        }
      ?>
    </ul>
</div>
<?php
require_once('./footer.php');
$conn = null;
?>