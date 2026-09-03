<?php
$connection=mysqli_connect('localhost', 'root','', 'mysql_task');

function validate_input($data, $type = 'text', $max_length = 50) {
    global $connection;

    $data = trim($data);

    if (strlen($data) > $max_length) {
        return false;
    }

    if ($type == 'number') {
        if (!is_numeric($data)) {
            return false;
        }
    } elseif ($type == 'text') {
        $data = mysqli_real_escape_string($connection, $data);
    }

    return $data;
}
?>