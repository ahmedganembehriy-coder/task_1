<?php
include 'dbc.php';

$result = null;

if (isset($_GET['min_quantity'])) {
    $min_qty = $_GET['min_quantity'];
    $sql = "SELECT products.product_name, SUM(order_items.quantity) AS total_qty 
            FROM products 
            JOIN order_items ON products.product_id = order_items.product_id 
            GROUP BY products.product_id 
            HAVING total_qty > $min_qty";
            
    $result = mysqli_query($connection, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 8 - Products by Total Sold</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Filter Products by Minimum Sold Quantity</h2>

    <form method="GET" action="page8.php">
        <input type="number" name="min_quantity" min="100" max="5000" placeholder="Enter value (100 - 5000)" required>
        <button type="submit">Filter</button>
    </form>

    <br>

    <?php if ($result) { ?>
        <h3>Products with Total Sold > <?php echo $_GET['min_quantity']; ?>:</h3>
        <table border="1">
            <tr>
                <th>Product Name</th>
                <th>Total Sold Quantity</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['total_qty']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

</body>
</html>