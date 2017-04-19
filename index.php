<?php
	## Debug script (system-wide)
	require('system/debug.php');

	## Required scripts
	require_once('system/functions.php');

	## ROUTER
	if(empty($Segment[0])) {
		GetTemplate('index');
	} else {
		switch($Segment[0]) {
			case 'images':
				$File = $BaseUrl . '/uploads/' . $Segment[1];
				$Size = $Segment[2];
				ResizeImg($File, $Size);
				break;
			case 'ajax':
				switch($Segment[1]) {
					case 'extra_form':
						AddForm($Mysqli, $_POST);
						break;
					case 'request':
						SendRequest($Mysqli, $_POST);
						break;
					case 'contact':
						SendContact($Mysqli, $_POST);
						break;
					case 'phone':
						SendPhone($Mysqli, $_POST);
						break;
					default:
						header("Location:/");
				}
				break;
			case '':
				GetTemplate('index');
				break;
			case 'zoeken':
				if(!empty($Segment[2])) {
					header("Location:/zoeken");
				} else {
					if(isset($_POST['Search'])) {
						$SearchValue = htmlspecialchars($_POST['Search']);
						header("Location:/zoeken/" . $SearchValue);
					} else {
						GetTemplate('search');
					}
				}
				break;
			case 'probleem_melden':
				if(empty($Segment[2])) {
					GetTemplate('form_page');
				} else {
					header("Location:/probleem_melden/");
				}
				break;
			case 'studenten':
				if(empty($Segment[1])) {
					GetTemplate('student_page');
					//}else if($Segment[1] == 'solliciteer'){
					//	GetTemplate('apply_page');
				} elseif($Segment[1] == 'zoeken') {
					if(empty($Segment[3])) {
						if(isset($_POST['Search'])) {
							$SearchValue = htmlspecialchars($_POST['Search']);
							header("Location:/studenten/zoeken/" . $SearchValue);
						} else {
							GetTemplate('search');
						}
					} else {
						GetTemplate('search');
					}
				} else {
					$LastSegment = end($Segment);
					$Count = 0;
					$PrevSegment = "";
					$SementMemory = "";

					CheckFullUrl($Mysqli, $Segment, $Count, $PrevSegment, $SementMemory);
				}
				break;
			default:
				// $LastSegmentNumber = $TotalSegments - 1;
				$LastSegment = end($Segment);
				$Count = 0;
				$PrevSegment = "";
				$SementMemory = "";

				CheckFullUrl($Mysqli, $Segment, $Count, $PrevSegment, $SementMemory);
		}
	}
?>
