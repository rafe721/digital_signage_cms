<?php

	// Start the session
	//session_start();
		
	//include("../config/db.php");
	
	// set the defalut timezone for this paage as Pacific/Auckland
	// date_default_timezone_set('Pacific/Auckland');
	
	// Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	
	// In production, redirect to Handysan/
	/* 
	if (!isset($_SESSION["handyuser"])) {
		// goes back to index.php
		header('Location: /handysan');
	} */
	$location = "http://localhost/handysan/index.php";
?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Prefetch StyleSheets hosted online -->
	<link rel="stylesheet prefetch" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<!-- Include stylesheets from server -->
	<link rel="shortcut icon" href="./themes/default/css/favicon.ico">
	<link rel="stylesheet" href="./themes/default/css/reset_handysan.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="./themes/default/css/style_handysan.css"> <!-- Resource style -->
	<link rel="stylesheet" href="./themes/default/css/tabs.css"> <!-- Resource style -->
	<link rel="stylesheet" href="./themes/default/css/tabstyles.css"> <!-- Resource style -->
	<link rel="stylesheet" href="./themes/default/css/elements.css">
	
	<style>
		.table-editable {
			position: relative;
		}
		
		.table-editable .glyphicon {
			font-size: 20px;
		}

		.table-remove {
			color: #700;
			cursor: pointer;
		}
			
		.table-remove:hover {
			color: #f00;
		}

		.table-up, .table-down {
			color: #007;
			cursor: pointer;
		}
		
		.table-up:hover, .table-down:hover {
			color: #00f;
		}

		.table-add {
			color: #070;
			cursor: pointer;
			position: absolute;
			top: 8px;
			right: 0;
		}
			
		.table-add:hover {
			color: #0b0;
		}

	</style>

	<script>
		window.console = window.console || function(t) {};
	</script>
	
  	
	<title>HandySan | Campaigns</title>
</head>
<body>
	<header class="main_header">
		<a href="#0" class="cd_logo"><span>Handy</span>San</a>
		
		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

		<nav class="top_opt">
			<ul class="top_opt_elements">
				<li><a href="#0">Welcome</a></li> -->
				<li class="has-children account">
					<a href="#0">
						<!-- future reference <img src="img/my_avatar.png" alt="avatar"> -->
						<?php if(isset($_SESSION['user_name'])) {
							echo $_SESSION['user_name'];
						} else {
							echo "Hello";
						}
						?>
					</a>

					<ul>
						<!-- Dissabled temporarily
						<li><a href="#0">My Account</a></li> -->
						<li><a href="<?php echo $location . "?action=logout"; ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Content Management</li>
				<li class="has-children overview active">
					<a href="#">Dashboard</a>
					<ul>
						<li><a href="./index.php?p=display_status&tab=displays">Displays</a></li>
						<li><a href="./index.php?p=display_status&tab=statistics">Statistics</a></li>
					</ul>
				</li>
			</ul>
		</nav>

		<div class="content-wrapper">
			<section>
				<div class="tabs tabs-style-bar">
					<nav>
						<ul>
							<li><a href="#section-bar-1" class="icon icon-box"><span>Displays</span></a></li>
							<li><a href="#section-bar-2" class="icon icon-display"><span>Statistics</span></a></li>
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-bar-1">
							<div id="table" class="table-editable">
								<span class="table-add glyphicon glyphicon-plus"></span>
								<table class="table">
									<tbody>
									<tr>
										<th>Display Name</th>
										<th>Latest Ping Time</th>
										<th>Status</th>
										<th></th>
									</tr>
									<?php
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
							} else {
								$sql = "SELECT * FROM `device_status_index`";
								$result = $conn->query($sql);
							while($row = $result->fetch_assoc()) { ?>
						<tr rid="<?php echo $row["reg_code"]; ?>">
							<td contenteditable="false">
								<?php echo $row["display_alias"]; ?>
							</td>
							<td contenteditable="false">
								<?php $t=time();
									$storedTime = strtotime($row["last_ping_timestamp"]);
									echo date('j F, Y : G:i:H A',$storedTime) ?>
							</td>
							<td contenteditable="false">
								<?php if (($t - $storedTime) < 300) {
										echo $row["display_status"];
									} else {
										echo "Offline";
									}
								?>
							</td>
							<td>
								<span class="table-remove glyphicon glyphicon-remove" value="<?php echo $row["reg_code"]; ?>"></span>
							</td>
						</tr>
								<?php
								} // while block ends
							}// else block ends
						  ?>
									</tbody>
								</table>
								<!-- <button id="export-btn" class="btn btn-primary">Export Data</button> -->
								<!-- <p id="export"></p> -->
							</div>
						</section>
						<section id="section-bar-2">
							<p>Page Under Construction</p>
						</section>
					</div><!-- /content -->
				</div><!-- /tabs -->
			</section>
			<!-- <h1>Sample Dashboard</h1> -->
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
	<div id="blur">
		<!-- Popup div starts here -->
		<div id="popupContact"> 
			<!-- Placeholder for AJAX to populate Dialog boxes -->
		</div> 
		<!-- Popup div ends here -->
	</div>
	
	<!-- Page Scripts -->
	<script src="./lib/modernizr.js"></script> <!-- Modernizr -->
	<script src="./js/popup_scripts.js"></script>
	<script src="./lib/jquery.js"></script>
	<script src="./themes/default/js/jquery.menu-aim.js"></script>
	<script src="./themes/default/js/main.js"></script>
	<script src="./themes/default/js/cbpFWTabs.js"></script>

	<script>
		var $TABLE = $('#table');
		var $BTN = $('#export-btn');
		var $EXPORT = $('#export');
		$('.table-add').click(function () {
			//var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
			//$TABLE.find('table').append($clone);
			// div_show();
			show_AddDisplay_dialog();
		});
		$('.table-remove').click(function () {
			// $(this).parents('tr').detach();
			show_RemoveDisplayDialog($(this).attr("value"));
		});
		$('.table-up').click(function () {
			var $row = $(this).parents('tr');
			if ($row.index() === 1)
				return;
			$row.prev().before($row.get(0));
		});
		$('.table-down').click(function () {
			var $row = $(this).parents('tr');
			$row.next().after($row.get(0));
		});
		jQuery.fn.pop = [].pop;
		jQuery.fn.shift = [].shift;
		$BTN.click(function () {
			var $rows = $TABLE.find('tr:not(:hidden)');
			var headers = [];
			var data = [];
			$($rows.shift()).find('th:not(:empty)').each(function () {
				headers.push($(this).text().toLowerCase());
			});
			$rows.each(function () {
				var $td = $(this).find('td');
				var h = {};
				headers.forEach(function (header, i) {
					h[header] = $td.eq(i).text();
				});
				data.push(h);
			});
			$EXPORT.text(JSON.stringify(data));
		});
		//# sourceURL=pen.js
	</script>

    
	<script>
		if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		}
	</script>
	
	<script>
		(function() {

			[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
				<?php 
					$default_option = "var options = { start : 0 };";
					$statistics_option = "var options = { start : 1 };";
					if (isset($tab)){
						switch($tab) {
							case "statistics":
								echo $statistics_option;
								break;
							default:
								echo $default_option;
						}
					} else {
						echo $statistics_option;
					}
				?>
				new CBPFWTabs( el , options);
			});

		})();
	</script>
</body>
<?php
		$conn->close();
	?>
</html>