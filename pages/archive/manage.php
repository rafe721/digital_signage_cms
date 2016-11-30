<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/tabs.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/tabstyles.css"> <!-- Resource style -->
	<!-- themes -->
	<link rel="stylesheet" href="themes/default/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="themes/default/css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="themes/default/css/tabs.css"> <!-- Resource style -->
	<link rel="stylesheet" href="themes/default/css/tabstyles.css"> <!-- Resource style -->
	<link rel="stylesheet prefetch" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet prefetch" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	
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
	
  	
	<title>Responsive Sidebar Navigation | CodyHouse</title>
</head>
<body>
	<header class="main_header">
		<a href="#0" class="cd-logo">HandySan</a>
		
		

		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

		<nav class="top_opt">
			<ul class="top_opt_elements">
				<li><a href="#0">Tour</a></li>
				<li><a href="#0">Support</a></li>
				<li class="has-children account">
					<a href="#0">
						<img src="img/cd-avatar.png" alt="avatar">
						Account
					</a>

					<ul>

						<li><a href="#0">My Account</a></li>
						<li><a href="#0">Edit Account</a></li>
						<li><a href="#0">Logout</a></li>
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
					<a href="#0">Dashboard</a>
					<ul>
						<li><a href="#0">Device Status</a></li>
						<li><a href="#0">Media Distribution</a></li>
					</ul>
				</li>
				<li class="has-children notifications">
					<a href="#0">Campaigns<span class="count">3</span></a>
					<ul>
						<li><a href="#0">On Displays</a></li>
						<li><a href="#0">View All</a></li>
						<li><a href="#0">Create New</a></li>
					</ul>
				</li>

				<li class="has-children comments">
					<a href="#0">Media</a>
					<ul>
						<li><a href="#0">View All</a></li>
						<li><a href="#0">Upload</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Administration</li>
				<li class="has-children bookmarks">
					<a href="#0">Users</a>
					
					<ul>
						<li><a href="#0">Manage Existing</a></li>
						<li><a href="#0">Add New</a></li>
					</ul>
				</li>
				<li class="has-children images">
					<a href="#0">Settings</a>
					
					<ul>
						<li><a href="#0">Application</a></li>
						<li><a href="#0">Logging</a></li>
					</ul>
				</li>

			</ul>

			<ul>
				<li class="cd-label">Action</li>
				<li class="action-btn"><a href="#0">+ Button</a></li>
			</ul>
		</nav>

		<div class="content-wrapper"> <body>
			<section>
				<div class="tabs tabs-style-iconbox">
					<nav>
						<ul>
							<li><a href="#section-iconbox-1" class="icon icon-home"><span>Home</span></a></li>
							<li><a href="#section-iconbox-2" class="icon icon-gift"><span>Deals</span></a></li>
							<li><a href="#section-iconbox-3" class="icon icon-upload"><span>Upload</span></a></li>
							<li><a href="#section-iconbox-4" class="icon icon-coffee"><span>Work</span></a></li>
							<li><a href="#section-iconbox-5" class="icon icon-config"><span>Settings</span></a></li>
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-iconbox-1">
						  <div id="table" class="table-editable">
							<span class="table-add glyphicon glyphicon-plus"></span>
							<table class="table">
							  <tbody><tr>
								<th>Name</th>
								<th>Value</th>
								<th></th>
								<th></th>
							  </tr>
							  <tr>
								<td contenteditable="true">Stir Fry</td>
								<td contenteditable="true">stir-fry</td>
								<td>
								  <span class="table-remove glyphicon glyphicon-remove"></span>
								</td>
								<td>
								  <span class="table-up glyphicon glyphicon-arrow-up"></span>
								  <span class="table-down glyphicon glyphicon-arrow-down"></span>
								</td>
							  </tr>
							  <!-- This is our clonable table line -->
							  <tr class="hide">
								<td contenteditable="true">Untitled</td>
								<td contenteditable="true">undefined</td>
								<td>
								  <span class="table-remove glyphicon glyphicon-remove"></span>
								</td>
								<td>
								  <span class="table-up glyphicon glyphicon-arrow-up"></span>
								  <span class="table-down glyphicon glyphicon-arrow-down"></span>
								</td>
							  </tr>
							</tbody></table>
						  </div>
						</section>
						<section id="section-iconbox-2">
							<p>2</p>
						</section>
						<section id="section-iconbox-3">
							<p>3</p>
						</section>
						<section id="section-iconbox-4">
							<p>4</p>
						</section>
						<section id="section-iconbox-5">
							<p>5</p>
						</section>
					</div><!-- /content -->
				</div><!-- /tabs -->
			</section>
		
			<h1>Responsive Sidebar Navigation</h1>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script src="js/cbpFWTabs.js"></script>

        <script>
      var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');
$('.table-add').click(function () {
    var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $TABLE.find('table').append($clone);
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

    
    <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
</body>
</html>