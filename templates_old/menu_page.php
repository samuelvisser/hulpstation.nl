<?php include('includes/document_start.php'); ?>
<div class="Wrap BodyWrap">
	<div class="Wrap">
		<div class="Row Wysiwyg">
			<section class="Col OneOfOne">
				<div class="BorderSpace">
					<?php
						$PageSegment = end($Segment);
						$PageQuery = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$PageSegment}'"; 
						$PageResult = @ $Mysqli->query($PageQuery);
						$PageRow = $PageResult->fetch_array();
						
						$PageID = $PageRow['ID'];
						$PageTitle = $PageRow['NAME'];

					?>
				
					<h2 class="DoubleHeader"><?php echo CleanTitle($PageTitle); ?></h2>
				</div>
				
				
				<?php
					if($PageID == 48){
						$HeaderQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$PageID}' ORDER BY `NAME`"; 
					}else{
						$HeaderQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$PageID}' ORDER BY `ID`"; 
					}
				
					$HeaderResult  = @ $Mysqli->query($HeaderQuery);
					
					$Counter = 0;
					$CounterOdd = 0;
					
					while($HeaderRow = $HeaderResult->fetch_array()){
							$HeaderName = $HeaderRow['NAME'];
							$HeaderLink = $HeaderRow['UNIQUE_NAME'];
							$HeaderID = $HeaderRow['ID'];
						
						$Counter++;
						$CounterOdd++;
						$ExtraClass = '';
					
						if($Counter == 3){
							$Counter = 0;
						}else if($Counter == 1){
							$ExtraClass .= 'First ';
						};
						
						if($CounterOdd % 2 != 0){
							$ExtraClass .= 'Odd ';
						}else {
							$ExtraClass .= 'Even ';
						}
						
				?>		
				<div class="Col OneOfThree <?php echo $ExtraClass;?>">
					<section class="BorderSpace">
						<h3><?php echo CleanTitle($HeaderName); ?></h3>
						<ul class="LinkList">
				<?php
						
						$LinkQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$HeaderID}' ORDER BY `ID`"; 
						$LinkResult  = @ $Mysqli->query($LinkQuery);
						
						while($LinkRow = $LinkResult->fetch_array()){
							$CounterLeft = $CounterLeft + 48;
							
							$LinkName = $LinkRow['NAME'];
							$LinkName = CleanTitle($LinkName);
							$LinkLink = $LinkRow['UNIQUE_NAME'];
			?>
						<li>
							<a href="<?php echo CreateUrl($Mysqli, $LinkLink, '/'.$LinkLink); ?>" title="<?php echo $LinkName ?>"><?php echo $LinkName; ?></a>
						</li>
			<?php
						};
				?>
						</ul>
					</section>
				</div>
				
				<?php
						
					};
					
				?>
				
			</section>
		</div>
	</div>
	
	<?php include('includes/footer.php'); ?>
	<?php include('includes/header.php'); ?>
</div>
<?php include('includes/document_end.php'); ?>