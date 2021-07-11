<?php
require('config.php');
$turnOn = "Turn on";
$turnOff = "Turn off";
$restart = "Restart";
$banip = "Ban IP";
$unbanip = "Unban IP";
$reloadbans = "Reload ban-list";
$kick = "Kick";
$password = "Change password";
$say = "Admin Say";
$loadfs = "Load filterscript";
$unloadfs = "Unload filterscript";
$hostname = "Change Hostname";
$weburl = "Change WebURL";
$maxnpcs = "Change MaxNPCs";
$servercfg = "Edit server.cfg";
$backupsql = "MySQL Backup";
$sqllist = "MySQL Database<br>List";
$sqlexec = "MySQL Execute";
$downloadlog = "Download<br>server_log";
$raksampopen = "New RakSAMP<br>Player";
$raksampclose = "Close All<br>RakSAMP clients";
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>SA:MP Panel</title>
<link rel="stylesheet" href="normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" href="twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/4.7.0/css/all.min.css">
 
<style>
html {
	height: 100%;
}
body {
	height: 100%;
	margin: 0;
	background-repeat: no-repeat;
	background-attachment: fixed;
}
.text-c {
	text-align: center;
}
.text-l {
	text-align: left;
}
.text-r {
	text-align: right
}
.text-j {
	text-align: justify;
}
.text-whitesmoke {
	color: whitesmoke
}
.text-darkyellow {
	color: rgba(255, 235, 59, 0.432)
}
.line-b {
	border-bottom: 1px solid #FFEB3B !important;
}
.button {
	border-radius: 3px;
}
.form-button {
	background-color: rgba(255, 235, 59, 0.24);
	border-color: rgba(255, 235, 59, 0.24);
	color: #e6e6e6;
}
.form-button:hover,
.form-button:focus,
.form-button:active,
.form-button.active,
.form-button:active:focus,
.form-button:active:hover,
.form-button.active:hover,
.form-button.active:focus {
	background-color: rgba(255, 235, 59, 0.473);
	border-color: rgba(255, 235, 59, 0.473);
	color: #e6e6e6;
}
.margin-g {
	margin: 15px;
}
.margin-g-sm {
	margin: 10px;
}
.margin-g-md {
	margin: 20px;
}
.margin-g-lg {
	margin: 30px;
}
.margin-l {
	margin-left: 15px;
}
.margin-l-sm {
	margin-left: 10px;
}
.margin-l-md {
	margin-left: 20px;
}
.margin-l-lg {
	margin-left: 30px;
}
.margin-r {
	margin-right: 15px;
}
.margin-r-sm {
	margin-right: 10px;
}
.margin-r-md {
	margin-right: 20px;
}
.margin-r-lg {
	margin-right: 30px;
}
.margin-t {
	margin-top: 15px;
}
.margin-t-sm {
	margin-top: 10px;
}
.margin-t-md {
	margin-top: 20px;
}
.margin-t-lg {
	margin-top: 30px;
}
.form-control,
.border-line {
	background-color: #5f5f5f;
	background-image: none;
	border: 1px solid #424242;
	border-radius: 1px;
	color: inherit;
	display: block;
	padding: 6px 12px;
	transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
	width: 100%;
}
.form-control:focus,
.border-line:focus {
	border-color: #FFEB3B;
	background-color: #616161;
	color: #e6e6e6;
}
.form-control,
.form-control:focus {
	box-shadow: none;
}
.form-control::-webkit-input-placeholder { color: #BDBDBD; }
.container-content {
	background-color: #3a3a3aa2;
	color: inherit;
	padding: 15px 20px 20px 20px;
	border-color: #FFEB3B;
	border-image: none;
	border-style: solid solid none;
	border-width: 1px 0;
}
.login-container {
	max-width: 900px;
	z-index: 100;
	margin: 0 auto;
	padding-top: 100px;
}
.login.login-container {
	width: 300px;
}
.wrapper.login-container {
	margin-top: 140px;
}
.logo-badge {
	color: #e6e6e6;
	font-size: 80px;
	font-weight: 800;
	letter-spacing: -10px;
	margin-bottom: 0;
}
.btn-sq-lg {
  width: 150px !important;
  height: 150px !important;
}

.btn-sq {
  width: 100px !important;
  height: 100px !important;
  font-size: 10px;
}

.btn-sq-sm {
  width: 50px !important;
  height: 50px !important;
  font-size: 10px;
}

.btn-sq-xs {
  width: 25px !important;
  height: 25px !important;
  padding:2px;
}
</style>
<script src='https://www.google.com/recaptcha/api.js?explicit&hl=fa' async defer></script>
<script src='sweetalert2.all.min.js'></script>

</head>
<body translate="no" class="bg-dark">  
  <div class="login-container text-c animated flipInX">
	  <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
	  <p class="text-whitesmoke"></p>
	  <div class="container-content">
<?php
//$cpu = getServerLoad();
//$memoryinfo = getSystemMemoryInfo();
//$ram = intval((100 * ($memoryinfo['MemTotal'] - $memoryinfo['MemFree']))/$memoryinfo['MemTotal']);
?>
<h3 class="text-whitesmoke">CPU Usage</h3>
<div class="progress" id="cpuAmount">
</div>
<h3 class="text-whitesmoke">Memory Usage</h3>
<div class="progress" id="ramAmount">
</div>
<hr class="bg-warning">
<h3 class="text-whitesmoke">Live :</h3>
<form>
  <div class="form-group">
	<a id="liveOn" href="#live_image" class="btn btn-success">
	  <i class="fa fa-power-off ofpower-off"></i>
	</a>
	<a id="liveOff" href="#live_image" class="btn btn-danger">
	  <i class="fa fa-power-off ofpower-off"></i>
	</a>
    <input id="liveUpdateRate" type="number" class="form-control text-whitesmoke" value="1000" min="100" max="10000">
</div>
</form>
<img id="live_image" src="screenshot.php" class="img-fluid">
<hr class="bg-warning">
<?php
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
?>
<div id="svStatus"><h4 class="text-whitesmoke">Server status - <?php echo $onOff; ?></h4>
<?php echo $status; ?></div>
<hr class="bg-warning">
<a id="svon_button" href="#" class="btn btn-sq-lg btn-success">
  <i class="fa fa-power-off ofpower-off fa-5x"></i><br/>
  <?php echo $turnOn; ?>
</a>
<a id="svoff_button" href="#" class="btn btn-sq-lg btn-danger">
  <i class="fa fa-power-off fa-5x"></i><br/>
  <?php echo $turnOff; ?>
</a>
<a id="svrestart_button" href="#" class="btn btn-sq-lg btn-warning">
  <i class="fa fa-sync fa-5x"></i><br/>
  <?php echo $restart; ?>
</a>
<hr class="bg-warning">
<a id="banip_button" href="#" class="btn btn-sq-lg btn-secondary">
  <i class="fa fa-ban fa-5x"></i><br/>
  <?php echo $banip; ?>
</a>
<a id="unbanip_button" href="#" class="btn btn-sq-lg btn-secondary">
  <i class="fa fa-user fa-5x"></i><br/>
  <?php echo $unbanip; ?>
</a>
<a id="reload_button" href="#" class="btn btn-sq-lg btn-secondary">
  <i class="fa fa-share fa-5x"></i><br/>
  <?php echo $reloadbans; ?>
</a>
<a id="kick_button" href="#" class="btn btn-sq-lg btn-secondary">
  <i class="fa fa-times-circle fa-5x"></i><br/>
  <?php echo $kick; ?>
</a>
<hr class="bg-warning">
<a id="hostname_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-server fa-5x"></i><br/>
  <?php echo $hostname; ?>
</a>
<a id="weburl_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-globe fa-5x"></i><br/>
  <?php echo $weburl; ?>
</a>
<a id="maxnpcs_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-users fa-5x"></i><br/>
  <?php echo $maxnpcs; ?>
</a>
<a id="pass_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-key fa-5x"></i><br/>
  <?php echo $password; ?>
</a>
<a id="say_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-microphone fa-5x"></i><br/>
  <?php echo $say; ?>
</a>
<hr class="bg-warning">
<a id="loadfs_button" href="#" class="btn btn-sq-lg btn-success">
  <i class="fa fa-arrow-circle-up fa-5x"></i><br/>
  <?php echo $loadfs; ?>
</a>
<a id="unloadfs_button" href="#" class="btn btn-sq-lg btn-warning">
  <i class="fa fa-arrow-circle-down fa-5x"></i><br/>
  <?php echo $unloadfs; ?>
</a>
<a id="unloadfs_button" href="editcfg.php" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-save fa-5x"></i><br/>
  <?php echo $servercfg; ?>
</a>
<hr class="bg-warning">
<a id="sqllist_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-list fa-5x"></i><br/>
  <?php echo $sqllist; ?>
</a>
<a id="backupsql_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-hdd fa-5x"></i><br/>
  <?php echo $backupsql; ?>
</a>
<a id="sqlexec_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-tasks fa-5x"></i><br/>
  <?php echo $sqlexec; ?>
</a>
<a id="downloadlog_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-file fa-5x"></i><br/>
  <?php echo $downloadlog; ?>
</a>
<hr class="bg-warning">
<a id="raksampopen_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-user fa-5x"></i><br/>
  <?php echo $raksampopen; ?>
</a>
<a id="raksampclose_button" href="#" class="btn btn-sq-lg btn-primary">
  <i class="fa fa-sign-out-alt fa-5x"></i><br/>
  <?php echo $raksampclose; ?>
</a>
		  <p class="margin-t text-whitesmoke"><small> Made by Nima Bastaniw</small> </p>
	  </div>
  </div>
  <script src="jquery/3.3.1/jquery.min.js"></script> 
  <script type="text/javascript">
  	var liveStatus = false;
	function download(filename, text) {
	  var element = document.createElement('a');
	  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
	  element.setAttribute('download', filename);

	  element.style.display = 'none';
	  document.body.appendChild(element);

	  element.click();

	  document.body.removeChild(element);
	}
	function updateRamCPU()
	{
		var ram = '';
		var cpu = '';
		var svstatus = '';
		$.ajax({
		  type: "GET",
		  url: "ram.php",
		  //data: "",
		  success : function(text){
			if(text == '') return;
			$("#ramAmount").html(text);
			ram = text;
		  }
		});
		$.ajax({
		  type: "GET",
		  url: "cpu.php",
		  //data: "",
		  success : function(text){
			if(text == '') return;
			$("#cpuAmount").html(text);
			cpu = text;
		  }
		});
		$.ajax({
		  type: "GET",
		  url: "status.php",
		  //data: "",
		  success : function(text){
			if(text == '') return;
			$("#svStatus").html(text);
			svstatus = text;
		  }
		});
		if(ram != '') $("#ramAmount").html(ram);
		if(cpu != '') $("#cpuAmount").html(cpu);
		if(svstatus != '') $("#svStatus").html(svstatus);
		setTimeout(updateRamCPU, 3000);
	}
	function updateLive()
	{
		if(liveStatus)
		{
			const now = new Date()  
			const secondsSinceEpoch = Math.round(now.getTime() / 1000)
			$("#live_image").attr("src","screenshot.php?id="+secondsSinceEpoch);
		}
		setTimeout(updateLive, document.getElementById("liveUpdateRate").value);
	}
  $(document).ready(function(){
	setTimeout(updateRamCPU, 3000);
	setTimeout(updateLive, 1000);
	$("#liveOn").click(function(){
		liveStatus = true;
	});
	$("#liveOff").click(function(){
		liveStatus = false;
	});
	$("#sqllist_button").click(function(){
	  $.ajax({
		  type: "POST",
		  url: "sql_list.php",
		  success : function(text){
			if(text == '') return;
			Swal.fire(
			  'Database list',
			  text,
			  'success'
			)
		  }
	  });
	});
	$("#raksampclose_button").click(function(){
	  $.ajax({
		  type: "POST",
		  url: "closeallraksamp.php",
		  success : function(text){
			if(text == '') return;
			Swal.fire(
			  'Disconnected.',
			  text,
			  'success'
			)
		  }
	  });
	});
	$("#sqlexec_button").click(function(){
(async () => {
		const { value: lines } = await Swal.fire({
		  title: "Execute SQL Query",
		  text: "Enter the query",
		  icon: 'warning',
		  input: 'text',
		  inputLabel: 'Query',
		  inputPlaceholder: 'SELECT * FROM `hey`.`helloworld` WHERE 1',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ok',
		  inputValidator: (value) => {
		    if (!value) {
		      return 'You need to write something!'
		    }
		  }
		})
		if(lines)
		{
		    $.ajax({
		        type: "POST",
		        url: "sql_execute.php",
		        data: "query="+lines,
		        success : function(text){
		        	if(text == '') return;
					Swal.fire({
					  input: 'textarea',
					  inputLabel: lines,
					  inputValue : text,
					  inputPlaceholder: lines,
					  inputAttributes: {
					    'aria-label': lines
					  },
					  showCancelButton: false,
					});
		        }
		    });
		}
})()
	});
	$("#downloadlog_button").click(function(){
	    $.ajax({
	        type: "GET",
	        url: "get_log.php",
	        success : function(text){
	        	if(text == '') return;
				Swal.fire({
				  showCancelButton: true,
				  cancelButtonText: 'Download'
				}).then((result) => {
					download('server_log.txt', text);
				})
	        }
	    });
	});
	$("#backupsql_button").click(function(){
(async () => {
		const { value: lines } = await Swal.fire({
		  title: "Get backup",
		  text: "Enter database's name",
		  icon: 'warning',
		  input: 'text',
		  inputLabel: 'Database',
		  inputPlaceholder: 'example',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ok',
		  inputValidator: (value) => {
		    if (!value) {
		      return 'You need to write something!'
		    }
		  }
		})
		if(lines)
		{
		    $.ajax({
		        type: "POST",
		        url: "sql_backup.php",
		        data: "db="+lines,
		        success : function(text){
		        	if(text == '') return;
					Swal.fire({
					  input: 'textarea',
					  inputLabel: lines+'.sql',
					  inputValue : text,
					  inputPlaceholder: lines+'.sql',
					  inputAttributes: {
					    'aria-label': lines+'.sql'
					  },
					  showCancelButton: true,
					  cancelButtonText: 'Download'
					}).then((result) => {
						download(lines+'.sql', text);
					})
		        }
		    });
		}
})()
	});
	$("#raksampopen_button").click(function(){
	  (async () => {
		  const { value: ip } = await Swal.fire({
			title: "New RakSAMP Client",
			text: "Please enter client's name",
			icon: 'warning',
			input: 'text',
			inputLabel: 'Name',
			inputPlaceholder: 'Example',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(ip)
		  {
			  $.ajax({
				  type: "POST",
				  url: "newraksamp.php",
				  data: "name="+ip,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'New RakSAMP Client',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#svon_button").click(function(){
	  $.ajax({
		  type: "POST",
		  url: "action.php",
		  data: "action=on",
		  success : function(text){
			if(text == '') return;
			Swal.fire(
			  'Action',
			  text,
			  'success'
			)
		  }
	  });
	});
	$("#svoff_button").click(function(){
	  $.ajax({
		  type: "POST",
		  url: "action.php",
		  data: "action=off",
		  success : function(text){
			if(text == '') return;
			Swal.fire(
			  'Action',
			  text,
			  'success'
			)
		  }
	  });
	});
	$("#svrestart_button").click(function(){
	  $.ajax({
		  type: "POST",
		  url: "action.php",
		  data: "action=restart",
		  success : function(text){
			if(text == '') return;
			Swal.fire(
			  'Action',
			  text,
			  'success'
			)
		  }
	  });
	});
	$("#reload_button").click(function(){
	  $.ajax({
		  type: "POST",
		  url: "action.php",
		  data: "action=reloadbans",
		  success : function(text){
			if(text == '') return;
			Swal.fire(
			  'Action',
			  text,
			  'success'
			)
		  }
	  });
	});
	$("#banip_button").click(function(){
	  (async () => {
		  const { value: ip } = await Swal.fire({
			title: "Ban IP",
			text: "Please enter IP",
			icon: 'warning',
			input: 'text',
			inputLabel: 'IP',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(ip)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=banip&ip="+ip,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#unbanip_button").click(function(){
	  (async () => {
		  const { value: ip } = await Swal.fire({
			title: "Unban IP",
			text: "Please enter IP",
			icon: 'warning',
			input: 'text',
			inputLabel: 'IP',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(ip)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=unbanip&ip="+ip,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#ban_button").click(function(){
	  (async () => {
		  const { value: ip } = await Swal.fire({
			title: "Ban Player",
			text: "Please enter player's ID",
			icon: 'warning',
			input: 'text',
			inputLabel: 'PlayerID',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(ip)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=ban&id="+ip,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#kick_button").click(function(){
	  (async () => {
		  const { value: ip } = await Swal.fire({
			title: "Kick Player",
			text: "Please enter player's ID",
			icon: 'warning',
			input: 'text',
			inputLabel: 'PlayerID',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(ip)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=kick&id="+ip,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#pass_button").click(function(){
	  (async () => {
		  const { value: pass } = await Swal.fire({
			title: "Change password",
			text: "Please enter the new password (enter 0 to remove)",
			icon: 'warning',
			input: 'text',
			inputLabel: 'Password',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(pass)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=pass&pass="+pass,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#hostname_button").click(function(){
	  (async () => {
		  const { value: pass } = await Swal.fire({
			title: "Change hostname",
			text: "Please enter the new password (enter 0 to remove)",
			icon: 'warning',
			input: 'text',
			inputLabel: 'hostname',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(pass)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=hostname&hostname="+pass,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#say_button").click(function(){
	  (async () => {
		  const { value: pass } = await Swal.fire({
			title: "Say",
			text: "Please enter the text",
			icon: 'warning',
			input: 'text',
			inputLabel: 'Text',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(pass)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=say&say="+pass,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#maxnpcs_button").click(function(){
	  (async () => {
		  const { value: pass } = await Swal.fire({
			title: "Change MaxNPCs",
			text: "Please enter MaxNPCs",
			icon: 'warning',
			input: 'text',
			inputLabel: 'MaxNPCs',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(pass)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=maxnpcs&maxnpcs="+pass,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#weburl_button").click(function(){
	  (async () => {
		  const { value: pass } = await Swal.fire({
			title: "Say",
			text: "Please enter the new weburl",
			icon: 'warning',
			input: 'text',
			inputLabel: 'Weburl',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(pass)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=weburl&weburl="+pass,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#loadfs_button").click(function(){
	  (async () => {
		  const { value: pass } = await Swal.fire({
			title: "Load",
			text: "Please enter the filterscript's AMX name",
			icon: 'warning',
			input: 'text',
			inputLabel: 'Filterscript',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(pass)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=loadfs&fs="+pass,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
	$("#unloadfs_button").click(function(){
	  (async () => {
		  const { value: pass } = await Swal.fire({
			title: "Unload",
			text: "Please enter the filterscript's AMX name",
			icon: 'warning',
			input: 'text',
			inputLabel: 'Filterscript',
			inputPlaceholder: '0',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			inputValidator: (value) => {
			  if (!value) {
				return 'You need to write something!'
			  }
			}
		  })
		  if(pass)
		  {
			  $.ajax({
				  type: "POST",
				  url: "action.php",
				  data: "action=unloadfs&fs="+pass,
				  success : function(text){
					if(text == '') return;
					Swal.fire(
					  'Action',
					  text,
					  'success'
					)
				  }
			  });
		  }
	  }) ()
	});
  });
  </script>
</body>
</html>