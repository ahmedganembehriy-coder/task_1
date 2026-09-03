<?php
include 'dbc.php';

$sql = "SELECT products.product_name, 
               SUM(order_items.quantity) AS total_sold, 
               SUM(order_items.quantity * products.price) AS total_profit 
        FROM products 
        JOIN order_items ON products.product_id = order_items.product_id 
        GROUP BY products.product_id 
        ORDER BY total_sold DESC";

$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 4 - Top Selling Products</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Top Selling Products</h2>

    <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Total Sold Quantity</th>
            <th>Total Revenue</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['total_sold']; ?></td>
                <td><?php echo $row['total_profit']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>