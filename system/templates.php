<?php
	function GetTemplate($PageName, $Error = true) {
		global $Mysqli;
		global $running_local;

		//Create path for Body and Error
		$PagePath = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $PageName . '.php';
		$ErrorPath = $_SERVER['DOCUMENT_ROOT'] . '/templates/404.php';

		//Include page
		if($running_local) {
			if(!include($PagePath)) {
				if($Error) {
					include($ErrorPath);
				}
			}
		} else {
			if(!@include($PagePath)) {
				if($Error) {
					include($ErrorPath);
				}
			}
		}
	}

?>