<?php
	$d_login = $_POST["nick"];
	$d_passw = $_POST["passw"];
	$d_cpassw = $_POST["cpassw"];
	$d_email = $_POST["email"];
	$d_cemail = $_POST["cemail"];

	$reg_email = ';^[a-zA-Z0-9_!#$%&"*+/=?`{|}~^.-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$;';
	$reg_passw = ';^[a-zA-Z0-9_!#$%"*+/=?`{|}~^. -]+$;';
	$reg_login = ';^.{2,32}$;';

	# Validate
	if ($d_cpassw == $d_passw && $d_cemail == $d_email && preg_match($reg_email, $d_cemail) && preg_match($reg_passw, $d_cpassw) && preg_match($reg_login, $d_login)) {
		$host = "localhost";
		$user = "miku";
		$pass = "miku2137";
		$dbnm = "miku";

		# Connect to database
		$mysql = mysqli_connect($host, $user, $pass, $dbnm);
	
		if(!$mysql) {
			echo "Error: Couldn't connect to database";
			exit;
		}

		# Check if Login is occupied
		$cmd = "SELECT * FROM uwu WHERE login='$d_login'";
		$check = mysqli_query($mysql, $cmd);
		$res = mysqli_fetch_array($check);

		if(!empty($res)) {
			echo "Error: User $d_login already exist";
			mysqli_close($mysql);
			exit;
		}

		# Check if Email is occupied
		$cmd = "SELECT * FROM uwu WHERE email='$d_email'";
		$check = mysqli_query($mysql, $cmd);
		$res = mysqli_fetch_array($check);

		if(!empty($res)) {
			echo "Error: Email $d_email is already occupied";
			mysqli_close($mysql);
			exit;
		}

		# Insert user data into database
		$cmd = "INSERT INTO uwu VALUES ('$d_login', '$d_passw', '$d_email', '0')";
	
		if(mysqli_query($mysql, $cmd)) {
			echo "Successfully registered user: $d_login";
		}else{
			echo "Error: Couldn't register user";
			mysqli_close($mysql);
			exit;
		}

		# Close connection to database
		mysqli_close($mysql);
	}else{
		echo "Error: User data is invalid";
	}
?>