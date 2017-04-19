<?php include('includes/document_start.php'); ?>

<?php
$PageSegment = end($Segment);
if(empty($PageSegment)){
	$PageSegment = 'home';
}

$PageQuery = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$PageSegment}'"; 
$PageResult = @ $Mysqli->query($PageQuery);
$PageRow = $PageResult->fetch_array();

$PageID = $PageRow['ID'];

$ContentQuery = "SELECT * FROM  `FORM_HOME_PAGE` WHERE ID = '{$PageID}'"; 
$ContentResult = @ $Mysqli->query($ContentQuery);
$ContentRow = $ContentResult->fetch_array();

$PageImg = $ContentRow['FIELD_IMG_1'];
$PageTitle = $ContentRow['FIELD_TITLE_1'];
						
?>

<div class="Wrap BodyWrap">
	<div class="ImgWrap Home" style="background-image:url('<?php echo $BaseUrl.'/uploads/'.$PageImg; ?>')">
		<div class="Row Visible">
			<div class="FilterBlockWrap">
				<div class="BorderSpace FilterStudent">
					<div class="FilterBlock">
						<div class="BorderSpace Wysiwyg">
							<h2><?php echo $PageTitle; ?></h2>
						</div>
						<div class="Col OneOfTwo">
							<div class="BorderSpace Wysiwyg">
							</div>
						</div>
						<div class="FilterCol Left">
						
						
							<ul class="FilterLeft">
							
								<?php
									$AdsCounter = 0;
									 
									$AdsQuery = "SELECT * FROM `WYGWAM_WYGWAM_ADS` WHERE PAGE = '{$PageID}' ORDER BY `ID` ASC LIMIT 4";
									$AdsResult = @ $Mysqli->query($AdsQuery);
									
									while($AdsRow = $AdsResult->fetch_array()){
										$AdsID = $AdsRow['FIELD_AD'];
										
										$AdQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '{$AdsID}'";
										$AdResult = @ $Mysqli->query($AdQuery);
										
										if($AdResult->num_rows == 1){
											$AdRow = $AdResult->fetch_array();
											$AdUniqueName = $AdRow['UNIQUE_NAME'];
											$AdUrl = CreateUrl($Mysqli, $AdUniqueName, '/'.$AdUniqueName);
											$AdTitle = $AdRow['NAME'];
											$AdTitle = CleanTitle($AdTitle);
											
											$AdsCounter++;
											$ExtraClass = '';
											$ExtraAttr = 'Closed';
											
											if($AdsCounter == 1){
												$ExtraClass = 'Open';
												$ExtraAttr = 'Open';
											};
										
								?>	
								
								<li class="FilterLi <?php echo $ExtraClass; ?>">
									<a href="<?php echo $AdUrl; ?>" title="<?php echo $AdTitle; ?>" class="FilterA Filter" attrStatus="<?php echo $ExtraAttr; ?>"><?php echo $AdTitle; ?></a>
									
									<div class="FilterCol Right">
										<div class="FilterRight">
											
											<?php 
												$FilterQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$AdsID}' ORDER BY `ID` ASC";
												$FilterResult = @ $Mysqli->query($FilterQuery);
												$FilterRow = $FilterResult->fetch_array();
												
												$FilterName = $FilterRow['NAME'];
												$FilterName = CleanTitle($FilterName);
												$FilterUrl = $FilterRow['UNIQUE_NAME'];
												$FilterUrl = CreateUrl($Mysqli, $FilterUrl, '/'.$FilterUrl);
											?>
											
											<div class="SelectField" attrStatus="Closed">
												<span class="SelectValue" attrHref=""><?php echo $FilterName; ?></span>
												<div class="SelectArrow"></div>
											</div>
											<div class="SelectUlWrap">
												<ul class="SelectUl">
													<span class="SelectDecorate"></span>
												
											<?php
												echo <<<END
														<li class="SelectOption DropLi" attrHref="$FilterUrl">$FilterName</li>
END;

												while($FilterRow = $FilterResult->fetch_array()){
													$OptionName = $FilterRow['NAME'];
													$OptionName = CleanTitle($OptionName);
													$OptionUrl = $FilterRow['UNIQUE_NAME'];
													$OptionUrl = CreateUrl($Mysqli, $OptionUrl, '/'.$OptionUrl);
													
													echo <<<END
														<li class="SelectOption DropLi" attrHref="$OptionUrl">$OptionName</li>
END;
												};
											
											?>
													<span class="SelectDecorate"></span>
												</ul>
											</div>
											<a href="<?php echo $FilterUrl; ?>" title="<?php echo $FilterName; ?>" class="ActionButton Filter">Direct solliciteren</a>
										</div>
									</div>
								</li>	
										
								<?php
										};
										
									};
									
								//more options	
								
								$AdsQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '163' ORDER BY `ID` ASC LIMIT 1";
								$AdsResult = @ $Mysqli->query($AdsQuery);
								
								if($AdsResult->num_rows == 1){
									$AdRow = $AdsResult->fetch_array();
									$OptionName = $AdRow['NAME'];
									$OptionName = CleanTitle($OptionName);
									$OptionUrl = $AdRow['UNIQUE_NAME'];
									$OptionUrl = CreateUrl($Mysqli, $OptionUrl, '/'.$OptionUrl);
								
									
									echo <<<END
										<li class="FilterLi">
											<a class="FilterA" href="$OptionUrl" title="$OptionName">Overige vacatures</a>
										</li>
END;
								}
								
								?>
								
							</ul>
						
						
						
							
						</div>
						
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="Wrap">
		<div class="Row Wysiwyg">
			<?php		
				$Counter = 	array('1', '2');	
				
				foreach($Counter as $Count){
					
					$Title = $ContentRow['FIELD_HOME_TITLE_COL_'.$Count];
					$Title = CleanTitle($Title);
					$Content = $ContentRow['FIELD_HOME_TEXT_COL_'.$Count];
					$Content = CreatHtml($Mysqli, $Content);
					
					$ExtraClass = '';
					if($Count == 1){
						$ExtraClass .= 'FiveOfEight ';
					}else {
						$ExtraClass .= 'ThreeOfEight ';
					}
					
					echo <<<END
						<div class="Col OneOfThree $ExtraClass">
							<section class="BorderSpace">
								<h3>$Title</h3>
								$Content
							</section>
						</div>
END;
				};
			?>
		</div>
	</div>
	
	<?php include('includes/footer.php'); ?>
	<?php include('includes/header.php'); ?>
</div>
<?php include('includes/document_end.php'); ?>