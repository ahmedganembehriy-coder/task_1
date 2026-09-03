<?php
include 'dbc.php';

$sql = "SELECT * FROM customers WHERE salary > 20000";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 1</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Customers with Salary > 20000</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Salary</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['salary']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>