<?php
require('config.php');
require('SampQuery.class.php');
$query = new SampQuery("127.0.0.1", $port);
$status = '
';
if ($query->connect())
{
	$onOff = '<span style="color: green;">On</span>';
	$hoso = $query->getRules();
	$hosn = $query->getInfo();
	if($hosn['password'] == '0')
	  $havepass = 'No';
	else $havepass = 'Yes';
	$status = '
<table class="table table-bordered table-striped text-white text-left">
  <thead>
  </thead>
  <tbody>
	<tr>
	  <th class="text-nowrap" scope="row">Hostname</th>
	  <td colspan="20">'.$hosn['hostname'].'</td>
	</tr>
	<tr>
	  <th class="text-nowrap" scope="row">Players</th>
	  <td colspan="10">'.$hosn['players'].'/'.$hosn['maxplayers'].'</td>
	  <th class="text-nowrap" scope="row">Gamemode</th>
	  <td colspan="10">'.$hosn['gamemode'].'</td>
	</tr>
	<tr>
	  <th class="text-nowrap" scope="row">Lagcomp</th>
	  <td colspan="10">'.$hoso['lagcomp'].'</td>
	  <th class="text-nowrap" scope="row">Map</th>
	  <td colspan="10">'.$hoso['mapname'].'</td>
	</tr>
	<tr>
	  <th class="text-nowrap" scope="row">Language</th>
	  <td colspan="5">'.$hosn['map'].'</td>
	  <th class="text-nowrap" scope="row">World Time</th>
	  <td colspan="5">'.$hoso['worldtime'].'</td>
	  <th class="text-nowrap" scope="row">Weather</th>
	  <td colspan="5">'.$hoso['weather'].'</td>
	  <th class="text-nowrap" scope="row">Version</th>
	  <td colspan="5">'.$hoso['version'].'</td>
	</tr>
	<tr>
	  <th class="text-nowrap" scope="row">Have password</th>
	  <td colspan="10">'.$havepass.'</td>
	  <th class="text-nowrap" scope="row">WebURL</th>
	  <td colspan="10">'.$hoso['weburl'].'</td>
	</tr>
  </tbody>
</table>
';
}
else $onOff = '<span style="color: red;">Off</span>';
$query->close();
echo '<h4 class="text-whitesmoke">Server status - '.$onOff.'</h4>'.$status;