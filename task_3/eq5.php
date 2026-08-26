<?php
function RouteBubble($arr)
{
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - 1; $j++) {

            if ($arr[$j] > $arr[$j + 1]) {
                $x = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $x;
        }
    }
}
    return $arr;
}
$tests = array(6, 4, 9, 3, 12, 8, 7);
$tests = RouteBubble($tests);
foreach ($tests as $x) {
    echo $x . " ";
}
?>