<?php
include 'dbc.php';


$sql = "SELECT customers.customer_name, COUNT(orders.order_id) AS total_orders 
        FROM customers 
        LEFT JOIN orders ON customers.customer_id = orders.customer_id 
        GROUP BY customers.customer_id";

$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 3 - Customer Orders</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Total Orders Per Customer</h2>

    <table border="1">
        <tr>
            <th>Customer Name</th>
            <th>Total Orders</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['total_orders']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>