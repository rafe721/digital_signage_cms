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
	
	<link rel="stylesheet" href="themes/default/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="themes/default/css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="themes/default/css/tabs.css"> <!-- Resource style -->
	<link rel="stylesheet" href="themes/default/css/tabstyles.css"> <!-- Resource style -->
	<link rel="stylesheet" href="themes/default/css/drag_n_drop.css"> <!-- drag_n_drop_style -->
	<link rel="stylesheet prefetch" href="css/jquery-ui.css">
	<link rel="stylesheet prefetch" href="css/bootstrap.min.css">
	<link rel="stylesheet prefetch" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet prefetch" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<script src="themes/default/js/modernizr.js"></script> <!-- Modernizr -->
	
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
		
		.demo-gallery > ul {
            margin-bottom: 0;
        }
        .demo-gallery > ul > li {
			float: left;
			margin-bottom: 15px;
			margin-right: 20px;
			width: 200px;
		}
		
		.demo-gallery > ul > li a {
			border: 3px solid #FFF;
			border-radius: 3px;
			display: block;
			overflow: hidden;
			position: relative;
			float: left;
		}
		
		.demo-gallery > ul > li a > img {
			-webkit-transition: -webkit-transform 0.15s ease 0s;
			-moz-transition: -moz-transform 0.15s ease 0s;
			-o-transition: -o-transform 0.15s ease 0s;
			transition: transform 0.15s ease 0s;
			-webkit-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
			height: 100%;
			width: 100%;
		}
		
		.demo-gallery > ul > li a:hover > img {
			-webkit-transform: scale3d(1.1, 1.1, 1.1);
			transform: scale3d(1.1, 1.1, 1.1);
		}

	</style>

	<script>
		window.console = window.console || function(t) {};
	</script>
	
  	
	<title>HandySan | Campaigns</title>
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
						<!-- <img src="resources/video/cd-avatar.png" alt="avatar"> -->
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

		<div class="content-wrapper"> <body>
			<section>
				<!-- Media Grid View -->
				<div class="tabs tabs-style-iconbox">
					<nav>
						<ul>
							<li><a href="#section-iconbox-1" class="icon icon-gift"><span>All</span></a></li>
							<li><a href="#section-iconbox-2" class="icon icon-upload"><span>Upload</span></a></li>
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-iconbox-1">
								<!-- UpLoad Media -->
							<div class="demo-gallery">
								<ul id="lightgallery" class="list-unstyled row">
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/1-375.jpg 375, resources/media/1-480.jpg 480, resources/media/1.jpg 800" data-src="resources/media/1-1600.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-1.jpg">
										</a>
									</li>
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/2-375.jpg 375, resources/media/2-480.jpg 480, resources/media/2.jpg 800" data-src="resources/media/2-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-2.jpg">
										</a>
									</li>
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/13-375.jpg 375, resources/media/13-480.jpg 480, resources/media/13.jpg 800" data-src="resources/media/13-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-13.jpg">
										</a>
									</li>
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/4-375.jpg 375, resources/media/4-480.jpg 480, resources/media/4.jpg 800" data-src="resources/media/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-4.jpg">
										</a>
									</li>
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/1-375.jpg 375, resources/media/1-480.jpg 480, resources/media/1.jpg 800" data-src="resources/media/1-1600.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-1.jpg">
										</a>
									</li>
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/2-375.jpg 375, resources/media/2-480.jpg 480, resources/media/2.jpg 800" data-src="resources/media/2-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-2.jpg">
										</a>
									</li>
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/13-375.jpg 375, resources/media/13-480.jpg 480, resources/media/13.jpg 800" data-src="resources/media/13-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-13.jpg">
										</a>
									</li>
									<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="resources/media/4-375.jpg 375, resources/media/4-480.jpg 480, resources/media/4.jpg 800" data-src="resources/media/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
										<a href="#">
											<img class="img-responsive" src="resources/media/thumb-4.jpg">
										</a>
									</li>
								</ul>
							</div>
						</section>
						<section id="section-iconbox-2">
							<div class="container" role="main">
								<form method="post" action="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" enctype="multipart/form-data" novalidate="" class="box has-advanced-upload">	
									<div class="box__input">
										<svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path></svg>
										<input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="">
										<label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
										<button type="submit" class="box__button">Upload</button>
									</div>		
									<div class="box__uploading">Uploading…</div>
									<div class="box__success">Done! <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Upload more?</a></div>
									<div class="box__error">Error! <span></span>. <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Try again!</a></div>
									<input type="hidden" name="ajax" value="1">
								</form>
							</div>
						</section>
					</div><!-- /content -->
				</div><!-- /tabs -->
			</section>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
	<script src="js/jquery-2.1.4.js"></script>
	<script src="js/jquery.menu-aim.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
	<script src="js/cbpFWTabs.js"></script>

	<!-- js Libraries -->
	<script src="lib/jquery-2.1.4.js"></script>
	<script src="lib/jquery.menu-aim.js"></script>
	<script src="themes/default/js/main.js"></script> <!-- Resource jQuery -->
	<script src="themes/default/js/cbpFWTabs.js"></script>
	
	<!-- LightBox --><!--
	<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script src="3rdparty/lightgallery.js"></script>
	<script src="3rdparty/lg-fullscreen.js"></script>
	<script src="3rdparty/lg-thumbnail.js"></script>
	<script src="3rdparty/lg-video.js"></script>
	<script src="3rdparty/lg-autoplay.js"></script>
	<script src="3rdparty/lg-zoom.js"></script>
	<script src="3rdparty/lg-hash.js"></script>
	<script src="3rdparty/lg-pager.js"></script>
	<script src="lib/jquery.mousewheel.min.js"></script> -->

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
	
	<script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
    </script>
</body>
</html>