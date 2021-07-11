<?php
$sv_path = 'E:\SAMP\Map Editor';
$port = 7777;
$rcon = '12';
$username = 'NimA';
$password =	'1111';
//mysql
$sql_host = 'localhost';
$sql_username = 'root';
$sql_password = '';

function getIPAddress() {
	// Check for shared Internet/ISP IP
	if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}
	// Check for IP addresses passing through proxies
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		// Check if multiple IP addresses exist in var
		if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
			$iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			foreach ($iplist as $ip) {
				if (validate_ip($ip))
					return $ip;
			}
		}
		else {
			if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
		return $_SERVER['HTTP_X_FORWARDED'];
	if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
		return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
	if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
		return $_SERVER['HTTP_FORWARDED_FOR'];
	if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
		return $_SERVER['HTTP_FORWARDED'];

	// Return unreliable IP address since all else failed
	return $_SERVER['REMOTE_ADDR'];
}

/**
 * Ensures an IP address is both a valid IP address and does not fall within
 * a private network range.
 */
function validate_ip($ip) {

	if (strtolower($ip) === 'unknown')
		return false;

	// Generate IPv4 network address
	$ip = ip2long($ip);

	// If the IP address is set and not equivalent to 255.255.255.255
	if ($ip !== false && $ip !== -1) {
		// Make sure to get unsigned long representation of IP address
		// due to discrepancies between 32 and 64 bit OSes and
		// signed numbers (ints default to signed in PHP)
		$ip = sprintf('%u', $ip);

		// Do private network range checking
		if ($ip >= 0 && $ip <= 50331647)
			return false;
		if ($ip >= 167772160 && $ip <= 184549375)
			return false;
		if ($ip >= 2130706432 && $ip <= 2147483647)
			return false;
		if ($ip >= 2851995648 && $ip <= 2852061183)
			return false;
		if ($ip >= 2886729728 && $ip <= 2887778303)
			return false;
		if ($ip >= 3221225984 && $ip <= 3221226239)
			return false;
		if ($ip >= 3232235520 && $ip <= 3232301055)
			return false;
		if ($ip >= 4294967040)
			return false;
	}
	return true;
}
if(!isset($noLogin)) 
{
	session_start();
	if(isset($_SESSION['nimapanel_login']))
	{
		if(getIPAddress() != $_SESSION['nimapanel_loginip'])
		{
			$_SESSION['nimapanel_login'] = 0;
			header('Location: login.php');
			die();
		}
		if($_SESSION['nimapanel_loginexpire'] < time())
		{
			$_SESSION['nimapanel_login'] = 0;
			header('Location: login.php');
			die();
		}

		$_SESSION['nimapanel_loginexpire'] = time()+1800;
	}
	else
	{
		$_SESSION['nimapanel_login'] = 0;
		header('Location: login.php');
		die();
	}
}
function _getServerLoadLinuxData()
{
	if (is_readable("/proc/stat"))
	{
		$stats = @file_get_contents("/proc/stat");

		if ($stats !== false)
		{
			// Remove double spaces to make it easier to extract values with explode()
			$stats = preg_replace("/[[:blank:]]+/", " ", $stats);

			// Separate lines
			$stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
			$stats = explode("\n", $stats);

			// Separate values and find line for main CPU load
			foreach ($stats as $statLine)
			{
				$statLineData = explode(" ", trim($statLine));

				// Found!
				if
				(
					(count($statLineData) >= 5) &&
					($statLineData[0] == "cpu")
				)
				{
					return array(
						$statLineData[1],
						$statLineData[2],
						$statLineData[3],
						$statLineData[4],
					);
				}
			}
		}
	}
	return null;
}
function getServerLoad()
{
	$load = null;

	if (stristr(PHP_OS, "win"))
	{
		$cmd = "wmic cpu get loadpercentage /all";
		@exec($cmd, $output);

		if ($output)
		{
			foreach ($output as $line)
			{
				if ($line && preg_match("/^[0-9]+\$/", $line))
				{
					$load = $line;
					break;
				}
			}
		}
	}
	else
	{
		if (is_readable("/proc/stat"))
		{
			$statData1 = _getServerLoadLinuxData();
			sleep(1);
			$statData2 = _getServerLoadLinuxData();

			if
			(
				(!is_null($statData1)) &&
				(!is_null($statData2))
			)
			{
				// Get difference
				$statData2[0] -= $statData1[0];
				$statData2[1] -= $statData1[1];
				$statData2[2] -= $statData1[2];
				$statData2[3] -= $statData1[3];
				$cpuTime = $statData2[0] + $statData2[1] + $statData2[2] + $statData2[3];
				$load = 100 - ($statData2[3] * 100 / $cpuTime);
			}
		}
	}

	return $load;
}
function wmiWBemLocatorQuery( $query ) {
	if ( class_exists( '\\COM' ) ) {
		try {
			$WbemLocator = new \COM( "WbemScripting.SWbemLocator" );
			$WbemServices = $WbemLocator->ConnectServer( '127.0.0.1', 'root\CIMV2' );
			$WbemServices->Security_->ImpersonationLevel = 3;
			// use wbemtest tool to query all classes for namespace root\cimv2
			return $WbemServices->ExecQuery( $query );
		} catch ( \com_exception $e ) {
			echo $e->getMessage();
		}
	} elseif ( ! extension_loaded( 'com_dotnet' ) )
		trigger_error( 'It seems that the COM is not enabled in your php.ini', E_USER_WARNING );
	else {
		$err = error_get_last();
		trigger_error( $err['message'], E_USER_WARNING );
	}

	return false;
}
function getSystemMemoryInfo( $output_key = '' ) {
	$keys = array( 'MemTotal', 'MemFree', 'MemAvailable', 'SwapTotal', 'SwapFree' );
	$result = array();

	try {
		// LINUX
		if (!stristr(PHP_OS, "win")) {
			$proc_dir = '/proc/';
			$data = _dir_in_allowed_path( $proc_dir ) ? @file( $proc_dir . 'meminfo' ) : false;
			if ( is_array( $data ) )
				foreach ( $data as $d ) {
					if ( 0 == strlen( trim( $d ) ) )
						continue;
					$d = preg_split( '/:/', $d );
					$key = trim( $d[0] );
					if ( ! in_array( $key, $keys ) )
						continue;
					$value = 1000 * floatval( trim( str_replace( ' kB', '', $d[1] ) ) );
					$result[$key] = $value;
				}
		} else      // WINDOWS
		{
			$wmi_found = false;
			if ( $wmi_query = wmiWBemLocatorQuery( 
				"SELECT FreePhysicalMemory,FreeVirtualMemory,TotalSwapSpaceSize,TotalVirtualMemorySize,TotalVisibleMemorySize FROM Win32_OperatingSystem" ) ) {
				foreach ( $wmi_query as $r ) {
					$result['MemFree'] = $r->FreePhysicalMemory * 1024;
					$result['MemAvailable'] = $r->FreeVirtualMemory * 1024;
					$result['SwapFree'] = $r->TotalSwapSpaceSize * 1024;
					$result['SwapTotal'] = $r->TotalVirtualMemorySize * 1024;
					$result['MemTotal'] = $r->TotalVisibleMemorySize * 1024;
					$wmi_found = true;
				}
			}
			// TODO a backup implementation using the $_SERVER array
		}
	} catch ( Exception $e ) {
		echo $e->getMessage();
	}
	return empty( $output_key ) || ! isset( $result[$output_key] ) ? $result : $result[$output_key];
}
function convert($size)
{
	$unit=array('b','kb','mb','gb','tb','pb');
	return @round($size/pow(1024,($i=floor(log($size,1024)))),2).''.$unit[$i];
}