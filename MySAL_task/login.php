<?php
session_start();
include 'dbc.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['customer_name'];
    $password = $_POST['password'];

    if (empty($name) || empty($password)) {
        $error = "Please fill in all fields!";
    } else {
        $sql = "SELECT * FROM customers WHERE customer_name = '$name' AND password = '$password'";
        $result = mysqli_query($connection, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['customer_id'];
            $_SESSION['user_name'] = $user['customer_name'];
            
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid Name or Password!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page 11 - Login</title>
</head>
<body>

    <a href="index.php">Home</a>
    <h2>Customer Login</h2>

    <?php if ($error != "") { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="login.php">
        <label>Customer Name:</label><br>
        <input type="text" name="customer_name" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>