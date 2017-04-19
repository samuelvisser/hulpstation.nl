<?php
//Raphael van der Most Design 2013
//Resize img

function ResizeImg($File, $Size){
	list($DestWidth, $DestHeight) = explode( 'x' , $Size);
		
	// Content type
	header('Content-Type: image/jpeg');

	// Get new sizes
	list($SrcWidth, $SrcHeight) = getimagesize($File);
	
	$SrcRatio = $SrcWidth / $SrcHeight;
	$Destratio = $DestWidth / $DestHeight;
	if( $SrcRatio < $Destratio ){
		$Transform = ($DestWidth /$SrcWidth);
	}else{
		$Transform = ($DestHeight /$SrcHeight);	
	}
	
	$NewWidth = round($SrcWidth*$Transform);
	$NewHeight = round($SrcHeight*$Transform);
	
	$OffsetWidth = -(($NewWidth - $DestWidth)/2);
	$OffsetHeigth = -(($NewHeight - $DestHeight)/2);
	
	
	// Load
	$Thumb = imagecreatetruecolor($DestWidth, $DestHeight);
	$Source = imagecreatefromjpeg($File);
	
	// Resize
	imagecopyresampled($Thumb, $Source, $OffsetWidth, $OffsetHeigth, 0, 0, $NewWidth, $NewHeight, $SrcWidth, $SrcHeight);
	
	
	// Change filter
	//imagefilter($Thumb, IMG_FILTER_COLORIZE, 0, 0, 5);
	//imagefilter($Thumb, IMG_FILTER_CONTRAST, -10);
	//imagefilter($Thumb, IMG_FILTER_BRIGHTNESS, 10);
	
	
	
	// Output
	imagejpeg($Thumb, NULL, 100);
	
	imagedestroy($Thumb);


}
?>