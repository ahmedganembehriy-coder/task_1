<?php
$arr1 = array('a', 'b', 'c', 'd');
$arr2 = array('c', 'd', 'e', 'f');
foreach ($arr1 as $x) {
    foreach ($arr2 as $y) {
        if ($x == $y) {
            echo $x . " ";
        }
    }
}
?>