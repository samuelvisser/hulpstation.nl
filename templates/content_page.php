<?php include('includes/document_start.php'); ?>

<div class="_new-style-guide">
	<?php include('includes/new/header.php'); ?>
</div>


<?php
	$PageSegment = end($Segment);
	$PageQuery = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$PageSegment}'"; 
	$PageResult = @ $Mysqli->query($PageQuery);
	$PageRow = $PageResult->fetch_array();
	
	$PageID = $PageRow['ID'];
	$PageTitle = $PageRow['NAME'];
	$FormID = $PageRow['FORM'];
	$LayerID = $PageRow['LAYER'];
	
	$FormsQuery = "SELECT * FROM `CMS_FORMS` WHERE ID = '{$FormID}'"; 
	$FormsResult = @ $Mysqli->query($FormsQuery);
	$FormsRow = $FormsResult->fetch_array();
	
	$FormName = $FormsRow['UNIQUE_NAME'];
	
	$ContentQuery = "SELECT * FROM `{$FormName}` WHERE ID = '{$PageID}'"; 
	$ContentResult = @ $Mysqli->query($ContentQuery);
	$ContentRow = $ContentResult->fetch_array();
	
	$ContentImg = '';
	$ContentIntro = $ContentRow['FIELD_INTRO'];
	$ContentLink = $ContentRow['FIELD_LINK'];
	$ContentImg = $ContentRow['FIELD_IMG'];
	$ContentWygwamID = $ContentRow['FIELD_SECTION'];
?>

	

<div class="Wrap <?php if(empty($ContentImg)){ echo 'BodyWrap';}else{ echo 'BodyWrapImg'; }; ?> ">
	<section class="Wrap">
		<?php 
			if(!empty($ContentImg)){ 
				echo <<<END
					<div class="ImgWrap Content"  style="background-image:url('$BaseUrl/uploads/$ContentImg')" >
					</div>
END;
	
			}; 
		?>
	
	
	
		<div class="Row Wysiwyg">
			<div class="Col FiveOfEight">
					<?php
						
						echo '<section class="BorderSpace ">';
						echo '<div class="_wysiwyg"><h1>'.CleanTitle($PageTitle).'</h1></div>';
						echo CreatHtml($Mysqli, $ContentIntro);
						echo '</section>';
						
						$WygwamQuery = "SELECT * FROM `WYGWAM_WYGWAM_SECTION` WHERE PAGE = '{$PageID}'";
						$WygwamResult = @ $Mysqli->query($WygwamQuery);
						
						while($WygwamRow = $WygwamResult->fetch_array()){
							$WygwamTitle = $WygwamRow['FIELD_TITLE'];
							$WygwamText = $WygwamRow['FIELD_TEXT'];
							
							echo '<section class="BorderSpace">';
							echo '<div class="_wysiwyg"><h2>'.CleanTitle($WygwamTitle).'</h2></div>';
							echo CreatHtml($Mysqli, $WygwamText);
							echo '</section>';
							
						};
						
						
					?>
				
			</div>
			
			<?php include('includes/sidebar.php'); ?>
		</div>
	</section>
	
	<div class="_new-style-guide">
	<?php include('includes/new/footer.php'); ?>
	</div>
	
</div>
<?php include('includes/document_end.php'); ?>