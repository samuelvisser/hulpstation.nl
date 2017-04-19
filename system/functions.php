<?php
	// Change if you're running this website locally
	$running_local = false;

	// Message to show if site couldn't be loaded (database connection error or failed to get url)
	$error_message = 'Op dit moment wordt onze website aangepast. Onze excuses voor het ongemak. U kunt ons wel telefonisch bereiken via 085 401 93 66 of mailen naar info@hulpstation.nl.';

	//Functions
	// Get segment
	$Segment = preg_split('/\//', $_SERVER['REQUEST_URI'], 0, PREG_SPLIT_NO_EMPTY);
	$Url = 'http://' . $_SERVER['HTTP_HOST'];

	//Database properties
	//$DbServer = 'db.hulpstation.nl';
	if($_SERVER['HTTP_HOST'] == '192.168.33.10') {
		$DbServer = 'localhost';
		$DbUsername = 'root';
		$DbPassword = 'root';
		$DbName = 'hulpstation';

		## Set local options
		$running_local = true;
		error_reporting(-1);
	} else {
		$DbServer = 'db.hulpstation.nl';
		$DbUsername = 'md360916db323178';
		$DbPassword = 't79I97Uu';
		$DbName = 'md360916db323178';

		## Turn on error reporting
		error_reporting(0);
	}


	// Get base URL based on working mode (local or online)
	if($running_local) {
		$BaseUrl = 'http://192.168.33.10';
	} else {
		$BaseUrl = 'http://www.hulpstation.nl';
	}

	// Redirect if necessary
	if($Url != $BaseUrl) {
		header('location:' . $BaseUrl . $_SERVER['REQUEST_URI']);
	}

	//Database connection
	$Mysqli = @ new mysqli($DbServer, $DbUsername, $DbPassword);
	if(!$Mysqli->ping()) {
		echo $error_message;
		die();
	}

	$Mysqli->select_db($DbName);

	//Required scripts
	require('system/templates.php');
	require('system/resize.php');
	require('system/url.php');
	require('system/title.php');
	require('system/html.php');

	require('system/ajax.php');
	require('system/add_form.php');
	require('system/layers.php');
?>
