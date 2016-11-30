<!DOCTYPE html>
<?php

// Start the session
	session_start();
		
	include("../config/db.php");
	
	// Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	
	// redirects to index if session variable is not set.
	if (!isset($_SESSION["handyuser"])) {
		// goes back to index.php
		header('Location: /handysan');
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HandySan | Device Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

		<div class="container">
			<p id="export"></p>
		  <Br/>
		  <h1>HandySan</h1>
		  <p>Welcome <?php echo isset($_SESSION["handyuser"]) ? $_SESSION["handyuser"] : "user" ?>...</p>
		  
		  <a href="userlogout.php">Logout</a>
		  <p id="export"></p>
		  <Br/>
		  
		  <div id="table" class="table-editable">
			<span class="table-add glyphicon glyphicon-plus"></span>
			<table class="table">
			  <tr>
				<th>Device Name</th>
				<th>Device IP</th>
				<th>Last check-in</th>
				<th>Status</th>
			  </tr>
			  <?php
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} else {
					$sql = "SELECT * FROM Device_Status_List";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) { ?>
				<tr>
					<td contenteditable="false">
						<?php echo $row["Device_Name"]; ?>
					</td>
					<td contenteditable="false">
						<?php echo $row["Device_IP"]; ?>
					</td>
					<td contenteditable="false">
						<?php echo $row["Latest_Ping_Stamp"]; ?>
					</td>
					<td contenteditable="false">
						<?php echo $row["Status"]; ?>
					</td>
				</tr>
				<?php
					} // Database result while ends
				}// else block ends
			  ?>
			</table>
		  </div>
		  
		</div>
	</body>
	
	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

	<script src="../js/jquery-1.11.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/contact.js"></script>
	<script src="../js/smoothscroll.js"></script>
	<script src="../js/script.js"></script>
	<?php
		$conn->close();
	?>
</HTML>
