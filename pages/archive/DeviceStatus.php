<?php

	// Start the session
	// session_start();
		
	// include("../config/db.php");
	
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
	$location = "http://localhost/handysan/index.php";
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>HandySan | Device Status</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="HandySan Connected Devices">
		<meta name="author" content="Rahul A P">
		
		<!-- CSS -->
	<link rel="stylesheet prefetch" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet prefetch" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/handysan_main.css" />
	<link rel="stylesheet" href="./css/display_status.css" />
	<link rel="stylesheet" href="./css/elements.css">
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
	</head>
	<body>
	
		<header>
			<div class="container clearfix">
				<h1 id="logo">
					HandySan
				</h1>
				<nav>
					<a class="page-scroll" href="#" onclick="">Rahul</a>
					<a class="page-scroll" href="<?php echo $location . "?action=logout"; ?>">Logout</a>
				</nav>
			</div>
		</header>
		
		<div class="main_content" id="main">
			<div class="side_nav">
				<nav class="cd-side-nav nav-is-visible">
					<ul>
						<li class="cd-label">Content Management</li>
						<li class="has-children overview active">
							<a href="http://localhost/handysan/index.php?p=dashboard">Dashboard</a>
							<ul>
								<li><a href="http://localhost/handysan/index.php?p=dashboard&tab=displays">Displays</a></li>
								<li><a href="http://localhost/handysan/index.php?p=dashboard&tab=content">Content</a></li>
							</ul>
						</li>
						<li class="has-children notifications">
							<a href="http://localhost/handysan/index.php?p=campaigns">Campaigns</a>
							<ul>
								<li><a href="http://localhost/handysan/index.php?p=campaigns&tab=on_displays">On Displays</a></li>
								<li><a href="http://localhost/handysan/index.php?p=campaigns&tab=all">View All</a></li>
								<li><a href="http://localhost/handysan/index.php?p=campaigns&tab=new">Create New</a></li>
							</ul>
						</li>

						<li class="has-children comments">
							<a href="http://localhost/handysan/index.php?p=media">Media</a>
							<ul>
								<li><a href="http://localhost/handysan/index.php?p=media&tab=all">All</a></li>
								<li><a href="http://localhost/handysan/index.php?p=media&tab=all">Upload</a></li>
							</ul>
						</li>
					</ul>

					<ul>
						<li class="cd-label">Administration</li>
						<li class="has-children bookmarks">
							<a href="http://localhost/handysan/index.php?p=users">Users</a>
							
							<ul>
								<li><a href="http://localhost/handysan/index.php?p=users&tab=existing">Manage Existing</a></li>
								<li><a href="http://localhost/handysan/index.php?p=users&tab=new">Add New</a></li>
							</ul>
						</li>
						<li class="has-children images">
							<a href="http://localhost/handysan/index.php?p=settings">Settings</a>
							
							<ul>
								<li><a href="http://localhost/handysan/index.php?p=settings&tab=application">Application</a></li>
								<li><a href="http://localhost/handysan/index.php?p=settings&tab=logging">Logging</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		
			<div class="info_area">
				<section>
				<div id="table" class="table-editable">
					<span class="table-add glyphicon glyphicon-plus"></span>
					<table class="table">
					  <tbody><tr>
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
						<tr>
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
								<span class="table-remove glyphicon glyphicon-remove"></span>
							</td>
						</tr>
								<?php
								} // Database result while ends
							}// else block ends
						  ?>
						<tr>
						<td contenteditable="true">Stir Fry</td>
						<td contenteditable="true">stir-fry</td>
						<td contenteditable="true">Stir Fry</td>
						<td>
						  <span class="table-remove glyphicon glyphicon-remove"></span>
						</td>
					  </tr>
					  <!-- This is our clonable table line -->
					  <tr class="hide">
						<td contenteditable="true">Untitled</td>
						<td contenteditable="true">undefined</td>
						<td contenteditable="true">unknown</td>
						<td>
						  <span class="table-remove glyphicon glyphicon-remove"></span>
						</td>
					  </tr>
					</tbody></table>
				  
				  <button id="export-btn" class="btn btn-primary">Export Data</button>
				  <p id="export"></p>
				</div>
				
			</section>
			</div>
		</div>

	<Footer>
		<div class="contact_wrap container clearfix">
			
			<div class="left_column">
				<H1>Contact</H1>
			</div>
			<div class="right_column">
				<ul>
					<li>Rahul A P</li>
					<li>0272755557</li>
					<li>itsme.rahulap@gmail.com</li>
					<li><a class="facebook"></a><a class="Linked_In"></a><a class="google_plus"></a></li>
				</ul>
			</div>
		</div>
		<div class="reference_bar container">
			<p>I got these riddles from <a href="http://www.comicvine.com/profile/notoriousbcb/blog/riddle-me-this-riddle-me-that-vintage-riddler-ridd/65642/">this</a> page</P>
		</div>
	</footer>
	<div id="abc">
		<!-- Popup div starts here -->
		<div id="popupContact"> 
			<!-- contact us form -->
			<form action="index.php?action=register_device" method="post" id="form" name="reg_device_form">
				<img src="./img/popup_close.png" id="close" onclick="div_hide()">
				<h2>Register new device</h2><hr>
				<input type="text" id="reg_code" placeholder="Registration Code" name="reg_code">
				<input type="text" id="display_name" placeholder="Display Name" name="display_name">
				<a id="submit" href="javascript: check_empty()">Confirm</a>
				<p><span>Note :</span> In this demo, we have stopped email sending functionality.</p>
			</form>
		</div> 
		<!-- Popup div ends here -->
	</div>
	</body>
	
	    <script src="js/jquery.min.js.download"></script>
		<script src="js/jquery-ui.min.js.download"></script>
	
	<script>
		var $TABLE = $('#table');
		var $BTN = $('#export-btn');
		var $EXPORT = $('#export');
		$('.table-add').click(function () {
			// var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
			// $TABLE.find('table').append($clone);
			div_show();
		});
		
		$('.table-remove').click(function () {
			$(this).parents('tr').detach();
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
	
	<script src="./js/my_js.js"></script>
	<script src="./js/jquery-2.1.4.js"></script>

    
    <script>
		if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		}
	</script>
<?php
		$conn->close();
	?>
</html>