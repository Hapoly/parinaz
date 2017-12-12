<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand " href="#" style="text-align:center">WebSiteName</a>
            </div>
            <form class="navbar-form navbar-right">
            <button type="submit" class="btn btn-default">new</button>
        </div>
    </nav>

<div class="container" style="margin-top:50px;">

 <div class="panel panel-default text-center">
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>password</th>
                <th>status</th>
                <th>operations</th>
            </tr>
            </thead>
            <tbody>
                <?php
                     $db_servername = "localhost";
                     $db_username = "root";
                     $db_password = "sadaf";
                     $db_dbname = "panel";
     
     
     
                     try {
                         $conn = new PDO("mysql:host=$db_servername;dbname=$db_dbname", $db_username, $db_password);
                         // set the PDO error mode to exception
                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                         $stmt = $conn->prepare("SELECT * FROM user"); 
                         $stmt->execute();
                         $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                         $rows = $stmt->fetchAll();
                         foreach($rows as $row){
                             echo "
                             <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['password'] . "</td>
                                <td>" . $row['status'] . "</td>
                                <td>
                                    <a href='http://localhost/test/edit.php?id=" . $row['id'] . "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                    <a href='http://localhost/test/remove.php?id=" . $row['id'] . "'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                </td>

                            </tr>
                             ";
                         }
                        }
                        catch(PDOException $e)
                            {
                            echo "Error: " . $e->getMessage();
                            }
                        $conn = null;     
                    ?>
            </tbody>
        </table>
        </div>
        </div>
      </div>

        <div class="container" style="text-align:center;margin-top:40px;">
            <ul class="pagination">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
        </div>
        <div class="footer">
        <p>design by hapoly</p>
        </div>
    </body>
 
</html>