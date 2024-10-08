<?php
// Include database connection file
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['Item_name'];
    $client_id = $_POST['Client_id'];
    $description = $_POST['description'];
    $asking_price = $_POST['asking_price'];
    $condition = $_POST['condition'];

    // Prepare and bind
    $query = "INSERT INTO Items (Client_id, Item_name, Item_description, Asking_price, Condition, Comments) VALUES ('$Client', '$Item_name', '$description', '$asking_price', '$condition', '$comments')";
    $result = mysqli_query($conn, $query);

    // Check if the query is executed
    if ($result) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .Back {
            text-align: right;
        }
        .Back > button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 16px 8px;
            border: none;
            cursor: pointer;
            width: 100px;
            border-radius: 5px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #client_id {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="Back">
        <button onclick="window.location.href='insert.php'">Back</button>
    </div>

    <div class="container">
        <h2>Add New Item</h2>
        <form method="post" action="">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="Item_name" required>
            
            <label for="client_id">Client ID:</label>
            <select id="client_id" name="Client_id" required>
                <option value="">Select Client</option>
                <?php
                if  ($query = "SELECT Client_id, Lastname, First_name FROM Client")
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)) {

                    echo "<option value='" . $row['Client_id'] . "'>" . $row['Lastname'] . ", " . $row['First_name'] . "</option>";
                
                }
                ?>
            </select>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            
            <label for="asking_price">Asking Price:</label>
            <input type="number" id="asking_price" name="asking_price" step="0.01" required>
            
            <label for="condition">Condition:</label>
            <input type="text" id="condition" name="condition" required>
            
            <input type="submit" value="Add Item">
        </form>
    </div>
</body>
</html>