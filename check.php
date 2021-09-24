<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['send'])) {
	if (isset($_POST['Search'])) {
		$ok = test_input($_POST['Search']);
		$ip='searchs/'.$_SERVER['REMOTE_ADDR'] . ' 0';
		$myfile = fopen($ip, "w");
		$s = fwrite($myfile, $_POST['Search']);
		fclose($myfile);
		if ($s) {
			header("location:index.php?". $_POST['Search'] . "=1");
		}
	}
}