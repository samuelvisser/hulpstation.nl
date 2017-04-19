<?php
function CleanTitle($Title){
	
	$PartTitle = explode(" ", $Title);
	$PartTitle = end($PartTitle);
							
	if(is_numeric($PartTitle)){
		$Title = preg_replace('/'.$PartTitle.'$/', '', $Title);
	}
	
	return $Title;
};
?>