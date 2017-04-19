<?php
	global 	$PageName,
			$Segment,
			$BaseUrl;

	$DocumentTitle = '';
	$DocumentTitle = end($Segment);

	$DocumentTitle = str_replace('_',' ',$DocumentTitle);
	$DocumentTitle = str_replace('%20',' ',$DocumentTitle);
	$DocumentTitle = preg_replace('/\s+/', ' ',$DocumentTitle);
	$DocumentTitle = ucfirst($DocumentTitle);

	$DocumentTitle = '- '.CleanTitle($DocumentTitle);

	if($DocumentTitle == '- Home' || $DocumentTitle == '- '){
		$DocumentTitle = '';
	}

	/*========================================================
	verkrijg page ID
	========================================================*/
	$LastSegment = end($Segment);
	$Query = "SELECT * FROM  `CMS_PAGES` WHERE UNIQUE_NAME = '{$LastSegment}'";
	$Result = @ $Mysqli->query($Query);

    if(is_bool($Result)) {
		global $error_message;
		die($error_message);
	}else{
		$Row = $Result->fetch_array();

		$PageID = $Row['ID'];

		if($PageID == '') {
			$PageID = '2';
		}
    }

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="nl" dir="ltr" class="trident lte9 lte8 lte7 ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="nl" dir="ltr" class="trident lte9 lte8 ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="nl" dir="ltr" class="trident lte9 ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="nl" dir="ltr" class="trident ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="nl" dir="ltr" class=""> <!--<![endif]-->
	<head>



		<!-- Define a charset!.. always use utf-8. -->
		<meta charset="utf-8" />

		<!-- Mobile viewport... -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Use unique pagetitles/descriptions/keywords per page for best seo. -->

<?php
	$TitleQuery = "SELECT `FIELD_DOCUMENT_TITLE_1` FROM  `FORM_CONTENT_PAGE` WHERE ID = '{$PageID}';";
	$TitleQuery .= "SELECT `FIELD_DOCUMENT_TITLE_4` FROM  `FORM_FAQ_PAGE` WHERE ID = '{$PageID}';";
	$TitleQuery .= "SELECT `FIELD_DOCUMENT_TITLE_3` FROM  `FORM_FORM_PAGE` WHERE ID = '{$PageID}';";
	$TitleQuery .= "SELECT `FIELD_DOCUMENT_TITLE` FROM  `FORM_HOME_PAGE` WHERE ID = '{$PageID}';";
	$TitleQuery .= "SELECT `FIELD_DOCUMENT_TITLE_2` FROM  `FORM_MENU_PAGE` WHERE ID = '{$PageID}';";
	//$TitleResult = @ $Mysqli->query($TitleQuery);


	$PartDocumentTitle = '';
	// Execute multi query
	if (mysqli_multi_query($Mysqli,$TitleQuery)){
		do{
		    // Store first result set
			if ($TitleResult=mysqli_store_result($Mysqli)){
			    while ($TitleRow=mysqli_fetch_row($TitleResult)){
	        		$PartDocumentTitle = $TitleRow[0];
	        		if ($PartDocumentTitle != ''){
	        			$PartDocumentTitle = ' | '. $PartDocumentTitle;
	        		}
		        }

				mysqli_free_result($TitleResult);
			}

			//mysqli_next_result($Mysqli);
		}
		while (mysqli_next_result($Mysqli));
	}
?>

		<title>Hulpstation.nl <?php echo $DocumentTitle; ?><?php echo $PartDocumentTitle;?></title>

		<!-- Meta tags... -->
		<meta name="author" content="Hulpstation.nl" />
		<meta name="copyright" content="Hulpstation.nl" />
		<meta name="web_author" content="Hulpstation.nl">
		<meta name="robots" content="index,follow">
		<meta name="verification" content="c77fae780688f5eb1175b416c8dd3c9e" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $BaseUrl ?>/assets/img/favicon.ico" />

<?php
/*========================================================
verkrijg Meta tags
========================================================*/

	$MetaQuery = "SELECT * FROM  `WYGWAM_WYGWAM_META` WHERE PAGE = '{$PageID}'";
	$MetaResult = @ $Mysqli->query($MetaQuery);

	if($MetaResult->num_rows == 0){
		//Geen meta gevonden
		echo <<<END
			<meta name="description" content="Computerhulp, les aan huis en webontwerp. Voor computer opschonen, virus verwijderen of trage computer sneller maken, Maak nu een afspraak!" />
			
END;

	}else{
		//Meta gevonden
		while($MetaRow = $MetaResult->fetch_array()){
			$MetaName = $MetaRow['FIELD_NAME'];
			$MetaContent = $MetaRow['FIELD_CONTENT'];

			echo <<<END
				<meta name="$MetaName" content="$MetaContent" />
END;
		};
	};
?>


		<link rel="stylesheet" href="/assets/css/gotham.css" type="text/css" />
		<link rel="stylesheet" href="/assets/css/global.css" type="text/css" />

		<!-- Nieuwe css-->
		<link rel="stylesheet" href="/assets_new/css/global_12.css" type="text/css" />


				<!-- Smartsupp Live Chat script -->

				<script type="text/javascript">
				var _smartsupp = _smartsupp || {};
				_smartsupp.key = '11d19c0b34cacb761c8adf0e38c9e16eade644a8';
				window.smartsupp||(function(d) {
					var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
					s=d.getElementsByTagName('script')[0];c=d.createElement('script');
					c.type='text/javascript';c.charset='utf-8';c.async=true;
					c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
				})(document);
				</script>


			<!-- Eind Live Chat  -->




	</head>

	<body class="remove-body-space">
	
