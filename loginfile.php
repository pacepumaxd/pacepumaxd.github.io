<?php

	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}

	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}

	if(isset($_POST['updated_name'])){
		$updated_name = $_POST['updated_name'];
	}

	if(isset($_POST['updated_password'])){
		$updated_password = $_POST['updated_password'];
	}	

	$json_obj['success'] = 1;

	if($username == "1"){
		// Password Authentication
		$passwfile = fopen("shadow.txt", "r") or die("Unable to open file!");
		$passw = fgets($passwfile);
		fclose($passwfile);
		if($passw == $password){
			$json_obj['auth'] = "1";
		}
		else{
			$json_obj['auth'] = "0";
		}
	}

	else if($username == "2"){
		$userdatafile = fopen("userdata.txt", "r") or die("Unable to open file!");
		$batteryspeedfile = fopen("batteryspeed.txt", "r") or die("unable to open file!");
		$battery_speed = explode(',', fgets($batteryspeedfile));
		fclose($batteryspeedfile);
		$json_obj['battery'] = $battery_speed[0];
		$json_obj['speed'] = $battery_speed[1];
		$json_obj['name'] = fgets($userdatafile);
		$json_obj['mail'] = fgets($userdatafile);
		$SOSnumbers = fgets($userdatafile);
		fclose($userdatafile);
		$json_obj['SOScontacts'] = $SOScontacts;
		$json_obj['success'] = 1;
	}

	else if($username == "3"){
		$passwfile = fopen("shadow.txt", "r+") or die("Unable to open file!");
		fwrite($passwfile, $password);
		fclose($passwfile);
	}

	else if($username == "4"){
		$lines = file_get_contents("userdata.txt");
		$line_arr = explode("\n", $lines);
		$line_arr[0] = $password;
		$datauser = fopen("userdata.txt", "w+");
		fwrite($datauser, implode("\n", $line_arr));
		fclose($datauser);
	}

	else if($username == "5"){
		$lines = file_get_contents("userdata.txt");
		$line_arr = explode("\n", $lines);
		$line_arr[1] = $password;
		$datauser = fopen("userdata.txt", "w+");
		fwrite($datauser, implode("\n", $line_arr));
		fclose($datauser);
	}

	else if($username == "6"){
		$batteryspeedfile = fopen("batteryspeed.txt", "r") or die("unable to open file!");
		$battery_speed = explode(',', fgets($batteryspeedfile));
		fclose($batteryspeedfile);
		$json_obj['curspeed'] = $battery_speed[1];
		$json_obj['battery'] = $battery_speed[0];
	}

	else if($username == "7"){
		$lines = file_get_contents("userdata.txt");
		$line_arr = explode("\n", $lines);
		$line_arr[2] = $password;
		$datauser = fopen("userdata.txt", "w+");
		fwrite($datauser, implode("\n", $line_arr));
		fclose($datauser);
	}

	echo json_encode($json_obj);
?>
