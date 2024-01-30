<!DOCTYPE html>
<?php
include('connect.php');
// $conn = new mysqli($servername, $username, $password, $dbname);
$productName = "lamp";
$sql = "SELECT stock FROM Inventory WHERE name = '$productName' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
}
    
    // Output the stock within the HTML structure
    $stock = $row["stock"];
    
$productName1 = "bed";
$sql1 = "SELECT stock FROM Inventory WHERE name = '$productName1' LIMIT 1";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) {
    // Fetch the result as an associative array
    $row1 = $result1->fetch_assoc();
}
$stock1 = $row1["stock"];
    
if(isset($_POST['Buy_Now'])) {
    mysqli_select_db($conn, $dbname);
    $query = "UPDATE Inventory SET stock = stock - 1 WHERE name = 'Lamp'";
    mysqli_query($conn, $query);
    $query1 = "UPDATE Inventory SET stock = stock - 1 WHERE name = 'Bed'";
    mysqli_query($conn, $query1);
    header("location:Purchase_Confirmation.php");
}
//     if(isset($_POST['button1'])) {
//         $total = ;
//         echo $total;
// }
    $conn->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script>
        function button(buttonId) {
            // AJAX request to update the database
            // var xhr = new XMLHttpRequest();
            // xhr.open("POST", "updateCount.php", true);
            // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            // xhr.onreadystatechange = function() {
            //     if (xhr.readyState === 4 && xhr.status === 200) {
            //         console.log(xhr.responseText);  // You can handle the response as needed
            //     }
            // };

            // Send buttonId as a parameter
            // var params = "buttonId=" + encodeURIComponent(buttonId);
            //var params = buttonId;
            // xhr.send(params);
            
            event.preventDefault();
            var targetUL = document.getElementById('targetUL');
            var content;
            if (buttonId === 'button1') {
                content = 'Bedroom Lamp';
            } else {
                content = 'Bed';
            }
            var li = document.createElement('li');
            li.textContent = content;
            targetUL.appendChild(li);
        }
    </script>
</head>
<body>
    <h1>Welcome to the Furniture Store!</h1>
    <br>
    <br>
    <img src="Bedroom_Lamp.jpeg" alt="test">
    <h4>Bedroom Lamp</h4>
    <h4>Price: $119.99</h4>
    <h4>Left in Stock: <?php echo $stock; ?></h4>
    <p>This beautiful bedroom lamp that has a modern, but also cozy, ambiance will sit well on your nightstand.</p>
    <form method = "post">
            <!--<input type="submit" name="button1" value="Add to Cart">-->
            <!--<input type="submit" name="button1" onclick="button('button1')" value="Add to Cart">-->
            <input type="submit" name="button1" onclick="button('button1', event)" value="Add to Cart">
    </form>
    <img src ="Bed.jpeg">
    <h4>Bed</h4>
    <h4>Price: $399.99</h4>
    <h4>Left in Stock: <?php echo $stock1; ?></h4>
    <p>This comfortable and inviting bed will give you the proper rest and restoration you need after your long days.</p>
    <form method = "post">
        <input type="submit" name="button2" onclick="button('button2', event)" value="Add to Cart">
    </form>
    <hr>
    <h1>Your Cart</h1>
    <ul id="targetUL">
        
    </ul>
    <form method = "post">
            <input type="submit" name="Buy_Now" value="Buy Now">
    </form>
</body>
</html>