<?php
	switch($Segment[0]){
		case 'studenten':
			$HomeLink = $BaseUrl;
			$MenuQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '163'";//Nieuwe pagina in header rij twee student
			$SearchLocation = '/studenten/zoeken';
		break;
		default:
			$HomeLink = $BaseUrl;
			$MenuQuery = "SELECT * FROM `CMS_PAGES` WHERE ID = '4' OR ID = '3' OR ID = '24' OR ID = '239'";
			$SearchLocation = '/zoeken';
	};
?>

<header role="banner">
	<div class="_row orange-bg header">
		<div class="_container">
			<div class="_col-l-12">
				<a class="logo" href="/" title="">
					<h1 class="_sr-only">Hulpstation.nl</h1>
				</a>
				
				<div class="header-phone-info">
					Wij helpen je graag: <span class="header-phone-number">085 401 93 66 </span><small class="header-phone-price">lokaal tarief</small>
				</div>
				
				<button id="nav_burger" class="nav-burger js-open-close-click">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<nav id="main-navigation" class="main-navigation" role="navigation">
					<h1 class="_sr-only">Main navigation Hulpstation.nl</h1>
					<ul class="main-navigation-ul">
						
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
						
						<li>
						
							<?php 
							
							$HeaderQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$MenuNameID}' AND FAVORITE = 'true' ORDER BY `ID` ASC LIMIT 3"; 
							$HeaderResult  = @ $Mysqli->query($HeaderQuery);
							
							?>
								<a href="<?=$MenuLink; ?>" title="<?=$MenuName; ?>"><?=$MenuName; ?></a>
							<?php
							//Heeft dropdown	
							if($HeaderResult->num_rows > 0){
								
								
								$LinkQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$MenuNameID}'"; 
								$LinkResult  = @ $Mysqli->query($LinkQuery);
							?>
							
								<div class="_inner-col main-navigation-dropdown">
									<?php
										while($HeaderRow = $HeaderResult->fetch_array()){
											$HeaderName = $HeaderRow['NAME'];
											$HeaderLink = $HeaderRow['UNIQUE_NAME'];
											$HeaderID = $HeaderRow['ID'];
											
									?>
									
									<div class="_col-l-4 _wysiwyg">
										<span class="_h2-heading"><?= CleanTitle($HeaderName); ?></span>
										<ul class="_link-list">
											
											<?php
												$LinkQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$HeaderID}' AND FAVORITE = 'true' ORDER BY `ID` ASC LIMIT 6"; 
												$LinkResult  = @ $Mysqli->query($LinkQuery);
												
												while($LinkRow = $LinkResult->fetch_array()){
													$LinkName = $LinkRow['NAME'];
													$LinkLink = $LinkRow['UNIQUE_NAME'];
													$LinkLink = CreateUrl($Mysqli, $LinkLink, '/'.$LinkLink);
											?>
											
											<li>
												<a href="<?= $LinkLink; ?>" title="<?= CleanTitle($LinkName); ?>"><?= CleanTitle($LinkName); ?></a>
											</li>
											
											<?php
												};
											?>
											
										</ul>
									</div>
									
									<?php
										};
									?>
									
									<div class="_col-l-12">
										<a href="<?=$MenuLink; ?>" title="<?=$MenuName; ?>" class="_col-l-12 more-links">
											Bekijk het volledige overzicht
										</a>
									</div>
								</div>
							
							<?php
							//Heeft geen dropdown	
							}else{	
							?>
								
							<?php
							}
							?>
							
						</li>
						
						<?php
							};
						?>
							
							
						
						<li class="search-li">
							<a href="/zoeken" title="zoeken" class="js-open-close-click">Zoeken</a>
							<div class="nav-search-dropdown">
								<form class="nav-search-form" name="SearchFormHeader" action="<?php echo $SearchLocation; ?>" method="post">
									<fieldset>
										<label class="nav-search-label">
											<input type="input" value="" placeholder="Waar bent u naar opzoek?" class="nav-search-field" name="Search">
											<input type="submit" value="zoeken" class="nav-search-btn">
										</label>
									</fieldset>
								</form>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	
	
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	
	fbq('init', '1448303425475052');
	fbq('track', "PageView");</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1448303425475052&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
	
	
</header>