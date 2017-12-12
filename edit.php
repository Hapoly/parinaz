<html>
    <head>

    </head>
    <body>
    <?php
        $db_servername = "localhost";
        $db_username = "root";
        $db_password = "sadaf";
        $db_dbname = "panel";

        try {
            $conn = new PDO("mysql:host=$db_servername;dbname=$db_dbname", $db_username, $db_password);
            // set the PDO error mode to exception
            if(isset($_POST['edit']) && isset($_GET['id'])){
                $sql = "UPDATE user SET username='". $_POST['username'] ."', password='". $_POST['password'] ."', status='". $_POST['status'] ."' WHERE id=" . $_GET['id'];
                $conn->query($sql);
                echo 'user updated';
            }
            if(isset($_GET['id'])){
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM user WHERE id=" . $_GET['id']); 
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                $rows = $stmt->fetchAll();
                if(sizeof($rows)){
                    echo "
                    <form method='post'>
                        <div><input name='username' placeholder='username' value='". $rows[0]['username'] ."'/></div>
                        <div><input name='password' placeholder='password' value='". $rows[0]['password'] ."'/></div>
                        <div><input name='status' placeholder='status' value='". $rows[0]['status'] ."'/></div>
                        <button type='submit' name='edit' >edit</button>
                    </form>
                    ";
                }else{
                    echo 'user not found';
                } 
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;     
    ?>
    </body>
</html>