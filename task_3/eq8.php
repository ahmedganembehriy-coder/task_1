<?php
function RouteRandPass($n)
{
    $letters = "abcdefghijklmnopqrstuvwxyz";
    $pass = "";
    for ($i = 0; $i < $n; $i++) {
        $pass .= $letters[rand(0, strlen($letters) - 1)];
    }
    return $pass;
}
echo RouteRandPass(8);

?>