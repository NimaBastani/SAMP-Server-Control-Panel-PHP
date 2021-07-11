<?php
require('config.php');
if(!isset($_POST['query']) || empty($_POST['query'])) die();
date_default_timezone_set("Asia/Tehran");
$conn = mysqli_connect($sql_host, $sql_username, $sql_password);
$execquery = mysqli_query($conn, $_POST['query']);
if(!$execquery) die("ERROR");
$row = $execquery -> fetch_all(MYSQLI_ASSOC);
echo "Fetch data :\n";
while ($row) {
    print_r($row);
}
?>