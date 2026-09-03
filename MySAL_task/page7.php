<?php
include 'dbc.php';
$cities_result = mysqli_query($connection, "SELECT * FROM cities");

$customers_result = null;
if (isset($_GET['city_id'])) {
    $city_id = $_GET['city_id'];
    $sql = "SELECT * FROM customers 
            WHERE city_id = $city_id 
            ORDER BY customer_name ASC";
    $customers_result = mysqli_query($connection, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 7 - Customers by City</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Select City to View Customers</h2>

    <form method="GET" action="page7.php">
        <select name="city_id" required>
            <option value="">-- Choose City --</option>
            <?php while ($city = mysqli_fetch_assoc($cities_result)) { ?>
                <option value="<?php echo $city['city_id']; ?>">
                    <?php echo $city['city_name']; ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit">Submit</button>
    </form>
    <br>
    <?php if ($customers_result) { ?>
        <h3>Customers in Selected City (Sorted by Name):</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($customers_result)) { ?>
                <tr>
                    <td><?php echo $row['customer_id']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

</body>
</html>