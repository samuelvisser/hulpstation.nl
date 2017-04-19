<?php include('includes/document_start.php'); ?>
<div class="Wrap BodyWrap">
	<div class="Wrap">
		<div class="Row Wysiwyg">
			<section class="Col OneOfOne">
				<?php
					$NewLayers[] = '46';
					$IllegalLayers = Layer($Mysqli, '', $NewLayers);
					$IllegalLayers = join(',', $IllegalLayers);
				
					switch($Segment[0]){
						case 'studenten':
							$SearchValue = str_replace('%20',' ',$Segment[2]);
							$SearchValue = preg_replace('/\s+/', ' ',$SearchValue);
							
							$NewLayerQuery = "SELECT * FROM `CMS_PAGES` WHERE NOT ID IN ({$IllegalLayers})";
							$NewLayerResult = @ $Mysqli->query($NewLayerQuery);
							
							$IllegalLayers = '';
						
							while($NewLayerRow = $NewLayerResult->fetch_array()){
								$IllegalLayers[] = $NewLayerRow['ID'];
							};
								
							$IllegalLayers = join(',', $IllegalLayers);	
						break;
						default:
							$SearchValue = str_replace('%20',' ',$Segment[1]);
							$SearchValue = preg_replace('/\s+/', ' ',$SearchValue);
					};

					$InputValue = $SearchValue;
					$ExtraClass = '';
					
					if(!empty($SearchValue)){
				?>
				
				<div class="BorderSpace">
					<h2 class="DoubleHeader">Zoekresultaten &ldquo;<?php echo $SearchValue; ?>&rdquo;</h2>
				</div>
				
				
				<?php
					}else{
						$InputValue = 'zoeken';
						$ExtraClass = 'NoSearch';
				?>
				
				<div class="BorderSpace">
					<h2 class="DoubleHeader">Zoeken</h2>
				</div>
				
				<?php
					};
				?>
				
				<div class="BorderSpace">
					<fieldset class="FormWrap">
						<form name="SearchForm" action="<?php echo $SearchLocation; ?>" method="post">
							<div class="SearchFieldWrap <?php echo $ExtraClass; ?>">
							<label class="FieldLabel Search">
								<input name="Search" class="Input Field" type="text" value="<?php echo $InputValue; ?>" attrValue="zoeken" attrType="Search"/>
							</label>
							<input class="ActionButton SearchButtond" type="submit" value="zoeken"/>
							</div>
						</form>
					</fieldset>
				</div>
				
				<?php
				
					if(!empty($SearchValue)){
					
						$PartsSearchValue = explode(' ', $SearchValue);
						
						$ArrayPageID = '';
						
						foreach($PartsSearchValue as $PartSearchValue){
						
							$Query = "SELECT * FROM `CMS_PAGES` WHERE NAME LIKE '%{$PartSearchValue}%' AND NOT ID IN ({$IllegalLayers});";
							$Query .= "SELECT * FROM `FORM_CONTENT_PAGE` WHERE FIELD_INTRO LIKE '%{$PartSearchValue}%' AND NOT ID IN ({$IllegalLayers})";
							
							if (mysqli_multi_query($Mysqli,$Query)){
								do{
									if ($Result = mysqli_store_result($Mysqli)){
										while ($Row = mysqli_fetch_row($Result)){
												$PageID = $Row[0];
												$ArrayPageID[] = $PageID;
										}
										mysqli_free_result($Mysqli);
									}
								}
								while (mysqli_next_result($Mysqli));
							}
							
							$Query = "SELECT * FROM `WYGWAM_WYGWAM_SECTION` WHERE FIELD_TITLE LIKE '%{$PartSearchValue}%' OR FIELD_TEXT LIKE '%{$SearchValue}%' AND NOT PAGE IN ({$IllegalLayers});";
							
							if (mysqli_multi_query($Mysqli,$Query)){
								do{
									if ($Result = mysqli_store_result($Mysqli)){
										while ($Row = mysqli_fetch_row($Result)){
												$PageID = $Row[1];
												$ArrayPageID[] = $PageID;
										}
										mysqli_free_result($Mysqli);
									}
								}
								while (mysqli_next_result($Mysqli));
							} 
						
						}
						
					
						$ArrayPageID = array_count_values($ArrayPageID);
						arsort($ArrayPageID);
						
						
						$Count = 0;
						$TotalValues = count($ArrayPageID);
						
						if(empty($ArrayPageID)){
							echo <<<END
								<div class="Col ThreeOfFive">
									<section class="BorderSpace">
										<div class="NoResults">
										<p>Uw zoekterm &ldquo;$SearchValue&rdquo; heeft geen overeenkomstige pagina&rsquo;s gevonden.</p>
										</div>
									</section>
								</div>
END;
						}else{
						
							//create search results
							
							foreach($ArrayPageID as $PageID=>$Amount){
								$Count = $Count + 1; //Close after 2 results
								
				    			$SearchQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '{$PageID}'";
				    			$SearchResult = @ $Mysqli->query($SearchQuery);
								$SearchRow = $SearchResult->fetch_array();
								
								$PageTitle = $SearchRow['NAME'];
								$PageTitle = CleanTitle($PageTitle);
								$PageUrl = $SearchRow ['UNIQUE_NAME'];
								$PageUrl = CreateUrl($Mysqli, $PageUrl, '/'.$PageUrl);
								
								//Gaan zoeken naar content
								
								$ContentQuery = "SELECT * FROM `FORM_CONTENT_PAGE` WHERE ID = '{$PageID}'";
								$ContentResult = @ $Mysqli->query($ContentQuery);
								$ContentRow = $ContentResult->fetch_array();
								$Content = $PageTitle;
								
								if($ContentResult->num_rows == 1){
									$Content = $ContentRow['FIELD_INTRO'];
									$Content = substr($Content,0,200);
									$Content = CreatHtml($Mysqli, $Content);
									$Content = CleanHtml('<', '>', $Content);
									
								};
								
								$ExtraClass = '';
								
								if($Count % 2 != 0){
									$ExtraClass .= 'Odd ';
								}else {
									$ExtraClass .= 'Even ';
								}
								
								echo <<<END
										<div class="Col OneOfTwo $ExtraClass">
											<section class="BorderSpace">
												<a href="$PageUrl" class="SearchResult">
													<h3>$PageTitle</h3>
													<p>$Content...</p>
													<span class="ReadMore">lees meer</span>
												</a>
											</section>
										</div>
END;
							};
						};
					};					
				?>
				
			</section>
		</div>
	</div>
	
	<?php include('includes/footer.php'); ?>
	<?php include('includes/header.php'); ?>
</div>
<?php include('includes/document_end.php'); ?>