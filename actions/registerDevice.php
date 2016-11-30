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
	$reg_code = "";
	if (isset($_POST["reg_code"])) {
		$reg_code = $_POST["reg_code"];
	}
	// get the name of the display.
	$display_name = "";
	if (isset($_POST["display_name"])) {
		$display_name = $_POST["display_name"];
	}
	$sql = "INSERT INTO `device_status_index`(`display_alias`, `reg_code`, `last_ping_timestamp`, `display_status`) VALUES ('".$display_name."','".$reg_code."', now(),\"Offline\")"; // initially offline
	$title = "Register a new display";
	if($conn->query($sql)) {
		$message = "New display with name <strong>".$display_name."</strong> is registered with HandySan.";
	} else {
		$message = "Failed to register display with code ".$reg_code." to the system.";
		// echo "there was an error <br/>";
		if ($conn->error <> "") {
			// echo "\nError: " . $conn->error ."<br>";
		}
	}
	include("services/showInformationDialog.php");
	
?>