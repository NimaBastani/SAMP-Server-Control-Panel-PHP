<?php
require('config.php');
$cpu = getServerLoad();
echo '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$cpu.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$cpu.'%">'.$cpu.'%</div>';