<?php

$client_name = "TruCraft";

?>
<html>
	<head>
		<title><?=$client_name?> Dashboard</title>
		<!-- SCRIPTS GO HERE -->
		<link href="css/cupertino/jquery-ui-1.10.4.custom.css" rel="stylesheet">
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui-1.10.4.custom.js"></script>
	<style>
		body {
			margin: 0;
			font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
			font-size: 65%;
		}

		#welcome_span {
			font-size: 2em;
			font-weight: bold;
		}

		#main_div {
			height: auto;
			margin: 0px;
			padding: 20px 10%;
		}

		#logo_div {
			width: 25%;
			float: left;
		}

		#banner_div {
			
		}

		#contents_div {
			height: 90%;
		}

		#toc_div {
			width: 20%;
			clear: both;
			float: left;
		}

		#content_div {
			
		}

		#copy_div {
			width: 80%;
			clear: both;
			float: left;
		}

		#version_div {
			
		}
	</style>
	</head>
	
	<body>
		<div id='main_div'>
			<div id='header_div'>
				<div id='logo_div'>
					<img src='images/logo.png' style='float:left;'/><span id='welcome_span'>Welcome <?=$client_name?></span>
				</div>
				<div id='banner_div'>
					Banner ad
				</div>
			</div>
			<div id='contents_div'>
				<div id='toc_div'>
					<? include('toc.php'); ?>
				</div>
				<div id='content_div'>
					Content
				</div>
			</div>
			<div id='footer_div'>
				<div id='copy_div'>
					Copyright &copy; 2014 TruCraft
				</div>
				<div id='version_div'>
					Version 0.0.1
				</div>
			</div>
		</div>
	</body>
</html>
