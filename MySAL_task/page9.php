<?php
include 'dbc.php';

$result = null;

if (isset($_GET['city_name'])) {
    $city = $_GET['city_name'];
    $sql = "SELECT customers.*, cities.city_name 
            FROM customers 
            JOIN cities ON customers.city_id = cities.city_id 
            WHERE cities.city_name LIKE '%$city%' 
            ORDER BY customers.salary DESC 
            LIMIT 3";
            
    $result = mysqli_query($connection, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 9 - Top 3 Richest</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Top 3 Richest Customers in a City</h2>

    <form method="GET" action="page9.php">
        <input type="text" name="city_name" placeholder="Enter city name..." required>
        <button type="submit">Search</button>
    </form>

    <br>

    <?php if ($result) { ?>
        <h3>Top 3 Richest People:</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>City</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['customer_id']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['city_name']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

</body>
</html>