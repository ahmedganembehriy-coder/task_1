<?php
include 'dbc.php';
$sql = "SELECT e.name AS employee_name, m.name AS manager_name 
        FROM employees e 
        LEFT JOIN employees m ON e.manager_id = m.employee_id";
$result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page 5 - Employees and Managers</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Employees and Their Managers</h2>

    <table border="1">
        <tr>
            <th>Employee Name</th>
            <th>Manager Name</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['employee_name']; ?></td>
                <td><?php echo $row['manager_name'] ? $row['manager_name'] : 'No Manager (Top Boss)'; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>