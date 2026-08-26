<!DOCTYPE html>
<html>
<head>
    <title>Store</title>
</head>
<body>
<form method="post">
    <input type="text" name="price" placeholder="Product Price">
    <br>
    <br>
    <input type="text" name="number" placeholder="Number of Products">
    <br>
    <br>
    <input type="submit" name="submit" value="Calculate">
</form>
<?php
if (isset($_POST["submit"])) {
    $price = $_POST["price"];
    $number = $_POST["number"];
    if (!is_numeric($price) || !is_numeric($number)) {
        echo "Please enter numbers";
    } elseif ($price < 0 || $number < 0) {

        echo "Numbers cannot be negative";
    } else {
        $total = $price * $number;
        echo "Total before discount = " . $total . "<br>";

        if ($total < 1000) {

            $discount = $total * 10 / 100;
        } else {

            $discount = $total * 15 / 100;

        }
        $final = $total - $discount;

        echo "Discount = " . $discount . "<br>";
        echo "Total after discount = " . $final;
    }
}
?>
</body>
</html>