<?php
    if(empty($Segment[0])){
		$Segment[0] = 'index';
    }

	switch($Segment[0]){
		case 'studenten':
			$HomeLink = '/studenten';
			$HeaderQeury = "SELECT * FROM `CMS_PAGES` WHERE ID = '2' OR ID = '176' ORDER BY `ID` DESC";//Nieuwe pagina in header rij een student
			$MenuQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '163' OR ID = '51'";//Nieuwe pagina in header rij twee student
			$MobileQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '163' OR ID = '51' OR ID = '2' OR ID = '176'";//Nieuwe pagina in header mobiel student
			$SearchLocation = '/studenten/zoeken';
		break;
		default:
			$HomeLink = $BaseUrl;
			$HeaderQeury = "SELECT * FROM `CMS_PAGES` WHERE ID = '37' OR ID = '46'";
			$MenuQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '4' OR ID = '3' OR ID = '24'";
			$MobileQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '4' OR ID = '3' OR ID = '24' OR ID = '37' OR ID = '46'";
			$SearchLocation = '/zoeken';
	};
?>

<div class="TotalDarkness">
</div>
<div class="MobileDarkness">
</div>
										
<header class="MenuWrap NoScroll" id="Header" AttrStatus="Closed">

	<nav class="Nav">
	
		<div class=" Wrap HeaderBar">
			<div class="Row">
					
				<a href="<?php echo $HomeLink; ?>" title="  Hulpstation.nl - Landelijk Computerhulp, Webontwerp & Les Aan Huis" id="Logo">
					<h1 class="LogoText">Hulpstation.nl</h1>
				</a>				
				
				<ul class="NavUl Second">
				
				<div class="PhoneNumberFirtnav">
					085 401 93 66
				</div>
				
				
				<!-- Facebook script begin -->
				
<!-- Facebook Conversion Code for campagnes-->

<!-- End Facebook Conversion Code for campagnes -->

<!-- Facebook code plugin -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.5&appId=300565756705362";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
				
				
						<!-- Facebook script eind -->
						
						
					<?php
					
					
					
					
						$HeaderResult = @ $Mysqli->query($HeaderQeury);
				
						while($HeaderRow = $HeaderResult->fetch_array()){
							$HeaderName = $HeaderRow['NAME'];
							$HeaderName = CleanTitle($HeaderName);
							$HeaderLink = $HeaderRow['UNIQUE_NAME'];
							
							$ActiveClass = '';
											
							if($Segment[0] == $HeaderLink || $Segment[1] == $HeaderLink){
								$ActiveClass = 'Visite';
							}
							
							$HeaderLink = CreateUrl($Mysqli, $HeaderLink, '/'.$HeaderLink);
							$HeaderNameID = $HeaderRow['ID'];
							
							if($HeaderNameID == 2){
								$HeaderName = 'Home';
							}
								
							echo <<<END
													
								<li class="NavLi">
									<a href="$HeaderLink" title="$HeaderName" class="NavA $ActiveClass">
										$HeaderName
									</a>
								</li>
END;
						};
				
					?>
				</ul>
			</div>
		</div>
		<div class="MenuWrap">
			<div class="MenuRow">
				<ul class="NavUl First">
		
		
					<?php
							
						$MenuResult = @ $Mysqli->query($MenuQuery);
						
						while($MenuRow = $MenuResult->fetch_array()){
							$MenuName = $MenuRow['NAME'];
							$MenuName = CleanTitle($MenuName);
							$MenuLink = $MenuRow['UNIQUE_NAME'];
							
							$ActiveClass = '';
											
							if($Segment[0] == $MenuLink  || $Segment[1] == $MenuLink){
								$ActiveClass = 'Visite';
							}
							
							$MenuLink = CreateUrl($Mysqli, $MenuLink, '/'.$MenuLink);
							$MenuNameID = $MenuRow['ID'];
						
					?>
					<li class="NavLi">
						<?php 
							
							$HeaderQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$MenuNameID}' AND FAVORITE = 'true' ORDER BY `ID` ASC LIMIT 3"; 
							$HeaderResult  = @ $Mysqli->query($HeaderQuery);
							
							if($HeaderResult->num_rows > 0){
								echo <<<END
									<a href="$MenuLink" title="$MenuName" class="NavA Dropdown $ActiveClass" AttrStatus="Closed">
										$MenuName
										<span class="NavArrow"></span>
										<span class="NavArrowBottom"></span>
									</a>
END;
							}else{
								echo <<<END
									<a href="$MenuLink" title="$MenuName" class="NavA $ActiveClass">
										$MenuName
									</a>
END;
							};
							
							if($HeaderResult->num_rows > 0){
						?>
							
							<?php
								//Klantenservice meer opties weglaten
								$ExtraClass = '';
								
								$LinkQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$MenuNameID}'"; 
								$LinkResult  = @ $Mysqli->query($LinkQuery);
								
								if($LinkResult->num_rows <= 2){
									$ExtraClass = 'NoMoreOptions';
								}
							?>
							
							<div class="Wrap Dropdown <?php echo $ExtraClass; ?>">
								<div class="Row Dropdown">
									<?php
										while($HeaderRow = $HeaderResult->fetch_array()){
											$HeaderName = $HeaderRow['NAME'];
											$HeaderLink = $HeaderRow['UNIQUE_NAME'];
											$HeaderID = $HeaderRow['ID'];
											
									?>	
										<div class="Col OneOfThree">
											<span class="Heading DropHeading"><?php echo CleanTitle($HeaderName); ?></span>
											<ul class="DropUl">
											
											
											<?php
												$LinkQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$HeaderID}' AND FAVORITE = 'true' ORDER BY `ID` ASC LIMIT 6"; 
												$LinkResult  = @ $Mysqli->query($LinkQuery);
												
												while($LinkRow = $LinkResult->fetch_array()){
													$LinkName = $LinkRow['NAME'];
													$LinkLink = $LinkRow['UNIQUE_NAME'];
													$LinkLink = CreateUrl($Mysqli, $LinkLink, '/'.$LinkLink);
											?>	
												<li class="DropLi">
													<a href="<?php echo $LinkLink; ?>" title="<?php echo CleanTitle($LinkName); ?>" class="DropA"><?php echo CleanTitle($LinkName); ?></a>
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
								
								<a href="<?php echo $MenuLink; ?>" title="<?php echo $MenuName; ?>" class="DropMore">Bekijk het volledige overzicht</a>
							</div>
						<?php
							};
						?>
					</li>
					
					<?php	
						};
					?>
					
					<li class="NavLi SearchLi">
						<a href="<?php echo $SearchLocation; ?>" title="zoeken" class="NavA SearchA Dropdown" AttrStatus="Closed">Zoeken</a>
						
						<div class="Wrap Dropdown SearchWrap">
							<div class="Row SearchRow">
								
									<fieldset class="FormWrap">
										<form name="SearchFormHeader" action="<?php echo $SearchLocation; ?>" method="post">
											<div class="SearchFieldWrap">
											<label class="FieldLabel Search">
												<input name="Search" class="Input Field Placeholder" type="text" value="zoeken" attrValue="zoeken" attrType="Search"/>
											</label>
											<input class="ActionButton SearchButtond" type="submit" value="zoeken"/>
											</div>
										</form>
									</fieldset>
								
								
							</div>
						</div>
					</li>
					
				</ul>
			
				
				<div class="PhoneNumber">
					085 401 93 66
				</div>
			</div>
		</div>
	</nav>
	
	<nav class="MobileHeader">
		<div class="HeaderRow">
			<div class="BorderSpace">
				<a href="<?php echo $HomeLink; ?>" title=" Hulpstation.nl - Landelijk Computerhulp Aan Huis | Ook Voor Webontwerp & Les Aan Huis" class="MobileLogo">
					<h1 class="LogoText">Hulpstation.nl</h1>
				</a>
				<a href="" title="" class="Burger" attrStatus="Closed">Menu</a>
			</div>
		</div>
		
		<div class="MobileDropDown">
			<div class="Row">
				<ul class="MobileUl">
					<li class="MobileLi Heading">
						<a class="" href="/" title="home">Klanten</a>
					</li>
					
					<?php
						$MobileQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '4' OR ID = '3' OR ID = '24' OR ID = '37'";	
						$MobileResult = @ $Mysqli->query($MobileQuery);
						
						while($MobileRow = $MobileResult->fetch_array()){
							$MobileName = $MobileRow['NAME'];
							$MobileName = CleanTitle($MobileName);
							$MobileLink = $MobileRow['UNIQUE_NAME'];
							$MobileLink = CreateUrl($Mysqli, $MobileLink, '/'.$MobileLink);
							
							echo <<<END
								<li class="MobileLi">
									<a href="$MobileLink" title="$MobileName" class="MobileA">$MobileName</a>
								</li>
END;
						}
					?>
					
					<li class="MobileLi">
						<a  href="/zoeken" title="zoeken" class="MobileA">Zoeken</a>
					</li>
				</ul>
				<ul class="MobileUl">
					<li class="MobileLi Heading">
						<a class="" href="/studenten" title="studenten">Vacatures</a>
					</li>
					
					<?php
						$MobileQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '163' OR ID = '51' OR ID = '176'";	//Student mobiel header
						$MobileResult = @ $Mysqli->query($MobileQuery);
						
						while($MobileRow = $MobileResult->fetch_array()){
							$MobileName = $MobileRow['NAME'];
							$MobileName = CleanTitle($MobileName);
							$MobileLink = $MobileRow['UNIQUE_NAME'];
							$MobileLink = CreateUrl($Mysqli, $MobileLink, '/'.$MobileLink);
							
							echo <<<END
								<li class="MobileLi">
									<a href="$MobileLink" title="$MobileName" class="MobileA">$MobileName</a>
								</li>
END;
						}
					?>
					
					<li class="MobileLi">
						<a  href="/studenten/zoeken" title="zoeken" class="MobileA">Zoeken</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
</header>



						