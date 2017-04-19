<?php include('includes/document_start.php'); ?>
<div class="_new-style-guide">
	<?php include('includes/new/header.php'); ?>
	
	
	<main role="main">
		
		<div class="_row row-space">
			<div class="_container">
				<div class="_col-l-12 _wysiwyg">
					<?php
						$PageSegment = end($Segment);
						$PageQuery = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$PageSegment}'"; 
						$PageResult = @ $Mysqli->query($PageQuery);
						$PageRow = $PageResult->fetch_array();
						
						$PageID = $PageRow['ID'];
						$PageTitle = $PageRow['NAME'];

					?>
				
					<h1><?php echo CleanTitle($PageTitle); ?></h1>
				</div>
				
				
				<div class="_container _cols-l-3n">
						
					<?php
						if($PageID == 48){
							$HeaderQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$PageID}' ORDER BY `NAME`"; 
						}else{
							$HeaderQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$PageID}' ORDER BY `ID`"; 
						}
					
						$HeaderResult  = @ $Mysqli->query($HeaderQuery);
						
						
						while($HeaderRow = $HeaderResult->fetch_array()){
								$HeaderName = $HeaderRow['NAME'];
								$HeaderLink = $HeaderRow['UNIQUE_NAME'];
								$HeaderID = $HeaderRow['ID'];
							
						
							
					?>		
					<div class="_col-l-4 _wysiwyg">
						<h2><?= CleanTitle($HeaderName); ?></h2>
						<ul class="_link-list">
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
					</div>
					
					<?php
							
						};
						
					?>
				
				</div>
				
				
			</div>
		</div>
	</main>
	

	<?php include('includes/new/footer.php'); ?>
</div>
<?php include('includes/document_end.php'); ?>