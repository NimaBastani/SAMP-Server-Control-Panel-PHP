<?php
require('config.php');
$memoryinfo = getSystemMemoryInfo();
$ram = intval((100 * ($memoryinfo['MemTotal'] - $memoryinfo['MemFree']))/$memoryinfo['MemTotal']);
echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="'.$ram.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$ram.'%">'.convert($memoryinfo['MemTotal'] - $memoryinfo['MemFree']).'</div>';
