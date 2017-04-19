<footer class="Wrap" id="Footer">


	<div class="Row Wysiwyg">
		
		<?php
		if($Segment[0] != 'studenten'){
			$ID = '2'; 
		}else{
			$ID = '2';
		};
		
		$FooterQuery = "SELECT * FROM  `FORM_HOME_PAGE` WHERE ID = '{$ID}'"; 
		$FooterResult = @ $Mysqli->query($FooterQuery);
		$FooterRow = $FooterResult->fetch_array();
		
		if($FooterResult->num_rows == 1){
		
			$Counter = 	array('1', '2', '3');	
				
			foreach($Counter as $Count){
				
				$Title = $FooterRow['FIELD_FOOTER_TITLE_COL_'.$Count];
				$Title = CleanTitle($Title);
				
				$ExtraClass = '';
				if($Count % 2 != 0){
					$ExtraClass .= 'Odd ';
				}else {
					$ExtraClass .= 'Even ';
				}
				
				echo <<<END
					<div class="Col OneOfThree $ExtraClass">
						<section class="BorderSpace">
							<h3>$Title</h3>
							<ul class="LinkList">
END;
		
				
				$LinkIDs = $FooterRow['FIELD_WYGWAM_LINKS_COL_'.$Count];
				$LinkIDs = explode(',', $LinkIDs);
				
				foreach($LinkIDs as $LinkID){
					$FooterLinkQuery = "SELECT * FROM  `WYGWAM_WYGWAM_LINKS` WHERE PAGE = '{$ID}' AND ID = '{$LinkID}'"; 
					$FooterLinkResult = @ $Mysqli->query($FooterLinkQuery);
					$FooterLinkRow = $FooterLinkResult->fetch_array();
					
					$FooterTitleLink = $FooterLinkRow['FIELD_LINK_TITLE'];
					$FooterLink = $FooterLinkRow['FIELD_LINK'];
					$FooterTarget = $FooterLinkRow['FIELD_TARGET'];
					
					echo <<<END
						<li>
							<a target="$FooterTarget" href="$FooterLink" title="$FooterTitleLink">$FooterTitleLink</a>
						</li>
END;
				};
				
				echo <<<END
								</ul>
						</section>
					</div>
END;
			};
		};
		
		?>
		<div class="Col OneOfOne">
			<div class="Copy BorderSpace">
			<p>&copy; 2017-2018 Hulpstation design</p>
			</div>
		</div>
	</div>
</footer>

<div id="Grid" attrActive="Off"></div>
