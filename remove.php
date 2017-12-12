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
            if(isset($_GET['id'])){
                $sql = "DELETE FROM user WHERE id=" . $_GET['id'];
                $conn->query($sql);
                echo 'user removed';
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;     
    ?>
    </body>
</html>