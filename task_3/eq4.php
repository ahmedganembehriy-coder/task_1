<?php

$films = array("Fast", "Predestination", "Persuit", "Prestige");
$keyword = "avatar";

if (in_array($keyword, $films)) {
    echo "yes";
    foreach ($films as $film) {
        if ($film == $keyword) {
          echo "<br>";
         echo $film;
          break;
    }
}
} else {
    echo "no";
}
?>