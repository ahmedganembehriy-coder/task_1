<?php
include 'dbc.php';

$total_times = 0;
$orders_list = [];
$customers_result = null;

if (isset($_GET['product_id'])) {
    $p_id = $_GET['product_id'];

    $sql1 = "SELECT SUM(quantity) AS total_sold FROM order_items WHERE product_id = $p_id";
    $res1 = mysqli_query($connection, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $total_times = $row1['total_sold'] ? $row1['total_sold'] : 0;
    $sql2 = "SELECT DISTINCT order_id FROM order_items WHERE product_id = $p_id";
    $res2 = mysqli_query($connection, $sql2);
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $orders_list[] = $row2['order_id'];
    }
    $sql3 = "SELECT DISTINCT customers.customer_name, customers.salary 
            FROM order_items 
            JOIN orders ON order_items.order_id = orders.order_id 
            JOIN customers ON orders.customer_id = customers.customer_id 
            WHERE order_items.product_id = $p_id 
            ORDER BY customers.salary DESC";
    $customers_result = mysqli_query($connection, $sql3);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 10 - Product Details</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Product Sales Details</h2>

    <form method="GET" action="page10.php">
        <input type="number" name="product_id" placeholder="Enter Product ID..." required>
        <button type="submit">Search</button>
    </form>

    <br>

    <?php if (isset($_GET['product_id'])) { ?>
        <p><b>1. Total Times Sold (Quantity):</b> <?php echo $total_times; ?></p>
        
        <p><b>2. Order IDs:</b> 
            <?php echo !empty($orders_list) ? implode(', ', $orders_list) : 'None'; ?>
        </p>

        <h3>3. Customers Bought This Product (Richest to Poorest):</h3>
        <table border="1">
            <tr>
                <th>Customer Name</th>
                <th>Salary</th>
            </tr>
            <?php 
            if ($customers_result && mysqli_num_rows($customers_result) > 0) {
                while ($c = mysqli_fetch_assoc($customers_result)) { ?>
                    <tr>
                        <td><?php echo $c['customer_name']; ?></td>
                        <td><?php echo $c['salary']; ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr><td colspan="2">No customers found</td></tr>
            <?php } ?>
        </table>
    <?php } ?>

</body>
</html>