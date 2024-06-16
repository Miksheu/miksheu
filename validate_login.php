<?php
	session_start();

	$d_login = $_POST["login"];
	$d_passw = $_POST["passw"];

	$reg_passw = ';^.{8,128}$;';
	$reg_login = ';^.{2,32}$;';

	# Validate
	if (!preg_match($reg_login, $d_login)) {
		echo "Login does not exist";
		exit;
	} else if (!preg_match($reg_passw, $d_passw)) {
		echo "Wrong password";
		exit;
	} else {
		$host = "localhost";
		$user = "miku";
		$pass = "miku2137";
		$dbnm = "miku";

		# Connect to database
		$mysql = mysqli_connect($host, $user, $pass, $dbnm);
	
		if (!$mysql) {
			echo "Error: Couldn't connect to database";
			exit;
		}

		# Check if Login exist
		$cmd = "SELECT password FROM uwu WHERE login='$d_login'";
		$check = mysqli_query($mysql, $cmd);
		$res = mysqli_fetch_array($check);

		if (empty($res)) {
			echo 1;
		} else if ($d_passw != $res["password"]) {
			echo 2;
		} else {
			$_SESSION["login_user"] = $d_login;
			echo $d_login;
		}

		# Close connection to database
		mysqli_close($mysql);
	}
?>