<?php

function sum($arr)
{
    $sum = 0;
    foreach ($arr as $x) {
        $sum += $x;
    }
    return $sum;
}
$arr = array(1, 2, 3, 4, 5);
echo sum($arr);

?>