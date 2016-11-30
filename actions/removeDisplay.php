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
	if (isset($_GET["reg_code"])) {
		$reg_code = $_GET["reg_code"];
	}
	// get the name of the display.
	$display_name = "";
	$sql = "Select `display_alias` FROM `device_status_index` WHERE reg_code='".$reg_code."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$display_name = $row["display_alias"];
	}
	
	$sql = "DELETE FROM `device_status_index` WHERE reg_code='".$reg_code."'";
	if($conn->query($sql)) {
		$message = "Display <strong>".$display_name."</strong> with code <strong>".$reg_code."</strong> will no longer be monitored by HandySan.";
	} else {
		$message = "Failed to remove display with code <strong>".$reg_code."</strong> to the system.";
		// echo "there was an error <br/>";
		if ($conn->error <> "") {
			// echo "\nError: " . $conn->error ."<br>";
		}
	}
	
	$title = "Removing A Display";
	include("services/showInformationDialog.php");
	
?>