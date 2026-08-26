<?php
$tests = array(5, 4, 9, 3, 1, 7, 5, 8, 6);
$max = $tests[0];
foreach ($tests as $x) {
    if ($x > $max) {
        $max = $x;
    }
}
echo $max;

?>