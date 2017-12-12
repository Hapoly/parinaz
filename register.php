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
<div class="row">
<div class="col-md-6 col-md-offset-3">
 <div class="panel panel-default text-center">
    <div class="panel-body">
        <div class="container">
                <form >
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>              
                </div>
                  
        <?php 
            if(isset($_POST['register'])){

                $db_servername = "localhost";
                $db_username = "root";
                $db_password = "sadaf";
                $db_dbname = "panel";



                try {
                    $conn = new PDO("mysql:host=$db_servername;dbname=$db_dbname", $db_username, $db_password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    // prepare sql and bind parameters
                    $stmt = $conn->prepare("INSERT INTO user (username, password, status) 
                    VALUES (:username, :password, :status)");
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':status', $status);
                
                    // insert a row
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $status = $_POST['status'];
                    $stmt->execute();
                    echo "New records created successfully";
                    }
                catch(PDOException $e)
                    {
                    echo "Error: " . $e->getMessage();
                    }
                $conn = null;
            }
        ?>
         </div>
 </div>
</div>
     </div>
</div>

    </body>
</html>