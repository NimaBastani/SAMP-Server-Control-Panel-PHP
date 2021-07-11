<?php
require('config.php');
function startsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
}
function endsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, -strlen($needle)) === 0;
}
$dir = 'SS';
$nofiles = 0;
if ($handle = opendir($dir)) {
	while (( $file = readdir($handle)) !== false ) {
		if ( $file == '.' || $file == '..' || is_dir($dir.'/'.$file) ) {
			continue;
		}

		if ((time() - filemtime($dir.'/'.$file)) > (1)) {
			if(!endsWith($file, '.bmp')) continue;
			$nofiles++;
			unlink($dir.'/'.$file);
		}
	}
	closedir($handle);
}
chdir($dir);
$name = exec('ScreenShot.exe');
$im = imagecreatefrombmp('./'.$name);
header('Content-Type: image/jpeg');
imagejpeg($im);
imagedestroy($im);