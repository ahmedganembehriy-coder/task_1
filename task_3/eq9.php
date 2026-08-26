<?php
$tests = array(1, "tariq", 1.5, true, 7, "s", false);
foreach ($tests as $x) {
    if (is_bool($x)) {
        if ($x == true) {
            echo "Yes<br>";
        } else {
            echo "No<br>";
        }
    }
}