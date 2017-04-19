<?php
function CreateUrl($Mysqli, $UniqueName, $Url){
	$Query = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$UniqueName}'";
	$Result = @ $Mysqli->query($Query); 
	$Row = $Result->fetch_array();
	$ID = $Row['LAYER'];

	$Query = "SELECT * FROM `CMS_PAGES` WHERE ID = '{$ID}'";
	$Result = @ $Mysqli->query($Query); 
	
	if($Result->num_rows == 1){
		$Row = $Result->fetch_array();
		
		$UniqueName = $Row['UNIQUE_NAME'];
		$Url = '/'.$UniqueName.$Url;
		
		return CreateUrl($Mysqli, $UniqueName, $Url);
	}else{
		return $Url;
	}
}


function CheckFullUrl($Mysqli, $Segment, $Count, $PrevSegment, $SementMemory){
	global $error_message;
	global $running_local;

	$TotalSegments =  count($Segment);

	$PageQuery = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$Segment[$Count]}' AND LAYER = '{$PrevSegment}'";
	$PageResult = @ $Mysqli->query($PageQuery);


	var_dump($PageResult);


	if($PageResult) {
        $PageRow = $PageResult->fetch_array();
        $PageID = $PageRow['ID'];

        $Count++;
        if ($PageResult->num_rows == 1 & $Count == $TotalSegments) {
            $PageTemplate = $PageRow['TEMPLATE'];
            $TemplateQuery = "SELECT * FROM `CMS_TEMPLATES` WHERE ID = '{$PageTemplate}'";
            $TemplateResult = @ $Mysqli->query($TemplateQuery);
            $TemplateRow = $TemplateResult->fetch_array();
            $Template = $TemplateRow['UNIQUE_NAME'];

            if ($Template != 'none') {
                return GetTemplate($Template);
            } else {
                header("Location:/" . $SementMemory);
            }

        } else if ($PageResult->num_rows == 1) {
            $SementMemory .= $Segment[$Count - 1] . '/';

            return CheckFullUrl($Mysqli, $Segment, $Count, $PageID, $SementMemory);
        } else if ($running_local) {
			//header("Location:/hulpstation.nl" . $SementMemory);
		}else{
			header("Location:/" . $SementMemory);
        }
    }else{
		echo $error_message;
		die();
	}
}
?>