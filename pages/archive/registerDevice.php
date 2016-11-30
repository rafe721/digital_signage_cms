<?php
	// Start the session
	// session_start();
	
	// include("config/db.php");
	
	// Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	
	// if connection was not created, die
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// get the registration code.
	$reg_code = "Gestapo1";
	if (isset($_POST["reg_code"])) {
		$reg_code = $_POST["reg_code"];
	}
	// get the name of the display.
	$display_name = "Ouvra";
	if (isset($_POST["display_name"])) {
		$display_name = $_POST["display_name"];
	}
	$sql = "INSERT INTO `device_status_index`(`display_alias`, `reg_code`, `last_ping_timestamp`, `display_status`) VALUES ('".$display_name."','".$reg_code."', now(),\"Offline\")"; // initially offline
	if($conn->query($sql)) {
		echo "Display registered successfully<br/>";
	} else {
		echo "there was an error <br/>";
		if ($conn->error <> "") {
			//echo "\nError: " . $conn->error ."<br>";
		}
	}
	echo "Registration code ".$reg_code ."<br/>";
	echo "Display name ".$display_name ."<br/>";
	/* $data = [ 'reg_code' => 'God', 'display_name' => -1 ];
	header('Content-Type: application/json');
	echo json_encode($data); */
?>