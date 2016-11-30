<?php
	
	// Start the session
	//session_start();
	
	// include("config/db.php");

	// get the current score and the current question number
	$reg_code = isset($_GET['reg']) ? $_GET['reg'] : 'XXXXXXXX';
	$status = isset($_GET['status']) ? $_GET['status'] : 'ONLINE';
	
	// Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	
	// if connection was not created, die
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql_select = "SELECT * FROM `device_status_index` WHERE REG_CODE='".$reg_code."'";
	// insert query
	//$sql_insert = "INSERT INTO `device_status_index`(`DISPLAY_ALIAS`, `REG_CODE`, `LAST_PING_STAMP`, `DISPLAY_STATUS`) 
			//VALUES ('".$device_name."','".$device_ip."', NOW(),'".$status."')";
	// update query to change device Status
	//UPDATE `device_status_index` SET `display_status`= "OFFLINE" WHERE `reg_code`= "123456";
	$sql_update = "update `device_status_index` set DISPLAY_STATUS='".$status."' where REG_CODE = '".$reg_code."'";
	// update query to change device status and timestamp
	$sql_update_timestamp = "update `device_status_index` set last_ping_timestamp = NOW(), DISPLAY_STATUS='".$status."' where REG_CODE = '".$reg_code."'";
	
	// to hold the update SQL query
	$sql = "";
	$result = $conn->query($sql_select);
	$outcome = false;
	
	if ($result->num_rows > 0) {
		echo "Device is registered.<br>";
		echo "Attempting into update records for device registration = '".$reg_code."'<br>";
		$sql = $sql_update;
		while($row = $result->fetch_assoc()) {
			$display_status = $row["display_status"];
			echo "Display Alias: ".$row["display_alias"]."</br>";
			echo "Previous Ping: ".$row["last_ping_timestamp"]."<br/>";
			echo "Previous Status: ".$display_status."<br/>";
			if ($display_status === $status) {
				echo "updating status and timestamp <br/>";
				$sql = $sql_update_timestamp;
				$outcome = $conn->query($sql);
			} else {
				echo "updating status only <br/>";
				$sql = $sql_update;
			}
			$outcome = $conn->query($sql);
		}
	} else {
		echo "your device is not registered and does not exist on our database. <br>";
		echo "Attempting to register. <br>";
		//$sql = $sql_insert;
	}
 
	if ($outcome === TRUE) {
		echo "\nCheck-In Successful <br>";
	} else {
		echo "\nCheck-In unsuccessful <br>";
		if ($conn->error <> "") {
			echo "\nError: " . $conn->error ."<br>";
		}
	}
	
	$conn->close();
		
?>
 