<!DOCTYPE html>
<html>
    <body>
        <?php
            $servername = "localhost";
            $username = "id21444640_username";
            $password = "Password_1";
            $dbname = "id21444640_localhost";

            //Create a connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check the connection status
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "Connection was successful";
        ?>
    </body>
</html>