<?php
require('config.php');
if(!isset($_POST['name']) || empty($_POST['name'])) die();
$name = $_POST['name'];
$data = <<< EOT
<RakSAMPClient console="0" runmode="3" autorun="0" find="1" select_classid="0" manual_spawn="1"
			   print_timestamps="0" chatcolor_rgb="0 0 130" clientmsg_rgb="0 130 0" cpalert_rgb="170 0 0"
			   followplayer="P3ti" followplayerwithvehicleid="295" followXOffset="3.0" followYOffset="0.0" followZOffset="0.0"
			   updatestats="1" minfps="20" maxfps="90" clientversion="0.3.7" npc="0">
	<server nickname="$name" password="">127.0.0.1:$port</server>
	<intervals spam="150" fakekill="35" lag="20" joinflood="50" chatflood="20" classflood="30" bulletflood="25" />
	<log objects="0" pickups="0" textlabels="0" textdraws="0" />
	<sendrates force="0" onfoot="40" incar="40" firing="40" multiplier="1" />
	<normal_pos position="325.35 2512.09 16.56" rotation="0.0" force="0" />
	<teleport name="Grove Street" position="2536.08 -1632.98 13.79" />
	<teleport name="4D casino" position="1992.93 1047.31 10.82" />
	<teleport name="LS Hospital" position="2033.00 -1416.02 16.99" />
	<teleport name="SF Hospital" position="-2653.11 634.78 14.45" />
	<teleport name="LV Hospital" position="1580.22 1768.93 10.82" />
	<teleport name="SF Export" position="-1550.73 99.29 17.33" />
</RakSAMPClient>
EOT;
//echo $data;
chdir('RAKSAMP');
file_put_contents("RakSAMPClient.xml", $data);
pclose(popen("start RakSAMPClient.exe", 'r'));
echo 'RAKSAMP Client Started.';