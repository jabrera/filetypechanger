<?php
ini_set('max_execution_time', 3600);
function getFileName($file) {
	$name = "";
	for($i = 0; $i < sizeof($file)-1; $i++) {
		$name .= $file[$i].".";
	}
	$name = substr($name, 0, -1);
	return $name;
}

function getFileExtension($file) {
	return strtolower($file[sizeof($file)-1]);
}
if(isset($_POST['dir'])) {
	$dir = $_POST['dir'];
	$files = scandir($dir);
	foreach($files as $file) {
		if($file != "." && $file != "..") {
			$file = explode(".", $file);
			if(getFileExtension($file) == "mp4") {
				rename($dir."\\".getFileName($file).".".getFileExtension($file), $dir."\\".getFileName($file).".mkv");
				echo $dir."\\".getFileName($file).".mp4"." :: Success<br>";
			}
		}
	}
} else {
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Friends</title>
</head>
<body>
<form action="index.php" method="post">
	<input type="text" name="dir"><br>
	<input type="submit">
</form>
</body>
</html>
<?php } ?>