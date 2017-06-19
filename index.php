<?php
	session_start();
	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = "homepage";
	}

	include_once "actions/$action.php";
	$BodyContent = $action();

	include_once "actions/ShowNavbarOptionContent.php";
	$NavbarContent = ShowNavbarOptionContent();

	include_once "actions/ShowAboutSiteMsg.php";
	$AboutSiteContent = ShowAboutSiteMsg();
	
?>

<html>
	<head>
		<title>KUAS線上記帳系統</title>
		<meta charset="UTF-8">
		<link rel="Shortcut Icon" type="image/x-icon" href="money_icon.ico" />
		<link rel="stylesheet" type="text/css" href="templates/buttons.css" />
		<link rel="stylesheet" type="text/css" href="templates/icon.css" />
		<link rel="stylesheet" type="text/css" href="templates/style.css" />
		<link rel="stylesheet" type="text/css" href="templates/main.css" />

	</head>
	<body>
		<nav class="navbar-section navbar navbar-fixed">
			<div id="logo">
				<a href="index.php?action=homepage" target="_self" class="logo-url main-font-family"><b>KUAS線上記帳系統</b></a>
			</div>

			<?php 

				echo $NavbarContent; 

			?>

		</nav>
		<div class="content-section content content-fixed">
			<?php 

				echo $BodyContent;
					
				echo $AboutSiteContent;
			?> 
		</div>

	</body>
</html>