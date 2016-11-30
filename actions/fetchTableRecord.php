<?php
	// Start the session
	//session_start();
		
	//include("../config/db.php");
	
	// set the defalut timezone for this paage as Pacific/Auckland
	date_default_timezone_set('Pacific/Auckland');
	
	// Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	
	// In production, redirect to Handysan/
	/* 
	if (!isset($_SESSION["handyuser"])) {
		// goes back to index.php
		header('Location: /handysan');
	} */
	// Check connection
	$reg_code = "";
	if (isset($_GET["reg_code"])) {
		$reg_code = $_GET["reg_code"];
	}
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		$sql = "SELECT * FROM `device_status_index` where reg_code='".$reg_code."'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) { 
			echo "<tr rid=\"". $row["reg_code"]."\">>";
			echo "	<td contenteditable=\"false\">".$row["display_alias"]."</td>";
			$t=time();
			$storedTime = strtotime($row["last_ping_timestamp"]);
			echo "	<td contenteditable=\"false\">".date('j F, Y : G:i:H A',$storedTime)."</td>";
			$status = "";
			if (($t - $storedTime) < 300) { // five minutes
				$status = $row["display_status"];
			} else {
				$status = "Offline";
			}
			echo "<td contenteditable=\"false\">".$status."</td>";
			echo "<td><span class=\"table-remove glyphicon glyphicon-remove\" value=\"".$reg_code."\"></span></td>";
			echo "</tr>";
		} // while block ends
	} // else block ends

?>