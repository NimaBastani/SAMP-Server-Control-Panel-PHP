<?php
require('config.php');
chdir($sv_path);
$handle = @fopen("server_log.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
    fclose($handle);
}