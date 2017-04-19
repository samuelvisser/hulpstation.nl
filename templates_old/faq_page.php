<?php include('includes/document_start.php'); ?>
<?php
	$PageSegment = end($Segment);
	$PageQuery = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$PageSegment}'"; 
	$PageResult = @ $Mysqli->query($PageQuery);
	$PageRow = $PageResult->fetch_array();
	
	$PageID = $PageRow['ID'];
	$PageTitle = $PageRow['NAME'];
	$FormID = $PageRow['FORM'];
	$LayerID = $PageRow['LAYER'];
?>

<div class="Wrap BodyWrap">
	<section class="Wrap">

	
		<div class="Row Wysiwyg">
			<div class="Col FiveOfEight">
				<?php
					echo '<section class="BorderSpace">';
					echo '<h2>'.CleanTitle($PageTitle).'</h2>';
					
					$CatagoryQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$PageID}'"; 
					$CatagoryResult = @ $Mysqli->query($CatagoryQuery);
					
					while($CatagoryRow = $CatagoryResult->fetch_array()){
						$CatagoryTitle = $CatagoryRow['NAME'];
						$CatagoryTitle = CleanTitle($CatagoryTitle);
						$CatagoryID = $CatagoryRow['ID'];
						
						echo <<<END
							<section class="Faq">
								<h3>$CatagoryTitle</h3>
									<ul class="FaqUl">
END;

						
									$FaqQuery = "SELECT * FROM `WYGWAM_WYGWAM_SECTION` WHERE PAGE = '{$CatagoryID}'"; 
									$FaqResult = @ $Mysqli->query($FaqQuery);
										
									while($FaqRow = $FaqResult->fetch_array()){
										$FaqTitle = $FaqRow['FIELD_TITLE'];
										$FaqTitle = CleanTitle($FaqTitle);
										$FaqAnswer = $FaqRow['FIELD_TEXT'];
										$FaqAnswer = CreatHtml($Mysqli, $FaqAnswer);
										
										echo <<<END
											<li class="FaqLi">
												<span class="Question" attrStatus="Closed">$FaqTitle</span>
												<div class="Answer">
												$FaqAnswer
												</div>
											</li>
											
END;
									};
						
						echo <<<END
								</ul>
							</section>
END;
						
					};
					
					echo '</section>';
				?>
			</div>
			<?php include('includes/sidebar.php'); ?>
		</div>
	</section>
	
	<?php include('includes/footer.php'); ?>
	<?php include('includes/header.php'); ?>
</div>
<?php include('includes/document_end.php'); ?>