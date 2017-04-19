<?php
function Layer($Mysqli, $OldLayer, $NewLayers){
	$Found = 'false';
	
	foreach($NewLayers as $LayerID){
		$LayerQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$LayerID}'"; 
		$LayerResult = @ $Mysqli->query($LayerQuery);
		$OldLayer[] = $LayerID;
		
		if($LayerResult->num_rows > 0){
			$Found = 'true';
	
			while($LayerRow = $LayerResult->fetch_array()){
				$NewLayer = $LayerRow['ID'];
				$NewestLayers[] = $NewLayer;
			}
		}
	}
	
	if($Found == 'true'){
		return Layer($Mysqli, $OldLayer, $NewestLayers);
	}else{
		return $OldLayer;
	}
	
};

?>