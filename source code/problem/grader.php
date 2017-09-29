<?php
	$code = $_POST["code"];
	$file_code = fopen("main.c", "w+");
	fwrite($file_code, $code);
	fclose($file_code);

	$temp = shell_exec("sudo ./data ".$_POST["no"]);

	$con = mysqli_connect("localhost", "root", "kkiinngg31", "temp");
	mysqli_set_charset($con, "utf8");
	$p_no = trim($_POST["no"]);
	$query = "insert into marking_board(ID, p_no, result) values(\"".$_SESSION["id"]."\", ".$p_no.", \"".$temp."\")";
	mysqli_query($con, $query);

	echo $temp; 

	exec("sudo rm main.c");
?>
