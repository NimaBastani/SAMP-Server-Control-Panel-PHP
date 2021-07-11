<?php
require('config.php');
pclose(popen("start taskkill /im RakSAMPClient.exe", 'r'));// /f
echo 'RAKSAMP Clients Stopped.';