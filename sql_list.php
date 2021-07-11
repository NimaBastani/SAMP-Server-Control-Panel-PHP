<?php
require('config.php');
date_default_timezone_set("Asia/Tehran");
$conn = mysqli_connect($sql_host, $sql_username, $sql_password);
$db_list = mysqli_query($conn, "SHOW DATABASES");
while ($row = $db_list -> fetch_row()) {
    echo $row[0]."<br>";
}
?>