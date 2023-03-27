<?php

require("constants.php");
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if(!$connection) {
    die("database connection failed: " . mysqli_error());
}

//$dbSelect = mysqli_selectdb("widgetcorp1", $connection);
//if(!$dbSelect) {
//    die("database selection failed: " . mysqli_error());
//}
//?>