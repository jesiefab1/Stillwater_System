<?php
    include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Menu</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .nav-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #333;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .nav-menu li {
            float: left;
        }
        .nav-menu li a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
            transition: background-color 0.3s ease;
        }
        .nav-menu li a:hover {
            background-color: #575757;
        }
        .nav-menu li a.active {
            background-color: #4CAF50;
        }
        .Display_table {
            margin: auto;
            margin-top: 40px;
        }
        .Display_table th {
            background-color: #333;
            color: white;
            padding: 10px 20px 10px 20px;
        }
        .outputs td {
            text-align: center;
        }

    </style>
</head>
<body>
    <ul class="nav-menu">

        <li><a href="client.php" class="active">Client</a></li>
        <li><a href="item.php">Item</a></li>
        <li><a href="purchases.php">Purchases</a></li>
        <li><a href="sales.php">Sales</a></li>

    </ul>

        <div style="text-align: right; margin: 20px;">
            <button onclick="window.location.href='insert.php'" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease, transform 0.3s ease;">
            Add
            </button>
        </div>
        <script>
            document.querySelector('button').addEventListener('mouseover', function() {
            this.style.backgroundColor = '#45a049';
            this.style.transform = 'scale(1.05)';
            });
            document.querySelector('button').addEventListener('mouseout', function() {
            this.style.backgroundColor = '#4CAF50';
            this.style.transform = 'scale(1)';
            });
        </script>

    <table class="Display_table">
        <tr>

            <th>Client id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone Number</th>

        </tr>
        <?php

        $query = "SELECT * FROM Client";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)) {

        ?>

        <tr class="outputs">
            <td><?php echo $row['Client_id']; ?></td>
            <td><?php echo $row['First_name']; ?></td>
            <td><?php echo $row['Lastname']; ?></td>
            <td><?php echo $row['Phone_number']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Address']; ?></td>
        </tr>

        <?php
        }
        ?>
    </table>
</body>
</html>