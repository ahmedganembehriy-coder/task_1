<?php

function calc($x, $y)
{
    echo "Sum = " . ($x + $y) . "<br>";
    echo "Sub = " . ($x - $y) . "<br>";
    echo "Mul = " . ($x * $y) . "<br>";
    echo "Div = " . ($x / $y);
}
calc(10, 5);
?>