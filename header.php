<!doctype html>
<html lang="en" class="no-js" style="scroll-behavior: smooth;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">



		<link rel="shortcut icon" type="image/jpg" href="/Netsuite-uploader-PHPToolkit/netsuite.ico"/>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="/Netsuite-uploader-PHPToolkit/css/theme.css"> <!-- Resource style -->
	<link rel="stylesheet" href="/Netsuite-uploader-PHPToolkit/css/nav.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="/Netsuite-uploader-PHPToolkit/css/style.css"> <!-- Resource style -->
	
	<script src="/Netsuite-uploader-PHPToolkit/js/modernizr.js"></script> <!-- Modernizr -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.18/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.18/js/uikit-icons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-signals/1.0.0/js-signals.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/hasher/1.2.0/hasher.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crossroads/0.12.2/crossroads.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.6.2/ckeditor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.calenstyle/latest/calenstyle.min.css" />
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.calenstyle/latest/calenstyle.min.js"></script>
	<!-- For i18n -->
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.calenstyle/latest/i18n/calenstyle-i18n.js"></script>
	<script type="text/javascript" src="/Netsuite-uploader-PHPToolkit/js/CalJsonGenerator.js"></script>	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.js"></script>
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />

	<script src="/Netsuite-uploader-PHPToolkit/js/jquery.menu-aim.js"></script>
	<script src="/Netsuite-uploader-PHPToolkit/js/main.js"></script> <!-- Resource jQuery -->
	<style>
		.uk-card-default .uk-nav-default{
			margin: 0px -30px;
		}
		select{
			font-size: 15px !important;
		}
		.uk-nav>li>span{
			color: #d2d2d2;
			padding: 5px 0;
			display: block;
    		text-decoration: none;
		}
		.cd-side-nav{
			margin-top: 0px !important;
		}
		.cd-main-content .content-wrapper{
			padding: 0px !important;
		}
		.uk-table :not(:last-child) > td{
			border-right: 1px solid #e5e5e5;
			border-left: 1px solid #e5e5e5;
		}
	</style>
	<title>Netsuite Uploader</title>
</head>
<body>
	<!-- <header class="cd-main-header">
		<a href="index.php" class="cd-logo">
			CSVImports
		</a>
		
		<div class="cd-search is-hidden">
			<form action="#0">
				<input type="search" placeholder="Search...">
			</form>
		</div> 

		<a href="#" class="cd-nav-trigger"><span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">

			</ul>
		</nav>
	</header>  -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			
			<ul class="uk-nav uk-nav-default">
				
				<li class="cd-label">Main</li>
				<li class="has-children overview active">
					<a href="/Netsuite-uploader-PHPToolkit/index.php">Migrate Data</a>
					
				</li>
				<li class="has-children users">
					<a href="/Netsuite-uploader-PHPToolkit/templates/Upload%20Chart%20of%20Accounts/list.php">Chart Of Accounts</a>
					
				</li>
				<li class="has-children bookmarks">
					<a href="/Netsuite-uploader-PHPToolkit/templates/Upload%20Journal%20Entry/list.php">Journal Entry</a>
					
				</li>
				
			</ul>

			<ul>
				<li class="cd-label">Files</li>
				<li class="has-children bookmarks">
					<a href="#">CSV Files</a>
					
					<ul>
						<li><a href="#events/calendar">Calendar overview</a></li>
						<li><a href="#events/event">Add a new event</a></li>
						<li><a href="#events/appointments">Appointments</a></li>
					</ul>
				</li>
				
				
			</ul>


		</nav>

		<div class="content-wrapper">
        <!-- Page Content -->
		<br />
		<br />
        <!-- <div id="page-content-wrapper uk-margin-top" class="uk-card uk-card-default uk-card-body"> -->
        	<div id="page-content-wrapper uk-margin-top">
			<div class="uk-container uk-container-large" id="content">