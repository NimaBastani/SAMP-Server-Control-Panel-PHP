<?php
require('config.php');
require('SampRcon.class.php');
$data = $_POST;
if(!isset($data['action'])) die("");
if($data['action'] == 'on')
{
	chdir($sv_path);
	//exec('start samp-server.exe');
	$commandString = "start samp-server.exe"; 
	pclose(popen($commandString, 'r'));
	//$WshShell = new COM("WScript.Shell");
	//$oExec = $WshShell->Run($commandString, 0, false);
	echo "Server turned on";
}
else if($data['action'] == 'off')
{
	if ($query->connect()) {
		$query->call('echo Control Panel : OFF');
	    $query->exitGame();
	    $query->close();
	} 
	sleep(3);
	chdir($sv_path);
	$commandString = "taskkill /IM samp-server.exe"; 
	pclose(popen($commandString, 'r'));
	echo "Server turned off";
}
else if($data['action'] == 'restart')
{
	if ($query->connect()) {
	    $query->gmx();
		$query->call('echo Control Panel : Restarting server');
	    $query->close();
		echo "Server restarted";
	} 
}
else if($data['action'] == 'banip')
{
	if(!isset($data['ip'])) die();
	if ($query->connect()) {
	    $query->banAddress($data['ip']);
		$query->call('echo Control Panel : Ban IP '.$data['ip']);
	    $query->close();
		echo "IP banned.";
	} 
}
else if($data['action'] == 'unbanip')
{
	if(!isset($data['ip'])) die();
	if ($query->connect()) {
	    $query->unbanAddress($data['ip']);
		$query->call('echo Control Panel : Unban IP '.$data['ip']);
	    $query->close();
		echo "IP unbanned.";
	} 
}
else if($data['action'] == 'reloadbans')
{
	if ($query->connect()) {
	    $query->reloadBans();
		$query->call('echo Control Panel : Reload Bans');
	    $query->close();
		echo "Reloaded.";
	} 
}
else if($data['action'] == 'ban')
{
	if(!isset($data['id'])) die();
	if ($query->connect()) {
	    $query->ban($data['id']);
		$query->call('echo Control Panel : Ban ID '.$data['id']);
	    $query->close();
		echo "Player banned.";
	} 
}
else if($data['action'] == 'kick')
{
	if(!isset($data['id'])) die();
	if ($query->connect()) {
	    $query->kick($data['id']);
		$query->call('echo Control Panel : Kicked ID '.$data['id']);
	    $query->close();
		echo "Player kicked.";
	} 
}
else if($data['action'] == 'pass')
{
	if(!isset($data['pass'])) die();
	if ($query->connect()) {
	    $query->setPassword($data['pass']);
		$query->call('echo Control Panel : Password changed.');
	    $query->close();
		echo "Password changed.";
	} 
}
else if($data['action'] == 'hostname')
{
	if(!isset($data['hostname'])) die();
	if ($query->connect()) {
	    $query->setHostName($data['hostname']);
		$query->call('echo Control Panel : Hostname changed.');
	    $query->close();
		echo "Hostname changed.";
	} 
}
else if($data['action'] == 'say')
{
	if(!isset($data['say'])) die();
	if ($query->connect()) {
	    $query->say($data['say']);
		$query->call('echo Control Panel : Said '.$data['say']);
	    $query->close();
		echo "Said.";
	} 
}
else if($data['action'] == 'loadfs')
{
	if(!isset($data['fs'])) die();
	if ($query->connect()) {
	    $query->loadFilterscript($data['fs']);
		$query->call('echo Loading FS : '.$data['fs']);
	    $query->close();
		echo "Loaded.";
	} 
}
else if($data['action'] == 'unloadfs')
{
	if(!isset($data['fs'])) die();
	if ($query->connect()) {
	    $query->unloadFilterscript($data['fs']);
		$query->call('echo Unloading FS : '.$data['fs']);
	    $query->close();
		echo "Unloaded.";
	} 
}
else if($data['action'] == 'weburl')
{
	if(!isset($data['weburl'])) die();
	if ($query->connect()) {
	    $query->setURL($data['weburl']);
		$query->call('echo Changing weburl : '.$data['weburl']);
	    $query->close();
		echo "Unloaded.";
	} 
}
else if($data['action'] == 'maxnpcs')
{
	if(!isset($data['maxnpcs'])) die();
	if ($query->connect()) {
	    $query->setMaxNPCs($data['maxnpcs']);
		$query->call('echo Changing maxnpcs : '.$data['maxnpcs']);
	    $query->close();
		echo "Unloaded.";
	} 
}

?>