<?php
include 'dbc.php';

$result = null;

if (isset($_GET['search_name'])) {
    $search = $_GET['search_name'];
    $sql = "SELECT * FROM customers WHERE customer_name LIKE '%$search%'";
    $result = mysqli_query($connection, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page 6 - Search Customer Name</title>
</head>
<body>
    <a href="index.php">Home</a>
    <h2>Search Customers by Name</h2>
    <form method="GET" action="page6.php">
        <input type="text" name="search_name" placeholder="Enter customer name..." required>
        <button type="submit">Search</button>
    </form>
    <br>
    <?php if ($result) { ?>
        <h3>Search Results:</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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