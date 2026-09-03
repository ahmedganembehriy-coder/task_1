<?php
include 'dbc.php';

$customer_data = null;

if (isset($_GET['customer_id'])) {
    $id = $_GET['customer_id'];
    $sql = "SELECT * FROM customers WHERE customer_id = $id";
    $result = mysqli_query($connection, $sql);
    $customer_data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 2 - Customer Info</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Search Customer by ID</h2>

    <form method="GET" action="page2.php">
        <input type="number" name="customer_id" placeholder="Enter Customer ID" required>
        <button type="submit">Search</button>
    </form>

    <br>

    <?php if ($customer_data) { ?>
        <h3>Customer Details:</h3>
        <p><b>ID:</b> <?php echo $customer_data['customer_id']; ?></p>
        <p><b>Name:</b> <?php echo $customer_data['name']; ?></p>
        <p><b>Salary:</b> <?php echo $customer_data['salary']; ?></p>
    <?php } else if (isset($_GET['customer_id'])) { ?>
        <p>Customer not found!</p>
    <?php } ?>

</body>
</html>